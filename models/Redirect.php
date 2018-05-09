<?php

namespace dmstr\modules\redirect\models;

use dmstr\modules\redirect\models\base\Redirect as BaseRedirect;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "dmstr_redirect".
 */
class Redirect extends BaseRedirect
{
    const TYPE_DOMAIN = 'domain';
    const TYPE_PATH = 'path';

    const STATUS_MOVED_PERMANENTLY = 301;
    const STATUS_FOUND = 302;

    /**
     * @return array
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['timestamp'] = [
            'class' => TimestampBehavior::class,
            'value' => new Expression('NOW()'),
        ];
        return $behaviors;
    }


    /**
     * @return array
     */
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['crud'] = [
            'type',
            'from_domain',
            'to_domain',
            'from_path',
            'to_path',
            'status_code'
        ];
        return $scenarios;
    }

    /**
     * @return array
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules[] = [['type'], 'required']; // type is required
        $rules[] = [['from_domain', 'to_domain'], 'required', 'when' => function ($model) {
            return $model->type === $model::TYPE_DOMAIN;
        }, 'enableClientValidation' => false]; // require from & to domain if type is set
        $rules[] = [['from_path', 'to_path'], 'required', 'when' => function ($model) {
            return $model->type === $model::TYPE_PATH;
        }, 'enableClientValidation' => false]; // require from & to domain if type is set
        return $rules;
    }

    public static function optsType()
    {
        return [
            self::TYPE_DOMAIN => \Yii::t('redirect', 'Domain redirect'),
            self::TYPE_PATH => \Yii::t('redirect', 'Path redirect'),
        ];
    }

    public static function optsStatusCode()
    {
        return [
            self::STATUS_MOVED_PERMANENTLY => \Yii::t('redirect', 'Moved permanently (301)'),
            self::STATUS_FOUND => \Yii::t('redirect', 'Moved temporary (302)')
        ];
    }
}

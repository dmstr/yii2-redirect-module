<?php

namespace dmstr\modules\redirect\models;

use dmstr\modules\redirect\models\base\Redirect as BaseRedirect;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "dmstr_redirect".
 *
 */
class Redirect extends BaseRedirect
{

    // HTTP CODES
    /**
     * If you want to add new ones, add them here as constants & to the optsStatusCode method
    */
    const STATUS_MOVED_PERMANENTLY = 301;
    const STATUS_FOUND = 302;

    /**
     * @return array
     *
     * - timestamp: Update created_at and updated_at on creation or update
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
     * @return array Set of defined rules
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules[] = ['destination', 'compare', 'compareAttribute' => 'source','operator' => '!='];
        return $rules;
    }

    public static function optsStatusCode()
    {
        return [
            self::STATUS_MOVED_PERMANENTLY => \Yii::t('redirect', 'Moved permanently (301)'),
            self::STATUS_FOUND => \Yii::t('redirect', 'Moved temporary (302)')
        ];
    }

    /**
     * redirect to given destionation with give status code
     */
    public function doRedirect()
    {
        header('Location: ' . $this->destination, true, $this->status_code);
    }
}

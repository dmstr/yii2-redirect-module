<?php

namespace dmstr\modules\redirect\models\base;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the base-model class for table "dmstr_redirect".
 *
 * @property integer $id
 * @property string $source
 * @property string $destination
 * @property integer $status_code
 * @property string $created_at
 * @property string $updated_at
 */
class Redirect extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dmstr_redirect';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_code','source','destination'], 'required'],
            [['source'], 'unique'],
            [['status_code'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['source', 'destination'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('redirect', 'ID'),
            'source' => Yii::t('redirect', 'Source'),
            'destination' => Yii::t('redirect', 'Destination'),
            'status_code' => Yii::t('redirect', 'Status Code'),
            'created_at' => Yii::t('redirect', 'Created At'),
            'updated_at' => Yii::t('redirect', 'Updated At'),
        ];
    }

    
    /**
     * @inheritdoc
     * @return \dmstr\modules\redirect\models\query\RedirectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \dmstr\modules\redirect\models\query\RedirectQuery(get_called_class());
    }

    
}

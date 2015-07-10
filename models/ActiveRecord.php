<?php
/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2014 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace dmstr\modules\redirect\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


/**
 * Class ActiveRecord
 * @package dmstr\yii2-redirect
 * @author Christopher Stebe <c.stebe@herzogkommunikation.de>
 */
class ActiveRecord extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class'              => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value'              => new Expression('NOW()'),
            ]
        ];
    }

    public function optsType()
    {
        return [
            'domain' => \Yii::t(\Yii::$app->getModule('redirect')->messageCatalogue, 'Domain redirect'),
            'path'   => \Yii::t(\Yii::$app->getModule('redirect')->messageCatalogue, 'Path redirect'),
        ];
    }

    public function optsStatusCode()
    {
        return [
            301 => 301,
            302 => 302
        ];
    }
} 
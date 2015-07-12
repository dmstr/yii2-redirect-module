<?php
/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2014 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace dmstr\modules\redirect\models;

use dmstr\modules\redirect\Module;
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

    public static function optsType()
    {
        $catalogue = \Yii::$app->getModule('redirects')->messageCatalogue;
        return [
            Module::TYPE_DOMAIN => \Yii::t($catalogue, 'Domain redirect'),
            Module::TYPE_PATH   => \Yii::t($catalogue, 'Path redirect'),
        ];
    }

    public static function optsStatusCode()
    {
        return [
            301 => 301,
            302 => 302
        ];
    }
} 
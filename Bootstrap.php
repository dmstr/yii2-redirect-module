<?php
/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2014 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace dmstr\modules\redirect;

use yii\base\Application;
use yii\base\BootstrapInterface;

/**
 * Class Bootstrap
 * @package dmstr/yii2-redirect
 * @author Christopher Stebe <c.stebe@herzogkommunikation.de>
 */
class Bootstrap implements BootstrapInterface
{
    /**
     * Bootstrap method to be called during application bootstrap stage.
     *
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
        if (!\Yii::$app->hasModule('redirects')) {

            $app->setModule(
                'redirects',
                [
                    'class'  => Module::className(),
                    'layout' => '@admin-views/layouts/main',
                ]
            );
        }

        $app->params['yii.migrations'][] = '@dmstr/modules/redirect/migrations';
    }
}
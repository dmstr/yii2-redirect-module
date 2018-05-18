<?php
/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2015 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace dmstr\modules\redirect;

use dmstr\modules\redirect\models\Redirect;
use Yii;
use yii\helpers\Url;
use yii\web\Application;

/**
 *
 */
class Module extends \yii\base\Module
{
    /**
     * Redirect controller as default route
     * @var string
     */
    public $defaultRoute = 'redirect';

    /**
     * @inheritdoc
     */
    public function init()
    {

        if (getenv('YII_ENV') !== 'test' && Yii::$app instanceof \yii\web\Application) {
            $pathUrl = '/' . \Yii::$app->request->pathInfo; // url just path of current request
            $domainUrl = Yii::$app->request->hostInfo . $pathUrl; // url with domain of current request

            /**
             * @var $redirects Redirect[];
             * 
             * - get all redirects
             * - check if source url is relative 
             *    true: path redirect
             *    false: domain redirect
             * 
             * - check if source and compare urls match
             * - do redirect to destionation
             */
            foreach (Redirect::find()->all() as $redirect) {
                if (Url::isRelative($redirect->source)) {
                    $compareUrl = $pathUrl;
                    try {
                        $sourceUrl = Url::to([$redirect->source]);
                    } catch (\Exception $e) {
                        Yii::trace($e->getMessage(),'redirect');
                        $sourceUrl = null;
                    }
                } else {
                    $compareUrl = $domainUrl;
                    $sourceUrl = $redirect->source;
                }

                if ($sourceUrl === $compareUrl) {
                    $redirect->doRedirect();
                    exit;
                }
            }
        }
        parent::init();
    }

}

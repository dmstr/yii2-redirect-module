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
use yii\web\HttpException;

class Module extends \yii\base\Module
{
    /**
     * Redirect types
     */
    const TYPE_DOMAIN = 'domain';
    const TYPE_PATH = 'path';
    /**
     * Controller namespace
     * @var string
     */
    public $controllerNamespace = 'dmstr\modules\redirect\controllers';
    /**
     * Redirect controller as default route
     * @var string
     */
    public $defaultRoute = 'redirect';
    /**
     * Crud message catalogue for \Yii::t()
     * @var string
     */
    public $messageCatalogue = 'app';
    /**
     * @var array
     */
    private $domainRedirects = [];
    /**
     * @var array
     */
    private $pathRedirects = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // check if we are NOT in a cli process, otherwise it's not possible to determine the $app->request reliably
        if (php_sapi_name() !== 'cli' && Yii::$app instanceof \yii\web\Application) {

            $this->domainRedirects = Redirect::findAll(['type' => self::TYPE_DOMAIN]);
            $this->pathRedirects = Redirect::findAll(['type' => self::TYPE_PATH]);

            // Domain redirect
            foreach ($this->domainRedirects as $domain) {

                if (\Yii::$app->request->hostInfo == $domain->from_domain) {
                    self::doRedirectDomain($domain->to_domain, $domain->status_code);
                }
            }

            // Path redirect
            foreach ($this->pathRedirects as $path) {
                if ('/'.\Yii::$app->request->pathInfo == $path->from_path) {
                    self::doRedirectPath($path->to_path, $path->status_code);
                }
            }
        }
    }

    /**
     * @param $to
     * @param $statusCode
     */
    protected function doRedirectDomain($to, $statusCode)
    {
        header('Location: '.$to, true, $statusCode);
        exit;
    }

    /**
     * @param $to
     * @param $statusCode
     */
    protected function doRedirectPath($to, $statusCode)
    {
        $url = Url::to($to);

        header('Location: '.$url, true, $statusCode);
        exit;
    }
}

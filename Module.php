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
        if (is_a(Yii::$app, yii\web\Application::class)) {

            $db = Yii::$app->db;

            // Domain redirect
            $domains = $db->cache(function () {
                return Redirect::findAll(['type' => Redirect::TYPE_DOMAIN]);
            });
            $currentUrl = Yii::$app->request->hostInfo . Yii::$app->request->url; // url of current request
            foreach ((array)$domains as $domain) {
                if ($currentUrl === $domain->from_domain) {
                    self::doRedirectDomain($domain->to_domain, $domain->status_code);
                }
            }

            // Path redirect
            $paths = $db->cache(function () {
                return Redirect::findAll(['type' => Redirect::TYPE_PATH]);
            });
            $pathInfo = '/' . \Yii::$app->request->pathInfo; // path of current request
            foreach ((array)$paths as $path) {
                if ($pathInfo === $path->from_path) {
                    self::doRedirectPath($path->to_path, $path->status_code);
                }
            }
        }
        parent::init();
    }

    /**
     * @param $to
     * @param $statusCode
     */
    protected function doRedirectDomain($to, $statusCode)
    {
        self::doRedirect($to, $statusCode);
    }

    /**
     * @param $to
     * @param $statusCode
     */
    protected function doRedirectPath($to, $statusCode)
    {
        self::doRedirect(Url::to($to), $statusCode);
    }

    protected function doRedirect($url, $statusCode)
    {
        header('Location: ' . $url, true, $statusCode);
        exit;
    }
}

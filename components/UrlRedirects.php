<?php
/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2015 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace dmstr\modules\redirect\components;

use yii\base\Component;
use yii\helpers\Url;


/**
 * Class UrlRedirects
 * @package dmstr\modules\redirect\components
 * @author Christopher Stebe <c.stebe@herzogkommunikation.de>
 */
class UrlRedirects extends Component
{
    private $domainRedirects = [];
    private $pathRedirects = [];

    /**
     * Redirects for Bernstein
     * @var array
     */
    private $bs = [
        4 => 'jobs',
        3 => 'press',
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        switch (getenv('APP_ASSET_SKIN')) {
            case 'bs' :
                $this->redirects = $this->bs;
                break;
            default:
                exit;
        }

        foreach ($this->redirects as $id => $pageName) {

            if (\Yii::$app->request->pathInfo == $pageName) {
                self::doRedirectToPage($id, $pageName);
            }
        }
    }

    /**
     * @param $id
     * @param $pageName
     */
    protected function doRedirectToPage($id, $pageName)
    {
        $host = \Yii::$app->request->getHostInfo();
        $url  = Url::to(['/pages/default/page', 'id' => $id, 'pageName' => $pageName, 'language' => 'de']);

        header('Location: ' . $host . $url, true, 301);
        exit;
    }
}
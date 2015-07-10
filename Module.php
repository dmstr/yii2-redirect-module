<?php
/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2015 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace dmstr\modules\redirect;

class Module extends \yii\base\Module
{
    /**
     * Controller namespace
     * @var string
     */
    public $controllerNamespace = '\dmstr\modules\redirect\controllers';

    /**
     * Crud message catalogue for \Yii::t()
     * @var string
     */
    public $messageCatalogue = 'dmstr';


    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}

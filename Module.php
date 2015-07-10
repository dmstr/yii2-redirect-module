<?php

namespace dmstr\modules\redirect;

class Module extends \yii\base\Module
{
    public $controllerNamespace = '\dmstr\modules\redirect\controllers';

    public $layout = '@admin-views/layouts/main';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}

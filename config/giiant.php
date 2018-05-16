<?php
/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2018 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace dmstr\modules\redirect;

use schmunk42\giiant\commands\BatchController;
use schmunk42\giiant\generators\crud\callbacks\base\Callback;

// include basic giiant callback providers
$activeFields = [
    '^id|created_at|updated_at' => Callback::false(),
];
$columnFormats = [
    '^id|created_at|updated_at' => Callback::false(),
];

\Yii::$container->set(
    'schmunk42\giiant\crud\providers\CallbackProvider',
    [
        'activeFields' => $activeFields,
        'columnFormats' => $columnFormats,
        'appendActiveFields' => [
            'status_code' => function ($model, $attribute) {
                return <<<PHP
<?php \$model->{$attribute} = \$model::STATUS_MOVED_PERMANENTLY?>
PHP;

            },
        ]
    ]
);


\Yii::$container->set(
    'schmunk42\giiant\crud\providers\OptsProvider',
    [
        'columnNames' => [
            'status_code' => 'radio'
        ]
    ]
);

return [
    'controllerMap' => [
        'redirect:crud' => [
            'class' => BatchController::class,
            'overwrite' => true,
            'interactive' => false,
            'modelNamespace' => __NAMESPACE__ . '\\models',
            'modelQueryNamespace' => __NAMESPACE__ . '\\models\\query',
            'crudControllerNamespace' => __NAMESPACE__ . '\\controllers',
            'crudSearchModelNamespace' => __NAMESPACE__ . '\\models\\search',
            'crudViewPath' => '@' . str_replace('\\', '/', __NAMESPACE__) . '/views',
            'crudPathPrefix' => '/redirects/redirect',
            'crudTidyOutput' => true,
            'crudAccessFilter' => true,
            'crudProviders' => [
                CallbackProvider::class,
                OptsProvider::class,
                RelationProvider::class,
            ],
            'crudMessageCategory' => 'redirect',
            'modelMessageCategory' => 'redirect',
            'tablePrefix' => 'dmstr_',
            'tables' => [
                'dmstr_redirect'
            ]
        ]
    ]
];
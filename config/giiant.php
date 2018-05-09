<?php
/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2018 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace dmstr\modules\redirect\providers;

use schmunk42\giiant\generators\crud\callbacks\base\Callback;

// include basic giiant callback providers
$activeFields = [
    '^id|created_at|updated_at' => Callback::false(),
];
$columnFormats = [
    '^id|created_at|updated_at' => Callback::false(),
];

$domainInputsCssId = 'domain-inputs';
$pathInputsCssId = 'domain-inputs';

\Yii::$container->set(
    'schmunk42\giiant\crud\providers\CallbackProvider',
    [
        'activeFields' => $activeFields,
        'columnFormats' => $columnFormats,
        'appendActiveFields' => [
            'type' => function ($model, $attribute) {
                return <<<PHP
<?php 
\$this->registerJs("$('input[name=\"{\$model->formName()}[{$attribute}]\"]').on('change',function() { $('#domain-inputs,#path-inputs').toggleClass('hidden');});");
\$model->{$attribute} = \$model::TYPE_DOMAIN;
?>
PHP;

            },
            'status_code' => function ($model, $attribute) {
                return <<<PHP
<?php \$model->{$attribute} = \$model::STATUS_MOVED_PERMANENTLY?>
PHP;

            },
            'from_domain' => function () {
                return "<span id='{$domainInputsCssId}'>";
            },
            'from_path' => function () {
                return "<span id='{$pathInputsCssId}' class='hidden'>";
            }
        ],
        'prependActiveFields' => [
            'to_domain|to_path' => function () {
                return '</span>';
            }
        ]
    ]
);


\Yii::$container->set(
    'schmunk42\giiant\crud\providers\OptsProvider',
    [
        'columnNames' => [
            'status_code' => 'radio',
            'type' => 'radio',
        ]
    ]
);
\Yii::$container->set(
    'dmstr\modules\redirect\providers',
    [
        'columnNames' => [
            '' => '',
        ]
    ]
);

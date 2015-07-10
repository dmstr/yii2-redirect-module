<?php

namespace dmstr\modules\redirect\providers;

use schmunk42\giiant\base\Provider;

// include basic giiant callback providers
$activeFields     = [
    '^id$|created_at$|updated_at$' => function () {
        return false;
    },
];
$columnFormats    = [
    '^id$|created_at$|updated_at$' => function () {
        return false;
    },
    'XXXXX$'                       => function ($attribute, $generator) {
        return <<<FORMAT
[
    'format' => 'html',
    #'label'=>'FOOFOO',
    'attribute' => '{$attribute}',
    'value'=> function(\$model){
        return \$model->{$attribute});
    }
]
FORMAT;
    }
];
$attributeFormats = [];

\Yii::$container->set(
    'schmunk42\giiant\crud\providers\CallbackProvider',
    [
        'activeFields'     => $activeFields,
        'columnFormats'    => $columnFormats,
        'attributeFormats' => $attributeFormats
    ]
);


\Yii::$container->set(
    'schmunk42\giiant\crud\providers\OptsProvider',
    [
        'columnNames' => [
            'status_code' => 'radio',
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


class CrudProvider extends Provider
{
    public function activeField($attribute)
    {
        $column = $this->generator->getTableSchema()->columns[$attribute];

        switch (true) {
            case (in_array($column->name, $this->columnNames)):
                $this->generator->requires[] = 'dmstr/yii2-redirect';
                return <<<CODE
CODE;
                break;
            default:
                return null;
        }
    }
    public function attributeFormat($attribute)
    {
        $column = $this->generator->getTableSchema()->columns[$attribute];

        switch (true) {
            case (in_array($column->name, $this->columnNames)):
                $this->generator->requires[] = 'dmstr/yii2-redirect';
                return <<<CODE
CODE;
                break;
            default:
                return null;
        }
    }
    public function columnFormat($attribute)
    {
        $column = $this->generator->getTableSchema()->columns[$attribute];

        switch (true) {
            case (in_array($column->name, $this->columnNames)):
                $this->generator->requires[] = 'dmstr/yii2-redirect';
                return <<<CODE
CODE;
                break;
            default:
                return null;
        }
    }
}

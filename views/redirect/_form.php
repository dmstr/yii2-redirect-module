<?php

use dmstr\bootstrap\Tabs;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var dmstr\modules\redirect\models\Redirect $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>
            <?= $model->id ?>        </h2>
    </div>

    <div class="panel-body">

        <div class="redirect-form">

            <?php $form = ActiveForm::begin(
                [
                    'id'                     => 'Redirect',
                    'layout'                 => 'horizontal',
                    'enableClientValidation' => true,
                    'errorSummaryCssClass'   => 'error-summary alert alert-error'
                ]
            );
            ?>

            <div class="">
                <?php $this->beginBlock('main'); ?>

                <p>

                    <?= $form->field($model, 'type')->dropDownList(
                        dmstr\modules\redirect\models\Redirect::optstype()
                    ); ?>
                    <?= $form->field($model, 'from_domain')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'to_domain')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'from_path')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'to_path')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'status_code')->radioList(
                        dmstr\modules\redirect\models\Redirect::optsstatuscode()
                    ); ?>
                </p>
                <?php $this->endBlock(); ?>

                <?=
                Tabs::widget(
                    [
                        'encodeLabels' => false,
                        'items'        => [
                            [
                                'label'   => 'Redirect',
                                'content' => $this->blocks['main'],
                                'active'  => true,
                            ],
                        ]
                    ]
                );
                ?>
                <hr/>
                <?php echo $form->errorSummary($model); ?>
                <?= Html::submitButton(
                    '<span class="glyphicon glyphicon-check"></span> ' .
                    ($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save')),
                    [
                        'id'    => 'save-' . $model->formName(),
                        'class' => 'btn btn-success'
                    ]
                );
                ?>

                <?php ActiveForm::end(); ?>

            </div>

        </div>

    </div>

</div>

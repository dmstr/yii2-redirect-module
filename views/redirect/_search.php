<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var dmstr\modules\redirect\models\search\Redirect $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="redirect-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'type') ?>

		<?= $form->field($model, 'from_domain') ?>

		<?= $form->field($model, 'to_domain') ?>

		<?= $form->field($model, 'from_path') ?>

		<?php // echo $form->field($model, 'to_path') ?>

		<?php // echo $form->field($model, 'status_code') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'updated_at') ?>

		<div class="form-group">
			<?= Html::submitButton(Yii::t('redirect', 'Search'), ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton(Yii::t('redirect', 'Reset'), ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>

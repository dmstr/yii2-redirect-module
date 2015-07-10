<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var dmstr\modules\redirect\models\Redirect $model
 */

$this->title = 'Redirect ' . $model->id . ', ' . Yii::t('app', 'Edit');
$this->params['breadcrumbs'][] = ['label' => 'Redirects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="giiant-crud redirect-update">

    <p>
        <?= Html::a(
            '<span class="glyphicon glyphicon-eye-open"></span> ' . Yii::t('app', 'View'),
            ['view', 'id' => $model->id],
            ['class' => 'btn btn-info']
        ) ?>
    </p>

    <?php echo $this->render(
        '_form',
        [
            'model' => $model,
        ]
    ); ?>

</div>

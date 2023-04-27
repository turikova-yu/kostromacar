<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CarGeneration $model */

$this->title = 'Update Car Generation: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Car Generations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="car-generation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

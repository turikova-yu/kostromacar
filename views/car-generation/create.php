<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CarGeneration $model */

$this->title = 'Create Car Generation';
$this->params['breadcrumbs'][] = ['label' => 'Car Generations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-generation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

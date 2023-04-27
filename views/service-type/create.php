<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ServiceType $model */

$this->title = 'Create Service Type';
$this->params['breadcrumbs'][] = ['label' => 'Service Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

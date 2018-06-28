<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Prodotti */

$this->title = 'Update Prodotti: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Prodottis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prodotti-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

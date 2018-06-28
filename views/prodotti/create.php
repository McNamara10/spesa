<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Prodotti */

$this->title = 'Create Prodotti';
$this->params['breadcrumbs'][] = ['label' => 'Prodottis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prodotti-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

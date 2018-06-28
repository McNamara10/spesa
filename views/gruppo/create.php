<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Gruppo */

$this->title = 'Create Gruppo';
$this->params['breadcrumbs'][] = ['label' => 'Gruppos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gruppo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

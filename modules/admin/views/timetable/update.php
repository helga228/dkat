<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Timetable */

$this->title = 'Update Timetable: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Timetables', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="timetable-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

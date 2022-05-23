<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Timetable */

$this->title = 'Для добавления пары выберите:';
$this->params['breadcrumbs'][] = ['label' => 'Timetables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


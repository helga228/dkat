<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\ToggleButtonGroup;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TimetableSearch */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="timetable-search d-flex flex-column align-items-center">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'speciality')->dropDownList([
        '090303' => '09.03.03 «Прикладная информатика»',
        '270303' => '27.03.03 «Системный анализ и управление»',
        '120301' => '12.03.01 «Приборостроение»',
        '270305' => '27.03.05 «Инноватика»',
        '270406' => '27.04.06 «Организация и управление наукоемкими производствами»',
        '120401' => '12.04.01 «Приборостроение»',
        '210402' => '21.04.02 «Землеустройство и кадастры»'
    ])->label('Направление подготовки:') ?>

    <p class="label">Курс:</p>
    <?= $form->field($model, 'course')->widget(ToggleButtonGroup::class, [
        'type' => ToggleButtonGroup::TYPE_RADIO,
        'labelOptions' => ['class' => 'btn btn-primary'],
        'class' => 'btn-group',
        'options' => [
            'class' =>'btn-group btn-group-toggle'
        ],
        'items' => [1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '1м', 6 => '2м']
    ])->label(false) ?>

    <?= $form->field($model, 'group')->label('Группа:') ?>

    <p class="label">Неделя:</p>
    <?= $form->field($model, 'week')->widget(ToggleButtonGroup::class, [
        'type' => ToggleButtonGroup::TYPE_RADIO,
        'labelOptions' => ['class' => 'btn btn-primary'],
        'class' => 'btn-group',
        'options' => [
            'class' =>'btn-group btn-group-toggle'
        ],
        'items' => [1 => 'Нижняя', 2 => 'Верхняя']
    ])->label(false) ?>


    <div class="d-flex align-items-center justify-content-center">
        <div class="find-btn">
            <?= Html::submitButton('Найти', ['class' => 'btn']) ?>
        </div>
        <div class="create-btn">
            <?= Html::a('К созданию', ['create'], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

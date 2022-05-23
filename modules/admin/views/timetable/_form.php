<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\ToggleButtonGroup;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Timetable */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="add w-80 h-100">

    <div class="schedule__top">
        <div class="schedule__info">
            <div class="schedule__left">
                <div class="schedule__back">
                    <a href="/admin/timetable/index">
                        <svg width="17" height="28" viewBox="0 0 17 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17 24.71L6.49258 14L17 3.29L13.7652 0L0 14L13.7652 28L17 24.71Z" fill="#A3A3C9"/>
                        </svg>
                    </a>
                </div>
                <div class="schedule__spec">
                    Для добавления пары выберите:
                </div>
            </div>
        </div>
        <div class="schedule__form">
            <?php $form = ActiveForm::begin(); ?>

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
                    'class' => 'btn-group btn-group-toggle'
                ],
                'items' => [1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '1м', 6 => '2м']
            ])->label(false) ?>

            <?= $form->field($model, 'group')->label('Группа:') ?>

            <p class="label">Подгруппа:</p>
            <?= $form->field($model, 'subgroup')->widget(ToggleButtonGroup::class, [
                'type' => ToggleButtonGroup::TYPE_RADIO,
                'labelOptions' => ['class' => 'btn btn-primary'],
                'class' => 'btn-group',
                'options' => [
                    'class' => 'btn-group btn-group-toggle'
                ],
                'items' => [0 => 'Общая', 1 => '1 подгруппа', 2 => '2 подгруппа']
            ])->label(false) ?>

            <p class="label">Неделя:</p>
            <?= $form->field($model, 'week')->widget(ToggleButtonGroup::class, [
                'type' => ToggleButtonGroup::TYPE_RADIO,
                'labelOptions' => ['class' => 'btn btn-primary'],
                'class' => 'btn-group',
                'options' => [
                    'class' => 'btn-group btn-group-toggle'
                ],
                'items' => [1 => 'Нижняя', 2 => 'Верхняя']
            ])->label(false) ?>

            <p class="label">День недели:</p>
            <?= $form->field($model, 'day')->widget(ToggleButtonGroup::class, [
                'type' => ToggleButtonGroup::TYPE_RADIO,
                'labelOptions' => ['class' => 'btn btn-primary'],
                'class' => 'btn-group',
                'options' => [
                    'class' => 'btn-group btn-group-toggle'
                ],
                'items' => [1 => 'Пн', 2 => 'Вт', 3 => 'Ср', 4 => 'Чт', 5 => 'Пт', 6 => 'Сб']
            ])->label(false) ?>

            <p class="label">Пара:</p>
            <?= $form->field($model, 'number')->widget(ToggleButtonGroup::class, [
                'type' => ToggleButtonGroup::TYPE_RADIO,
                'labelOptions' => ['class' => 'btn btn-primary'],
                'class' => 'btn-group',
                'options' => [
                    'class' => 'btn-group btn-group-toggle'
                ],
                'items' => [1 => '8.00-9:35', 2 => '9:50-11:25', 3 => '11:55-13:30', 4 => '13:45-15:20', 5 => '15:50-17:25']
            ])->label(false) ?>

            <?= $form->field($model, 'teacher')->label('Преподаватель:')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'cabinet')->label('Аудитория:')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'lesson')->label('Название предмета:')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

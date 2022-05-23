<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Timetable */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Timetables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

function getSpeciality($speciality) {
    switch ($speciality) {
        case '090303':
            return '09.03.03 «Прикладная информатика»';
        case '270303':
            return '27.03.03 «Системный анализ и управление»';
        case '120301':
            return '12.03.01 «Приборостроение»';
        case '270305':
            return '27.03.05 «Инноватика»';
        case '270406':
            return '27.04.06 «Организация и управление наукоемкими производствами»';
        case '120401':
            return '12.04.01 «Приборостроение»';
        case '210402':
            return '21.04.02 «Землеустройство и кадастры»';
        case '090403':
            return '09.04.03 «Прикладная информатика»';
        default:
            return $speciality;
    }
}

function getWeek($week) {
    switch ($week) {
        case '1':
            return 'Нижняя';
        case '2':
            return 'Верхняя';
        default:
            return $week;
    }
}

function getDay($day) {
    switch ($day) {
        case '1':
            return 'Понедельник';
        case '2':
            return 'Вторник';
        case '3':
            return 'Среда';
        case '4':
            return 'Четверг';
        case '5':
            return 'Пятница';
        case '6':
            return 'Суббота';
        default:
            return $day;
    }
}

function getTime($number) {
    switch ($number) {
        case '1':
            return '8.00-9:35';
        case '2':
            return '9:50-11:25';
        case '3':
            return '11:55-13:30';
        case '4':
            return '13:45-15:20';
        case '5':
            return '15:50-17:25';
        default:
            return $number;
    }
}

?>


<div class="timetable-view">

    <div class="form-container mb-4">
        <div class="schedule__back">
            <a href="/admin/timetable/index">
                <svg width="17" height="28" viewBox="0 0 17 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 24.71L6.49258 14L17 3.29L13.7652 0L0 14L13.7652 28L17 24.71Z" fill="#A3A3C9"/>
                </svg>
            </a>
        </div>
        <?= DetailView::widget([
            'model' => $model,
            'options' => [
                    'class' => 'table',
            ],
            'attributes' => [
                [
                    'label' => '№',
                    'attribute' => 'id',
                ],
                [
                    'label' => 'Специальность',
                    'value' => getSpeciality($model->speciality),
                ],
                [
                    'label' => 'Курс',
                    'attribute' => 'course',
                ],
                [
                    'label' => 'Группа',
                    'attribute' => 'group',
                ],
                [
                    'label' => 'Подгруппа',
                    'attribute' => 'subgroup',
                ],
                [
                    'label' => 'Неделя',
                    'value' => getWeek($model->week),
                ],
                [
                    'label' => 'День',
                    'value' => getDay($model->day),
                ],
                [
                    'label' => 'Время пары',
                    'value' => getTime($model->number),
                ],
                [
                    'label' => 'Преподаватель',
                    'attribute' => 'teacher',
                ],
                [
                    'label' => 'Аудитория',
                    'attribute' => 'cabinet',
                ],
                [
                    'label' => 'Название пары',
                    'attribute' => 'lesson',
                ],
            ],
        ]) ?>
    </div>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить пару?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


</div>

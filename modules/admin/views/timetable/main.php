<?php

/** @var yii\web\View $this */

use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TimetableSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $day app\models\Timetable */
/* @var $model app\models\TimetableSearch */

$this->title = 'Расписание';
function classContent($id, $subgroup, $lesson, $teacher, $cabinet) {
    switch($subgroup) {
        case 0:
            return '<a href="/admin/timetable/view?id=' . $id . '"><div class = "class"><div class = "class__top"><div class = "class__name">' . $lesson . '</div><div class = "class__teacher">' . $teacher . '</div></div><div class = "class__bottom"><div class = "class__cabinet">ауд. ' . $cabinet . '</div></div></a>';
        case 1:
            return '<a href="/admin/timetable/view?id=' . $id . '"><div class = "class subgroup1"><div class = "class__top"><div class = "class__name">' . $lesson . '</div><div class = "class__teacher">' . $teacher . '</div></div><div class = "class__bottom"><div class = "class__cabinet">ауд. ' . $cabinet . '</div></div></a>';
        case 2:
            return '<a href="/admin/timetable/view?id=' . $id . '"><div class = "class subgroup2"><div class = "class__top"><div class = "class__name">' . $lesson . '</div><div class = "class__teacher">' . $teacher . '</div></div><div class = "class__bottom"><div class = "class__cabinet">ауд. ' . $cabinet . '</div></div></a>';
        default:
            return 'Неверный номер подгруппы';
    }
};

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

?>

<!--Страница не работает-->

<div class="schedule w-100 h-100">

    <div class="schedule__top">
        <div class="schedule__info">
            <div class="schedule__left">
                <div class="schedule__back">
                    <a href="/">
                        <svg width="17" height="28" viewBox="0 0 17 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17 24.71L6.49258 14L17 3.29L13.7652 0L0 14L13.7652 28L17 24.71Z" fill="#A3A3C9"/>
                        </svg>
                    </a>
                </div>
                <div class="schedule__spec">
                    <?= getSpeciality($searchModel->speciality) ?>
                </div>
            </div>
            <div class="schedule__right">
                <div class="schedule__course"><?= $searchModel->week == 1 ? 'Нижняя' : 'Верхняя'  ?> неделя,
                    <?= $searchModel->course ?> курс <?= $searchModel->group ?> группа</div>
            </div>
        </div>
    </div>

    <div class="schedule__map">
        <div class="schedule__item">
            <div class="schedule__color"></div>
            <div class="schedule__color-name">Общая пара</div>
        </div>
        <div class="schedule__item">
            <div class="schedule__color"></div>
            <div class="schedule__color-name">1 подгруппа</div>
        </div>
        <div class="schedule__item">
            <div class="schedule__color"></div>
            <div class="schedule__color-name">2 подгруппа</div>
        </div>
    </div>

    <div class="schedule__table w-80">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'tableOptions' => [
                'class' => 'table table-bordered'
            ],
            'layout' => "{items}",
//        'filterModel' => $searchModel,
            'columns' => [
                [
                    'class' => 'yii\grid\DataColumn',
                    'attribute' => 'number',
                    'label' => '',
                    'format' => 'raw',
                    "value" => function ($model) {
                        switch ($model->number) {
                            case (1):
                                return '<div class="time">8.00-9:35</div>';
                            case (2):
                                return '<div class="time">9:50-11:25</div>';
                            case (3):
                                return '<div class="time">11:55-13:30</div>';
                            case (4):
                                return '<div class="time">13:45-15:20</div>';
                            case (5):
                                return '<div class="time">15:50-17:25</div>';
                            default:
                                return '<div class="time">Некорректное время</div>';
                        }
                    },
                    'contentOptions' => [
                        'width' => '10%',
                    ],
                ],
                [
                    'class' => 'yii\grid\DataColumn',
                    'attribute' => 'item',
                    'label' => 'Понедельник',
                    "format" => "raw",
                    "value" => function ($model) {
                        return $model->day == 1 ? classContent($model -> id, $model->subgroup, $model->lesson, $model->teacher, $model->cabinet) : '';
                    },
                    'contentOptions' => [
                        'width' => '15%'
                    ],
                ],
                [
                    'class' => 'yii\grid\DataColumn',
                    'attribute' => 'item',
                    'label' => 'Вторник',
                    "format" => "raw",
                    "value" => function ($model) {
                        return $model->day == 2 ? classContent($model -> id, $model->subgroup, $model->lesson, $model->teacher, $model->cabinet) : '';
                    },
                    'contentOptions' => [
                        'width' => '15%'
                    ],
                ],
                [
                    'class' => 'yii\grid\DataColumn',
                    'attribute' => 'item',
                    'label' => 'Среда',
                    "format" => "raw",
                    "value" => function ($model) {
                        return $model->day == 3 ? classContent($model -> id, $model->subgroup, $model->lesson, $model->teacher, $model->cabinet) : '';
                    },
                    'contentOptions' => [
                        'width' => '15%',
                    ],
                ],
                [
                    'class' => 'yii\grid\DataColumn',
                    'attribute' => 'item',
                    'label' => 'Четверг',
                    "format" => "raw",
                    "value" => function ($model) {
                        return $model->day == 4 ? classContent($model -> id, $model->subgroup, $model->lesson, $model->teacher, $model->cabinet) : '';
                    },
                    'contentOptions' => [
                        'width' => '15%'
                    ],
                ],
                [
                    'class' => 'yii\grid\DataColumn',
                    'attribute' => 'item',
                    'label' => 'Пятница',
                    "format" => "raw",
                    "value" => function ($model) {
                        return $model->day == 5 ? classContent($model -> id, $model->subgroup, $model->lesson, $model->teacher, $model->cabinet) : '';
                    },
                    'contentOptions' => [
                        'width' => '15%'
                    ],
                ],
                [
                    'class' => 'yii\grid\DataColumn',
                    'attribute' => 'item',
                    'label' => 'Суббота',
                    "format" => "raw",
                    "value" => function ($model) {
                        return $model->day == 6 ? classContent($model -> id, $model->subgroup, $model->lesson, $model->teacher, $model->cabinet) : '';
                    },
                    'contentOptions' => [
                        'width' => '15%'
                    ],
                ],
            ],
        ]); ?>
    </div>
</div>


<?php

use app\models\Timetable;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TimetableSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Timetables';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php

/** @var yii\web\View $this */

/* @var $this yii\web\View */
/* @var $searchModel app\models\TimetableSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $day app\models\Timetable */
/* @var $model app\models\TimetableSearch */

$this->title = 'Расписание';

function classContent($id, $subgroup, $lesson, $teacher, $cabinet) {
    switch($subgroup) {
        case 0:
            return '<a class="text-decoration-none" href="/admin/timetable/view?id=' . $id . '"><div class = "class"><div class = "class__top"><div class = "class__name">' . $lesson . '</div><div class = "class__teacher">' . $teacher . '</div></div><div class = "class__bottom"><div class = "class__cabinet">ауд. ' . $cabinet . '</div></div></div></a>';
        case 1:
            return '<a class="text-decoration-none" href="/admin/timetable/view?id=' . $id . '"><div class = "class subgroup1"><div class = "class__top"><div class = "class__name">' . $lesson . '</div><div class = "class__teacher">' . $teacher . '</div></div><div class = "class__bottom"><div class = "class__cabinet">ауд. ' . $cabinet . '</div></div></div></a>';
        case 2:
            return '<a class="text-decoration-none" href="/admin/timetable/view?id=' . $id . '"><div class = "class subgroup2"><div class = "class__top"><div class = "class__name">' . $lesson . '</div><div class = "class__teacher">' . $teacher . '</div></div><div class = "class__bottom"><div class = "class__cabinet">ауд. ' . $cabinet . '</div></div></div></a>';
        default:
            return 'Неверный номер подгруппы';
    }
};

?>

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
                    Для поиска выберите:
                </div>
            </div>

        </div>
        <div class="schedule__form">
            <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
    </div>

    <div class="schedule__edit">

        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.2 4H8.8V5.6H7.2V4ZM8 12C8.44 12 8.8 11.64 8.8 11.2V8C8.8 7.56 8.44 7.2 8 7.2C7.56 7.2 7.2 7.56 7.2 8V11.2C7.2 11.64 7.56 12 8 12ZM8 0C3.584 0 0 3.584 0 8C0 12.416 3.584 16 8 16C12.416 16 16 12.416 16 8C16 3.584 12.416 0 8 0ZM8 14.4C4.472 14.4 1.6 11.528 1.6 8C1.6 4.472 4.472 1.6 8 1.6C11.528 1.6 14.4 4.472 14.4 8C14.4 11.528 11.528 14.4 8 14.4Z" fill="#8F9498"/>
        </svg>

        Для редактирования нажмите на пару
    </div>

    <div class="schedule__table w-80  <?= $searchModel->speciality == null ? 'd-none' : 'd-block' ?>">
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

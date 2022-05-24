<?php

use yii\helpers\ArrayHelper;

/**
 * @var $dataProvider \yii\data\ArrayDataProvider
 */
/* @var $searchModel app\models\TimetableSearch */
$this->title = 'Расписание';
$models = $dataProvider->getModels();
$alreadyUseNumbers = [];
$days = [
    1 => 'Понедельник',
    2 => 'Вторник',
    3 => 'Среда',
    4 => 'Четверг',
    5 => 'Пятница',
    6 => 'Суббота',
];
$numbers = [
    1 => '8.00-9:35',
    2 => '9:50-11:25',
    3 => '11:55-13:30',
    4 => '13:45-15:20',
    5 => '15:50-17:25',
];
yii\bootstrap4\BootstrapAsset::register($this);

function classContent($id, $subgroup, $lesson, $teacher, $cabinet)
{
    switch ($subgroup) {
        case 0:
            return '<a class="text-decoration-none" href="/admin/timetable/view?id=' . $id . '"><div class = "class"><div class = "class__top"><div class = "class__name">' . $lesson . '</div><div class = "class__teacher">' . $teacher . '</div></div><div class = "class__bottom"><div class = "class__cabinet">ауд. ' . $cabinet . '</div></div></div></a>';
        case 1:
            return '<a class="text-decoration-none" href="/admin/timetable/view?id=' . $id . '"><div class = "class subgroup1"><div class = "class__top"><div class = "class__name">' . $lesson . '</div><div class = "class__teacher">' . $teacher . '</div></div><div class = "class__bottom"><div class = "class__cabinet">ауд. ' . $cabinet . '</div></div></div></a>';
        case 2:
            return '<a class="text-decoration-none" href="/admin/timetable/view?id=' . $id . '"><div class = "class subgroup2"><div class = "class__top"><div class = "class__name">' . $lesson . '</div><div class = "class__teacher">' . $teacher . '</div></div><div class = "class__bottom"><div class = "class__cabinet">ауд. ' . $cabinet . '</div></div></div></a>';
        default:
            return 'Неверный номер подгруппы';
    }
}

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

function getTime($number) {
    switch ($number) {
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
}

?>

<div class="schedule w-100 h-100">

    <div class="schedule__top">
        <div class="schedule__info flex-column">
            <div class="schedule__left">
                <div class="schedule__back">
                    <a href="/">
                        <svg width="17" height="28" viewBox="0 0 17 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17 24.71L6.49258 14L17 3.29L13.7652 0L0 14L13.7652 28L17 24.71Z" fill="#A3A3C9"/>
                        </svg>
                    </a>
                </div>
                <div class="schedule__spec">
                    Для поиска пар выберите:
                </div>
            </div>
            <div class="schedule__form">
                <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
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

    <div class="schedule__edit">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.2 4H8.8V5.6H7.2V4ZM8 12C8.44 12 8.8 11.64 8.8 11.2V8C8.8 7.56 8.44 7.2 8 7.2C7.56 7.2 7.2 7.56 7.2 8V11.2C7.2 11.64 7.56 12 8 12ZM8 0C3.584 0 0 3.584 0 8C0 12.416 3.584 16 8 16C12.416 16 16 12.416 16 8C16 3.584 12.416 0 8 0ZM8 14.4C4.472 14.4 1.6 11.528 1.6 8C1.6 4.472 4.472 1.6 8 1.6C11.528 1.6 14.4 4.472 14.4 8C14.4 11.528 11.528 14.4 8 14.4Z" fill="#8F9498"/>
        </svg>
        Для редактирования нажмите на пару
    </div>

    <div class="schedule__table w-80 <?= $searchModel->speciality == null ? 'd-none' : 'd-block' ?>">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Время</th>
                <? foreach ($days as $dayTitle): ?>
                    <th><?= $dayTitle ?></th>
                <? endforeach; ?>
            </tr>
            </thead>
            <tbody>
            <? foreach ($dataProvider->models as $model): ?>
                <tr>
                    <? $maxSubgroupInNumber = 0;
                    foreach ($models as $iterableModel) {
                        if ($iterableModel['number'] != $model['number'] || $maxSubgroupInNumber > count($iterableModel['subgroups'])) {
                            continue;
                        }
                        $maxSubgroupInNumber = count($iterableModel['subgroups']);
                    } ?>
                    <? if (!in_array($model['number'], $alreadyUseNumbers)): ?>
                        <td class="w-auto text-center">
                            <?= ArrayHelper::getValue($numbers, $model['number']) ?>
                        </td>
                        <? $alreadyUseNumbers[] = $model['number'] ?>
                    <? endif; ?>
                    <? foreach ($days as $dayNumber => $dayTitle): ?>
                        <td>
                            <?
                            if ($model['day'] != $dayNumber) {
                                echo '';
                            } else {
                                $value = '';
                                foreach ($model['subgroups'] as $subgroup) {
                                    $value .= classContent($subgroup['id'], $subgroup['subgroup'], $subgroup['lesson'], $subgroup['teacher'], $subgroup['cabinet']);
                                }
                                echo $value;
                            }
                            ?>
                        </td>
                    <? endforeach; ?>
                </tr>
            <? endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
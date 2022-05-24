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

function classContent($subgroup, $lesson, $teacher, $cabinet)
{
    switch ($subgroup) {
        case 0:
            return '<div class = "class"><div class = "class__top"><div class = "class__name">' . $lesson . '</div><div class = "class__teacher">' . $teacher . '</div></div><div class = "class__bottom"><div class = "class__cabinet">ауд. ' . $cabinet . '</div></div>';
        case 1:
            return '<div class = "class subgroup1"><div class = "class__top"><div class = "class__name">' . $lesson . '</div><div class = "class__teacher">' . $teacher . '</div></div><div class = "class__bottom"><div class = "class__cabinet">ауд. ' . $cabinet . '</div></div>';
        case 2:
            return '<div class = "class subgroup2"><div class = "class__top"><div class = "class__name">' . $lesson . '</div><div class = "class__teacher">' . $teacher . '</div></div><div class = "class__bottom"><div class = "class__cabinet">ауд. ' . $cabinet . '</div></div>';
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
                <div class="schedule__course"><?= $searchModel->week == 1 ? 'Нижняя' : 'Верхняя' ?> неделя,
                    <?= $searchModel->course ?> курс <?= $searchModel->group ?> группа
                </div>
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
                                    $value .= classContent($subgroup['subgroup'], $subgroup['lesson'], $subgroup['teacher'], $subgroup['cabinet']);
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
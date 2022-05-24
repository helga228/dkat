<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LinkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Полезные ссылки';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="form-container">
    <div class="schedule__info mb-5">
        <div class="schedule__left">
            <div class="schedule__back">
                <a href="/">
                    <svg width="17" height="28" viewBox="0 0 17 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 24.71L6.49258 14L17 3.29L13.7652 0L0 14L13.7652 28L17 24.71Z" fill="#A3A3C9"/>
                    </svg>
                </a>
            </div>
            <div class="schedule__spec">
                Полезная информация:
            </div>
        </div>
    </div>
    <div class="schedule__form">
        <div class="schedule__links d-flex flex-column">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => [
                    'class' => 'table table-bordered'
                ],
                'layout' => "{items}",
//                'filterModel' => $searchModel,
                'columns' => [
                    [
                        'class' => 'yii\grid\DataColumn',
                        'attribute' => 'name',
                        'label' => '',
                        'format' => 'raw',
                        "value" => function ($model) {
                            return '<a class="mb-3" href="' . $model->link  . '" target="_blank">' . $model->name . '</a>';
                        },
                    ],
                ],
            ]); ?>
        </div>
    </div>
    <?= Yii::$app->user->isGuest ? '' : '<p>' . Html::a('Добавить ссылку', ['create'], ['class' => 'btn btn-success mt-4']) . '</p>' ?>
</div>

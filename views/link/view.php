<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Link */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Links', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="link-view">

    <div class="form-container mb-4">
        <div class="schedule__back">
            <a href="/link">
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
            'id',
            [
                'label' => 'Название',
                'attribute' => 'name',
            ],
            [
                'label' => 'Ссылка',
                'attribute' => 'link',
            ],
        ],
    ]) ?>
    </div>
    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить ссылку?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>

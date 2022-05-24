<?php
use yii\helpers\ArrayHelper;
/**
 * @var $dataProvider \yii\data\ArrayDataProvider
 */

$this->title = 'Полезная информация';
$models = $dataProvider;
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
            <?php foreach ($dataProvider as $model):
                ArrayHelper::getValue($model, function($model){
                    return '<a class="mb-3" href="' . $model['link']  . '" target="_blank">' . $model['name'] . '</a>';
                });
            endforeach; ?>
            < <?php foreach ($model as $item): ?>
                <h2><?php echo $item->name ?></h2> // Имы ячейки в таблице должно быть соответственно blog_title
            <?php endforeach ?>
        </div>
    </div>
</div>

<!--'<a class="mb-3" href="' . $item->link  . '" target="_blank">' . $item->name . '</a>'-->
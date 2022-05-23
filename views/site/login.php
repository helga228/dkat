<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth w-100 h-100">
    <div class="site-login d-flex flex-column align-items-center">
        <div class="form-container">
            <p class="form-title text-center">Введите данные для входа:</p>

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'label'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control mw-100'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                ],
            ]); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Имя пользователя:') ?>

            <?= $form->field($model, 'password')->passwordInput()->label('Пароль:') ?>

            <?= $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div class=\"offset-lg-1 col-lg-3 align-self-end custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
            ])->label('Запомнить меня') ?>

            <?= Html::submitButton('Войти', ['class' => 'btn', 'name' => 'login-button']) ?>

            <?php ActiveForm::end(); ?>
        </div>

    </div>
</div>


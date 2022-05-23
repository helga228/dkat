<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<div class="wrapper d-flex h-100 w-100 flex-column justify-content-between">
    <header class="mt-auto text-muted">
        <div class="container w-100 d-flex justify-content-end">
            <p>
                <?php

                echo Nav::widget([
                    'options' => ['class' => 'footer-btn'],
                    'items' => [
                        Yii::$app->user->isGuest ? (
                        ['label' => 'Войти как администратор', 'url' => ['/site/login']]
                        ) : (
                            '<li>'
                            . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                            . Html::submitButton(
                                'Выйти (' . Yii::$app->user->identity->username . ')',
                                ['class' => 'btn btn-link']
                            )
                            . Html::endForm()
                            . '</li>'
                        )
                    ],
                ]);

                ?>
            </p>
        </div>
    </header>

    <main role="main" class="d-flex align-items-center justify-content-center h-100 w-100">
        <?= Alert::widget() ?>
        <?= $content ?>
    </main>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

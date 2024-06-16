<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Новости</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <?php
            foreach ($news as $new): ?>
                <div class="col-lg-4 mb-3">
                    <h2><?= $new->title?></h2>

                    <p><?= mb_strimwidth($new->text, 0, 100, "...")?></p>

                    <p><a class="btn btn-outline-secondary" href="<?= yii\helpers\Url::to(['news/view', 'id' => $new->id]) ?>">Открыть новость &raquo;</a></p>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>

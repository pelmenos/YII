<div class="admin-default-index">
    <div class="row">
        <div class="col-lg-4">
            <div class="row">
                <h3 class="col">Новости</h3>
                <a class="btn btn-primary col" href="<?= yii\helpers\Url::to(['news/create']) ?>" role="button">Создать новость</a>
            </div>
            <ul class="list-group list-group-flush">
                <?php
                foreach ($news as $new): ?>
                    <a class="list-group-item list-group-item-action" href="<?= yii\helpers\Url::to(['news/view', 'id' => $new->id]) ?>"
                       target="_blank">
                        <h4 class="media-heading">
                            <?= $new->title ?>
                        </h4>
                    </a>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-lg-4">
            <h3 class="col">Ошибки</h3>
            <ul class="list-group list-group-flush">
                <?php
                foreach ($mistakes as $mistake): ?>
                    <a class="list-group-item list-group-item-action" href="<?= yii\helpers\Url::to(['mistake/view', 'id' => $mistake->id]) ?>"
                       target="_blank">
                        <h4 class="media-heading">
                            <?= $mistake->text ?>
                        </h4>
                    </a>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Последние зарегистрировавшиеся пользователи
                    </h3>
                </div>
                <div class="panel-body">
                    <?php
                    foreach ($lastUsers as $user): ?>
                        <div class="media">
                            <a href="<?= yii\helpers\Url::to(['user/view', 'id' => $user->id]) ?>"
                               target="_blank">
                                <div class="media-left">
                                    <img class="media-object" style="width: 50px;" src="<?= $user->image ?>"
                                         alt="<?= $user->login ?>">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <?= $user->login ?>
                                    </h4>
                                    <?= $user->fio ?>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>


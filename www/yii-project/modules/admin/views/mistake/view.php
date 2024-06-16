<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Mistake $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mistakes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mistake-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute'=>'user',
                'format' => 'raw',
                'value'=>Html::a($model->getUser()->one()->login, ['user/view', 'id' => $model->user_id]),
            ],
            [
                'attribute'=>'news',
                'format' => 'raw',
                'value'=>Html::a($model->news_id, ['news/view', 'id' => $model->news_id]),
            ],
            'url:url',
            'text',
        ],
    ]) ?>

</div>

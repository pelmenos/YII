<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/** @var yii\web\View $this */
/** @var app\models\News $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="news-view">
    <?php if (Yii::$app->user->identity->role != 2): ?>
        <?php $form = ActiveForm::begin(['enableAjaxValidation' => true]); ?>
        <?= Html::submitButton('Отправить текст', ['class' => 'btn btn-primary']) ?>
        <?php ActiveForm::end(); ?>
    <?php endif; ?>

    <?php
    $js = <<<JS
        $('form').on('beforeSubmit', function(){
           var data = {text: get_selected_text(),
                        url: window.location.href,
                        news_id: window.location.search.split('=')[1]};
            $.ajax({
                url: '/mistake/create',
                type: 'POST',
                data: data,
                success: function(res){
                    alert('Ваша ошибка отправлена');
                },
                error: function(){
                    console.log("Error");
                }
            });
            return false;
         });
    JS;
    $this->registerJs($js);
    ?>



    <h1><?= Html::encode($this->title) ?></h1>
    <div><?= $model->text ?></div>

</div>

<script>
    function get_selected_text() {
        if (window.getSelection()) {
            var select = window.getSelection();
            return select.toString();
        }
    }
</script>

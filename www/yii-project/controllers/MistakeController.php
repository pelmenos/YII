<?php

namespace app\controllers;

use app\models\Mistake;
use Yii;

class MistakeController extends \yii\web\Controller
{
    public function actionCreate()
    {
        $data = $this->request->post();
        $data['user_id'] = Yii::$app->user->identity->id;
        $model = new Mistake();
        $model->user_id = $data['user_id'];
        $model->news_id = $data['news_id'];
        $model->text = $data['text'];
        $model->url = $data['url'];
        $model->save();
    }

}

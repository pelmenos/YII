<?php

namespace app\modules\admin;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        if(\Yii::$app->user->isGuest || \Yii::$app->user->identity->role!=1){
            return \Yii::$app->response->redirect(['site/login']);
        }
    }
}

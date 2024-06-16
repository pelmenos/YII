<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mistake".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $news_id
 * @property string|null $url
 * @property string|null $text
 *
 * @property News $news
 * @property User $user
 */
class Mistake extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mistake';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'news_id'], 'default', 'value' => null],
            [['user_id', 'news_id'], 'integer'],
            [['url', 'text'], 'string', 'max' => 255],
            [['news_id'], 'exist', 'skipOnError' => true, 'targetClass' => News::class, 'targetAttribute' => ['news_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'news_id' => 'News ID',
            'url' => 'Url',
            'text' => 'Text',
        ];
    }

    /**
     * Gets query for [[News]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasOne(News::class, ['id' => 'news_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mistake}}`.
 */
class m240616_104713_create_mistake_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mistake}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            "news_id" => $this->integer(),
            'url' => $this->string(),
            'text' => $this->string(),
        ]);

        $this->createIndex(
            'idx-mistake-user_id',
            'mistake',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-mistake-user_id',
            'mistake',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-mistake-news_id',
            'mistake',
            'news_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-mistake-news_id',
            'mistake',
            'news_id',
            'news',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-mistake-user_id',
            'mistake'
        );

        $this->dropIndex(
            'idx-mistake-user_id',
            'mistake'
        );

        $this->dropForeignKey(
            'fk-mistake-news_id',
            'mistake'
        );

        $this->dropIndex(
            'idx-mistake-news_id',
            'mistake'
        );
        $this->dropTable('{{%mistake}}');
    }
}

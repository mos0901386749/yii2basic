<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m230218_100000_create_users_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string(50)->notNull()->unique(),
            'password_hash' => $this->string(255)->notNull(),
            'email' => $this->string(100)->notNull()->unique(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('users');
    }
}

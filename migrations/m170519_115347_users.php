<?php

use yii\db\Migration;

class m170519_115347_users extends Migration
{
    public function up()
    {
		$this->createTable('{{%users}}', [
					
					'id' => $this->primaryKey(),
					'name' => $this->string()->notNull(),
					'alias' => $this->string()->notNull(),
					'login' => $this->string()->notNull(),
					'password' => $this->string()->notNull(),
					'username' => $this->string()->notNull(),
					'auth_key' => $this->integer(),
					'access_token' => $this->integer(),
					'userGroup' => 'ENUM("admin", "user")',
		]);
    }

    public function down()
    {
        $this->dropTable('{{%users}}');
    }

}

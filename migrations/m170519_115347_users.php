<?php

use yii\db\Migration;

class m170519_115347_users extends Migration
{
    public function up()
    {
		$this->createTable('{{%users}}', [

					'id' => $this->primaryKey(),
					'name' => $this->string(),
					'alias' => $this->string(),
					'login' => $this->string()->notNull(),
					'password' => $this->string()->notNull(),
          'email' => $this->string()->notNull(),
					'username' => $this->string(),
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

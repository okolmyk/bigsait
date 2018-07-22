<?php

use yii\db\Migration;

class m180627_104623_users_products extends Migration
{
    public function up()
    {
      $this->createTable('{{%users_products}}', [
          'user_id' => $this->integer()->notNull(),
          'product_id' => $this->integer()->notNull(),
      ]);

      $this->addPrimaryKey('pk-users_products', '{{%users_products}}', ['user_id', 'product_id']);

      $this->createIndex('idx-users_products-user_id','{{%users_products}}','user_id');
      $this->createIndex('idx-users_products-product_id','{{%users_products}}','product_id');

      $this->addForeignKey('fk-users_products-user', '{{%users_products}}', 'user_id', '{{%users}}', 'id', 'CASCADE', 'RESTRICT');
      $this->addForeignKey('fk-users_products-product', '{{%users_products}}', 'product_id', '{{%products}}', 'id', 'CASCADE', 'RESTRICT');

    }

    public function down()
    {
        $this->dropTable('{{%users_products}}');
    }

}

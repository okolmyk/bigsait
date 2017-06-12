<?php

use yii\db\Migration;

class m170609_125006_atribut_value extends Migration
{
    public function up()
    {
		$this->createTable('{{%atribut}}', [
				'id' => $this->primaryKey(),
				'name' => $this->string()->notNull(),
		]);
		
		$this->createTable('{{%value}}', [
				'product_id' => $this->integer()->notNull(),
				'atribut_id' => $this->integer()->notNull(),
				'value' => $this->string()->notNull(),		
		]);
				
		$this->addPrimaryKey('pk-value', '{{%value}}', ['product_id', 'atribut_id']);
		
		$this->createIndex('idx-value-product_id', '{{%value}}', 'product_id');
		$this->createIndex('idx-value-atribut_id', '{{%value}}', 'atribut_id');
		
		$this->addForeignKey('fk-value-product', '{{%value}}', 'product_id', '{{%products}}', 'id', 'CASCADE', 'RESTRICT');
		$this->addForeignKey('fk-value-atribut', '{{%value}}', 'atribut_id', '{{%atribut}}', 'id', 'CASCADE', 'RESTRICT');
		
    }

    public function down()
    {
       $this->dropTable('{{%value}}');
       $this->dropTable('{{%atribut}}');
    }

    
}

<?php

use yii\db\Migration;

class m170608_113049_size extends Migration
{
    public function up()
    {
		$this->createTable('{{%size}}', [
				'id' => $this->primaryKey(),
				'name' => $this->string()->notNull(),		
		]);
		
		$this->createIndex('idx-size-name', '{{%size}}', 'name');
		
		$this->createTable('{{%size_products}}', [					
				'product_id' => $this->integer()->notNull(),
				'size_id' => $this->integer()->notNull(),				
		]);
    
		$this->addPrimaryKey('pk-size_products', '{{%size_products}}', ['product_id', 'size_id']);
		
		$this->createIndex('idx-size_products-product_id','{{%size_products}}','product_id');
		$this->createIndex('idx-size_products-size_id','{{%size_products}}','size_id');
		
		
		$this->addForeignKey('fk-product_size-products', '{{%size_products}}', 'product_id', '{{%products}}', 'id', 'CASCADE', 'RESTRICT');
		$this->addForeignKey('fk-product_size-size', '{{%size_products}}', 'size_id', '{{%size}}', 'id', 'CASCADE', 'RESTRICT');
	 
    }

    public function down()
    {
        $this->dropTable('{{%size}}');
        $this->dropTable('{{%size_products}}');
    }

   
}

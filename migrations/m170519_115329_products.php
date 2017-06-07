<?php

use yii\db\Migration;

class m170519_115329_products extends Migration
{
    public function up()
    {
		$this->createTable('{{%products}}', [
					
					'id' => $this->primaryKey(),
					'name' => $this->string()->notNull(),
					'id_category' => $this->integer(),
					'id_markets'  => $this->integer(),
					'sex_category' => $this->string()->notNull(),
					'pictures' => $this->string(),
		]);
		
		$this->addForeignKey('fk-products-category', '{{%products}}', 'id_category', '{{%category_products}}', 'id', 'SET NULL', 'RESTRICT');
		
		$this->addForeignKey('fk-products-markets', '{{%products}}', 'id_markets', '{{%markets}}', 'id', 'SET NULL', 'RESTRICT');
    }
    

    public function down()
    {
        $this->dropTable('{{%products}}');
    }

   
}

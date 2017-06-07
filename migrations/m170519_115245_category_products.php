<?php

use yii\db\Migration;

class m170519_115245_category_products extends Migration
{
    public function up()
    {
		$this->createTable('{{%category_products}}', [
					
					'id' => $this->primaryKey(),
					'name' => $this->string()->notNull(),
		]);
		
    }

    public function down()
    {
        $this->dropTable('{{%category_products}}');
    }


}

<?php

use yii\db\Migration;

class m170519_115304_markets extends Migration
{
    public function up()
    {
			$this->createTable('{{%markets}}', [
			
					'id' => $this->primaryKey(),
					'name' => $this->string()->notNull(),				
			]);
    }

    public function down()
    {
       $this->dropTable('{{%markets}}'); 
    }

    
}

<?php

use yii\db\Migration;

class m170522_150522_add_column extends Migration
{
    public function up()
    {
			$this->addColumn('{{%users}}', 'avatar', $this->string());

			$this->addColumn('{{%markets}}', 'avatar', $this->string());
    }

    public function down()
    {
			$this->dropColumn('{{%users}}', 'avatar');
			$this->dropColumn('{{%markets}}', 'avatar');
    }


}

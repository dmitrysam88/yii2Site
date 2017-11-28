<?php

use yii\db\Migration;

/**
 * Class m171112_205747_dialog
 */
class m171112_205747_dialog extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171112_205747_dialog cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up(){
        $this->createTable('dialog',[
            'id'        => $this->primaryKey(10),
            'name'      => $this->string(100),
            'created'   => $this->dateTime()
        ]);
    }

    public function down(){
        $this->dropTable('dialog');
    }

}

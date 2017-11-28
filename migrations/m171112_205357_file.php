<?php

use yii\db\Migration;

/**
 * Class m171112_205357_file
 */
class m171112_205357_file extends Migration
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
        echo "m171112_205357_file cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up(){
        $this->createTable('file',[
            'id'    => $this->primaryKey(10),
            'name'  => $this->string(120),
            'path'  => $this->string(240),
            'size'  => $this->integer(10)
        ]);
    }

    public function down(){
        $this->dropTable('file');
    }

}

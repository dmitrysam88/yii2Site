<?php

use yii\db\Migration;

/**
 * Class m171112_205811_message
 */
class m171112_205811_message extends Migration
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
        echo "m171112_205811_message cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up(){
        $this->createTable('message',[
            'id'        => $this->primaryKey(10),
            'dialog_id' => $this->integer(10),
            'text'      => $this->text(),
            'created'   => $this->dateTime(),
            'user_id'   => $this->integer(10)
        ]);

        $this->addForeignKey('fk-message-dialog','message','dialog_id','dialog','id','CASCADE');
    }

    public function down(){
        $this->dropTable('message');
        $this->dropForeignKey('fk-message-dialog','message');
    }

}

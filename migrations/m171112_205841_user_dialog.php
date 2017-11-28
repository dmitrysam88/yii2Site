<?php

use yii\db\Migration;

/**
 * Class m171112_205841_user_dialog
 */
class m171112_205841_user_dialog extends Migration
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
        echo "m171112_205841_user_dialog cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up(){
        $this->createTable('user_dialog',[
            'id'        => $this->primaryKey(10),
            'dialog_id' => $this->integer(10),
            'user_id'   => $this->integer(10)
        ]);

        $this->addForeignKey('fk-user_dialog-dialog','user_dialog','dialog_id','dialog','id','CASCADE');
    }

    public function down(){
        $this->dropTable('user_dialog');
        $this->dropForeignKey('fk-user_dialog-dialog','user_dialog');
    }

}

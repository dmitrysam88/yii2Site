<?php

use yii\db\Migration;

/**
 * Class m171118_194538_foreig_key_user
 */
class m171118_194538_foreig_key_user extends Migration
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
        echo "m171118_194538_foreig_key_user cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up(){
        $this->addForeignKey('fk-post-user','post','user_id','user','id','CASCADE');
        $this->addForeignKey('fk-comment-user','comment','user_id','user','id','CASCADE');
        $this->addForeignKey('fk-message-user','message','user_id','user','id','CASCADE');
        $this->addForeignKey('fk-user_dialog-user','user_dialog','user_id','user','id','CASCADE');
    }

    public function down(){
        $this->dropForeignKey('fk-post-user');
        $this->dropForeignKey('fk-comment-user');
        $this->dropForeignKey('fk-message-user');
        $this->dropForeignKey('fk-user_dialog-user');
    }

}

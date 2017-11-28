<?php

use yii\db\Migration;

/**
 * Class m171112_205717_comment
 */
class m171112_205717_comment extends Migration
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
        echo "m171112_205717_comment cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up(){
        $this->createTable('comment',[
            'id'        => $this->primaryKey(10),
            'post_id'   => $this->integer(10),
            'text'      => $this->text(),
            'user_id'   => $this->integer(10),
            'created'   => $this->dateTime()
        ]);

        $this->addForeignKey('fk-comment-post','comment','post_id','post','id','CASCADE');
    }

    public function down(){
        $this->dropTable('comment');
        $this->dropForeignKey('fk-comment-post','comment','post_id','post','id','CASCADE');
    }

}

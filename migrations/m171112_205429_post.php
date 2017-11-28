<?php

use yii\db\Migration;

/**
 * Class m171112_205429_post
 */
class m171112_205429_post extends Migration
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
        echo "m171112_205429_post cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up(){
        $this->createTable('post',[
            'id'        => $this->primaryKey(10),
            'name'      => $this->string(120),
            'text'      => $this->text(),
            'user_id'   => $this->integer(10),
            'created'   => $this->dateTime(),
            'file_id'   => $this->integer(10)
        ]);

        $this->addForeignKey('fk-post-file','post','file_id','file','id','CASCADE');
    }

    public function down(){
        $this->dropTable('post');
        $this->dropForeignKey('fk-post-file','post');
    }

}

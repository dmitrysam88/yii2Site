<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dialog".
 *
 * @property integer $id
 * @property string $name
 * @property string $created
 *
 * @property Message[] $messages
 * @property UserDialog[] $userDialogs
 */
class Dialog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dialog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created'], 'safe'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'created' => 'Created',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::className(), ['dialog_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserDialogs()
    {
        return $this->hasMany(UserDialog::className(), ['dialog_id' => 'id']);
    }
}

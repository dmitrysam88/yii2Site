<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "file".
 *
 * @property integer $id
 * @property string $name
 * @property string $path
 * @property integer $size
 *
 * @property Post[] $posts
 */
class File extends \yii\db\ActiveRecord
{
    public $objFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['size'], 'integer'],
            [['name'], 'string', 'max' => 120],
            [['path'], 'string', 'max' => 240],
            [['objFile'], 'file'],
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
            'path' => 'Path',
            'size' => 'Size',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['file_id' => 'id']);
    }

    public static function getImages(){

        $querrys    = array();

        $fields = ['file.id','file.`name`','file.path','file.size'];
        $table  = 'file';
        $likes = ['%.jpg','%.bmp','%.jpeg','%.png'];

        foreach ($likes as $item){
            $querry     = new Query();
            $querry->select($fields)->from($table)->where(['like', 'file.path', $item, false]);
            array_push($querrys,$querry);
        }
        $querry     = new Query();
        foreach ($querrys as $key => $item){
            if ($key == 0){
                $querry = $item;
            } else {
                $querry->union($item);
            }
        }
        return $querry;
    }
}

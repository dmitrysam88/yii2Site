<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 26.11.2017
 * Time: 21:33
 */

namespace app\models;

use yii\base\Model;


class Forma extends Model
{

    public $file;

    public function rules()
    {
        return [[['file'], 'file']];
    }

}
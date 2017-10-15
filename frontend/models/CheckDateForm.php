<?php
namespace frontend\models;

use yii\base\Model;

class CheckDateForm extends Model
{
    public $date;

    public function rules()
    {
        return [
            ['date', 'required'],
            ['date', 'trim']
        ];
    }

    public function attributeLabels() {
        return [
            'date' => 'Дата'
        ];
    }
}

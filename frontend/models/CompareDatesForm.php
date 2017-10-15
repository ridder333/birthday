<?php
namespace frontend\models;

use yii\base\Model;

class CompareDatesForm extends Model
{
    public $date1;
    public $date2;

    public function rules()
    {
        return [
            [['date1', 'date2'], 'trim'],
            [['date1', 'date2'], 'required'],
        ];
    }

    public function attributeLabels() {
        return [
            'date1' => 'Дата 1',
            'date2' => 'Дата 2',
        ];
    }
    
    public function compareDates(){
        $message = '';
        $wdate1 = new WDate($this->date1);
        $wdate2 = new WDate($this->date2);
        
        if($wdate1->date === NULL){
            $message .= 'Первая дата не соответствует формату!<br>';
        }
        if($wdate2->date === NULL){
            $message .= 'Вторая дата не соответствует формату!<br>';
        }
        
        if($message == ''){
            if($wdate1->date > $wdate2->date){
                $message = 'Первая дата больше второй!';
            }
            elseif($wdate1->date < $wdate2->date){
                $message = 'Первая дата меньше второй!';
            }
            else{
                $message = 'Первая и вторая даты одинаковые!';
            }
        }
        
        return [
            'message' => $message,
            'wdate1' => $wdate1,
            'wdate2' => $wdate2
        ];
    }
}

<?php
namespace frontend\models;

use yii\base\Model;

class SortDatesForm extends Model
{
    public $dates;
    public $order;

    public function rules()
    {
        return [
            ['dates', 'trim'],
            [['dates', 'order'], 'required'],
        ];
    }

    public function attributeLabels() {
        return [
            'dates' => 'Даты',
            'order' => 'Сортировка',
        ];
    }
    
    public function sortDates(){
        $message = '';
        $dateArr = []; //date array in unix format
        $dateStrFormatArr = []; //date array in string format
        $dateStrArr = explode(PHP_EOL, $this->dates);
        
        foreach($dateStrArr as $key => $dateStr){
            $tmp = new WDate(trim($dateStr));
            if($tmp->date === NULL){
                $message .= 'Дата ' . ($key + 1) . ' не соответствует формату!<br>';
            }
            $dateArr[] = $tmp->date;
            $dateStrFormatArr[] = $tmp->getFullDate();
        }
        
        if($this->order == 1 && $message == ''){
            array_multisort($dateArr, SORT_DESC, $dateStrArr, $dateStrFormatArr);
        }
        if($this->order == 0 && $message == ''){
            array_multisort($dateArr, SORT_ASC, $dateStrArr, $dateStrFormatArr);
        }
        
        $result = [
            'message' => $message,
            'dateArr' => $dateStrFormatArr,
            'dateStrArr' => $dateStrArr
        ];
        
        return $result;
    }
}

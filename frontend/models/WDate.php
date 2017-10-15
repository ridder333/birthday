<?php
namespace frontend\models;

use Yii;
use yii\base\Model;

class WDate extends Model
{
    public $date = NULL; //date in unix format

    public function rules()
    {
        return [
            ['date', 'required'],
            ['date', 'trim']
        ];
    }

    public function __construct($dateStr, $config = []){
        //check wdate template
        if(preg_match("/^((((\d{2}):)(\d{2})?)?(:(\d{2}))?)?\s?((((\d{2})\.)?((\d{2})\.))?(\d{4}))?$/", $dateStr, $matches)){
            $second = isset($matches[7]) ? (($matches[7] != NULL) ? $matches[7] : '00') : '00';
            $minute = isset($matches[5]) ? (($matches[5] != NULL) ? $matches[5] : '00') : '00';
            $hour = isset($matches[4]) ? (($matches[4] != NULL) ? $matches[4] : '00') : '00';
            $day = isset($matches[11]) ? (($matches[11] != NULL) ? $matches[11] : '01') : '01';
            $month = isset($matches[13]) ? (($matches[13] != NULL) ? $matches[13] : '01') : '01';
            $year = isset($matches[14]) ? (($matches[14] != NULL) ? $matches[14] : '1902') : '1902';
            
            if((int) $second <= 59 && (int) $minute <= 59 && (int) $hour <= 23 && (int) $day <= 31 && (int) $month <= 12 && (int) $year >= 1902 && (int) $year <= (int) date('Y')){
                $fullDate = $hour . ':' . $minute . ':' . $second . ' ' . $day . '.' . $month . '.' . $year;
                $datetime = new \DateTime($fullDate);
                if(strcmp($datetime->format('H:i:s d.m.Y'), $fullDate) === 0){
                    $this->date = $datetime->format('U');
                }
            }
        }
        parent::__construct($config);
    }
    
    public function checkDate(){
        if($this->date !== NULL){
            return true;
        }
        else{
            return false;
        }
    }
    
    public function getFullDate(){
        if($this->checkDate()){
            return date('H:i:s d.m.Y', $this->date);
        }
        else{
            return NULL;
        }
    }
    
    public function getSecond(){
        if($this->checkDate()){
            return date('s', $this->date);
        }
        else{
            return NULL;
        }
    }
    
    public function getMinute(){
        if($this->checkDate()){
            return date('i', $this->date);
        }
        else{
            return NULL;
        }
    }
    
    public function getHour(){
        if($this->checkDate()){
            return date('H', $this->date);
        }
        else{
            return NULL;
        }
    }
    
    public function getDay(){
        if($this->checkDate()){
            return date('d', $this->date);
        }
        else{
            return NULL;
        }
    }
    
    public function getMonth(){
        if($this->checkDate()){
            return date('m', $this->date);
        }
        else{
            return NULL;
        }
    }
    
    public function getYear(){
        if($this->checkDate()){
            return date('Y', $this->date);
        }
        else{
            return NULL;
        }
    }
}

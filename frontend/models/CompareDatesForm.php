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
            'date1' => '���� 1',
            'date2' => '���� 2',
        ];
    }
    
    public function compareDates(){
        $message = '';
        $wdate1 = new WDate($this->date1);
        $wdate2 = new WDate($this->date2);
        
        if($wdate1->date === NULL){
            $message .= '������ ���� �� ������������� �������!<br>';
        }
        if($wdate2->date === NULL){
            $message .= '������ ���� �� ������������� �������!<br>';
        }
        
        if($message == ''){
            if($wdate1->date > $wdate2->date){
                $message = '������ ���� ������ ������!';
            }
            elseif($wdate1->date < $wdate2->date){
                $message = '������ ���� ������ ������!';
            }
            else{
                $message = '������ � ������ ���� ����������!';
            }
        }
        
        return [
            'message' => $message,
            'wdate1' => $wdate1,
            'wdate2' => $wdate2
        ];
    }
}

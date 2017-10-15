<?php
namespace frontend\tests\unit\models;

use frontend\models\CompareDatesForm;

class CompareDatesFormTest extends \Codeception\Test\Unit
{
    public function testCorrectCompareDates(){
        $dataArr = [
            [
                'input-date1' => '01:23:54 22.02.1960',
                'input-date2' => '01:23:54 22.02.1960',
                'result-message' => 'Первая и вторая даты одинаковые!'
            ],
            [
                'input-date1' => '01: 18.10.2000',
                'input-date2' => '14:25:55 22.02.2000',
                'result-message' => 'Первая дата больше второй!'
            ],
            [
                'input-date1' => '01:23:54 22.02.1980',
                'input-date2' => '1990',
                'result-message' => 'Первая дата меньше второй!'
            ],
            [
                'input-date1' => 'tttt',
                'input-date2' => '01:23:54 22.02.1990',
                'result-message' => 'Первая дата не соответствует формату!<br>'
            ],
            [
                'input-date1' => '10.12.2005',
                'input-date2' => 'tttt',
                'result-message' => 'Вторая дата не соответствует формату!<br>'
            ],
            [
                'input-date1' => 'tttt',
                'input-date2' => 'zzzz',
                'result-message' => 'Первая дата не соответствует формату!<br>Вторая дата не соответствует формату!<br>'
            ]
        ];
        
        foreach($dataArr as $data){
            $model = new CompareDatesForm([
                'date1' => $data['input-date1'],
                'date2' => $data['input-date2']
            ]);
            $result = $model->compareDates();
            
            $this->assertEquals($result['message'], $data['result-message']);
        }
    }
}

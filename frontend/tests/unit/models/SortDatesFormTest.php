<?php
namespace frontend\tests\unit\models;

use frontend\models\SortDatesForm;

class SortDatesFormTest extends \Codeception\Test\Unit
{
    public function testCorrectSortDates(){
        $dataArr = [
            [
                'input-dates' => '01:23:54 22.02.1980'
                                 . PHP_EOL . '01:23:54 01.02.1960'
                                 . PHP_EOL . '25.12.1975'
                                 . PHP_EOL . '14: 25.12.2010'
                                 . PHP_EOL . '14:22:55'
                                 . PHP_EOL . '14:22:55 17.10.1999',
                'input-order' => '0',
                'result-message' => '',
                'result-date-arr' => [
                    '14:22:55 01.01.1902',
                    '01:23:54 01.02.1960',
                    '00:00:00 25.12.1975',
                    '01:23:54 22.02.1980',
                    '14:22:55 17.10.1999',
                    '14:00:00 25.12.2010'
                ]
            ],
            [
                'input-dates' => '01:23:54 22.02.1980'
                                 . PHP_EOL . '01:23:54 01.02.1960'
                                 . PHP_EOL . '25.12.1975'
                                 . PHP_EOL . '14: 25.12.2010'
                                 . PHP_EOL . '14:22:55'
                                 . PHP_EOL . '14:22:55 17.10.1999',
                'input-order' => '1',
                'result-message' => '',
                'result-date-arr' => [
                    '14:00:00 25.12.2010',
                    '14:22:55 17.10.1999',
                    '01:23:54 22.02.1980',
                    '00:00:00 25.12.1975',
                    '01:23:54 01.02.1960',
                    '14:22:55 01.01.1902'
                ]
            ],
            [
                'input-dates' => '01:23:54 22.02.1980'
                                 . PHP_EOL . '01:23:54 01.02.1960'
                                 . PHP_EOL . '25.12.1975'
                                 . PHP_EOL . '14: 25.12.2010'
                                 . PHP_EOL . 'tttt'
                                 . PHP_EOL . '14:22:55 17.10.1999',
                'input-order' => '1',
                'result-message' => 'Дата 5 не соответствует формату!<br>',
                'result-date-arr' => [
                    '01:23:54 22.02.1980',
                    '01:23:54 01.02.1960',
                    '00:00:00 25.12.1975',
                    '14:00:00 25.12.2010',
                    NULL,
                    '14:22:55 17.10.1999'
                ]
            ]
        ];
        
        foreach($dataArr as $data){
            $model = new SortDatesForm([
                'dates' => $data['input-dates'],
                'order' => $data['input-order']
            ]);
            $result = $model->sortDates();
            
            $this->assertEquals($result['message'], $data['result-message']);
            $this->assertEquals($result['dateArr'], $data['result-date-arr']);
        }
    }
}

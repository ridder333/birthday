<?php
namespace frontend\tests\unit\models;

use frontend\models\WDate;

class WDateTest extends \Codeception\Test\Unit
{
    //test of creating date and getting parameters
    public function testCorrectWDate(){
        $dataArr = [
            [
                'input-date' => "01:23:54 22.02.1940",
                'result-check' => true,
                'result-date' => -942284166,
                'result-full' => "01:23:54 22.02.1940",
                'result-second' => '54',
                'result-minute' => '23',
                'result-hour' => '01',
                'result-day' => '22',
                'result-month' => '02',
                'result-year' => '1940'
            ],
            [
                'input-date' => "01:05 21.07.2016",
                'result-check' => true,
                'result-date' => 1469052300,
                'result-full' => "01:05:00 21.07.2016",
                'result-second' => '00',
                'result-minute' => '05',
                'result-hour' => '01',
                'result-day' => '21',
                'result-month' => '07',
                'result-year' => '2016'
            ],
            [
                'input-date' => "15: 15.07.2001",
                'result-check' => true,
                'result-date' => 995194800,
                'result-full' => "15:00:00 15.07.2001",
                'result-second' => '00',
                'result-minute' => '00',
                'result-hour' => '15',
                'result-day' => '15',
                'result-month' => '07',
                'result-year' => '2001'
            ],
            [
                'input-date' => "05.11.2008",
                'result-check' => true,
                'result-date' => 1225832400,
                'result-full' => "00:00:00 05.11.2008",
                'result-second' => '00',
                'result-minute' => '00',
                'result-hour' => '00',
                'result-day' => '05',
                'result-month' => '11',
                'result-year' => '2008'
            ],
            [
                'input-date' => "05.2011",
                'result-check' => true,
                'result-date' => 1304193600,
                'result-full' => "00:00:00 01.05.2011",
                'result-second' => '00',
                'result-minute' => '00',
                'result-hour' => '00',
                'result-day' => '01',
                'result-month' => '05',
                'result-year' => '2011'
            ],
            [
                'input-date' => "1995",
                'result-check' => true,
                'result-date' => 788907600,
                'result-full' => "00:00:00 01.01.1995",
                'result-second' => '00',
                'result-minute' => '00',
                'result-hour' => '00',
                'result-day' => '01',
                'result-month' => '01',
                'result-year' => '1995'
            ],
            [
                'input-date' => "15:45:40",
                'result-check' => true,
                'result-date' => -2145869077,
                'result-full' => "15:45:40 01.01.1902",
                'result-second' => '40',
                'result-minute' => '45',
                'result-hour' => '15',
                'result-day' => '01',
                'result-month' => '01',
                'result-year' => '1902'
            ],
            [
                'input-date' => "15:40",
                'result-check' => true,
                'result-date' => -2145869417,
                'result-full' => "15:40:00 01.01.1902",
                'result-second' => '00',
                'result-minute' => '40',
                'result-hour' => '15',
                'result-day' => '01',
                'result-month' => '01',
                'result-year' => '1902'
            ],
            [
                'input-date' => "19:",
                'result-check' => true,
                'result-date' => -2145857417,
                'result-full' => "19:00:00 01.01.1902",
                'result-second' => '00',
                'result-minute' => '00',
                'result-hour' => '19',
                'result-day' => '01',
                'result-month' => '01',
                'result-year' => '1902'
            ],
            [
                'input-date' => "tttt",
                'result-check' => false,
                'result-date' => NULL,
                'result-full' => NULL,
                'result-second' => NULL,
                'result-minute' => NULL,
                'result-hour' => NULL,
                'result-day' => NULL,
                'result-month' => NULL,
                'result-year' => NULL
            ],
            [
                'input-date' => "31.02.1985",
                'result-check' => false,
                'result-date' => NULL,
                'result-full' => NULL,
                'result-second' => NULL,
                'result-minute' => NULL,
                'result-hour' => NULL,
                'result-day' => NULL,
                'result-month' => NULL,
                'result-year' => NULL
            ]
        ];
        
        foreach($dataArr as $data){
            $model = new WDate($data['input-date']);
            
            $this->assertEquals($model->checkDate(), $data['result-check']);
            $this->assertEquals($model->date, $data['result-date']);
            $this->assertEquals($model->getFullDate(), $data['result-full']);
            $this->assertEquals($model->getSecond(), $data['result-second']);
            $this->assertEquals($model->getMinute(), $data['result-minute']);
            $this->assertEquals($model->getHour(), $data['result-hour']);
            $this->assertEquals($model->getDay(), $data['result-day']);
            $this->assertEquals($model->getMonth(), $data['result-month']);
            $this->assertEquals($model->getYear(), $data['result-year']);
        }
    }
}

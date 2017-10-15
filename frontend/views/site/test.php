<?php

$this->title = 'Работа с датами';
?>
<div class="site-test">
    <div class="container">
        <ol>
            <li>
                Тест на создание даты и получение ее параметров:<br>
                > vendor\bin\codecept run frontend\tests\unit\models\WDateTest.php
            </li>
            <li>
                Тест на сравнение двух дат:<br>
                > vendor\bin\codecept run frontend\tests\unit\models\CompareDatesFormTest.php
            </li>
            <li>
                Тест на сортировку нескольких дат:<br>
                > vendor\bin\codecept run frontend\tests\unit\models\SortDatesFormTest.php
            </li>
        </ol>
    </div>
</div>

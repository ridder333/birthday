<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Работа с датами';
?>
<div class="site-check-date">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <?php $form = ActiveForm::begin(['id' => 'check-date-form']); ?>
                    <?= $form->field($model, 'date')->textInput(['maxlength' => 19])->label('Введите дату:') ?>
                    <div class="form-group">
                        <?= Html::submitButton('Проверить', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
                
                <div id="result">
                    <?php if($wdate->date !== NULL) { ?>
                        <span class="bold">Результат:</span><br>
                        Полная дата - <?= $wdate->getFullDate() ?><br>
                        Секунды - <?= $wdate->getSecond() ?><br>
                        Минуты - <?= $wdate->getMinute() ?><br>
                        Часы - <?= $wdate->getHour() ?><br>
                        День - <?= $wdate->getDay() ?><br>
                        Месяц - <?= $wdate->getMonth() ?><br>
                        Год - <?= $wdate->getYear() ?>
                    <?php } ?>
                    <?php if($message != ''){ ?>
                        <span class="bold">Результат:</span><br>
                        <?= $message ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

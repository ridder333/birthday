<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Работа с датами';
?>
<div class="site-compare-dates">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <?php $form = ActiveForm::begin(['id' => 'compare-dates-form']); ?>
                    <?= $form->field($model, 'date1')->textInput(['maxlength' => 19])->label('Введите первую дату:') ?>
                    <?= $form->field($model, 'date2')->textInput(['maxlength' => 19])->label('Введите вторую дату:') ?>
                    <div class="form-group">
                        <?= Html::submitButton('Сравнить', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
                
                <div id="result">
                    <?php if($result['wdate1']->date !== NULL && $result['wdate2']->date !== NULL) { ?>
                        <span class="bold">Результат:</span><br>
                        <?= $result['message'] ?><br>
                        <div class="result-table">
                            <div class="row">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-4">Дата 1</div>
                                <div class="col-sm-4">Дата 2</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">Полная дата</div>
                                <div class="col-sm-4"><?= $result['wdate1']->getFullDate() ?></div>
                                <div class="col-sm-4"><?= $result['wdate2']->getFullDate() ?></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">Секунды</div>
                                <div class="col-sm-4"><?= $result['wdate1']->getSecond() ?></div>
                                <div class="col-sm-4"><?= $result['wdate2']->getSecond() ?></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">Минуты</div>
                                <div class="col-sm-4"><?= $result['wdate1']->getMinute() ?></div>
                                <div class="col-sm-4"><?= $result['wdate2']->getMinute() ?></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">Часы</div>
                                <div class="col-sm-4"><?= $result['wdate1']->getHour() ?></div>
                                <div class="col-sm-4"><?= $result['wdate2']->getHour() ?></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">День</div>
                                <div class="col-sm-4"><?= $result['wdate1']->getDay() ?></div>
                                <div class="col-sm-4"><?= $result['wdate2']->getDay() ?></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">Месяц</div>
                                <div class="col-sm-4"><?= $result['wdate1']->getMonth() ?></div>
                                <div class="col-sm-4"><?= $result['wdate2']->getMonth() ?></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">Год</div>
                                <div class="col-sm-4"><?= $result['wdate1']->getYear() ?></div>
                                <div class="col-sm-4"><?= $result['wdate2']->getYear() ?></div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if(($result['wdate1']->date === NULL || $result['wdate2']->date === NULL) && $result['message'] != ''){ ?>
                        <span class="bold">Результат:</span><br>
                        <?= $result['message'] ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

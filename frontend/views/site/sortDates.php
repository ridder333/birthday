<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Работа с датами';
?>
<div class="site-sort-dates">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <?php $form = ActiveForm::begin(['id' => 'sort-dates-form']); ?>
                    <?= $form->field($model, 'dates')->textarea()->label('Введите даты (каждую с новой строки):') ?>
                    <?= $form->field($model, 'order')->dropDownList([0 => 'по возрастанию', 1 => 'по убыванию'])->label('Выберите тип сортировки:') ?>
                    <div class="form-group">
                        <?= Html::submitButton('Отсортировать', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
                
                <div id="result">
                    <?php if($result['message'] == '' && count($result['dateStrArr']) > 0 && count($result['dateArr']) > 0) { ?>
                        <span class="bold">Результат:</span><br>
                        <div class="result-table">
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-5">Введенная дата</div>
                                <div class="col-sm-5">Преобразованная дата</div>
                            </div>
                            <?php foreach ($result['dateArr'] as $key => $date){ ?>
                                <div class="row">
                                    <div class="col-sm-2">Дата <?= ($key + 1) ?></div>
                                    <div class="col-sm-5"><?= $result['dateStrArr'][$key] ?></div>
                                    <div class="col-sm-5"><?= $date ?></div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <?php if($result['message'] != ''){ ?>
                        <span class="bold">Результат:</span><br>
                        <?= $result['message'] ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

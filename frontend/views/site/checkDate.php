<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '������ � ������';
?>
<div class="site-check-date">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <?php $form = ActiveForm::begin(['id' => 'check-date-form']); ?>
                    <?= $form->field($model, 'date')->textInput(['maxlength' => 19])->label('������� ����:') ?>
                    <div class="form-group">
                        <?= Html::submitButton('���������', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
                
                <div id="result">
                    <?php if($wdate->date !== NULL) { ?>
                        <span class="bold">���������:</span><br>
                        ������ ���� - <?= $wdate->getFullDate() ?><br>
                        ������� - <?= $wdate->getSecond() ?><br>
                        ������ - <?= $wdate->getMinute() ?><br>
                        ���� - <?= $wdate->getHour() ?><br>
                        ���� - <?= $wdate->getDay() ?><br>
                        ����� - <?= $wdate->getMonth() ?><br>
                        ��� - <?= $wdate->getYear() ?>
                    <?php } ?>
                    <?php if($message != ''){ ?>
                        <span class="bold">���������:</span><br>
                        <?= $message ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

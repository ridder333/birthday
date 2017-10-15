<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '������ � ������';
?>
<div class="site-sort-dates">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <?php $form = ActiveForm::begin(['id' => 'sort-dates-form']); ?>
                    <?= $form->field($model, 'dates')->textarea()->label('������� ���� (������ � ����� ������):') ?>
                    <?= $form->field($model, 'order')->dropDownList([0 => '�� �����������', 1 => '�� ��������'])->label('�������� ��� ����������:') ?>
                    <div class="form-group">
                        <?= Html::submitButton('�������������', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
                
                <div id="result">
                    <?php if($result['message'] == '' && count($result['dateStrArr']) > 0 && count($result['dateArr']) > 0) { ?>
                        <span class="bold">���������:</span><br>
                        <div class="result-table">
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-5">��������� ����</div>
                                <div class="col-sm-5">��������������� ����</div>
                            </div>
                            <?php foreach ($result['dateArr'] as $key => $date){ ?>
                                <div class="row">
                                    <div class="col-sm-2">���� <?= ($key + 1) ?></div>
                                    <div class="col-sm-5"><?= $result['dateStrArr'][$key] ?></div>
                                    <div class="col-sm-5"><?= $date ?></div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <?php if($result['message'] != ''){ ?>
                        <span class="bold">���������:</span><br>
                        <?= $result['message'] ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

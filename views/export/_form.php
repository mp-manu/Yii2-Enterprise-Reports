<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Report */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'enterprise_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Enterprise::getList(), 'id', 'name'), [
                    'prompt' => '--- Выберите предриятие ---'
            ]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'amoun_workers')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'avarage_salary')->textInput() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'paid_taxes')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'amount_power_charges')->textInput() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'supplier_name')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'report_date')->textInput(['type' => 'date']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'status')->dropDownList(\app\models\Industry::getStatusList()) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

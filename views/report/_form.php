<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Report */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'enterprise_id')->textInput() ?>

    <?= $form->field($model, 'amoun_workers')->textInput() ?>

    <?= $form->field($model, 'avarage_salary')->textInput() ?>

    <?= $form->field($model, 'paid_taxes')->textInput() ?>

    <?= $form->field($model, 'amount_power_charges')->textInput() ?>

    <?= $form->field($model, 'report_date')->textInput() ?>

    <?= $form->field($model, 'supplier_name')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

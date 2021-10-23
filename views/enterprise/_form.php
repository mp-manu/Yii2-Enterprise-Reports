<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Enterprise */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enterprise-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($industryModel, 'parent_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Industry::getPrentsList(), 'id', 'name'),
                [
                    'prompt'=>'--- Выберите категорию ---',
                    'onchange'=>'
                        $.get( "'.\yii\helpers\Url::toRoute('industry/get-child-by-id').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'industry_id').'" ).html( data );
                            }
                        );
                    '
                ]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'industry_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Industry::getChildsList(), 'id', 'name')) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'status')->dropDownList(\app\models\Enterprise::getStatusList()) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

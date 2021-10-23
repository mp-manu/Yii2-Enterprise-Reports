<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReportSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'enterprise_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Enterprise::getList(), 'id', 'name'), [
                'prompt' => '--- Все предприятии ---'
            ]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($modelIndustry, 'id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Industry::getList(), 'id', 'name'), [
                'prompt' => '--- Все отрасль ---'
            ])->label('Отрасли') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <?php
            echo $form->field($model, 'report_date')->widget(\kartik\daterange\DateRangePicker::classname(), [
                'language' => 'ru',
                'pluginOptions' => [
                    'locale' => [
                        'cancelLabel' => 'Закрыть',
                        'applyLabel' => 'Поиск',
                    ]
                ]

            ])->label('Выберите период');
            ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Сформировать', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сбросить', ['class' => 'btn btn-outline-secondary']) ?>
        <?= Html::a('Экcпорт в pdf', '/export/to-pdf?'.$_SERVER['QUERY_STRING'].'&ReportSearch%5Bexport%5D=1', ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Экспорт в excel', '/export/to-excel?'.$_SERVER['QUERY_STRING'].'&ReportSearch%5Bexport%5D=1', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

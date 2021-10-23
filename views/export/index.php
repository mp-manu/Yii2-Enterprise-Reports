<?php

use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отчеты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-index">

    <?php //echo $this->render('_search', ['model' => $searchModel,  'modelIndustry' => $modelIndustry]); ?>

    <?= \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'enterprise.industry.name',
            [
                'attribute' => 'enterprise_id',
                'value' => 'enterprise.name',
            ],
            'amoun_workers',
            'paid_taxes',
            'amount_power_charges',
            'report_date',


        ],
    ]); ?>

</div>

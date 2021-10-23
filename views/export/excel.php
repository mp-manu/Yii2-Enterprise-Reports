<?php
use kartik\export\ExportMenu;



$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    'enterprise_id',
    'amoun_workers',
    'avarage_salary',
    'paid_taxes',
    'amount_power_charges',
    'supplier_name',
    'report_date',
    ['class' => 'yii\grid\ActionColumn'],
];

// You can choose to render your own GridView separately
echo \kartik\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumns
]);
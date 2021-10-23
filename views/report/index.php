<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отчеты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel,  'modelIndustry' => $modelIndustry]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'enterprise.industry.name',
            [
              'attribute' => 'enterprise_id',
              'value' => 'enterprise.name',
              'filter' => \yii\helpers\ArrayHelper::map(\app\models\Enterprise::getList(), 'id', 'name')
            ],
            'amoun_workers',
            [
                'attribute' => 'avarage_salary',

            ],
            'paid_taxes',
//            'amount_power_charges',
            'report_date',

//            'status',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

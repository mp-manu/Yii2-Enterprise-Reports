<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EnterpriseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список предприятий';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enterprise-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'industry_id',
                'value' => 'industry.name',
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Industry::getChildsList(), 'id', 'name'),
            ],
            'name',
            'inn',
            'address',
            [
                'attribute' => 'status',
                'filter' => ['1' => 'Активный', '0' => 'Неактивный'],
                'value' => function($model){
                    if($model->status == 1){
                        return 'Активный';
                    }else{
                        return 'Неактивынй';
                    }
                }
            ],
            //'tel',
            //'status',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

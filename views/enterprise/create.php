<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Enterprise */

$this->title = 'Добавить предприятие';
$this->params['breadcrumbs'][] = ['label' => 'Список предприятий', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enterprise-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'industryModel' => $industryModel
    ]) ?>

</div>

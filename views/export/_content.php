<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<div class="data">
    <?= Html::encode($model->enterprise->name) ?>
    <?= HtmlPurifier::process($model->avarage_salary) ?>
</div>
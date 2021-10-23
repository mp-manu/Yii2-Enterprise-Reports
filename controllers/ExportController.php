<?php


namespace app\controllers;


use app\models\IndustrySearch;
use app\models\ReportSearch;
use yii\web\Controller;

class ExportController extends Controller
{
    public function actionToPdf(){
        $searchModel = new ReportSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $modelIndustry = new IndustrySearch();
        $modelIndustry->search($this->request->queryParams);


        $html = $this->renderPartial('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelIndustry' => $modelIndustry
        ]);

        return \Yii::$app->pdf->exportData('Export', 'report_to_pdf', $html);
    }

    public function actionToExcel(){
        $html = $this->renderPartial($data['exportFile'],
            ['model' => $data['data'], 'type' => $type,
            ]);

        return \Yii::$app->pdf->exportData($data['title'], $data['fileName'], $html);
    }

}
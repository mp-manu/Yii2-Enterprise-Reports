<?php


namespace app\controllers;


use app\models\IndustrySearch;
use app\models\ReportSearch;
use yii\web\Controller;
use kartik\mpdf\Pdf;

class ExportController extends Controller
{
    public function actionToPdf(){
        ini_set('display_errors', 0);
        error_reporting(0);

        $searchModel = new ReportSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $modelIndustry = new IndustrySearch();
        $modelIndustry->search($this->request->queryParams);


        $html = $this->renderPartial('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelIndustry' => $modelIndustry
        ]);

        if(!empty(\Yii::$app->request->get('ReportSearch')['report_date'])){
            $filename = 'PDF_REPORT_'.\Yii::$app->request->get('ReportSearch')['report_date'].'.pdf';
        }else{
            $filename = 'PDF_REPORT.pdf';
        }

        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $html,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Enterprise Report'],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>['Enterprise Report'],
                'SetFooter'=>['{PAGENO}'],
            ],
            'filename' => $filename
        ]);

        return $pdf->render();
    }

    public function actionToExcel(){
        $searchModel = new ReportSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $modelIndustry = new IndustrySearch();
        $modelIndustry->search($this->request->queryParams);
        $file = $this->renderPartial('excel', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelIndustry' => $modelIndustry
        ]);
        $fileName = 'Report.xls';
        $options = ['mimeType' => 'application/vnd.ms-excel'];
        return \Yii::$app->excel->exportExcel($file, $fileName, $options);
    }

}
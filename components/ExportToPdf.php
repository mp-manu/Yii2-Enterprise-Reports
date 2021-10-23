<?php

namespace app\components;
use Yii;
use yii\base\Component;
use mPD;
 
class ExportToPdf extends Component
{
	public function exportData($title='',$filename='report_pdf',$html=NULL)
	{
		$mpdf = new mPDF('utf-8', 'A4',0,'',15,15,25,16,4,9,'P');
		$mpdf->autoScriptToLang = true;
		$mpdf->autoLangToFont = true;
		$org_name='Enterprise reports';
		$mpdf->SetHTMLHeader('<table style="border-bottom:1.6px solid #999998;border-top:hidden;border-left:hidden;border-right:hidden;width:100%;"><tr style="border:hidden"><td vertical-align="center" style="width:35px;border:hidden" align="left"></td><td style="border:hidden;text-align:left;color:#555555;"><b style="font-size:22px;">'.$org_name.'</b><br/><span style="font-size:10.2px"></td></tr></table>');
		$stylesheet = file_get_contents(Yii::getAlias('@web').'/css/pdf.css'); // external css
		$mpdf->WriteHTML($stylesheet,0);
		$mpdf->showWatermarkImage = true;
		$arr = [
		  'odd' => [
		    'L' => [
		      'content' => $title,
		      'font-size' => 10,
		      'font-style' => 'B',
		      'font-family' => 'Arial',
		      'color'=>'#27292b'
		    ],
		    'C' => [
		      'content' => 'Page - {PAGENO}/{nbpg}',
		      'font-size' => 10,
		      'font-style' => 'B',
		      'font-family' => 'Arial',
		      'color'=>'#27292b'
		    ],
		    'R' => [ 
		      'content' => 'Printed @ {DATE j-m-Y}',
		      'font-size' => 10,
		      'font-style' => 'B',
		      'font-family' => 'Arial',
		      'color'=>'#27292b'
		    ],
		    'line' => 1,
		  ],
		  'even' => []
		];
		$mpdf->SetFooter($arr);
		$mpdf->WriteHTML('<sethtmlpageheader name="main" page="ALL" value="on" show-this-page="1">');
		$mpdf->WriteHTML($html);
		$mpdf->Output($filename.'.pdf',"I");

	}
}

?>

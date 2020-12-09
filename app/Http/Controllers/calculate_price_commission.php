<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class calculate_price_commission extends Controller
{
    public function commissionPDF()

    {
    	$html='<html>
            <head>
                <title>E-Request commission</title>
                <link rel="stylesheet" href="css/e_request/form_main.css">
            </head>
            <body>
                <div class="mistake_header" style="margin-left:300px;">
                    <div class="logo" >
                        <img style="width: 150px; height: 100px;margin-top:-10px;" src="images/turbotech.png">
                    </div>
                    <div class="namecompany" style="text-align:center; margin-top:-117px; margin-left:-100px;">
                        <h1 style="font-size: 25px;">ក្រុមហ៊ុនធើបូថេក   ឯ.ក</h1>
                        <h1 style=" font-size: 19px; margin-top: 0;">TURBOTECH CO., LTD</h1>
                    </div>
                </div>
                <div class="heading">
                    <h3 class="center_heading">របាយការណ៍គណនាកម្រៃជើងសារ ប្រចាំខែ.............</h3>
                </div>
                <table class="staff_training_request" style=" width:100%">
                <thead>
                    <tr>
                        <td style="width:3%; font-size:15px;">ល.រ</td>
                        <td style="width:15%; font-size:15px;">លេខសម្គាល់អតិថិជន</td>
                        <td style="width:10.4%; font-size:15px;">ឈ្មោះអតិថិជន</td>
                        <td style="width:10.4%; font-size:15px;">វិក័យបត្រលេខ</td>
                        <td style="width:15%; font-size:15px;">ប្រភេទសេវា</td>
                        <td style="width:10.4%; font-size:15px;">ទឹកប្រាក់ប្រចាំខែ</td>
                        <td style="width:10.4%; font-size:15px;">ផលកម្រៃត្រូវទទួល</td>
                        <td style="width:10.4%; font-size:15px;">កាត់ពន្ធទុក(១៥%)</td>
                        <td style="width:15%; font-size:15px;">ប្រាក់បើកជូនភ្នាក់ងារ</td>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
                <br>
                <table class="commission_footer" style="border: none !important;">
                    <tbody>
                        <tr style="border:none; !important">
                            <td style="border:none; !important">
                                <p style="margin-buttom: 50px;">បញ្ចាក់ដោយ</p>
                                <p>ឈ្មោះ..................................</p>
                                <p>ថ្ងៃទី............../.............../..............</p>
                            </td style="border:none; !important">
                            <td>
                                <p>ត្រួតពិនិត្យដោយ</p>
                                <p>ឈ្មោះ..................................</p>
                                <p>ថ្ងៃទី............../.............../..............</p>  
                            </td>
                            <td style="border:none; !important">
                                <p>រៀបចំដោយ</p>
                                <p>ឈ្មោះ..................................</p>
                                <p>ថ្ងៃទី............../.............../..............</p> 
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="footer_commission">
                    <p​>&nbsp;&nbsp;របាយការណ៍គណនាកម្រៃជើងសារប្រចាំខែ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;TT-HRAD-SAPP-FM-003-00</p>
                </div>
            </body>
            </html>';

        $config = [
            'mode' => '+aCJK',
            "autoScriptToLang" => true,
            "autoLangToFont" => true,
            'orientation' => 'L'
        ];

        $mpdf = new \Mpdf\Mpdf($config);
        $mpdf->WriteHTML($html);
        $filename = 'commission.pdf';
        $mpdf->SetDisplayMode('fullwidth');
        // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');

    }
}

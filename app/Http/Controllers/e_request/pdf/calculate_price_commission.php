<?php

namespace App\Http\Controllers\e_request\pdf;

use App\Http\Controllers\Controller;
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
                    <h3 class="center">របាយការណ៍គណនាកម្រៃជើងសារ ប្រចាំខែ.............</h3>
                </div>
                <table class="commission" style=" width:100%">
                <thead>
                    <tr>
                        <td style="width:3%; font-size:14px;">ល.រ</td>
                        <td style="width:15%; font-size:14px;">លេខសម្គាល់អតិថិជន</td>
                        <td style="width:10.4%; font-size:14px;">ឈ្មោះអតិថិជន</td>
                        <td style="width:10.4%; font-size:14px;">វិក័យបត្រលេខ</td>
                        <td style="width:11.2%; font-size:14px;">ប្រភេទសេវា</td>
                        <td style="width:10.4%; font-size:14px;">ទឹកប្រាក់ប្រចាំខែ</td>
                        <td style="width:15%; font-size:14px;">ផលកម្រៃត្រូវទទួល</td>
                        <td style="width:15%; font-size:14px;">កាត់ពន្ធទុក(១៥%)</td>
                        <td style="width:15%; font-size:14px;">ប្រាក់បើកជូនភ្នាក់ងារ</td>
                    </tr>
                    <tr>
                        <td style="width:3%; font-size:14px;">No</td>
                        <td style="width:15%; font-size:14px;">Customer ID</td>
                        <td style="width:10.4%; font-size:14px;">Customer Name</td>
                        <td style="width:10.4%; font-size:14px;">Invoice</td>
                        <td style="width:11.2%; font-size:14px;">Package</td>
                        <td style="width:10.4%; font-size:14px;">Month Fee</td>
                        <td style="width:15%; font-size:14px;">Commission Fee</td>
                        <td style="width:15%; font-size:14px;">Withholding Tax</td>
                        <td style="width:15%; font-size:14px;">Amount($)</td>
                    </tr>
                    <tr>
                        <td style="width:3%; font-size:14px;">1</td>
                        <td style="width:15%; font-size:14px;"></td>
                        <td style="width:10.4%; font-size:14px;"></td>
                        <td style="width:10.4%; font-size:14px;"></td>
                        <td style="width:11.2%; font-size:14px;"></td>
                        <td style="width:10.4%; font-size:14px;"></td>
                        <td style="width:15%; font-size:14px;"></td>
                        <td style="width:15%; font-size:14px;"></td>
                        <td style="width:15%; font-size:14px;"></td>
                    </tr>
                    <tr>
                        <td style="width:3%; font-size:14px;">2</td>
                        <td style="width:15%; font-size:14px;"></td>
                        <td style="width:10.4%; font-size:14px;"></td>
                        <td style="width:10.4%; font-size:14px;"></td>
                        <td style="width:11.2%; font-size:14px;"></td>
                        <td style="width:10.4%; font-size:14px;"></td>
                        <td style="width:15%; font-size:14px;"></td>
                        <td style="width:15%; font-size:14px;"></td>
                        <td style="width:15%; font-size:14px;"></td>
                    </tr>
                    <tr>
                        <td style="width:3%; font-size:14px;">3</td>
                        <td style="width:15%; font-size:14px;"></td>
                        <td style="width:10.4%; font-size:14px;"></td>
                        <td style="width:10.4%; font-size:14px;"></td>
                        <td style="width:11.2%; font-size:14px;"></td>
                        <td style="width:10.4%; font-size:14px;"></td>
                        <td style="width:15%; font-size:14px;"></td>
                        <td style="width:15%; font-size:14px;"></td>
                        <td style="width:15%; font-size:14px;"></td>
                    </tr>
                    <tr>
                        <td style="width:3%; font-size:14px;">4</td>
                        <td style="width:15%; font-size:14px;"></td>
                        <td style="width:10.4%; font-size:14px;"></td>
                        <td style="width:10.4%; font-size:14px;"></td>
                        <td style="width:11.2%; font-size:14px;"></td>
                        <td style="width:10.4%; font-size:14px;"></td>
                        <td style="width:15%; font-size:14px;"></td>
                        <td style="width:15%; font-size:14px;"></td>
                        <td style="width:15%; font-size:14px;"></td>
                    </tr>
                    <tr>
                        <td style="width:3%; font-size:14px;">5</td>
                        <td style="width:15%; font-size:14px;"></td>
                        <td style="width:10.4%; font-size:14px;"></td>
                        <td style="width:10.4%; font-size:14px;"></td>
                        <td style="width:11.2%; font-size:14px;"></td>
                        <td style="width:10.4%; font-size:14px;"></td>
                        <td style="width:15%; font-size:14px;"></td>
                        <td style="width:15%; font-size:14px;"></td>
                        <td style="width:15%; font-size:14px;"></td>
                    </tr>
                    <tr>
                        <td style="width:3%; font-size:14px;"></td>
                        <td style="width:15%; font-size:14px;"></td>
                        <td style="width:10.4%; font-size:14px;"></td>
                        <td style="width:10.4%; font-size:14px;"></td>
                        <td style="width:11.2%; font-size:14px;"></td>
                        <td style="width:10.4%; font-size:14px;"></td>
                        <td style="width:15%; font-size:14px;"></td>
                        <td style="width:15%; font-size:14px;"></td>
                        <td style="width:15%; font-size:14px;"></td>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                        <td style="width:11.2%; font-size:14px;">ទឹកប្រាក់សរុប</td>
                        <td style="width:10.4%; font-size:14px;"></td>
                        <td style="width:15%; font-size:14px;"></td>
                        <td style="width:15%; font-size:14px;"></td>
                        <td style="width:15%; font-size:14px;"></td>
                    </tr>
                    <tr>
                        <td style="width:3%; font-size:14px;"></td>
                        <td style="width:15%; font-size:14px;"></td>
                        <td style="width:10.4%; font-size:14px;"></td>
                        <td style="width:10.4%; font-size:14px;"></td>
                        <td style="width:11.2%; font-size:14px;"></td>
                        <td style="width:10.4%; font-size:14px;"></td>
                        <td style="width:15%; font-size:14px;"></td>
                        <td style="width:15%; font-size:14px;"></td>
                        <td style="width:15%; font-size:14px;"></td>
                    </tr>
                    
                </thead>
                <tbody>
                    
                </tbody>
            </table>
                <br>
                <table class="commission_footer">
                    <tbody>
                        <tr>
                            <td style="33.33%"><p>បញ្ចាក់ដោយ</p></td>
                            <td style="33.33%"><p>ត្រួតពិនិត្យដោយ</p></td>
                            <td style="33.33%"><p>រៀបចំដោយ</p></td>
                        </tr>
                        <tr>
                            <td class="pdd-t-50" style="33.33%"><p>ឈ្មោះ..................................</p></td>
                            <td class="pdd-t-50" style="33.33%"><p>ឈ្មោះ..................................</p></td>
                            <td class="pdd-t-50" style="33.33%"><p>ឈ្មោះ..................................</p></td>
                        </tr>
                        <tr>
                            <td style="33.33%"><p>ថ្ងៃទី............../.............../..............</p></td>
                            <td style="33.33%"><p>ថ្ងៃទី............../.............../..............</p></td>
                            <td style="33.33%"><p>ថ្ងៃទី............../.............../..............</p></td>
                        </tr>
                    </tbody>
                </table>
                <div class="footer mg-t-20">
                    <p​>&nbsp;&nbsp;របាយការណ៍គណនាកម្រៃជើងសារប្រចាំខែ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;TT-HRAD-SAPP-FM-003-00</p>
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

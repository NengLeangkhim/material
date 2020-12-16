<?php

namespace App\Http\Controllers\e_request\pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class customer_primary_report extends Controller
{
    public function customer_reportPDF()

    {
    	$html='<html>
            <head>
                <title>E-Request Customer_Primary_Report</title>
                <link rel="stylesheet" href="css/e_request/form_main.css">
            </head>
            <body>
            <table style="border: none !important; width:100%;">
                <tr style="border: none !important;">
                    <td style="width: 25%; border: none !important;">
                    <td style="width: 20%;border: none !important;">
                        <img style="width: 175px;" src="images/turbotech.png">
                    </td>
                    <td style="width:30%;border: none !important; line-height: 50px;">
                        <h1 style="font-size: 25px; color:#1fa8e0;">ក្រុមហ៊ុនធើបូថេក   ឯ.ក</h1>
                        <h1 style="font-size: 19px;color:#1fa8e0;">TURBOTECH CO., LTD</h1>
                    </td>
                    <td style="width: 25%; border: none !important;">
                    
                </tr>
            </table>
            <div class="heading">
                <h3 class="center">របាយការណ៍អតិថិជនបឋម</h3>
            </div>


            <table class="staff_training_request" style=" width:100%">
                <thead>
                    <tr>
                        <td style="width:5% ; font-size:15px;">ល.រ</td>
                        <td style="width:15%; font-size:15px;">ឈ្មោះអតិថិជន</td>
                        <td style="width:5%; font-size:15px;">ភេទ</td>
                        <td style="width:10%; font-size:15px;">ភូមិ</td>
                        <td style="width:10%; font-size:15px;">ឃុំ/សង្កាត់</td>
                        <td style="width:10%; font-size:15px;">ស្រុក/ខ័ណ្ឌ</td>
                        <td style="width:10%; font-size:15px;">ខេត្ត/ក្រុង</td>
                        <td style="width:10%; font-size:15px;">កញ្ចប់សេវា</td>
                        <td style="width:15%; font-size:15px;">គម្រោងបង់ប្រាក់</td>
                        <td style="width:10%; font-size:15px;">ផ្សេងៗ</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="width:5% ; font-size:15px;">1</td>
                        <td style="width:15%; font-size:15px;"></td>
                        <td style="width:5%; font-size:15px;"></td>
                        <td style="width:5%; font-size:15px;"></td>
                        <td style="width:10%; font-size:15px;"></td>
                        <td style="width:10%; font-size:15px;"></td>
                        <td style="width:10%; font-size:15px;"></td>
                        <td style="width:10%; font-size:15px;"></td>
                        <td style="width:15%; font-size:15px;"></td>
                        <td style="width:15%; font-size:15px;"></td>
                    </tr>
                    <tr>
                        <td style="width:5% ; font-size:15px;">2</td>
                        <td style="width:15%; font-size:15px;"></td>
                        <td style="width:5%; font-size:15px;"></td>
                        <td style="width:5%; font-size:15px;"></td>
                        <td style="width:10%; font-size:15px;"></td>
                        <td style="width:10%; font-size:15px;"></td>
                        <td style="width:10%; font-size:15px;"></td>
                        <td style="width:10%; font-size:15px;"></td>
                        <td style="width:15%; font-size:15px;"></td>
                        <td style="width:15%; font-size:15px;"></td>
                    </tr>
                    <tr>
                        <td style="width:5% ; font-size:15px;">3</td>
                        <td style="width:15%; font-size:15px;"></td>
                        <td style="width:5%; font-size:15px;"></td>
                        <td style="width:5%; font-size:15px;"></td>
                        <td style="width:10%; font-size:15px;"></td>
                        <td style="width:10%; font-size:15px;"></td>
                        <td style="width:10%; font-size:15px;"></td>
                        <td style="width:10%; font-size:15px;"></td>
                        <td style="width:15%; font-size:15px;"></td>
                        <td style="width:15%; font-size:15px;"></td>
                    </tr>
                    <tr>
                        <td style="width:5% ; font-size:15px;">4</td>
                        <td style="width:15%; font-size:15px;"></td>
                        <td style="width:5%; font-size:15px;"></td>
                        <td style="width:5%; font-size:15px;"></td>
                        <td style="width:10%; font-size:15px;"></td>
                        <td style="width:10%; font-size:15px;"></td>
                        <td style="width:10%; font-size:15px;"></td>
                        <td style="width:10%; font-size:15px;"></td>
                        <td style="width:15%; font-size:15px;"></td>
                        <td style="width:15%; font-size:15px;"></td>
                    </tr>
                    <tr>
                        <td style="width:5% ; font-size:15px;">5</td>
                        <td style="width:15%; font-size:15px;"></td>
                        <td style="width:5%; font-size:15px;"></td>
                        <td style="width:5%; font-size:15px;"></td>
                        <td style="width:10%; font-size:15px;"></td>
                        <td style="width:10%; font-size:15px;"></td>
                        <td style="width:10%; font-size:15px;"></td>
                        <td style="width:10%; font-size:15px;"></td>
                        <td style="width:15%; font-size:15px;"></td>
                        <td style="width:15%; font-size:15px;"></td>
                    </tr>
                    
                </tbody>
            </table>
            <div class="heading"​ style="text-align: right;"> 
                <p>ហត្ថលេខាភ្នាក់ងារនាំអតិថិជន</p>
                <p style="margin-top: 100px;">ឈ្មោះ៖.............................................................</p>
                <p>កាលបរិច្ឆេទ៖............../.............../................</p>
            </div>

            <div class="footer" style="margin-top: 105px;">
                <p​>&nbsp;&nbsp;របាយការណ៍គណនាកម្រៃជើងសារប្រចាំខែ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;TT-HRAD-SAPP-FM-003-00</p>
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
        $filename = 'customer_primary_report.pdf';
        $mpdf->SetDisplayMode('fullwidth');
        // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');

    }
}

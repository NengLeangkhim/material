<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class training_need_analysis extends Controller
{
    public function training_need_analysisPDF()

    {
    	$html='<html>
            <head>
                <title>E-Request training_need_analysis</title>
                <link rel="stylesheet" href="css/e_request/form_main.css">
            </head>
            <body>
                <div class="mistake_header">
                    <div class="logo" style="margin-left:20px;">
                        <img style="width: 150px; height: 100px;margin-top:-10px;" src="images/turbotech.png">
                    </div>
                    <div class="namecompany" style="text-align:center;margin-top:-117px;">
                        <h1 style="font-size: 25px;">ក្រុមហ៊ុនធើបូថេក   ឯ.ក</h1>
                        <h1 style=" font-size: 19px; margin-top: 0;">TURBOTECH CO., LTD</h1>
                    </div>
                </div>
                <div class="heading">
                    <h3 class="center_heading">តារាងស្ទង់មតិតម្រូវការការសិក្សារបស់បុគ្គលិក</h3>
                    <h3 style="font-size: 16px;">១.អំពីបុគ្គលិក</h3>
                </div>
                <table class="training_analysis_staff_info">
                    <tbody>
                        <tr>
                            <td style="width: 50%;">ឈ្មោះ៖ <span>.........................................................</span></td>
                            <td style="width: 50%;">ភេទ៖ <span>....................................................................</span></td>
                        </tr>          
                        <tr>
                            <td style="width: 50%;">តួ​នាទី៖ <span>..........................................................</span></td>
                            <td style="width: 50%;">នាយកដ្ឋាន៖ <span>..........................................................</span></td>
                        </tr>          
                        <tr>
                            <td style="width: 50%;">កាលបរិច្ឆេទចូលបម្រើតួនាទីបច្ចុប្បន្ន</td>
                            <td style="width: 50%;">..............................................................................</td>
                        </tr>          
                        <tr>
                            <td style="width: 50%;">កាលបរិច្ឆេទចូលបម្រើការងារដំបូង</td>
                            <td style="width: 50%;">..............................................................................</td>
                        </tr>          
                    </tbody>
                </table>
                <div class="training_analysis_heading">
                    <h3 style="font-size: 16px;">២.ការជ្រើសរើស</h3>
                    <p​>សូមជ្រើសរើសប្រធានបទ ឫ ជំនាញណាមួយដែលអ្នកគិតថាសក្តិសមបំផុតសម្រាប់អ្នក ជាពិសេសលើការងារប្រចាំថ្ងៃរបស់អ្នក។ សូមជ្រើសរើសដោយការគូស TICK ពីលេច១ដល់លេខ៥ ដែលលេខ១មានន័យថាមិនសូវចាំបាច់ និងលេខ៥ ចាំបាច់បំផុត។</p>
                </div>
                <table class="staff_note">
                    <tbody>
                        <tr>
                            <td rowspan="2" style="width: 30%;">ចំណុចតាមដាន</td>
                            <td rowspan="2" style="width: 40%;">បរិយាយ</td>
                            <td rowspan="1" colspan="2" style="width:30%;">លទ្ធផលសម្រេចបាន</td>
                        </tr>
                    </tbody>
                </table>
                <div class="footer" style="margin-top: 510px;">
                    <p​>&nbsp;&nbsp;កំណត់ត្រាតាមដានការងារនិយោជិក ​&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; TT-HRAD-STDP-FM-010-00</p>
                </div>
            </body>
            </html>';

        $config = [
            'mode' => '+aCJK',
            "autoScriptToLang" => true,
            "autoLangToFont" => true,
        ];

        $mpdf = new \Mpdf\Mpdf($config);
        $mpdf->WriteHTML($html);
        $filename = 'training_need_analysis.pdf';
        $mpdf->SetDisplayMode('fullwidth');
        // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');

    }
}

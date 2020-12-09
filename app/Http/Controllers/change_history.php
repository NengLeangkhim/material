<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class change_history extends Controller
{
    public function change_historyPDF()

    {
    	$html='<html>
            <head>
                <title>E-Request change history</title>
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
                <p style="margin-top: 10px;"><b>ប្រវត្តិការកែប្រែ</b></p>
            </div>
            <table class="change_history_table" style="width: 100%; text-align: center;">
                <tbody>
                    <tr>
                        <th style="width: 20%;">លេខកែសម្រួល</th>
                        <th style="width: 20%;">ថ្ងៃសុពលភាព</th>
                        <th style="width: 40%;">បរិយាយកំណែ</th>
                        <th style="width: 20%;">លេខយោង</th>
                    </tr>
                    <tr>
                        <th style="width: 20%;">០០</th>
                        <th style="width: 20%;"></th>
                        <th style="width: 40%;">ឯកសារផ្ដួចផ្ដើម</th>
                        <th style="width: 20%;">២០២០/០០</th>
                    </tr>
                    <tr>
                        <th style="width: 20%;"></th>
                        <th style="width: 20%;"></th>
                        <th style="width: 40%;"></th>
                        <th style="width: 20%;"></th>
                    </tr>
                    <tr>
                        <th style="width: 20%;"></th>
                        <th style="width: 20%;"></th>
                        <th style="width: 40%;"></th>
                        <th style="width: 20%;"></th>
                    </tr>
                    <tr>
                        <th style="width: 20%;"></th>
                        <th style="width: 20%;"></th>
                        <th style="width: 40%;"></th>
                        <th style="width: 20%;"></th>
                    </tr>
                    <tr>
                        <th style="width: 20%;"></th>
                        <th style="width: 20%;"></th>
                        <th style="width: 40%;"></th>
                        <th style="width: 20%;"></th>
                    </tr>
                    <tr>
                        <th style="width: 20%;"></th>
                        <th style="width: 20%;"></th>
                        <th style="width: 40%;"></th>
                        <th style="width: 20%;"></th>
                    </tr>
                    <tr>
                        <th style="width: 20%;"></th>
                        <th style="width: 20%;"></th>
                        <th style="width: 40%;"></th>
                        <th style="width: 20%;"></th>
                    </tr>
                </tbody>
            </table>
            <div class="heading">
                <p class="center_heading"><b>កំណត់ត្រាទទួលស្គាល់</b></p>
            </div>
            <table class="change_history_table"style="width: 100%; text-align: center;">
                <tbody>
                    <tr>
                        <th style="width: 8%;">ល.រ</th>
                        <th style="width: 27%;">ឈ្មោះ</th>
                        <th style="width: 40%;">តួនាទី</th>
                        <th style="width: 25%;">ទទួលស្គាល់</th>
                    </tr>
                    <tr>
                        <th style="width: 5%;">១</th>
                        <th style="width: 27%;">លោក ជឹម ប៊ុនធឿន</th>
                        <th style="width: 40%;">នាយក នាយកដ្ឋានបច្ចេកវិទ្យាព័ត៏មាន</th>
                        <th style="width: 25%;"></th>
                    </tr>
                    <tr>
                        <th style="width: 5%;">២</th>
                        <th style="width: 27%;"></th>
                        <th style="width: 40%;"></th>
                        <th style="width: 25%;"></th>
                    </tr>
                    <tr>
                        <th style="width: 5%;">៣</th>
                        <th style="width: 27%;"></th>
                        <th style="width: 40%;"></th>
                        <th style="width: 25%;"></th>
                    </tr>
                    <tr>
                        <th style="width: 5%;">៤</th>
                        <th style="width: 27%;"></th>
                        <th style="width: 40%;"></th>
                        <th style="width: 25%;"></th>
                    </tr>
                    <tr>
                        <th style="width: 5%;">៥</th>
                        <th style="width: 27%;"></th>
                        <th style="width: 40%;"></th>
                        <th style="width: 25%;"></th>
                    </tr>
                    <tr>
                        <th style="width: 5%;">៦</th>
                        <th style="width: 27%;"></th>
                        <th style="width: 40%;"></th>
                        <th style="width: 25%;"></th>
                    </tr>
                    <tr>
                        <th style="width: 5%;">៧</th>
                        <th style="width: 27%;"></th>
                        <th style="width: 40%;"></th>
                        <th style="width: 25%;"></th>
                    </tr>
                    
                </tbody>
            </table>





            <div class="footer" style="margin-top: 230px;">
                <p​>&nbsp;&nbsp;គោលការណ៍ប្រតិបត្តិ និងនីតិវិធីស្ដីពីការគ្រប់គ្រងពីការក្លែងបន្លំ ឫឆបោក &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; ទំព័រៈ១០</p>
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
        $filename = 'change_history.pdf';
        $mpdf->SetDisplayMode('fullwidth');
        // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class training_request_proposal extends Controller
{
    public function training_requestPDF()
    {
    
    $html='<html>
            <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/e_request/form_main.css">
            </head>
            <style>
            </style>
                <body>
                    <div class="logo" style="margin-left:20px;">
                        <img style="width: 150px; height: 100px;margin-top:-10px;" src="images/turbotech.png">
                    </div>
                    <div class="namecompany" style="text-align:center;margin-top:-117px;">
                        <h1 style="font-size: 25px;">ក្រុមហ៊ុនធើបូថេក   ឯ.ក</h1>
                        <h1 style=" font-size: 19px; margin-top: 0;">TURBOTECH CO., LTD</h1>
                    </div> 
                    <div class="heading">
                        <h3 class="center_heading">គម្រោងស្នើសុំបណ្ដុះបណ្ដាល</h3>
                        <h3​>I.&nbsp;&nbsp;&nbsp;សង្ខេបគម្រោង</h3>
                    </div>
                    
                    <table class="staff_training_info" style="margin-left: 40px; margin-right: 20px;">
                        <tbody>
                            <tr>
                                <td><p>ឈ្មោះគម្រោង</p></td>
                                <td><p></p></td>
                            </tr>
                            <tr>
                                <td><p>អ្នកដឹកនាំគម្រោង</p></td>
                                <td><p></p></td>
                            </tr>
                            <tr>
                                <td><p>គោលបំណង</p></td>
                                <td><p></p></td>
                            </tr>
                            <tr>
                                <td><p>គម្រោងថវិកា</p></td>
                                <td><p></p></td>
                            </tr>
                            <tr>
                                <td><p>ប្រភពថវិកា</p></td>
                                <td><p></p></td>
                            </tr>
                            <tr>
                                <td><p>ថ្លៃចាប់ផ្ដើមគម្រោង</p></td>
                                <td><p></p></td>
                            </tr>
                            <tr>
                                <td><p>ថ្ងៃបញ្ចប់គម្រោង</p></td>
                                <td><p></p></td>
                            </tr>
                            <tr>
                                <td><p>ចំនូនអ្នកចូលរួមគម្រោង</p></td>
                                <td><p></p></td>
                            </tr>
                        </tbody>
                    </table>
                </body>
            </html>';

            $config = [
                'mode' => '+aCJK',
                "autoScriptToLang" => true,
                "autoLangToFont" => true,
            ];
    
            $mpdf = new \Mpdf\Mpdf($config);
            $mpdf->WriteHTML($html);
            $filename = 'training_report.pdf';
            $mpdf->SetDisplayMode('fullwidth');
            // $mpdf->Output($filename, 'D');//download
            return $mpdf->Output($filename,'I');
    }
}

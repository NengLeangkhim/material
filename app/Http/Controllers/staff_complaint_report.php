<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class staff_complaint_report extends Controller
{
    public function staff_complaintPDF()
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
                    <div class="container">
                        <div class="logo" style="margin-left:20px;">
                            <img style="width: 150px; height: 100px;margin-top:-10px;" src="images/turbotech.png">
                        </div>
                        <div class="namecompany" style="text-align:center;margin-top:-117px;">
                            <h1 style="font-size: 25px;">ក្រុមហ៊ុនធើបូថេក   ឯ.ក</h1>
                            <h1 style=" font-size: 19px; margin-top: 0;">TURBOTECH CO., LTD</h1>
                        </div> 
                        <div class="heading">
                            <h3 class="center_heading">របាយការណ៍<br>ស្តីពី<br>ការតវ៉ារបស់កម្មករនិយោជិក</h3>
                        </div>
                        <table class="complaint_report" style="width: 100%; text-align: left; border:none;">
                            <tbody>
                                <tr style="border:none;">
                                    <td class="complaint_table">ពីនាយកដ្ឋានធនធានមនុស្ស និង រដ្ឋបាល</td>
                                    <td class="complaint_table">៖...............................................................................</td>
                                </tr>
                                <tr style="border:none;">
                                    <td class="complaint_table">គោរពជូនលោក/លោកស្រី</td>
                                    <td class="complaint_table">៖...............................................................................</td>
                                </tr>
                                <tr style="border:none;">
                                    <td class="complaint_table">អំពីការតវ៉ារបស់បុគ្គលិក</td>
                                    <td class="complaint_table">៖...............................................................................</td>
                                </tr>
                                <tr style="border:none;">
                                    <td class="complaint_table">ទៅលើផ្នែក/ចំណុច</td>
                                    <td class="complaint_table">១...............................................................................</td>
                                </tr>
                                <tr style="border:none;">
                                    <td class="complaint_table"></td>
                                    <td class="complaint_table">២...............................................................................</td>
                                </tr>
                                <tr style="border:none;">
                                    <td class="complaint_table"></td>
                                    <td class="complaint_table">៣...............................................................................</td>
                                </tr>
                                <tr style="border:none;">
                                    <td class="complaint_table"></td>
                                    <td class="complaint_table">៤...............................................................................</td>
                                </tr>
                                <tr style="border:none;">
                                    <td class="complaint_table"></td>
                                    <td class="complaint_table">៥...............................................................................</td>
                                </tr>
                                <tr style="border:none;">
                                    <td class="complaint_table"></td>
                                    <td class="complaint_table">៦...............................................................................</td>
                                </tr>
                                <tr style="border:none;">
                                    <td class="complaint_table">សូមលោក/លោកស្រីចាត់វិធានការកែតម្រូវ</td>
                                    <td class="complaint_table">១...............................................................................</td>
                                </tr>
                                <tr style="border:none;">
                                    <td class="complaint_table"></td>
                                    <td class="complaint_table">២...............................................................................</td>
                                </tr>
                                <tr style="border:none;">
                                    <td class="complaint_table"></td>
                                    <td class="complaint_table">៣...............................................................................</td>
                                </tr>
                                <tr style="border:none;">
                                    <td class="complaint_table"></td>
                                    <td class="complaint_table">៤...............................................................................</td>
                                </tr>
                                <tr style="border:none;">
                                    <td class="complaint_table"></td>
                                    <td class="complaint_table">៥...............................................................................</td>
                                </tr>
                                <tr style="border:none;">
                                    <td class="complaint_table"></td>
                                    <td class="complaint_table">៦...............................................................................</td>
                                </tr>
                                <tr style="border:none;">
                                    <td class="complaint_table">ផ្សេងៗ</td>
                                    <td class="complaint_table">៖...............................................................................</td>
                                </tr>
                                <tr style="border:none;">
                                    <td class="complaint_table"></td>
                                    <td class="complaint_table">៖...............................................................................</td>
                                </tr>
                                <tr style="border:none;">
                                    <td class="complaint_table"></td>
                                    <td class="complaint_table">៖...............................................................................</td>
                                </tr>
                                <tr style="border:none;">
                                    <td class="complaint_table"></td>
                                    <td class="complaint_table">៖...............................................................................</td>
                                </tr>
                                <tr style="border:none;">
                                    <td class="complaint_table"></td>
                                    <td class="complaint_table">៖...............................................................................</td>
                                </tr>
                                <tr style="border:none;">
                                    <td class="complaint_table"></td>
                                    <td class="complaint_table">៖...............................................................................</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="footer" style="margin-top: 140px;">
                            <p​>&nbsp;&nbsp;ទម្រង់របាយការណ៍ត្អូញត្អែរ(Staff Complaint Report) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;TT-HRAD-SCPP-FM-003-00</p>
                        </div>
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
            $filename = 'training_request.pdf';
            $mpdf->SetDisplayMode('fullwidth');
            // $mpdf->Output($filename, 'D');//download
            return $mpdf->Output($filename,'I');
    }
}

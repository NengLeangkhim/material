<?php

namespace App\Http\Controllers\e_request\pdf;

use App\Http\Controllers\Controller;
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
                            <img style="width: 180px; margin-top:-10px;" src="images/turbotech.png">
                        </div>
                        <div class="namecompany" style="text-align:center;margin-top:-117px;">
                            <h1 style="font-size: 25px;">ក្រុមហ៊ុនធើបូថេក   ឯ.ក</h1>
                            <h1 style=" font-size: 19px; margin-top: 0;">TURBOTECH CO., LTD</h1>
                        </div> 
                        <div class="heading">
                            <h3 class="center">របាយការណ៍<br>ស្តីពី<br>ការតវ៉ារបស់កម្មករនិយោជិក</h3>
                        </div>
                        <table class="complaint_report" style="width: 100%; text-align: left;">
                            <tbody>
                                <tr>
                                    <td style="width: 50%;">ពីនាយកដ្ឋានធនធានមនុស្ស និង រដ្ឋបាល</td>
                                    <td style="width: 50%;">៖<span>...............................................................................</span></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;">គោរពជូនលោក/លោកស្រី</td>
                                    <td style="width: 50%;">៖<span>...............................................................................</span></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;">អំពីការតវ៉ារបស់បុគ្គលិក</td>
                                    <td style="width: 50%;">៖<span>...............................................................................</span></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;">ទៅលើផ្នែក/ចំណុច</td>
                                    <td style="width: 50%;">១<span>...............................................................................</span></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;"></td>
                                    <td style="width: 50%;">២<span>...............................................................................</span></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;"></td>
                                    <td style="width: 50%;">៣<span>...............................................................................</span></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;"></td>
                                    <td style="width: 50%;">៤<span>...............................................................................</span></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;"></td>
                                    <td style="width: 50%;">៥<span>...............................................................................</span></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;"></td>
                                    <td style="width: 50%;">៦<span>...............................................................................</span></td>
                                </tr>
                                <tr style="border:none;">
                                    <td style="width: 50%;">សូមលោក/លោកស្រីចាត់វិធានការកែតម្រូវ</td>
                                    <td style="width: 50%;">១<span>...............................................................................</span></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;"></td>
                                    <td style="width: 50%;">២<span>...............................................................................</span></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;"></td>
                                    <td style="width: 50%;">៣<span>...............................................................................</span></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;"></td>
                                    <td style="width: 50%;">៤<span>...............................................................................</span></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;"></td>
                                    <td style="width: 50%;">៥<span>...............................................................................</span></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;"></td>
                                    <td style="width: 50%;">៦<span>...............................................................................</span></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;">ផ្សេងៗ</td>
                                    <td style="width: 50%;">៖<span>...............................................................................</span></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;"></td>
                                    <td style="width: 50%;">៖<span>...............................................................................</span></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;"></td>
                                    <td style="width: 50%;">៖<span>...............................................................................</span></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;"></td>
                                    <td style="width: 50%;">៖<span>...............................................................................</span></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;"></td>
                                    <td style="width: 50%;">៖<span>...............................................................................</span></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;"></td>
                                    <td style="width: 50%;">៖<span>...............................................................................</span></td>
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

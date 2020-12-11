<?php

namespace App\Http\Controllers\e_request\pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class training_checking_list extends Controller
{
    public function report_trainingPDF()
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
                        <h3 class="center">បញ្ចីត្រួតពិនិត្យការបណ្ដុះបណ្ដាល</h3>
                        <p class="center">ស្ដីពី<br>................................................................................<br>ចាប់ពីថ្ងៃទី...........................ខែ....................ឆ្នាំ..........................</p>
                        <h3​>I.&nbsp;&nbsp;&nbsp;ព័ត៌មានអំពីអ្នកចូលរួម</h3>
                    </div>
                    
                    <table class="training_checking_list_staff" style="margin-left: 40px; margin-right: 20px;">
                        <tbody>
                            <tr>
                                <td class="pdd-l-10" style="width: 50%;">ឈ្មោះ៖........................................................................</td>
                                <td class="pdd-l-10" style="width: 50%;">កន្លែងបម្រើការងារ៖.....................................................</td>
                            </tr>
                            <tr>
                                <td class="pdd-l-10" style="width: 50%;">តួនាទី៖.........................................................................</p></td>
                                <td class="pdd-l-10" style="width: 50%;">កាលបរិច្ឆេទបម្រើការងារ៖.........................................</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="heading">
                        <h3​>II.&nbsp;&nbsp;&nbsp;ព័ត៌មានស្ដីពីការបណ្ដុះបណ្ដាល</h3>
                    </div>
                    <div class="p_text">
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;សូមបញ្ចាក់រាល់ថាប្រធានបទ ចំណេះដឹង នឹង ជំនាញខាងក្រោមនេះ បុគ្គលិកពិតជាទទួលបានការបណ្ដុះ<br>បណ្ដាលយ៉ាងពិតប្រាកដមែនដោយគ្រាន់តែធ្វើការគូស ( ) ទៅតាមប្រធានបទនីមួយៗដូចខាងក្រោម សម្រាប់<br>ជាការបញ្ចាក់ និង ជាការយល់ព្រមរបស់សាមីបុគ្គលិកផ្ទាល់។ បុគ្គលិកនឹងយកចំណេះដឹងទាំងនេះទៅអនុវត្ត<br>ក្នុងការបំពេញការងារទទូលខុសត្រូវរបស់ខ្លូនឲ្យបានប្រសើរសម្រាប់ជាប្រយោជន៍របស់ធើបូថេក ឯ.ក តទៅដូចខាងក្រោម៖</p>
                    </div>
                    <table class="training_checking_list" style="margin-left: 40px; margin-right: 20px;">
                        <tbody>
                            <tr>
                                <td style="width:25%;">ប្រធានបទ</td>
                                <td style="width:40%;">បរិយាយ</td>
                                <td style="width:25%;">ពេលវេលាអនុវត្តន៍</td>
                                <td style="width:10%;">គួស ( )</td>
                            </tr> 
                            <tr>
                                <td style="width:25%;"></td>
                                <td style="width:40%;"></td>
                                <td style="width:25%;"></td>
                                <td style="width:10%;"></td>
                            </tr> 
                            <tr>
                                <td style="width:25%;"></td>
                                <td style="width:40%;"></td>
                                <td style="width:25%;"></td>
                                <td style="width:10%;"></td>
                            </tr> 
                            <tr>
                                <td style="width:25%;"></td>
                                <td style="width:40%;"></td>
                                <td style="width:25%;"></td>
                                <td style="width:10%;"></td>
                            </tr> 
                            <tr>
                                <td style="width:25%;"></td>
                                <td style="width:40%;"></td>
                                <td style="width:25%;"></td>
                                <td style="width:10%;"></td>
                            </tr> 
                            <tr>
                                <td style="width:25%;"></td>
                                <td style="width:40%;"></td>
                                <td style="width:25%;"></td>
                                <td style="width:10%;"></td>
                            </tr> 
                            <tr>
                                <td style="width:25%;"></td>
                                <td style="width:40%;"></td>
                                <td style="width:25%;"></td>
                                <td style="width:10%;"></td>
                            </tr> 
                            <tr>
                                <td style="width:25%;"></td>
                                <td style="width:40%;"></td>
                                <td style="width:25%;"></td>
                                <td style="width:10%;"></td>
                            </tr> 
                            <tr>
                                <td style="width:25%;"></td>
                                <td style="width:40%;"></td>
                                <td style="width:25%;"></td>
                                <td style="width:10%;"></td>
                            </tr> 
                            <tr>
                                <td style="width:25%;"></td>
                                <td style="width:40%;"></td>
                                <td style="width:25%;"></td>
                                <td style="width:10%;"></td>
                            </tr> 
                            <tr>
                                <td style="width:25%;"></td>
                                <td style="width:40%;"></td>
                                <td style="width:25%;"></td>
                                <td style="width:10%;"></td>
                            </tr> 
                        </tbody>
                    </table>
                    <div class="signature">
                        <p>រាជធានីភ្នំពេញ,ថ្ងៃទី.........ខែ.........ឆ្នាំ...........</p>
                        <h3 class="heading" style="margin-right: 20px;">ហត្ថលេខាគ្រូសម្របសម្រួល&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;ហត្ថលេខាអ្នកទទួលយល់ព្រម</h3>
                    </div>
                    <div class="footer" style="margin-top: 80px;">
                        <p​>&nbsp;&nbsp;បញ្ចីត្រួតពិនិត្យការបណ្ដុះបណ្ដាល(Training Checking List) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;TT-HRAD-RTP-FM-003-00</p>
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
            $filename = 'training_report.pdf';
            $mpdf->SetDisplayMode('fullwidth');
            // $mpdf->Output($filename, 'D');//download
            return $mpdf->Output($filename,'I');
    }
}

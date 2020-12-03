<?php

namespace App\Http\Controllers;

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
                        <h3 class="center_heading">បញ្ចីត្រួតពិនិត្យការបណ្ដុះបណ្ដាល</h3>
                        <p class="center_heading">ស្ដីពី<br>................................................................................<br>ចាប់ពីថ្ងៃទី...........................ខែ....................ឆ្នាំ..........................</p>
                        <h3​>I.&nbsp;&nbsp;&nbsp;ព័ត៌មានអំពីអ្នកចូលរួម</h3>
                    </div>
                    
                    <table class="staff_training_info" style="margin-left: 40px; margin-right: 20px;">
                        <tbody>
                            <tr>
                                <td><p>ឈ្មោះ៖..................................................................................</p></td>
                                <td><p>កន្លែងបម្រើការងារ៖................................................................</p></td>
                            </tr>
                            <tr>
                                <td><p>តួនាទី៖...................................................................................</p></td>
                                <td><p>កាលបរិច្ឆេទបម្រើការងារ៖.....................................................</p></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="heading">
                        <h3​>II.&nbsp;&nbsp;&nbsp;ព័ត៌មានស្ដីពីការបណ្ដុះបណ្ដាល</h3>
                    </div>
                    <div class="p_text">
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;សូមបញ្ចាក់រាល់ថាប្រធានបទ ចំណេះដឹង នឹង ជំនាញខាងក្រោមនេះ បុគ្គលិកពិតជាទទួលបានការបណ្ដុះ<br>បណ្ដាលយ៉ាងពិតប្រាកដមែនដោយគ្រាន់តែធ្វើការគូស ( ) ទៅតាមប្រធានបទនីមួយៗដូចខាងក្រោម សម្រាប់<br>ជាការបញ្ចាក់ និង ជាការយល់ព្រមរបស់សាមីបុគ្គលិកផ្ទាល់។ បុគ្គលិកនឹងយកចំណេះដឹងទាំងនេះទៅអនុវត្ត<br>ក្នុងការបំពេញការងារទទូលខុសត្រូវរបស់ខ្លូនឲ្យបានប្រសើរសម្រាប់ជាប្រយោជន៍របស់ធើបូថេក ឯ.ក តទៅដូចខាងក្រោម៖</p>
                    </div>
                    <table class="training_info" style="margin-left: 40px; margin-right: 20px;">
                        <tbody>
                            <tr>
                                <td><p>ប្រធានបទ</p></td>
                                <td><p>បរិយាយ</p></td>
                                <td><p>ពេលវេលាអនុវត្តន៍</p></td>
                                <td><p>គូស ( )</p></td>
                            </tr>
                            <tr>
                                <td><p></p></td>
                                <td><p></p></td>
                                <td><p></p></td>
                                <td><p></p></td>
                            </tr>
                            <tr>
                                <td><p></p></td>
                                <td><p></p></td>
                                <td><p></p></td>
                                <td><p></p></td>
                            </tr>
                            <tr>
                                <td><p></p></td>
                                <td><p></p></td>
                                <td><p></p></td>
                                <td><p></p></td>
                            </tr>
                            <tr>
                                <td><p></p></td>
                                <td><p></p></td>
                                <td><p></p></td>
                                <td><p></p></td>
                            </tr>
                            <tr>
                                <td><p></p></td>
                                <td><p></p></td>
                                <td><p></p></td>
                                <td><p></p></td>
                            </tr>
                            <tr>
                                <td><p></p></td>
                                <td><p></p></td>
                                <td><p></p></td>
                                <td><p></p></td>
                            </tr>
                            <tr>
                                <td><p></p></td>
                                <td><p></p></td>
                                <td><p></p></td>
                                <td><p></p></td>
                            </tr>
                            <tr>
                                <td><p></p></td>
                                <td><p></p></td>
                                <td><p></p></td>
                                <td><p></p></td>
                            </tr>
                            <tr>
                                <td><p></p></td>
                                <td><p></p></td>
                                <td><p></p></td>
                                <td><p></p></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="signature">
                        <p>រាជធានីភ្នំពេញ,ថ្ងៃទី.........ខែ.........ឆ្នាំ...........</p>
                        <h3 class="heading" style="margin-right: 20px;">ហត្ថលេខាគ្រូសម្របសម្រួល&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;ហត្ថលេខាអ្នកទទួលយល់ព្រម</h3>
                    </div>
                    <div class="footer_training">
                        <p​>&nbsp;&nbsp;បញ្ចីត្រួតពិនិត្យការបណ្ដុះបណ្ដាល(Training Checking List) &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;TT-HRAD-STDP-FM-005-00</p>
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

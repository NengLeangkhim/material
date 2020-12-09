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
                    <div class="container">

                        <table style="border: none !important; width:100%;">
                            <tr style="border: none !important;">
                                <td style="width:13%;border: none !important;padding-left:2rem;">
                                    <img style="width: 175px;" src="images/turbotech.png">
                                </td>
                                <td style="width:50%;border: none !important;line-height: 2rem;">
                                    <h1 style="font-size: 25px; color:#1fa8e0;">ក្រុមហ៊ុនធើបូថេក   ឯ.ក</h1>
                                    <h1 style="font-size: 19px;color:#1fa8e0;">TURBOTECH CO., LTD</h1>
                                </td>
                                <td style="width:27%;border: none !important;"></td>
                            </tr>
                        </table>

                        <div class="heading">
                            <h3 class="center_heading">គម្រោងស្នើ សុំបណ្ដុះបណ្ដាល</h3>
                            <h3​ style="font-weght:bold;">I.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;សង្ខេបគម្រោង</h3>
                        </div>
                        
                        <table class="training_request" style="margin-left: 40px; margin-right: 20px;">
                            <tbody>
                                <tr>
                                    <td style="width: 200px; font-size: 15px;">ឈ្មោះគម្រោង</td>
                                    <td colspan="2"></td>
                                </tr>
                                <tr>
                                    <td style="width: 200px; font-size: 15px;">អ្នកដឹកនាំគម្រោង</td>
                                    <td colspan="2"></td>
                                </tr>
                                <tr>
                                    <td style="width: 200px; font-size: 15px;">គោលបំណង</td>
                                    <td colspan="2"></td>
                                </tr>
                                <tr>
                                    <td style="width: 200px; font-size: 15px;">គម្រោងថវិកា</td>
                                    <td colspan="2"></td>
                                </tr>
                                <tr>
                                    <td style="width: 200px; font-size: 15px;">ប្រភពថវិកា</td>
                                    <td colspan="2"></td>
                                </tr>
                                <tr>
                                    <td style="width: 200px; font-size: 15px;">ថ្លៃចាប់ផ្ដើមគម្រោង</td>
                                    <td colspan="2"></td>
                                </tr>
                                <tr>
                                    <td style="width: 200px; font-size: 15px;">ថ្ងៃបញ្ចប់គម្រោង</td>
                                    <td colspan="2"></td>
                                </tr>
                                <tr>
                                    <td style="width: 200px; font-size: 15px;">ចំនូនអ្នកចូលរួមគម្រោង</td>
                                    <td colspan="2"></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="heading">
                            <h3​>II.&nbsp;&nbsp;&nbsp;&nbsp;ទំហំនៃគម្រោង</h3>
                            <p style="margin-left: 40px;">....................................................................................................................................................</p>
                            <p style="margin-left: 40px;">....................................................................................................................................................</p>
                            <p style="margin-left: 40px;">.................................................................................................................................................<span>។</span></p>
                        </div>

                        <div class="heading">
                            <h3​ style="font-weght:bold;">III.&nbsp;&nbsp;&nbsp;សមាសភាពអ្នកចូលរួ​ម</h3>
                        </div>
                        
                        <table class="staff_training_request" style="margin-left: 40px; margin-right: 20px; width:100%">
                            <tbody>
                                <tr>
                                    <td style="width: 7%; font-size: 15px;">ល.រ</td>
                                    <td style="width: 23.25%; font-size: 15px;">ឈ្មោះ</td>
                                    <td style="width: 23.25%; font-size: 15px;">ភេទ</td>
                                    <td style="width: 23.25%; font-size: 15px;">តួនាទី</td>
                                    <td style="width: 23.25%; font-size: 15px;">ទីតាំងការងារ</td>
                                </tr>
                                <tr>
                                    <td style="width: 7%; font-size: 15px;"></td>
                                    <td style="width: 23.25%;font-size: 15px;"></td>
                                    <td style="width: 23.25%;font-size: 15px;"></td>
                                    <td style="width: 23.25%;font-size: 15px;"></td>
                                    <td style="width: 23.25%;font-size: 15px;"></td>
                                </tr>
                                <tr>
                                    <td style="width: 7%; font-size: 15px;"></td>
                                    <td style="width: 23.25%;font-size: 15px;"></td>
                                    <td style="width: 23.25%;font-size: 15px;"></td>
                                    <td style="width: 23.25%;font-size: 15px;"></td>
                                    <td style="width: 23.25%;font-size: 15px;"></td>
                                </tr>
                                <tr>
                                    <td style="width: 7%; font-size: 15px;"></td>
                                    <td style="width: 23.25%;font-size: 15px;"></td>
                                    <td style="width: 23.25%;font-size: 15px;"></td>
                                    <td style="width: 23.25%;font-size: 15px;"></td>
                                    <td style="width: 23.25%;font-size: 15px;"></td>
                                </tr>
                                <tr>
                                    <td style="width: 7%; font-size: 15px;"></td>
                                    <td style="width: 23.25%;font-size: 15px;"></td>
                                    <td style="width: 23.25%;font-size: 15px;"></td>
                                    <td style="width: 23.25%;font-size: 15px;"></td>
                                    <td style="width: 23.25%;font-size: 15px;"></td>
                                </tr>
                                <tr>
                                    <td style="width: 7%; font-size: 15px;"></td>
                                    <td style="width: 23.25%;font-size: 15px;"></td>
                                    <td style="width: 23.25%;font-size: 15px;"></td>
                                    <td style="width: 23.25%;font-size: 15px;"></td>
                                    <td style="width: 23.25%;font-size: 15px;"></td>
                                </tr>
                                <tr>
                                    <td style="width: 7%; font-size: 15px;"></td>
                                    <td style="width: 23.25%;font-size: 15px;"></td>
                                    <td style="width: 23.25%;font-size: 15px;"></td>
                                    <td style="width: 23.25%;font-size: 15px;"></td>
                                    <td style="width: 23.25%;font-size: 15px;"></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="heading">
                            <h3​><b>IV.&nbsp;&nbsp;&nbsp;ផែនការសកម្មភាព</b></h3>
                        </div>

                        <div class="heading" style="text-indent:2.7rem;">
                            <h3​ style="font-weght:bold;">1.&nbsp;&nbsp;&nbsp;កាលវិភាគបណ្តុះបណ្តាល</h3>
                        </div>
                        <table class="staff_training_request" style="margin-left: 40px; margin-right: 20px;">
                            <tr>
                                <td style="width:7%; font-size:15px;">ល.រ</td>
                                <td style="width:25%; font-size:15px;">ចំនួនថ្ងៃ</td>
                                <td style="width:33%; font-size:15px;">មេរៀនបណ្តុះបណ្តាល</td>
                                <td style="width:33%; font-size:15px;">គ្រូបណ្តុះបណ្តាល/គ្រូបង្គោល</td>
                            </tr>
                            <tr>
                                <td style="width: 100%; font-size: 15px;" colspan="4" align="left">
                                    <p>ថ្ងៃ៖..............................................................</p>
                                </td>
                            </tr>
                        </table>
                        <div class="pdd-top-10px"></div>
                        <div class="footer" style="margin-top: 20px;">
                            <p​>&nbsp;&nbsp;គម្រោងស្នើសុំបណ្ដុះបណ្ដាល(Training Request Proposal)  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;TT-HRAD-RTP-FM-003-00</p>
                        </div> 

                        <table class="staff_training_request" style="margin-left: 40px; margin-right: 20px;">

                            <tr>
                                <td style="width: 7%; font-size: 15px;"></td>
                                <td style="width: 25%;font-size: 15px;"></td>
                                <td style="width: 33%;font-size: 15px;"></td>
                                <td style="width: 33%;font-size: 15px;"></td>
                            </tr>
                            <tr>
                                <td style="width: 7%; font-size: 15px;"></td>
                                <td style="width: 25%;font-size: 15px;"></td>
                                <td style="width: 33%;font-size: 15px;"></td>
                                <td style="width: 33%;font-size: 15px;"></td>
                            </tr>
                            <tr>
                                <td style="width: 7%; font-size: 15px;"></td>
                                <td style="width: 25%;font-size: 15px;"></td>
                                <td style="width: 33%;font-size: 15px;"></td>
                                <td style="width: 33%;font-size: 15px;"></td>
                            </tr>
                            <tr>
                                <td style="width: 7%; font-size: 15px;"></td>
                                <td style="width: 25%;font-size: 15px;"></td>
                                <td style="width: 33%;font-size: 15px;"></td>
                                <td style="width: 33%;font-size: 15px;"></td>
                            </tr>
                            <tr>
                                <td style="width: 7%; font-size: 15px;"></td>
                                <td style="width: 25%;font-size: 15px;"></td>
                                <td style="width: 33%;font-size: 15px;"></td>
                                <td style="width: 33%;font-size: 15px;"></td>
                            </tr>
                        </table>

                        <div class="pdd-top-10px"></div>
                        <div class="heading" style="text-indent:2.7rem;">
                            <h3​ style="font-weght:bold;">2.&nbsp; គម្រោងថវិកា</h3>
                        </div>
                        <table class="staff_training_request" style="margin-left: 45px; margin-right: 22px; width:646px">
                            <thead>
                                <tr>
                                    <td style="width:7% ; font-size:18px;">ល.រ</td>
                                    <td style="width:25%; font-size:18px;">ការពិពណ៌នា</td>
                                    <td style="width:17%; font-size:18px;">សម្ភារៈ</td>
                                    <td style="width:10%; font-size:18px;">ឯកតា</td>
                                    <td style="width:25%; font-size:18px;">តម្លៃក្នុងមួយឯកតា</td>
                                    <td style="width:15%; font-size:18px;">តម្លៃសរុប</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width:7% ; font-size:15px;">1</td>
                                    <td style="width:25%; font-size:15px;"></td>
                                    <td style="width:17%; font-size:15px;"></td>
                                    <td style="width:10%; font-size:15px;"></td>
                                    <td style="width:25%; font-size:15px;"></td>
                                    <td style="width:15%; font-size:15px;"></td>
                                </tr>
                                <tr>
                                    <td style="width:7% ; font-size:15px;">2</td>
                                    <td style="width:25%; font-size:15px;"></td>
                                    <td style="width:17%; font-size:15px;"></td>
                                    <td style="width:10%; font-size:15px;"></td>
                                    <td style="width:25%; font-size:15px;"></td>
                                    <td style="width:15%; font-size:15px;"></td>
                                </tr>
                                <tr>
                                    <td style="width:7% ; font-size:15px;">3</td>
                                    <td style="width:25%; font-size:15px;"></td>
                                    <td style="width:17%; font-size:15px;"></td>
                                    <td style="width:10%; font-size:15px;"></td>
                                    <td style="width:25%; font-size:15px;"></td>
                                    <td style="width:15%; font-size:15px;"></td>
                                </tr>
                                <tr>
                                    <td style="width:7% ; font-size:15px;">4</td>
                                    <td style="width:25%; font-size:15px;"></td>
                                    <td style="width:17%; font-size:15px;"></td>
                                    <td style="width:10%; font-size:15px;"></td>
                                    <td style="width:25%; font-size:15px;"></td>
                                    <td style="width:15%; font-size:15px;"></td>
                                </tr>
                                <tr>
                                    <td style="width:7% ; font-size:15px;">5</td>
                                    <td style="width:25%; font-size:15px;"></td>
                                    <td style="width:17%; font-size:15px;"></td>
                                    <td style="width:10%; font-size:15px;"></td>
                                    <td style="width:25%; font-size:15px;"></td>
                                    <td style="width:15%; font-size:15px;"></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td style="font-size:18px; border:none; colspan="5">សរុបចំណាយ</td>
                                    <td style="font-size:15px;"></td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="heading">
                            <h3​><b>IV.&nbsp;&nbsp;&nbsp;ការរំពឹងទុកពីការបញ្ចប់គម្រោង</b></h3>
                            <p style="margin-left: 40px;">....................................................................................................................................................</p>
                            <p style="margin-left: 40px;">....................................................................................................................................................</p>
                            <p style="margin-left: 40px;">....................................................................................................................................................</p>
                            <p style="margin-left: 40px;">....................................................................................................................................................</p>
                            <p style="margin-left: 40px;">..................................................................................................................................................<span>។</span></p>
                            <h3​><b>IV.&nbsp;&nbsp;&nbsp;សំណើ និង ការអនុម័ត</b></h3>
                            <p style="margin-left: 40px;">....................................................................................................................................................</p>
                            <p style="margin-left: 40px;">....................................................................................................................................................</p>
                            <p style="margin-left: 40px;">....................................................................................................................................................</p>
                            <p style="margin-left: 40px;">....................................................................................................................................................</p>
                            <p style="margin-left: 40px;">.................................................................................................................................................<span>។</span></p>
                        </div>
                        <h3 style="font-weght:bold; text-align: right; padding-right: 20px; padding-top: 50px;">អ្នកស្នើសុំ</h3>
                        <div class="footer" style="margin-top: 110px;">
                            <p​>&nbsp;&nbsp;គម្រោងស្នើសុំបណ្ដុះបណ្ដាល(Training Request Proposal)  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;TT-HRAD-RTP-FM-003-00</p>
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

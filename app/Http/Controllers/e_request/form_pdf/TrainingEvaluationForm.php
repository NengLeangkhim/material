<?php

namespace App\Http\Controllers\e_request\form_pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrainingEvaluationForm extends Controller
{
    public function TrainingEvaluationForm()
    {
    	$html='<html>
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/e_request/css.css">
        </head>
        <style>
        </style>
        <body>
            <div class="logo" style="margin-left:15px;">
                <img style="width: 170px; height: 100px;margin-top:-10px;" src="img/formimage/turbotech.png">
            </div>
             <div class="namecompany" style="text-align:center;margin-top:-117px;">
                <h1 style="font-size: 25px;">ក្រុមហ៊ុនធើបូថេក​​ ឯ.ក</h1><br>
                <h1 style="margin-top:-30px; font-size: 19px;">TURBOTECH CO., LTD</h1>
            </div>
            <br>
            <br>
            <br>
            <div class="title17">
                <h3>សំណួរសម្រាប់វាយតម្លៃវគ្គសិក្សា</h3><br>
            </div>
            <div class="row1_17">
                <p>សូមធ្វើការវាយតម្លៃដោយបង្ហាញនូវភាពស្មោះត្រង់ ក្នុងគោលបំណងធ្វើឲ្យវគ្គសិក្សាមានគុណភាពដោយ<br>
                គូសសញ្ញា ក្នុងប្រអប់ខាងក្រោម ដែលលេខនីមួយៗតំណាងឲ្យ៖</p><br>

                <div class="row2_17" style="margin-top:-35px;">
                <table style="border:none;">
                        <tr style="border:none;">
                            <td style="border:none;width:10%; font-size: 11pt;">១.&nbsp;អន់ណាស់</td>
                            <td style="border:none; width:10%;">២.&nbsp;អន់</td>
                            <td style="border:none;width:10%;">៣.&nbsp;មធ្យម</td>
                            <td style="border:none;width:10%;">៤.&nbsp;ល្អបង្គួរ</td>
                            <td style="border:none;width:10%;">៥.&nbsp;ល្អ</td>
                        </tr>
                </table>
                </div>
                <div class="row3_17" style="margin-top:-15px; font-size:14px;">
                    <p>ក. ការវាយតម្លៃទៅលើគ្រូសម្របសម្រួល</p><br>
                </div>
                <div class="row4_17" style="margin-top:-55px; font-size:13.5px;">
                    <p>១. តើគ្រូសម្របសម្រួល(Trainer) បានរៀបចំ និងបែងចែកមេរៀនគ្រប់ចំនួនដល់អ្នកចូលរួម(Trainees) ដែរឬទេ?</p>
                </div>
                <div class="row5_17" style="margin-top:-15px;font-size:14px;">
                    <table style="border:none;">
                            <tr style="border:none;">
                                <td style="border:none;width:5%;">១.&nbsp;<input type="checkbox"></td>
                                <td style="border:none; width:5%;">២.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៣.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៤.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៥.&nbsp;<input type="checkbox"></td>
                            </tr>
                    </table>
                </div>
                <div class="row5_17" style="margin-top:-15px;font-size:14px;">
                    <p>២. តើការស្លៀកពាក់របស់គាត់សមជាគ្រូសម្របសម្រួល(Trainer) ដែរឬទេ?</p>
                </div>
                <div class="row7_17" style="margin-top:-15px;font-size:14px;">
                    <table style="border:none;">
                            <tr style="border:none;">
                                <td style="border:none;width:5%;">១.&nbsp;<input type="checkbox"></td>
                                <td style="border:none; width:5%;">២.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៣.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៤.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៥.&nbsp;<input type="checkbox"></td>
                            </tr>
                    </table>
                </div>
                <div class="row8_17" style="margin-top:-15px;font-size:14px;">
                    <p>៣. តើភាសានិយាយរបស់គាត់អាចងាយយល់ដល់កម្រិតណា?</p>
                </div>
                <div class="row5_17" style="margin-top:-15px;font-size:14px;">
                    <table style="border:none;">
                            <tr style="border:none;">
                                <td style="border:none;width:5%;">១.&nbsp;<input type="checkbox"></td>
                                <td style="border:none; width:5%;">២.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៣.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៤.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៥.&nbsp;<input type="checkbox"></td>
                            </tr>
                    </table>
                </div>
                <div class="row9_17" style="margin-top:-15px;font-size:14px;">
                    <p>៤. តើអ្នកចូលរួម(Trainees)ពេញចិត្តនឹងការបង្រៀនរបស់គាត់(Trainer)ដល់កម្រិតណា?</p>
                </div>
                <div class="row10_17" style="margin-top:-15px;font-size:14px;">
                    <table style="border:none;">
                            <tr style="border:none;">
                                <td style="border:none;width:5%;">១.&nbsp;<input type="checkbox"></td>
                                <td style="border:none; width:5%;">២.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៣.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៤.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៥.&nbsp;<input type="checkbox"></td>
                            </tr>
                    </table>
                </div>
                <div class="row11_17" style="margin-top:-15px;font-size:14px;">
                    <p>៥. តើគ្រូសម្របសម្រួល(Trainer)បានរៀបចំមេរៀនបង្រៀនបានល្អដល់កម្រិតណា?</p>
                </div>
                <div class="row12_17" style="margin-top:-15px;font-size:14px;">
                    <table style="border:none;">
                            <tr style="border:none;">
                                <td style="border:none;width:5%;">១.&nbsp;<input type="checkbox"></td>
                                <td style="border:none; width:5%;">២.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៣.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៤.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៥.&nbsp;<input type="checkbox"></td>
                            </tr>
                    </table>
                </div>
                <div class="row13_17" style="margin-top:-15px; font-size:13.5px;">
                    <p>៦. តើគ្រូសម្របសម្រួល(Trainer)មានសកម្មភាពច្រើនក្នុងការជួយដល់អ្នកចូលរួម(Trainees)ល្អដល់កម្រិតណា?</p>
                </div>
                <div class="row14_17" style="margin-top:-15px;font-size:14px;">
                    <table style="border:none;">
                            <tr style="border:none;">
                                <td style="border:none;width:5%;">១.&nbsp;<input type="checkbox"></td>
                                <td style="border:none; width:5%;">២.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៣.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៤.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៥.&nbsp;<input type="checkbox"></td>
                            </tr>
                    </table>
                </div>
                <div class="row15_17" style="margin-top:-15px;font-size:14px;">
                    <p>៧. តើគ្រូសម្របសម្រួល(Trainer)លើកទឹកចិត្ត(Trainees)ដល់កម្រិតណា?</p>
                </div>
                <div class="row15_17" style="margin-top:-15px;font-size:14px;">
                    <table style="border:none;">
                            <tr>
                                <td style="border:none;width:5%;">១.&nbsp;<input type="checkbox"></td>
                                <td style="border:none; width:5%;">២.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៣.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៤.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៥.&nbsp;<input type="checkbox"></td>
                            </tr>
                    </table>
                </div>
                <div class="row17_17" style="font-size:14px;">
                    <p style="margin-top:5px;">សំណូមពរ៖</p><br>
                    <p style="margin-top:-37px;">...............................................................................................................................................................</p><br>
                    <p style="margin-top:-30px;">...............................................................................................................................................................</p><br>
                    <p style="margin-top:-30px;">.............................................................................................................................................................<span>។</span></p>
                </div>
                <div class="row18_17" style="margin-top:-30px; font-size:14px;">
                    <p>ខ. ការវាយតម្លៃទៅលើការរៀបចំរបស់នាយកដ្ឋានធនធានមនុស្ស និង រដ្ឋបាល</p><br>
                </div>
                <div class="row19_17" style="margin-top:-55px; font-size:13.5px;">
                    <p>១. សម្រាប់អាហារសម្រន់ តើអ្នកចូលរួម(Trainees)​ពេញចិត្តកម្រិតណា?</p>
                </div>
                <div class="row20_17" style="margin-top:-15px;font-size:14px;">
                    <table style="border:none;">
                            <tr style="border:none;">
                                <td style="border:none;width:5%;">១.&nbsp;<input type="checkbox"></td>
                                <td style="border:none; width:5%;">២.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៣.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៤.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៥.&nbsp;<input type="checkbox"></td>
                            </tr>
                    </table>
                </div>
                <div class="row21_17" style="margin-top:-15px;font-size:14px;">
                    <p>២. សម្រាប់ទីកន្លែងបណ្តុះបណ្តាល តើអ្នកចូលរួម(Trainees)ពេញចិត្តកម្រិតណា?</p>
                </div>
                <div class="row22_17" style="margin-top:-15px;font-size:14px;">
                    <table style="border:none;">
                            <tr style="border:none;">
                                <td style="border:none;width:5%;">១.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">២.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៣.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៤.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៥.&nbsp;<input type="checkbox"></td>
                            </tr>
                    </table>
                </div>
                <div class="row23_17" style="margin-top:-15px;font-size:14px;">
                    <p>៣. តើអ្នកចូលរួម(Trainees)ពេញចិត្តនឹងការរៀបចំរបស់ពួកគាត់ដល់កម្រិតណា?</p>
                </div>
                <div class="row24_17" style="margin-top:-15px;font-size:14px;">
                    <table style="border:none;">
                            <tr style="border:none;">
                                <td style="border:none;width:5%;">១.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">២.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៣.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៤.&nbsp;<input type="checkbox"></td>
                                <td style="border:none;width:5%;">៥.&nbsp;<input type="checkbox"></td>
                            </tr>
                    </table>
                </div>
                <div class="row25_17" style="font-size:14px;">
                    <p style="margin-top:5px;">សំណូមពរ៖</p><br>
                    <p style="margin-top:-37px;">...............................................................................................................................................................</p><br>
                    <p style="margin-top:-30px;">...............................................................................................................................................................</p><br>
                    <p style="margin-top:-30px;">.............................................................................................................................................................<span>។</span></p>
                </div>
            </div>
            <div class="footer17">
                <p>&nbsp;ទម្រង់វាយតម្លៃវគ្គបណ្តុះបណ្តាល (Training Evaluation Form) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                TT-HRAD-STDP-FM-008-00</p>
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
        $filename = 'TrainingEvaluationForm.pdf';

        // // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');
    }
}

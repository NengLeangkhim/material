<?php

namespace App\Http\Controllers\e_request\form_pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReceiveWorkLetter extends Controller
{
    public function ReceiveWorkLetter()
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
            <div class="logo" style="margin-left:20px;">
                <img style="width: 170px; height: 100px;margin-top:-10px;" src="img/formimage/turbotech.png">
            </div>
             <div class="namecompany" style="text-align:center;margin-top:-117px;">
                <h1 style="font-size: 25px;">ក្រុមហ៊ុនធើបូថេក​​ ឯ.ក</h1><br>
                <h1 style=" font-size: 19px;margin-top:-28px;">TURBOTECH CO., LTD</h1>
            </div>
            <br>
            <br>
            <div class="title19" style="margin-top:-37px; text-align:center;font-size:15px;">
                <h3>លិខិតប្រគល់ទទួលសម្ភារៈ</h3><br>
            </div>
            <div class="row1_19" style="font-size:15px;margin-left:20px;margin-right:20px;margin-top:-55px;">
                <p style="margin-left:50px;">ខ្ញុំបាទ/នាងខ្ញុំឈ្មោះ..............................................ធ្លាប់បានបម្រើការងារក្នុងតួនាទីជា.......................</p><br>
                <p style="margin-top:-35px;">..................................ប័ណ្ណសម្គាល់ខ្លួនលេខ........................នៅនាយកដ្ឋាន...................................នៃ ក្រុមហ៊ុន <br>
                ធើបូថេក ឯ.ក តាំងពីថ្ងៃទី...............ខែ................ឆ្នាំ.................លេខទូរស័ព្ទ............................។</p>
            </div>
            <div class="title19"  style="margin-top:-35px;text-align:center;font-size:15px;">
                <h3>សូមប្រគល់ការងារ/សម្ភារៈដូចខាងក្រោម</h3><br>
            </div>
            <table class="table" style="margin-top:-35px;margin-left: 20px; margin-right: 20px;">
                <tbody>
                    <tr>
                        <td style="padding:6px 15px;"><p>លរ</p></td>
                        <td style="padding:6px 90.4px;"><p>ឈ្មោះសម្ភារៈ/ការងារ</p></td>
                        <td style="padding:6px 20.5px;"><p>ចំនួន</p></td>
                        <td style="padding:6px 42px;"><p>ស្ថានភាពសម្ភារ</p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:4px 0px;"><p>១</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:4px 0px;"><p>២</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:4px 0px;"><p>៣</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:4px 0px;"><p>៤</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:4px 0px;"><p>៥</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:4px 0px;"><p>៦</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:4px 0px;"><p>៧</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:4px 0px;"><p>៨</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:4px 0px;"><p>៩</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:4px 0px;"><p>១០</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                </tbody>
            </table>
            <div class="title19" style="font-size:15px;text-align:center;margin-top:-10px;">
                <h3>ជូន</h3>
            </div>
            <div class="row2_19" style="font-size:15px;margin-left:20px;margin-right:2px;">
                <p style="margin-top:-20px;margin-left:50px;">កម្មករ-និយោជិកឈ្មោះ........................................................................&nbsp; &nbsp; &nbsp; តួនាទីជា.....................................</p><br>
                <p style="margin-top:-40px;">ប័ណ្ណសម្គាល់ខ្លួនលេខ.........................បច្ចុបន្បបម្រើការងារនៅនាយកដ្ឋាន............................<b>ក្រុមហ៊ុន ធើបូថេក ​ឯ.ក</b>
                តាំងពីថ្ងៃទី................. &nbsp; ខែ............... &nbsp; ឆ្នាំ...............&nbsp; &nbsp; លេខទូរស័ព្ទ........................&nbsp; &nbsp; ដោយមួលហេតុខ្ញុំបាទ/នាងខ្ញុំត្រូវ
                ...............................................................................ចាប់ពីថ្ងៃទី..............ខែ.............ឆ្នាំ............តទៅ។</p><br>
                <p style="margin-top:-38px;text-align:center;">កាលបរិច្ឆេទប្រគល់/ទទួលថ្ងៃទី...............ខែ..............ឆ្នាំ២០........</p>
            </div>
            <table class="table" style="border:none;margin-top:-10px;margin-left: 20px; margin-right: 20px;">
                <tbody style="border:none;">
                    <tr style="border:none;">
                        <td style="font-size:15px;border:none;padding:6px 40px;"><p><b>សេចក្តីបញ្ជាក់អ្នកដឹងឮ</p></td>
                        <td style="font-size:15px;border:none;padding:6px 30px;"><p><b>សេចក្តីបញ្ជាក់អ្នកទទួល</p></td>
                        <td style="font-size:15px;border:none;padding:6px 25px;"><p><b>ហត្ថលេខាអ្នក &nbsp;ប្រគល់</p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="border:none;padding:4px 0px;"><p>..........................................</p></td>
                        <td colspan="1" style="border:none;"><p></p>..........................................</td>
                        <td colspan="1" style="border:none;"><p></p></td>

                    </tr>
                    <tr>
                        <td colspan="1" style="border:none;padding:4px 0px;"><p>..........................................</p></td>
                        <td colspan="1" style="border:none;"><p></p>..........................................</td>
                        <td colspan="1" style="border:none;"><p></p>.......................................</td>

                    </tr>
                    <tr>
                        <td colspan="1" style="font-size:15px;border:none;padding:4px 0px;"><p><b>បុគ្គលិកផ្នែកធនធានមនុស្ស</p></td>
                        <td colspan="1" style="font-size:15px;border:none;"><p></p><b>ឈ្មោះ</b>.................................</td>
                        <td colspan="1" style="font-size:15px;border:none;"><p></p><b>ឈ្មោះ</b>.............................</td>

                    </tr>
                </tbody>
            </table>

            <div class="footer19">
                <p>&nbsp;ទម្រង់លិខិតប្រគល់/ទទួលការងារ &nbsp; &nbsp; ​&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                TT-HRAD-RTP-FM-003</p>
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
        $filename = 'ReceiveWorkLetter.pdf';

        // // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');
    }
}

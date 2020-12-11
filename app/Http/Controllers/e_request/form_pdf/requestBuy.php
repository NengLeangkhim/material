<?php

namespace App\Http\Controllers\e_request\form_pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class requestBuy extends Controller
{
    public function requestBuy()
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

            <br>
            <br>
            <div class="title20" style="margin-top:-45px; text-align:center;font-size:15px;">
                <h3>សូមគោរពេជូន</h3><br>
                <h3 style="margin-top:-30px;">លោកអគ្គនាយក</h3><br>
            </div>
            <div class="row2_20" style="font-size:15pxmargin-left:20px;margin-top:-10px;">
                <p  style="margin-top:-10px;"><b>កម្មវត្ថុ &nbsp; : &nbsp; &nbsp; &nbsp; សំណើសុំទិញ </b>.................................................................................................................</p><br>
                <p  style="margin-top:-10px;margin-bottom:-15px;"><b>យោង</b>&nbsp; : &nbsp; &nbsp; - លិខិតលេខ : ..................../............ ចុះថ្ងៃទី........ខែ.............ឆ្នាំ........ស្តីពី...................................................។</p><br>
                <p  style="margin-left:50px;margin-top:10px;">&nbsp; &nbsp;&nbsp; -.................................................................................................................................................................................។</p>
            </div>
            <div style="font-size:15px;margin-left:20px;margin-right:20px;">
                <p style="margin-left:75px; margin-top:-10px;">តបតាមកម្មវត្ថុ និងយោងខាងលើ ខ្ញុំសូមស្នើសុំ លោកអគ្គនាយក មេត្តាអនុញ្ញាតឲ្យខ្ញុំបាទ/</p><br>
                <p style="margin-left:50px;margin-top:-40px;">នាងខ្ញុំទិញ..................................................................................................ដោយសេចក្តីអនុគ្រោះ។</p>
            </div>
            <table class="table" style="margin-left: 20px; margin-right: 20px;">
                <tbody>
                    <tr style="background-color:#cceeff;">
                        <td rowspan="3" style="font-size:15px;padding:6px 15px;"><p><b>លរ</p></td>
                        <td rowspan="3"  style="font-size:15px;padding:6px 83px;"><p><b>បរិយាយ</p></td>
                        <td rowspan="3"  style="font-size:15px;padding:6px 5px;"><p><b>ចំនួន</p></td>
                        <td rowspan="1" colspan="4" style="font-size:13px;padding:6px 45px;"><p><b>ឈ្មោះក្រុមហ៊ុនដែលបានធ្វើសម្រង់តម្លៃ</p>


                    </tr>
                    <tr style="background-color:#cceeff;">
                        <td colspan="2" style="padding:5px 0px;"><p><input type="checkbox"> &nbsp; &nbsp;  &nbsp;.....................</p></td>
                        <td colspan="2"><p><input type="checkbox"> &nbsp; &nbsp;  &nbsp;.....................</p></td>
                    </tr>
                    <tr style="background-color:#cceeff;">
                        <td colspan="1"​ style="font-size:13px;padding:5px 0px;"><p></p>តម្លៃសរុប</td>
                        <td colspan="1" style="font-size:13px;"><p>តម្លៃឯកតា</p></td>
                        <td colspan="1" style="font-size:13px;"><p>តម្លៃសរុប</p></td>
                        <td colspan="1" style="font-size:13px;"><p>តម្លៃឯកតា</p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:5px 0px;"><p></p>1</td>
                        <td colspan="1"><p>.....................</p></td>
                        <td colspan="1"><p>.....</p></td>
                        <td colspan="1"><p>$......</p></td>
                        <td colspan="1"><p>$......</p></td>
                        <td colspan="1"><p>$......</p></td>
                        <td colspan="1"><p>$......</p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:5px 0px;"><p>2</p></td>
                        <td colspan="1"><p>.....................</p></td>
                        <td colspan="1"><p>.....</p></td>
                        <td colspan="1"><p>$......</p></td>
                        <td colspan="1"><p>$......</p></td>
                        <td colspan="1"><p>$......</p></td>
                        <td colspan="1"><p>$......</p></td>
                    </tr>
                    <tr>
                        <td colspan="3" style="padding:5px 0px;"><p>សរុប</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1" style="background-color:#f1f6f9;"><p><u>$......</p><u></p></td>
                        <td colspan="1" ><p></p></td>
                        <td colspan="1" style="background-color:#f1f6f9;"><p><u>$......</p><u></td>

                    </tr>
                </tbody>
            </table>
            <div class="row2_20" style="font-size:15px;margin-top:40px;font-size:15px;margin-left:20px;margin-right:2px;">
                <p style="margin-top:-20px;margin-left:90px;">អាស្រ័យដូចបានជម្រាបជូនខាងលើ សូម​ <b>លោកនាយក</b>មេត្តាពិនិត្យ និងសម្រេចដោយ </p><br>
                <p style="margin-top:-40px;margin-left:50px;">សេចក្តីអនុគ្រោះ។</p><br>
                <p style="margin-top:-30px;margin-left:90px;">សូម <b>លោកអគ្គនាយក</b> មេត្តាទទួលនូវសេចក្តីគោរពដ៏ខ្ពង់ខ្ពស់អំពីខ្ញុំ។</p>
            </div>
            <div class="lastrow15" style="font-size:15px;margin-right:20px;margin-top:-10px;">
                <p>ថ្ងៃ..........កើត/រោចខែ.............ឆ្នាំ................ព.ស ២៥៦....</p><br>
                <p style="margin-top:-38px;margin-right:55px;">....................ថ្ងៃទី..........ខែ.........ឆ្នាំ.........</p>
            </div>
            <table class="table" style="border:none;margin-top:-15px;margin-left: 100px; margin-right: 20px;">
                <tbody style="border:none;">
                    <tr style="border:none;">
                        <td style="font-size:15px;border:none;padding:6px 40px;"><p><b>អ្នកត្រួពិនិត្យ</p></td>
                        <td style="font-size:15px;border:none;padding:6px 30px;"><p> &nbsp; </p></td>
                        <td style="font-size:15px;border:none;padding:6px 40px;"><p>........(<b>តួនាទីអ្នកស្នើសុំ</b>)........</p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="font-size:15px;border:none;padding:5px 0px;"><p>&nbsp;</p></td>
                        <td colspan="1" style="font-size:15px;border:none;"><p>&nbsp; </p></td>
                        <td colspan="1" style="border:none;"><p>&nbsp;</p></td>
                    </tr>
                    <br>
                    <br>
                    <tr>
                        <td colspan="1" style="font-size:15px;border:none;padding:5px 0px;"><p>...................................................</p></td>
                        <td colspan="1" style="font-size:15px;border:none;"><p>&nbsp;</p></td>
                        <td colspan="1" style="font-size:15px;border:none;"><p>........(ឈ្មោះអ្នកស្នើសុំ)........</p></td>

                    </tr>

                </tbody>
            </table>
            <div class="footer6" style="margin-left:20px;margin-top:50px;">
                <h4 style="margin-left:60px;"><u>ជូនភ្ជាប់មកជាមួយ</h4><br>
                <p  style="margin-left:20px;margin-top:-40px;">១- ...................ចំនួន០១ ច្បាប់</p><br>
                <p  style="margin-left:20px;margin-top:-40px;">២- ..................ចំនួន០១ ច្បាប់</p><br>
                <p style="margin-left:20px;margin-top:-40px;">ឯកសារ-កាលប្បវត្តិ</p>
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
        $filename = 'requestBuy.pdf';

        // // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');
    }

}
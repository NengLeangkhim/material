<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class requestForm extends Controller
{
    public function requestForm()
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
            <div class="title1_7"><br>
                <h3>សូមគោរពជូន</h3><br>
                <h3 style="margin-top:-35px;">លោកអគ្គនាយក</h3>
            </div>
            <div class="row4_7" >
                <p><b>កម្មវត្ថុ :&nbsp;&nbsp; </b> &nbsp; &nbsp; &nbsp;<b> សំណើសុំជម្រះបុរេប្រទាន</b>........................................................................................</p><br>
                <p style="margin-top:-30px;"><b>យោង :&nbsp;&nbsp; </b> - &nbsp; &nbsp;លិខិតលេខ &nbsp;&nbsp;: ............/...........ចុះថ្ងៃទី.......ខែ..........ឆ្នាំ............ស្តីពី..............................................។</p><br>
                <p style="margin-top:-30px;margin-left:60px;">- &nbsp; &nbsp;..................................................................................................................................................................។</p>
            </div>
            <div class="row5_7">
                <p style="margin-top:-5px;margin-left:130px;">តបតាមវត្ថុ និងយោងខាងលើ ខ្ញុំបាទសុំស្នើអនុញ្ញាត្តិពី <b>លោកអគ្គនាយក</b> ដើម្បីស្នើសុំ</p><br>
                <p style="margin-top:-35px;margin-left:100px;">ទូទាត់ជម្រះបុរេប្រទានថវិកា សម្រាប់ចំណាំយលើការ.............................................<br>
                ដូចមានបរិយាយក្នុងសំណើសុំ និង វិក្កយបត្រលម្អិត ភ្ជាប់ជូនមកជាមួយ។</p>

            </div>
            <div class="row6_7">
                <ul>
                    <li>១-សរុបចំណាយជាក់ស្តែង  ចំនួន៖...................................</li>
                    <li>២-បុរេប្រទានថ្ងៃទី......./........./.........​ ចំនួន៖...................................</li>
                    <li>៣-<input type="checkbox"> ទឹកប្រាក់នៅសល់  <input type="checkbox"> ទឹកប្រាក់បំពេញបន្ថែម ចំនួន៖...................................<br>
                        &nbsp; &nbsp; &nbsp;
                    (ជាអក្សរ..................................................)</li>
                </ul>
            </div>
            <div class="row7_7">
                <p>ទូទាត់តាមរយៈ <input type="checkbox">​-សាច់ប្រាក់ <input type="checkbox">-មូលប្បទានប័ត្រ <input type="checkbox">-ផ្សេងៗ..............................។</p>
            </div>
            <div class="row8_7">
                <p style="margin-left:130px;margin-right:20px;">អាស្រ័យដូចបានជម្រាបជូនខាងលើ សូម លោកអគ្គនាយក មេត្តាពិនិត្យ និង</p><br>
                <p style="margin-left:100px;margin-right:20px;margin-top:-35px;">សម្រេចដោយក្តីអនុគ្រោះ។</p>
            </div>
            <div class="row9_7">
                <p>សូម <b>លោកអគ្គនាយក</b> មេត្តាទទួលនូវសេចក្តីគោរពដ៏ខ្ពង់ខ្ពស់អំពីខ្ញុំ។</p>
            </div>
            <div class="lastrow15" style="font-size:15px;margin-right:20px;margin-top:-10px;">
                <p>ថ្ងៃ..........កើត/រោចខែ.............ឆ្នាំ................ព.ស ២៥៦....</p><br>
                <p style="margin-top:-38px;margin-right:20px;">..................ថ្ងៃទី..........ខែ...............ឆ្នាំ............</p>
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
            <div class="footer7">
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<u><b>ជូនភ្ជាប់មកជាមួយ </b></u><br>
                <p  style="margin-left:20px;margin-top:-5px;">១-..................ចំនួន០១ ច្បាប់</p><br>
                <p  style="margin-left:20px;margin-top:-40px;">២-..................ចំនួន០១ ច្បាប់</p><br>
                <p  style="margin-left:20px;margin-top:-40px;">ឯកសារ-កាល</p><br>
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
        $filename = 'requestForm.pdf';

        // // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');
    }
}

<?php

namespace App\Http\Controllers\e_request\form_pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class warrantyLetter extends Controller
{
    public function warrantyletter()
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
             <div class="namecompany1_1" style="text-align:center;margin-top:-117px;">
                <h1 style="font-size: 25px;">ក្រុមហ៊ុនធើបូថេក​​ ឯ.ក</h1><br>
                <h1 style=" font-size: 19px;margin-top:-28px;">TURBOTECH CO., LTD</h1>
            </div>
            <div class="title1_1"  style="margin-top:30px;">
                <h1>លិខិតធានាអះអាង</h1>
            </div>
            <div class="row1_1">
                <p>ខ្ញុំបាទ/នាងខ្ញុំឈ្មោះ.....................................................................តួនាទីជា.....................................................</p>
            </div>
            <div class="row2_1">
                <p>ប័ណ្ណសម្គាល់ខ្លួនលេខ...................................បច្ចុប្បន្នកំពុងបម្រើការងារនៅនាយដ្ឋាន............................................<br>
                នៃ <b>ក្រុមហ៊ុន ធើបូថេក​ ឯ.ក</b> ទូរស័ព្ទលេខ..........................................................។</p>
            </div>
            <div class="title2_1">
                <h3>សូមគោរពជូន</h3><br>
                <h4>អគ្គនាយក ក្រុមហ៊ុន ធើបូថេក ឯ.ក</h4>
            </div>
            <div class="row3_1">
                <p><b>តាមរយៈ​ &nbsp;&nbsp;&nbsp; ៖</b>​&nbsp;&nbsp;&nbsp; នាយក នាយកដ្ឋាន..............................................................................................</p><br>
                <p style="margin-top:-37px;"><b>កម្មវត្ថុ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ៖ </b> &nbsp;&nbsp;  ស្តីពីការធានាអះអាងចំពោះការលាឈប់ពីការងាររបស់ខ្ញុំបាទ/នាងខ្ញុំ</p>
            </div>
            <div class="row4_1">
                <p style="text-align:center;margin-top:-15px;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                តបតាមកម្មវត្ថុខាងលើខ្ញុំបាទ/នាងខ្ញុំមានកិត្តិយសសូមគោរពនិងជម្រាបជូន <b>លោកអគ្គនាយក</b></p><br>
                <p style="margin-top:-35px;">មេត្តាជ្រាបថា ខ្ញុំបាទ/នាងខ្ញុំពិតជាមិនមានជាប់ពាក់ព័ន្ធ ឫ ការអនុវត្តប្រាស់ចាកគោលការណ៍ នីតិវិធី និង<br>
                ក្រមសីលធម៌ការងារ ដែលនាំឲ្យប៉ះពាល់ដល់ផលប្រយោជន៍ ឬ កេរ្តិ៍ឈ្មោះរបស់ <b>ធើបូថេក</b> ឡើយ។ ក្នុង<br>
                ករណីនៅថ្ងៃក្រោយបើ <b>ក្រុមហ៊ុន ធើបូថេក ឯ.ក </b>រកឃើញភ័ស្តុតាងដែលផ្ទុយពីការអះអាងខាងលើ <br>
                ខ្ញុំបាទ/នាងខ្ញុំសូមចូល ខ្លួនមកដោះស្រាយ និងទទួលខុសត្រូវចំពោះមុខច្បាប់ជាធរមាន។
                </p>
            </div>
            <div class="row6_1">
                <p>អាស្រ័យដូចបានគោរពជូនខាងលើសូម <b>លោកអគ្គនាយក</b>មេត្តាជ្រាបដ៏ខ្ពង់ ខ្ពស់។<br>
                សូម <b>លោកអគ្គនាយក</b>មេត្តាទទួលនូវការគោរពដ៏ខ្ពង់ខ្ពស់អំពីខ្ញុំបាទ/នាងខ្ញុំ។</p>
            </div>
            <div class="lastrow_1">
                <p>ធ្វើនៅថ្ងៃទី..............ខែ...............ឆ្នាំ២០...........<br>
                <b>ស្នាមមេដៃស្តាំឬហត្ថលេខាសាមីខ្លួន &nbsp;&nbsp; </b></p>
            </div>
            <div class="footer_1" style="margin-top:20px;">
                <p>ទម្រង់លិខិតធានាអះអាង​ &nbsp;  &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;  ​​&nbsp;  ​​&nbsp; &nbsp; &nbsp; &nbsp;​​&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;  ​​&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                TT-HRAD-RTP-FM-011-00</p>
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
        $filename = 'warrantyLetter.pdf';

        // // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');
    }
}

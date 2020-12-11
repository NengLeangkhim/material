<?php

namespace App\Http\Controllers\e_request\form_pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Request_form extends Controller
{
    public function Request_form()
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
                <h1 style=" font-size: 19px;margin-top:-30px;">TURBOTECH CO., LTD</h1>
            </div>
 
            <div class="title" style="margin-top:10px;">
                <h1>សំណើសុំឧបត្ថម្ភការសិក្សា</h1>
            </div>
            <div class="row1">
                <p>ខ្ញុំបាទ/នាងខ្ញុំឈ្មោះ....................................................មុខងារ.........................................បម្រើការងារ</p>
            </div>
            <div class="row2">
                <p>នាយកដ្ឋាន៖.......................................ផ្នែក៖.......................................នៃ <b>ធើបូថេក​ ឯ.ក។</b></p>
            </div>
            <div class="title2">
                <h3>សូមគោរពជូន</h3><br>
                <h4>លោកអគ្គនាយក នៃ ក្រុមហ៊ុន ធើបូថេក ឯ.ក</h4>
            </div>
            <div class="row3">
                <p><b>តាមរយៈ</b>​ ១...................................................................................</p><br>
                <p style="margin-left:55px;margin-top:-37px;">&nbsp;២...................................................................................</p><br>
                <p style="margin-top:-37px;"><b>កម្មវត្ថុ</b> &nbsp;&nbsp;&nbsp;  .....................................................................................</p>
            </div>
            <div class="row4">
                <p style="text-align:center;margin-top:-15px;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;តបតាមកម្មវត្ថុខាងលើខ្ញុំបាទ សូមអនុញ្ញាតជម្រាបជូនលោក <b>អគ្គនាយក</b> មេត្តាជ្រាបថា ដើម្បីបង្កើន</p><br>
                <p style="margin-top:-35px;"> គុណភាព និង​ ផលិតភាពការងារជាប្រយោជន៍របស់ក្រុមហ៊ុន ខ្ញុំបាទ/នាងខ្ញុំ ត្រូវការសិក្សាបន្ថែមតាមកម្មវត្ថុ<br>
                សិក្សាដូចខាងក្រោម៖
                </p>
            </div>
            <div class="list">
                <ul>
                    <li><i class="fad fa-caret-right"></i>ប្រធានបទសិក្សា  ៖..........................................................................................................</li>
                    <li><i class="fad fa-caret-right"></i>គ្រឹះស្ថានសិក្សា &nbsp;&nbsp;៖..........................................................................................................</li>
                    <li><i class="fad fa-caret-right"></i>កម្រិត  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ​​​​៖...........................................................................................................</li>
                    <li><i class="fad fa-caret-right"></i>តម្លៃសិក្សាសរុប &nbsp;៖$............................ជាអក្សរ(...........................................................)</li>
                    <li><i class="fad fa-caret-right"></i>កាលបរិច្ឆេទសិក្សាចាប់ពី៖  ថ្ងៃទី...........................ខែ.......................ឆ្នាំ.................ដល់ថ្ងៃទី.............<br>ខែ................ឆ្នាំ...............។</li>
                </ul>
            </div>
            <div class="row5">
                <p> &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;ដើម្បីបញ្ជាក់ពីភក្តីភាពចំពោះធើបូថេក ឯ.ក​ ខ្ញុំបាទ/នាងខ្ញុំសូមធានាអះអាងថា ក្រោយពីបញ្ចប់<br>
                ការសិក្សានេះ ខ្ញុំបាទ/នាងខ្ញុំ នឹងបម្រើការងារជូនក្រុមហ៊ុនរយៈពេល.............ខែ ដែលនឹងចាប់ផ្តើមគិតក្រោយបញ្ចប់ការសិក្សារបស់ខ្លួនតទៅ
                  ចាប់ពីថ្ងៃទី................ខែ..............ឆ្នាំ...........ដល់ថ្ងៃទី................ខែ...............ឆ្នាំ..........។
                  ក្នុងករណីទៅតាមអត្រាសមាមាត្រដែលនៅសល់ សម្រាប់ការចូលរួមវគ្គ បណ្តុះបណ្តាលខាងក្រៅនេះដោយគ្មានលក្ខខណ្ឌដើម្បីឲ្យស្របទៅតាមគោលការណ៍ និង សេចក្តីណែនាំ ស្តីពីការបណ្តុះបណ្តាល និង អភិវឌ្ឍន៍កម្មករ-និយោជិត។
                </p>
            </div>
            <div class="row6">
                <p>អាស្រ័យហេតុនេះសូម <b>អគ្គនាយក</b>មេត្តាពិនិត្យលទ្ធភាព និង អនុម័តដោយសេចក្តីអនុគ្រោះ។<br>
                សូម <b>អគ្គនាយក</b>មេត្តាទទួលនូវការគោរពដ៏ខ្ពង់ខ្ពស់អំពីខ្ញុំបាទ/នាងខ្ញុំ។</p>
            </div>
            <div class="lastrow">
                <p>រាជធានីភ្នំពេញ ថ្ងៃទី.........ខែ.........ឆ្នាំ...........<br><b>អ្នកស្នើសុំ</b>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;</p>
            </div>
            <div class="footer">
                <p>លិខិតស្នើសុំបណ្តុះបណ្តាលខាងក្រៅ(External Training Request) &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                TT-HRAD-STDP-FM-011-00</p>
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
        $filename = 'Request_form.pdf';

        // // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');
    }
}

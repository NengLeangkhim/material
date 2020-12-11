<?php

namespace App\Http\Controllers\e_request\form_pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FinishContractWorkLetter extends Controller
{
    public function FinishContractWorkLetter()
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

            <div class="title11" style="margin-top:10px;">
                <h3>លិខិតបញ្ចប់កិច្ចសន្យាការងារ</h3><br>
                <h3 style="margin-top:-30px;">អគ្គនាយក ក្រុមហ៊ុន ធើបូថេក ឯ.ក</h3><br>
                <h3 style="margin-top:-30px;">ជម្រាបមក</h3>
            </div>
            <div class="row1_11">
                <p style="text-align:right;margin-right:10px;margin-top:-5px;">កម្មករ-និយោជិកឈ្មោះ....................................អត្តសញ្ញាណប័ណ្ណការងារលេខ................មុខងារ</p><br>
                <p style="margin-top:-33px;">ជា...............................................បម្រើការងារនៅ..................................នៃ ក្រុមហ៊ុន ធើបូថេក ឯ.ក។</p>
            </div>
            <div class="row3_11">
                <p><b>កម្មវត្ថុ &nbsp; &nbsp; &nbsp;:</b>&nbsp;  ការបញ្ចប់កិច្ចសន្យាការងារ</p><br>                
                <p style="margin-top:-37px;"><b>យោង</b> &nbsp;&nbsp; &nbsp; : &nbsp; ................................................................................................................................<br>
                &nbsp;&nbsp;​ &nbsp; &nbsp; &nbsp;​ &nbsp; &nbsp; &nbsp;​ &nbsp; &nbsp;                
                .................................................................................................................................</p>
            </div>
            <div class="row4_11">
                <p style="text-align:center;margin-top:-5px;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                តបតាមកម្មវត្ថុ និង យោងខាងលើ ខ្ញុំសូមជម្រាបថា ក្រុមហ៊ុន ធើបូថេក ឯ.ក មិនបន្តកិច្ចសន្យា</p><br>
                <p style="margin-top:-35px;"> ការងាររបស់លោកតទៅទៀតទេ។ ដូច្នេះកិច្ចសន្យាការងាររបស់លោកត្រូវរំលាយតាមកាលបរិច្ឆេទដែល<br>
                មានប្រសិទ្ទភាពចាប់ពីថ្ងៃទី............ខែ..........ឆ្នាំ ២០២០ នេះតទៅ។ ដូចនេះសូមលោកប្រគល់ការងារ និង​<br>
                សម្ភារៈទាំងឡាយជូនធើបូថេកវិញ កាតព្វកិច្ចមួយចំនួនទៀត ដែលរកមិនទាន់ឃើញនៅក្នុងកំឡុងពេល <br>
                ប្រគល់/ទទួល ធើបូថេក និងកោះអញ្ជើញលោកមកពិភាក្សា និង ដោះស្រាយជាបន្តទៀត។
                </p>
            </div>
            <div class="row6_11">
                <p>អាស្រ័យហេតុនេះ សូមលោកសហការឲ្យបានប្រសើរ។</p>
            </div>
            <div class="lastrow11">
                <p>រាជធានីភ្នំពេញ ថ្ងៃទី.........ខែ.........ឆ្នាំ ២០២០<br>
                <b>អគ្គនាយក</b>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;</p>
            </div>           
            <div class="footer11">
                <h4>ចម្លងជូន :</h4><br>
                <p  style="margin-top:-30px;">-សមាជិកគណៈកម្មាធិការនាយក</p><br>
                <p  style="margin-top:-30px;">-នាយកដ្ឋានសវនកម្មផ្ទៃក្នុង</p><br>
                <p  style="margin-top:-30px;">-នាយកដ្ឋានសាមី</p><br>
                <h4 style="margin-top:-30px;">ដើម្បីជូនជ្រាបជាព័ត៌មាន</h4><br>
                <p style="margin-top:-30px;">ឯកសារ-</p>
            </div>
             <div class="footer2_11">
                <p>&nbsp;ទម្រង់លិខិតបញ្ចប់កិច្ចសន្យាការងារ &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                TT-HRAD-RTP-FM-008-00</p>
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
        $filename = 'FinishContractWorkLetter.pdf';

        // // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');
    }
}

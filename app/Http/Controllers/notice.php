<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class notice extends Controller
{
    public function notice()
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
            <div class="title1_6">
                <h3>សេចក្តីជូនដំណឹង</h3><br>
                <h3 style="margin-top:-30px;">ស្តីពី</h3>
            </div>
            <div class="row3_6">
                <p style="margin-left:20px;text-align:center;margin-right:20px;">.......................................................................................................................</p><br>
            </div>
            <div class="row4_6" >
                <p style="margin-top:-2px;"><b>យោង :&nbsp;&nbsp; </b>  - &nbsp; &nbsp;អនុស្សរណៈ និងលក្ខន្តិកៈរបស់​ ក្រុមហ៊ុន ធើបូថេក សឺលូសិន ឯ.ក។</p><br>
                <p style="margin-top:-30px;margin-left:60px;">- &nbsp; &nbsp;ប្រកាសលេខ : .................ចុះថ្ងៃទី.......ខែ..........ឆ្នាំ............ស្តីពី................................។</p><br>
                <p style="margin-top:-30px;margin-left:60px;">- &nbsp; &nbsp;លិខិតលេខ &nbsp;&nbsp;: ..................ចុះថ្ងៃទី.......ខែ..........ឆ្នាំ............ស្តីពី....................................។</p><br>
                <p style="margin-top:-30px;margin-left:60px;">- &nbsp; &nbsp;............................................................................................................................................។</p>
            </div>
            <div class="row5_6">
                <p style="margin-top:-5px;margin-left:125px;">សេចក្តីដូចយោងខាងលើ ខ្ញុំសូមជម្រាបជូន លោក-លោកស្រី ប្រធាននាយកដ្ឋាន </p><br>
                <p style="margin-top:-35px;margin-left:80px;">និងនិយោជិតគ្រប់លំដាប់ថ្នាក់ ជ្រាបថា៖ ក្រុមហ៊ុន ធើបូថេក សឺលូសិន ឯ.ក...............................<br>
                ..........................................................................................................................................។</p>
               
            </div>
            <div class="row6_6">
                <p style="margin-left:125px;margin-right:20px;">អាស្រ័យដូចបានជម្រាបជូនខាងលើ សូម លោក/លោកស្រី.....ជ្រាបជាព័ត៌មាន និង</p><br>
                <p style="margin-left:80px;margin-right:20px;margin-top:-35px;">ចាត់ចែងអនុវត្តតាមសេចក្តីជូនដំណឹងខាងលើនេះ ឲ្យមានប្រសិទ្ធភាពខ្ពស់បំផុត។</p>
            </div>

            <div class="lastrow_6">
                <p>ថ្ងៃ.................កើត/រោច ខែ............ឆ្នាំ...........ព.ស ២៥៦....</p><br> 
                <p style="margin-right:25px;margin-top:-35px;">......................ថ្ងៃទី..............ខែ...............ឆ្នាំ២០២....</p> <br>              
                <h3>អគ្គនាយក</h3>
            </div>
            <div class="footer6">
                <h4>ចម្លងជូន :</h4><br>
                <p  style="margin-left:20px;margin-top:-40px;">អគ្គនាយក</p><br>
                <h4 style="margin-left:60px;margin-top:-40px;">ដើម្បីជូនជ្រាបជាព័ត៌មាន</h4><br>
                <p  style="margin-left:20px;margin-top:-40px;">គ្រប់នាយកដ្ឋាន ពាក់ព័ន្ធ</p><br>
                <p  style="margin-left:20px;margin-top:-40px;">គ្រប់សាខា</p><br>
                <h4 style="margin-left:45px;margin-top:-40px;">ដើម្បីជូនជ្រាបជាព័ត៌មាន និងសហការអនុវត្ត</h4><br>
                <p style="margin-left:20px;margin-top:-40px;">ឯកសារ-</p>
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
        $filename = 'Notice.pdf';
    
        // // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');
    }    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Introduction extends Controller
{
    public function Introduction()
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
            <div class="title1_8">
                <br><br><h3>ជម្រាបជូន</h3><br>               
            </div>
            <div class="row3_8">     
                <h3>លោក-លោកស្រី..............ក្រុមហ៊ុន ធើបូ ថេក សឺលូសិន ឯ.ក</h3>          
            </div>
            <div class="row4_8" >
            <p><b>កម្មវត្ថុ :&nbsp;&nbsp; </b> &nbsp; &nbsp; &nbsp;<b>ស្តីពី</b>............................................................................................................................</p><br>
            <p style="margin-top:-30px;"><b>យោង :&nbsp;&nbsp; </b> - &nbsp;&nbsp; ........................................................................................................................................................................។</p><br>
            <p style="margin-top:-30px;margin-left:60px;">- &nbsp; ដើម្បីឲ្យ..........................................................................................................................................................។</p>
            </div>
            <div class="row5_8">
                <p style="margin-top:-5px;margin-left:125px;">តបតាមកម្មវត្ថុ និងយោងខាងលើ ខ្ញុំសូមជម្រាបជូន​ លោក-លោកស្រី ................ជ្រាបថា</p><br>
                <p style="margin-top:-35px;margin-left:80px;">......................................................................................................................................................ដូចខាងក្រោម៖<br>
                ១- &nbsp; &nbsp; &nbsp; .................................................................................................................................................................។<br>
                ២- &nbsp; &nbsp;&nbsp; ..................................................................................................................................................................។<br>
                ៣- &nbsp; &nbsp;&nbsp; តាមចំណុច​ ១ និង ២ ខាងលើ លោក-លោកស្រី...........ត្រូវ...................................................។</p>
               
            </div>
            <div class="row6_8">
                <p style="margin-left:125px;margin-right:20px;">អាស្រ័យដូចបានជម្រាបជូនខាងលើ សូម លោក/លោកស្រី.....ជ្រាបជាព័ត៌មាន និង</p><br>
                <p style="margin-left:80px;margin-right:20px;margin-top:-35px;">ចាត់ចែងអនុវត្តតាមសេចក្តីណែនាំខាងលើនេះ ឲ្យមានប្រសិទ្ធភាពខ្ពស់បំផុត ចាប់ពីថ្ងៃទី.......<br>
                ខែ........ឆ្នាំ..............ឬ ចាប់ពីថ្ងៃទីចុះហត្ថលេខានេះ តទៅ។</p>
            </div>

            <div class="lastrow_8">
                <p>ថ្ងៃ.................កើត/រោច ខែ............ឆ្នាំ...........ព.ស ២៥៦....</p><br> 
                <p style="margin-right:25px;margin-top:-35px;">......................ថ្ងៃទី..............ខែ...............ឆ្នាំ២០២....</p> <br>              
                <h3>អគ្គនាយក</h3>
            </div>
            <div class="footer8">
                <h4>ចម្លងជូន :</h4><br>
                <p  style="margin-left:20px;margin-top:-30px;">អគ្គនាយក</p><br>
                <h4 style="margin-left:60px;margin-top:-30px;">-ដើម្បីជូនជ្រាបជាព័ត៌មាន</h4><br>
                <p  style="margin-left:20px;margin-top:-30px;">គ្រប់នាយកដ្ឋាន ពាក់ព័ន្ធ</p><br>
                <p  style="margin-left:20px;margin-top:-30px;">..................................................................</p><br>
                <h4 style="margin-left:20px;margin-top:-25px;">ដើម្បីជូនជ្រាបជាព័ត៌មាន និងសហការអនុវត្ត</h4><br>
                <p style="margin-left:20px;margin-top:-30px;">ឯកសារ-</p>
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
        $filename = 'Introduction.pdf';
    
        // // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');
    } 
}

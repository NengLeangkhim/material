<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Decision extends Controller
{
    public function Decision()
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
            <div class="title1_9">
                <h3>សេចក្តីសម្រេច</h3><br>
                <h3 style="margin-left:20px;margin-top:-35px;">ស្តីពី</h3>
            </div>
            <div class="row4_9" >
            <p><b>ការធ្វើវិសោធនកម្ម</b>...................................................................................</p>   
            </div>
            <div class="row5_9">
                <p style="margin-top:-5px;">បានឃើញអនុស្សរណៈ និងលក្ខន្តិកៈរបស់ ក្រុមហ៊ុន ធើបូ ថេក សឺលូសិន ឯ.ក។</p><br>
                <p style="margin-top:-35px;">...........................................................................................................................................................................។<br>
                ...........................................................................................................................................................................។</p>
            </div>
            <div class="title2_9">
                <h3>សម្រេច</h3><br>               
            </div>
            <div class="row6_9">
                <ul>
                    <li><b>ប្រការ ១ -</b>  ធ្វើវិសោធនកម្ម......................................................................................................................................។</li>
                    <li><b>ប្រការ ២ -</b> ​ សេចក្តីសម្រេចណាដែលមានខ្លឹមសារផ្ទុយពីសេចក្តីសម្រេចនេះ ចាត់ទុកជានិរាករណ៍។</li>
                    <li><b>ប្រការ ៣ -</b>  និយោជិតទាំងអស់ នៃក្រុមហ៊ុន ធើបូ​ ថេក សឺលូសិន ឯ.ក ត្រូវអនុវត្តតាមសេចក្តីសម្រេច<br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                        នេះ ឲ្យបានត្រឹមត្រូវ និងមានប្រសិទ្ធភាពបំផុត។</li>
                    <li><b>ប្រការ ៤ -</b> ​ សេចក្តីសម្រេចនេះ មានប្រសិទ្ធភាព ចាប់ពីថ្ងៃទី.......ខែ.....ឆ្នាំ.......ឬ ចាប់ពីថ្ងៃទីចុះ<br>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    ហត្ថលេខានេះ តទៅ។</li>
                </ul>
            </div>
          
            <div class="lastrow_9">
            <p>ថ្ងៃ.................កើត/រោច ខែ............ឆ្នាំ...........ព.ស ២៥៦....</p><br> 
            <p style="margin-right:25px;margin-top:-35px;">......................ថ្ងៃទី..............ខែ...............ឆ្នាំ២០២....</p> <br>              
            <h3>អគ្គនាយក</h3>
            </div>
            <div class="footer9">
                <h4>កន្លែងទទួល :</h4><br>
                <p  style="margin-left:20px;margin-top:-30px;">ដូចប្រការ ៣ ខាងលើ</p><br>
                <h4 style="margin-left:20px;margin-top:-25px;">-ដើម្បីជូនជ្រាបជាព័ត៌មាន និងសហការអនុវត្ត</h4><br>
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
        $filename = 'Decision.pdf';

        // // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');
    }
}

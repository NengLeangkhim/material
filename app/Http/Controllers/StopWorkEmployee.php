<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StopWorkEmployee extends Controller
{
    public function StopWorkEmployee()
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
                <h1 style="font-size: 25px;">ក្រុមហ៊ុនធើបូថេក​​ ឯ.ក</h1>
                <h1 style=" font-size: 19px;">TURBOTECH CO., LTD</h1>
            </div>
            <br>
            <br>
            <div class="title13">
                <h3>សេចក្តីជូនដំណឹង</h3><br>
                <h3 style="margin-top:-30px;">ស្តីពី</h3><br>
                <h3 style="margin-top:-30px;">ការបញ្ឈប់ការងារបុគ្គលិក</h3>
            </div>
            <div class="row1_13">
                <p style="text-align:center;margin-top:-5px;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                គណៈកម្មាធិការធនធានមនុស្ស នៃ <b>ក្រុមហ៊ុន ធើបូថេក ឯ.ក</b> មានកិត្តិយសសូបជម្រាបជូនដំណឹង</p><br>
                <p style="margin-top:-35px;"> ដល់សាធារណជន និង​ កម្មករ-និយោជិកទាំងអស់មេត្តាជ្រាបថា កម្មករ-និយោជិក ឈ្មោះ.........................<br>
                អត្តសញ្ញាណប័ណ្ណការងារលេខ................................មុខងារជា........................................................បម្រើការងារនៅ<br>
                នាយកដ្ឋាន................................នៃ <b>ក្រុមហ៊ុន ធើបូថេក ឯ.ក</b> ត្រូវបានបញ្ចប់ពីការងារជាស្ថាពរ ចាប់ពីថ្ងៃទី<br>
                ...............ខែ.....................ឆ្នាំ ២០២០ នេះតទៅដោយសារមូលហេតុ៖
                </p>
            </div>
            <div class="row2_13">
                <ul>
                    <li>1. ................................................................................................</li>
                    <li>2. ................................................................................................</li>
                    <li>3. ................................................................................................</li>
                </ul>
            </div>
            <div class="row4_13">
                <p style="text-align:center;margin-top:-5px;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                រាល់សកម្មភាពទាំងឡាយ ដែលកម្មករ-និយោជិកមានឈ្មោះខាងលើប្រព្រឹត្ត ចាប់ពីថ្ងៃជូនដំណឹងនេះ</p><br>
                <p style="margin-top:-35px;"> តទៅ មិនមែនក្នុងនាមជាកម្មករ-និយោជិករបស់​ <b>ក្រុមហ៊ុន ធើបូថេក ឯ.ក</b> ទៀតឡើយ។<br></p>
            </div>
            <div class="row6_13">
                <p>អាស្រ័យហេតុនេះ សូមសាធារណជន និង កម្មករ-និយោជិកទាំងអស់ជ្រាបជាព័ត៌មាន។</p><br>
                <p style="margin-top:-35px;">ធើបូថេកសូមថ្លែងអំណគុណយ៉ាងជ្រាលជ្រៅបំផុត  ចំពោះលោកដែលបានចូលរួម</p><br>
                <p style="margin-left:-60px;margin-top:-35px;">បម្រើការងារជូន ធើបូថេក ក្នុងពេលកន្លងមក។</p>
            </div>
            <div class="lastrow13">
                <p>រាជធានីភ្នំពេញ ថ្ងៃទី.........ខែ.........ឆ្នាំ ២០២០<br>
                <b>ប្រធានគណៈកម្មាធិការធនធានមនុស្ស</b>
                &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;</p>
            </div>           
            <div class="footer13">
                <h4>ចម្លងជូន :</h4><br>
                <p  style="margin-top:-30px;">-សមាជិកគណៈកម្មាធិការនាយក</p><br>
                <p  style="margin-top:-30px;">-នាយកដ្ឋានសវនកម្មផ្ទៃក្នុង</p><br>
                <p  style="margin-top:-30px;">-នាយកដ្ឋានសាមី</p><br>
                <h4 style="margin-top:-30px;">ដើម្បីជូនជ្រាបជាព័ត៌មាន</h4><br>
                <p style="margin-top:-30px;">ឯកសារ-</p>
            </div>
             <div class="footer2_13">
                <p>&nbsp;ទម្រង់លិខិតអនុញ្ញាតឲ្យលាឈប់ &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                TT-HRAD-RTP-FM-005-00</p>
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
        $filename = 'StopWorkEmployee.pdf';

        // // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class inviteLetter extends Controller
{
    public function inviteLetter()
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
            <div class="title3_4">
                <br><h3>លិខិតអញ្ជើញ</h3>
            </div>
            <div class="row3_4">
                <p style="text-align:right;margin-right:40px;">.............................................................សូមអញ្ជើញ លោក/លោកស្រី...........តួនាទីជា......................</p><br>
                <p style="margin-left:20px;margin-right:20px;margin-top:-35px;">នៅ....................................ដើម្បីចូលរួមពិភាក្សា និងដោះស្រាយលើ.................នៅថ្ងៃទី..........ខែ...........ឆ្នាំ.........<br>
                វេលាម៉ោង.............នៅក្រុមហ៊ុន ធើបូ ថេក​ សឺលូសិន ឯ.ក​ ដែលមានអាសយដ្ឋាន អគារលេខ៦ ផ្លូវ២៩៨ <br>
                សង្កាត់បឹងកក់ទី២ ខណ្ឌទួលគោក រាជធានីភ្នំពេញ។</p>                
            </div>
            <div class="row4_4">
                <p style="margin-left:90px;margin-right:20px;">អាស្រ័យដូចបានជម្រាបជូនខាងលើ សូម លោក/លោកស្រី.....មេត្តាអញ្ជើញចូលរួមតាមការ</p><br>
                <p style="margin-left:20px;margin-right:20px;margin-top:-35px;">កំណត់កុំបីខាន ​ឬ ដោយសេចក្តីអនុគ្រោះ។</p>
            </div>
            <div class="lastrow_4">
                <p>ថ្ងៃ.................កើត/រោច ខែ............ឆ្នាំ...........ព.ស ២៥៦....</p><br> 
                <p style="margin-right:25px;margin-top:-40px;">......................ថ្ងៃទី..............ខែ...............ឆ្នាំ២០២....</p> <br>              
                <h3>អគ្គនាយក</h3>
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
        $filename = 'InviteLetter.pdf';
    
        // // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');
    }    
}

<?php

namespace App\Http\Controllers\e_request\form_pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class inviteMeetingLetter extends Controller
{
    public function inviteMeetingLetter()
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
            <div class="title4_5">
                <br><h3>លិខិតអញ្ជើញ</h3>
            </div>
            <div class="row3_5">
                <p style="text-align:right;margin-right:40px;">........................................................សូមអញ្ជើញ លោក/លោកស្រី...........ដើម្បីចូលរួមប្រជុំ......................</p><br>
                <p style="margin-left:20px;margin-right:20px;margin-top:-35px;">...........................................ដែលនឹងប្រព្រឹត្តទៅនៅថ្ងៃទី..........ខែ...........ឆ្នាំ.........វេលាម៉ោង...................នៅ.........
                <br>..............................................................................................................................................................................។</p>                
            </div>
            <div class="row4_5" >
               <h4>របៀបវារៈនៃកិច្ចប្រជុំ</h4><br>
               <p style="margin-top:-30px;">១. &nbsp; &nbsp; &nbsp;...............................................</p><br>
               <p style="margin-top:-30px;">២. &nbsp; &nbsp; &nbsp;...............................................</p><br>
               <p style="margin-top:-30px;">៣. &nbsp;&nbsp; &nbsp;...............................................</p><br>
               <p style="margin-top:-30px;">................................................</p>
            </div>
            <div class="row5_5">
                <p style="margin-left:60px;margin-right:20px;">អាស្រ័យដូចបានជម្រាបជូនខាងលើ សូម លោក/លោកស្រី.....មេត្តាអញ្ជើញចូលរួមតាមការ</p><br>
                <p style="margin-left:20px;margin-right:20px;margin-top:-35px;">កំណត់កុំបីខាន ​ឬ ដោយសេចក្តីអនុគ្រោះ។</p>
            </div>
            <div class="lastrow_5">
                <p>ថ្ងៃ.................កើត/រោច ខែ............ឆ្នាំ...........ព.ស ២៥៦....</p><br> 
                <p style="margin-right:25px;margin-top:-35px;">......................ថ្ងៃទី..............ខែ...............ឆ្នាំ២០២....</p> <br>              
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
        $filename = 'InviteMeetingLetter.pdf';
    
        // // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');
    }    
}

<?php

namespace App\Http\Controllers\e_request\form_pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProtestLetter extends Controller
{
    public function ProtestLetter()
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

            <div class="title14"  style="margin-top:20px;">
                <h3>លិខិតតវ៉ា</h3><br>
            </div>
            <div class="row1_14">
                <table style="border:none;margin-top:10px;">
                    <tr style="border:none;">
                        <td style="border:none;">កាលបរិច្ឆេទដាក់ពាក្យតវ៉ា</td>
                        <td style="border:none;padding-left:18.3%;">៖ .......................................................................................................</td>
                    </tr>                   
                </table>
                <table style="border:none;margin-top:10px;">
                    <tr style="border:none;">
                        <td style="border:none;">ឈ្មោះអ្នកតវ៉ា <i>(មិនបញ្ជាក់ក៏បាន)</i></td>
                        <td style="border:none;padding-left:11.2%;">៖ .......................................................................................................</td>
                    </tr>                   
                </table>
                <table style="border:none;margin-top:10px;">
                    <tr style="border:none;">
                        <td style="border:none;">សូមតវ៉ាចំពោះលោក/លោកស្រី</td>
                        <td style="border:none;padding-left:12.5%;">៖ ......................................................................................................</td>
                    </tr>                   
                </table>
                <table style="border:none;margin-top:10px;">
                    <tr style="border:none;">
                        <td style="border:none;">តួ&nbsp;&nbsp;នាទី</td>
                        <td style="border:none;padding-left:36.5%;">៖ ......................................................................................................</td>
                    </tr>                   
                </table>
                <table style="border:none;margin-top:10px;">
                    <tr style="border:none;">
                        <td style="border:none;">បម្រើការងារនៅ</td>
                        <td style="border:none;padding-left:27.8%;">៖ ......................................................................................................</td>
                    </tr>                   
                </table>
                <table style="border:none;margin-top:10px;">
                    <tr style="border:none;">
                        <td style="border:none;">ផ្នែកត្រូវតវ៉ា</td>
                        <td style="border:none;padding-left:32%;">៖ <input type="checkbox">ការគ្រប់គ្រង​ <input type="checkbox">សេវាកម្ម <input type="checkbox">ផ្សេងៗ.................................</td>
                    </tr>
                </table> 
                <table style="border:none;">   
                    <tr style="border:none;">
                        <td style="border:none;"></td>
                        <td style="border:none;padding-top:10px;padding-left:44%;">..................................................................................</td>
                    </tr>                  
                </table>
                <table style="border:none;margin-top:10px;">
                    <tr >
                        <td style="border:none;">ចំណុចត្រូវតវ៉ា</td>
                        <td style="border:none;padding-left:29%;">១ .......................................................................................................</td>
                    </tr>   
                    <br>
                    <tr style="border:none;">
                        <td style="border:none;"></td>
                        <td style="border:none;padding-top:10px;padding-left:29%;">២ .......................................................................................................</td>
                    </tr> 
                    <br>
                    <tr style="border:none;">
                        <td style="border:none;padding-top:10px;"></td>
                        <td style="border:none;padding-top:10px;padding-left:29%;">៣ ......................................................................................................</td>
                    </tr>                 
                </table>
                <table style="border:none;margin-top:10px;">
                    <tr style="border:none;">
                        <td style="border:none;">បរិយាយបញ្ហាបន្ថែម</td>
                        <td style="border:none;padding-left:23%;">៖ .......................................................................................................</td>
                    </tr>                   
                </table>
                <p style="margin-top:5px;">            
                    ...................................................................................................................................................<br>
                    .............................................................................................................................................................................................។
                </p><br>
                <table style="border:none;margin-top:-28px;">
                    <tr style="border:none;">
                        <td style="border:none;">សូមចាត់វិធានដូចតទៅ</td>
                        <td style="border:none;padding-left:20.5%;">៖ ......................................................................................................</td>
                    </tr>                   
                </table>
                <p style="margin-top:5px;">                   
                    ...................................................................................................................................................<br>
                    .............................................................................................................................................................................................។
                </p><br>
            <div>
                <p style="margin-top:-30px;font-style:italic;font-size:14px;">បញ្ជាក់៖ កម្មករ-និយោជិកអាចប្រើទម្រង់ផ្សេង ឬ មិនបញ្ចេញឈ្មោះក៏បានតាមការជាក់ស្តែងរបស់ខ្លួន</p>
            </div>
             <div class="footer14">
                <p>&nbsp;ទម្រង់លិខិតត្អូញត្អែរ (Staff Complaint Form) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                TT-HRAD-SCPP-FM-001-00</p>
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
        $filename = 'ProtestLetter.pdf';

        // // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');
    }
}

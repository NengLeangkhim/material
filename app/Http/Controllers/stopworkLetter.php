<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class stopworkLetter extends Controller
{
    public function stopworkLetter()
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
             <div class="namecompany_2" style="text-align:center;margin-top:-117px;">
                <h1 style="font-size: 25px;">ក្រុមហ៊ុនធើបូថេក​​ ឯ.ក</h1>
                <h1 style=" font-size: 19px;">TURBOTECH CO., LTD</h1>
            </div>
            <br>
            <br>
            <div class="title_2">
                <h1>លិខិតសុំលាឈប់ពីការងារ</h1>
            </div>
            <div class="row1_2">
            <p>ខ្ញុំបាទ/នាងខ្ញុំឈ្មោះ.....................................................................តួនាទីជា.....................................................</p>
            </div>            
            <div class="row2_2">
                <p>ប័ណ្ណសម្គាល់ខ្លួនលេខ...................................បច្ចុប្បន្នកំពុងបម្រើការងារនៅនាយដ្ឋាន............................................<br>
                នៃ <b>ក្រុមហ៊ុន ធើបូថេក​ ឯ.ក</b> លេខទូរស័ព្ទ..........................................................។</p>
            </div>
            <div class="title2_2">
                <h3>សូមគោរពជូន</h3><br>
                <h4>អគ្គនាយក ក្រុមហ៊ុន ធើបូថេក ឯ.ក</h4>
            </div>
            <div class="row3_2">
                <p><b>តាមរយៈ</b>&nbsp;&nbsp;&nbsp;&nbsp;- លោក នាយក នាយកដ្ឋានធនធានមនុស្ស និង​ រដ្ឋបាល</p><br>
                <p style="margin-left:55px;margin-top:-37px;">&nbsp;&nbsp;&nbsp;&nbsp;- លោក.............................................................................................</p><br>
                <p style="margin-top:-37px;"><b>កម្មវត្ថុ</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;៖ &nbsp; សំណើសុំលាឈប់ពីការងារចាប់ពីថ្ងៃទី............ខែ.........ឆ្នាំ២០...........នេះតទៅ។</p><br>
                <p style="margin-top:-37px;"><b>មូលហេតុ</b> &nbsp;&nbsp;៖&nbsp;&nbsp; .........................................................................................................................................................................<br>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;..................................................................................................................................</p>

            </div>
     
            <div class="row6_2">
                <p> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;  អាស្រ័យដូចបានគោរព និង​​ ជម្រាបជូនខាងលើសូម <b>លោកអគ្គនាយក</b>មេត្តាអនុញ្ញាតឲ្យខ្ញុំ</p><br>
                <p style="margin-top:-40px;margin-left:-50px;">បាទ/នាងខ្ញុំបានឈប់ពីការងារដោយសេចក្តីអនុគ្រោះ។</p><br>
                <p style="margin-top:-40px;"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; សូម <b>លោកអគ្គនាយក</b> មេត្តាទទួលនូវការគោរពដ៏ខ្ពង់ខ្ពស់អំពីខ្ញុំបាទ/នាងខ្ញុំ។</p>
            </div>
            <div class="lastrow_2">
                <p>ធ្វើនៅថ្ងៃទី.........ខែ.........ឆ្នាំ...........</p><br>                
                <p style="margin-right:20px;margin-top:-40px;">ហត្ថលេខាសាមីខ្លួន</p>
            </div>
  
            <table class="table" style="border:none;margin-left: 20px; margin-right: 20px;">
                <tbody style="border:none;">
                    <tr style="border:none;">
                        <td style="font-size:15px;border:none;padding:6px 30px;text-align:center;"><p><b>នាយក ​នាយកដ្ឋានធនធាន</p></td>
                        <td style="font-size:15px;border:none;padding:6px 30px;text-align:center;"><p> <b>នាយក នាយកដ្ឋានសាមី</p></td>
                        <td style="font-size:15px;border:none;padding:6px 40px;"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="font-size:15px;border:none;padding:5px 0px;text-align:center;"><p><b>មនុស្ស និង​ រដ្ឋបាល</p></td>
                        <td colspan="1" style="font-size:15px;border:none;"><p>..........................................</p></td>
                        <td colspan="1" style="border:none;"><p></p></td>

                    </tr>
                    <tr>
                        <td colspan="1" style="font-size:15px;border:none;padding:5px 0px;"><p>..........................................</p></td>
                        <td colspan="1" style="font-size:15px;border:none;"><p>..........................................</p></td>
                        <td colspan="1" style="font-size:15px;border:none;"><p></p></td>

                    </tr>
                    <tr>
                        <td colspan="1" style="font-size:15px;border:none;padding:5px 0px;"><p>..........................................</p></td>
                        <td colspan="1" style="font-size:15px;border:none;"><p></p>..........................................</td>
                        <td colspan="1" style="font-size:15px;border:none;">&nbsp; &nbsp; &nbsp;<p>ឈ្មោះ........................................</p></td>

                    </tr>
                    <tr>
                        <td colspan="1" style="font-size:15px;border:none;padding:5px 0px;"><p>..........................................</p></td>
                        <td colspan="1" style="font-size:15px;border:none;"><p>..........................................</p></td>
                        <td colspan="1" style="font-size:15px;border:none;"><p></p>&nbsp;</td>

                    </tr>
                </tbody>
            </table>
                
            <div class="footer_2">
                <p>ទម្រង់លិខិតសុំលាឈប់ពីការងារ &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                TT-HRAD-RTP-FM-001-00</p>
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
        $filename = 'stopworkLetter.pdf';

        // // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');
    }
}

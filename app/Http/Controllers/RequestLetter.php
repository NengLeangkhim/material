<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestLetter extends Controller
{
    public function RequestLetter()
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
            <br>
            <br>
            <div class="title20" style="margin-top:-40px; text-align:center;font-size:15px;">
                <h3>លិខិតស្នើសុំ</h3><br>
            </div>
            <div class="row1_20" style="font-size:15px;margin-left:20px;margin-right:20px;margin-top:-55px;">
                <p style="margin-left:50px;">ខ្ញុំបាទ/នាងខ្ញុំឈ្មោះ..................................................ឈ្មោះឡាតាំង..............................................តួនាទី</p><br>
                <p style="margin-top:-35px;">ជា...............................................ថ្ងៃខែឆ្នាំកំណើតថ្ងៃទី............ ខែ........... ឆ្នាំ.................. ប័ណ្ណសម្គាល់ខ្លួនលេខ<br>
                .............................................បម្រើការងារនៅនាយកដ្ឋាន.......................................នៃ <b>ក្រុមហ៊ុន ធើបូថេក ឯ.ក</b>
                លេខទូរស័ព្ទ..................................................................។</p>
            </div>
            <div class="title20"  style="margin-top:-35px;text-align:center;font-size:15px;">
                <h3>សូមគោរពជូន</h3><br>
                <h3 style="margin-top:-39px;font-size:15px;">លោកនាយក នាយកដ្ឋានធនធានមនុស្ស និង​ រដ្ឋបាល នៃ ក្រុមហ៊ុន ធើបូថេក ឯ.ក</h3><br>
            </div>
            <div class="row2_20" style="font-size:15px;margin-top:-50px;margin-left:20px;">
                <p><b>តាមរយៈ</b>&nbsp; &nbsp; លោកនាយក នាយកដ្ឋាន.............................................</p><br>
                <p  style="margin-top:-30px;"><b>កម្មវត្ថុៈ</b> &nbsp; &nbsp; &nbsp; សំណើរសុំ <input type="checkbox">លិខិតបញ្ជាក់ការងារ <input type="checkbox">លិខិតបញ្ជាក់ប្រាក់បៀវត្សរ៍</p><br>
                <p  style="margin-top:-30px;margin-bottom:-15px;"><b>មូលហេតុៈ</b>&nbsp; .............................................................................................................................................................។</p><br>
                <p  style="margin-left:50px;margin-top:-5px;">សូមជូនភ្ជាប់មកជាមួយនូវប្រវត្តិការងារដូចខាងក្រោម៖</p>
            </div>
            <table class="table" style="margin-left: 70px; margin-right: 20px;margin-top:-18px;">
                <tbody>
                    <tr>
                        <td style="font-size:15px;padding:6px 15px;"><p><b>លរ</p></td>
                        <td style="font-size:15px;padding:6px 90.5px;"><p><b>តួ&nbsp; នាទី</p></td>
                        <td style="font-size:15px;padding:6px 39px;"><p><b>ពី&nbsp; ថ្ងៃខែឆ្នាំ</p></td>
                        <td style="font-size:15px;padding:6px 32px;"><p><b>ដល់&nbsp; ថ្ងៃខែឆ្នាំ</p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:5px 0px;"><p>&nbsp;</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:5px 0px;"><p>&nbsp;</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:5px 0px;"><p>&nbsp;</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:5px 0px;"><p>&nbsp;</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                </tbody>
            </table>
            <div class="row2_20" style="font-size:15px;margin-top:25px;font-size:15px;margin-left:20px;margin-right:2px;">
                <p style="margin-top:-20px;margin-left:50px;">អាស្រ័យដូចបានគោរព និង​ ជម្រាបជូនខាងលើសូម​ <b>លោកនាយក នាយកដ្ឋានធនធាន</b></p><br>
                <p style="margin-top:-40px;"><b>មនុស្ស និង​ រដ្ឋបាល</b> មេត្តាជួយសម្រួលដោយសេចក្តីអនុគ្រោះ។</p><br>
                <p style="margin-top:-38px;margin-left:50px;">សូម <b>លោកនាយក</b> មេត្តាទទួលនូវការគោរពដ៏ខ្ពង់ខ្ពស់អំពីខ្ញុំបាទ/នាងខ្ញុំ។</p>
            </div>
            <div class="lastrow15" style="font-size:15px;margin-right:20px;margin-top:-33px;">
                <p>ធ្វើនៅថ្ងៃទី...............ខែ.............ឆ្នាំ២០......</p><br>

            </div>
            <table class="table" style="border:none;margin-top:-35px;margin-left: 20px; margin-right: 20px;">
                <tbody style="border:none;">
                    <tr style="border:none;">
                        <td style="font-size:15px;border:none;padding:6px 40px;"><p><b>បញ្ជាក់ដោយ</p></td>
                        <td style="font-size:15px;border:none;padding:6px 30px;"><p>&nbsp; &nbsp; &nbsp; &nbsp; <b>បញ្ជាក់ដោយ</p></td>
                        <td style="font-size:15px;border:none;padding:6px 25px;"><p> &nbsp; &nbsp; &nbsp; &nbsp;​ &nbsp; &nbsp;<b>ហត្ថលេខាអ្នកស្នើសុំ</p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="font-size:15px;border:none;padding:5px 0px;"><p>..........................................</p></td>
                        <td colspan="1" style="font-size:15px;border:none;"><p>&nbsp; &nbsp; &nbsp; &nbsp; ..........................................</p></td>
                        <td colspan="1" style="border:none;"><p></p></td>

                    </tr>
                    <tr>
                        <td colspan="1" style="font-size:15px;border:none;padding:5px 0px;"><p>..........................................</p></td>
                        <td colspan="1" style="font-size:15px;border:none;"><p>&nbsp; &nbsp; &nbsp; &nbsp;..........................................</p></td>
                        <td colspan="1" style="font-size:15px;border:none;"><p>&nbsp; &nbsp; &nbsp; &nbsp;.......................................</p></td>

                    </tr>
                    <tr>
                        <td colspan="1" style="font-size:15px;border:none;padding:5px 0px;"><p><b>ថ្ងៃទី............ខែ........ឆ្នាំ២០.......</p></td>
                        <td colspan="1" style="font-size:15px;border:none;"><p></p>&nbsp; &nbsp; &nbsp; &nbsp; <b>ថ្ងៃទី............ខែ........ឆ្នាំ២០.......</td>
                        <td colspan="1" style="font-size:15px;border:none;"><p></p>&nbsp; &nbsp; &nbsp; &nbsp;<b>ឈ្មោះ</b>.............................</td>

                    </tr>
                    <tr>
                        <td colspan="1" style="font-size:15px;border:none;padding:5px 0px;"><p><b>នាយក​ នាយកដ្ឋានធនធាន</p></td>
                        <td colspan="1" style="font-size:15px;border:none;"><p>&nbsp; &nbsp; &nbsp; &nbsp; <b>នាយក</b>................................</p></td>
                        <td colspan="1" style="font-size:15px;border:none;"><p></p>&nbsp;</td>

                    </tr>
                    <tr>
                    <td colspan="1" style="font-size:15px;border:none;padding:5px 0px;"><p><b>មនុស្ស និង រដ្ឋបាល</p></td>
                    <td colspan="1" style="font-size:15px;border:none;"><p></p>&nbsp;</td>
                    <td colspan="1" style="font-size:15px;border:none;"><p></p>&nbsp;</td>

                </tr>
                </tbody>
            </table>

            <div class="footer20">
                <p>&nbsp;ទម្រង់លិខិតស្នើសុំលិខិតបញ្ជាក់ការងារ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                TT-HRAD-RTP-FM-006-00</p>
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
        $filename = 'RequestLetter.pdf';

        // // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');
    }
}

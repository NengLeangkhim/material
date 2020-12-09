<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Training extends Controller
{
    public function Training()
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
            <div class="title15">
                <h3>វគ្គបណ្តុះបណ្តាល</h3><br>
                <h3 style="margin-top:-35px;">ស្តីពី</h3><br>
                <p style="margin-top:-40px;">.................................................</p><br>
                <h3 style="margin-top:-35px;">កាលបរិច្ឆេទ៖........../........../...........</h3><br>
                <h3 style="margin-top:-30px;">បញ្ជីរាយនាមអ្នកចូលរួម</h3><br>
            </div>
            <table class="table" style="margin-top:-30px;margin-left: 40px; margin-right: 20px;">
                <tbody>
                    <tr>
                        <td style="padding:5px 10px;"><p>លរ</p></td>
                        <td style="padding:5px 65px;"><p>ឈ្មោះ</p></td>
                        <td style="padding:5px 20px;"><p>ភេទ</p></td>
                        <td><p> &nbsp; &nbsp;តួនាទី &nbsp; &nbsp;</p></td>
                        <td style="padding:5px 10px;"><p>កន្លែងការងារ</p></td>
                        <td style="padding:5px 35px;"><p>លេខទូរស័ព្ទ</p></td>

                    </tr>
                    <tr>
                        <td colspan="1" style="padding:3px 0px;"><p>១</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:3px 0px;"><p>២</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:3px 0px;"><p>៣</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:3px 0px;"><p>៤</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:3px 0px;"><p>៥</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:3px 0px;"><p>៦</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:3px 0px;"><p>៧</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:3px 0px;"><p>៨</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:3px 0px;"><p>៩</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:3px 0px;"><p>១០</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:3px 0px;"><p>១១</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:3px 0px;"><p>១២</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:3px 0px;"><p>១៣</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:3px 0px;"><p>១៤</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:3px 0px;"><p>១៥</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:3px 0px;"><p>១៦</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:3px 0px;"><p>១៧</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:3px 0px;"><p>១៨</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:3px 0px;"><p>១៩</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:3px 0px;"><p>២០</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                </tbody>
            </table>
            <div class="lastrow15">
                <p>ភ្នំពេញ.ថ្ងៃទី.................ខែ.............ឆ្នាំ................</p><br>
                <h3>អ្នករៀបចំ</h3>
            </div>
            <div class="footer15">
                <p>&nbsp;បញ្ជីរាយនាមអ្នកចូលរួម(Training Attendance List) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                TT-HRAD-STDP-FM-005-00</p>
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
        $filename = 'Training.pdf';

        // // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');
    }
}

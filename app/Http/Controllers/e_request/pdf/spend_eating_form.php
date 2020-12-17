<?php

namespace App\Http\Controllers\e_request\pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class spend_eating_form extends Controller
{
    public function spend_eatingPDF()

    {
    	$html='<html>
            <head>
                <title>E-Request Spend_Eating_form</title>
                <link rel="stylesheet" href="css/e_request/form_main.css">
            </head>
            <body>
                <div class="mistake_header">
                    <div class="logo" style="margin-left:20px;">
                        <img style="width: 150px; height: 100px;margin-top:-10px;" src="images/turbotech.png">
                    </div>
                    <div class="namecompany" style="text-align:center;margin-top:-117px;">
                        <h1 style="font-size: 25px;">ក្រុមហ៊ុនធើបូថេក   ឯ.ក</h1>
                        <h1 style=" font-size: 19px; margin-top: 0;">TURBOTECH CO., LTD</h1>
                    </div>
                </div>
                <div class="heading">
                    <h3 class="center">តារាងរៀបចំអាហាសម្រន់</h3>
                    <p class="center"><b>វគ្តបណ្ដុះបណ្ដាល៖.............................................................................</b></p>
                    <p class="center"><b>ពីថ្ងៃទី...............................ដល់ថ្ងៃទី..................................</b></p>
                </div>
                <table class="spend_eating">
                    <tbody>
                        <tr>
                            <td style="width: 15%;"><b>កាលបរិច្ឆេទ</b></td>
                            <td style="width: 30%;"><b>បរិយាយ</b></td>
                            <td style="width: 20%;"><b>ចំនួនអ្នកចូលរួម</b></td>
                            <td style="width: 20%;"><b>ចំណាយ១ឯកតា</b></td>
                            <td sytle="width: 15%;"><b>ចំណាយសរុប</b></td>
                        </tr>
                        <tr>
                            <td style="width: 15%;"></td>
                            <td style="width: 30%;"></td>
                            <td style="width: 20%;"></td>
                            <td style="width: 20%;"></td>
                            <td sytle="width: 15%;"></td>
                        </tr>
                        <tr>
                            <td style="width: 15%;"></td>
                            <td style="width: 30%;"></td>
                            <td style="width: 20%;"></td>
                            <td style="width: 20%;"></td>
                            <td sytle="width: 15%;"></td>
                        </tr>
                        <tr>
                            <td style="width: 15%;"></td>
                            <td style="width: 30%;"></td>
                            <td style="width: 20%;"></td>
                            <td style="width: 20%;"></td>
                            <td sytle="width: 15%;"></td>
                        </tr>
                        <tr>
                            <td style="width: 15%;"></td>
                            <td style="width: 30%;"></td>
                            <td style="width: 20%;"></td>
                            <td style="width: 20%;"></td>
                            <td sytle="width: 15%;"></td>
                        </tr>
                        <tr>
                            <td style="width: 15%;"></td>
                            <td style="width: 30%;"></td>
                            <td style="width: 20%;"></td>
                            <td style="width: 20%;"></td>
                            <td sytle="width: 15%;"></td>
                        </tr>
                        <tr>
                            <td style="width: 15%;"></td>
                            <td style="width: 30%;"></td>
                            <td style="width: 20%;"></td>
                            <td style="width: 20%;"></td>
                            <td sytle="width: 15%;"></td>
                        </tr>
                        <tr>
                            <td style="width: 15%;"></td>
                            <td style="width: 30%;"></td>
                            <td style="width: 20%;"></td>
                            <td style="width: 20%;"></td>
                            <td sytle="width: 15%;"></td>
                        </tr>
                        <tr>
                            <td style="width: 15%;"></td>
                            <td style="width: 30%;"></td>
                            <td style="width: 20%;"></td>
                            <td style="width: 20%;"></td>
                            <td sytle="width: 15%;"></td>
                        </tr>
                        <tr>
                            <td style="width: 15%;"></td>
                            <td style="width: 30%;"></td>
                            <td style="width: 20%;"></td>
                            <td style="width: 20%;"></td>
                            <td sytle="width: 15%;"></td>
                        </tr>
                        <tr>
                            <td style="width: 15%;"></td>
                            <td style="width: 30%;"></td>
                            <td style="width: 20%;"></td>
                            <td style="width: 20%;"></td>
                            <td sytle="width: 15%;"></td>
                        </tr>
                        <tr>
                            <td style="width: 15%;"></td>
                            <td style="width: 30%;"></td>
                            <td style="width: 20%;"></td>
                            <td style="width: 20%;"></td>
                            <td sytle="width: 15%;"></td>
                        </tr>
                        <tr>
                            <td style="width: 15%;"></td>
                            <td style="width: 30%;"></td>
                            <td style="width: 20%;"></td>
                            <td style="width: 20%;"></td>
                            <td sytle="width: 15%;"></td>
                        </tr>
                        <tr>
                            <td style="width: 15%;"></td>
                            <td style="width: 30%;"></td>
                            <td style="width: 20%;"></td>
                            <td style="width: 20%;"></td>
                            <td sytle="width: 15%;"></td>
                        </tr>
                        <tr>
                            <td style="width: 15%;"></td>
                            <td style="width: 30%;"></td>
                            <td style="width: 20%;"></td>
                            <td style="width: 20%;"></td>
                            <td sytle="width: 15%;"></td>
                        </tr>
                        <tr>
                            <td style="width: 15%;"></td>
                            <td style="width: 30%;"></td>
                            <td style="width: 20%;"></td>
                            <td style="width: 20%;"></td>
                            <td sytle="width: 15%;"></td>
                        </tr>
                        <tr>
                            <td style="width: 15%;"></td>
                            <td style="width: 30%;"></td>
                            <td style="width: 20%;"></td>
                            <td style="width: 20%;"></td>
                            <td sytle="width: 15%;"></td>
                        </tr>
                          
                        <tr>
                            <td colspan="4"><b>សរុបចំណាយទាំងអស់</b></td>
                            <td sytle="width: 15%;"></td>
                        </tr>
                    </tbody>
                </table>
                <div class="signature">
                    <p>ភ្នំពេញ,ថ្ងៃទី.........ខែ.........ឆ្នាំ............</p>
                    <h3 class="heading" style="margin-right: 45px;">អ្នកសម្របសម្រួលកម្មវិធី</h3>
                </div>
                <div class="footer" style="margin-top: 135px;">
                    <p​>&nbsp;&nbsp;តារាងរៀបចំអាហាសម្រន់(Training Refreshment Table) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;TT-HRAD-STDP-FM-010-00</p>
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
        $filename = 'spend_eating.pdf';
        $mpdf->SetDisplayMode('fullwidth');
        // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');

    }
}

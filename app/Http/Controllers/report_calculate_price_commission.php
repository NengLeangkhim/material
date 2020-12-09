<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class report_calculate_price_commission extends Controller
{
    public function commissionPDF()

    {
    	$html='<html>
            <head>
                <title>E-Request Spend_Eating_form</title>
                <link rel="stylesheet" href="css/e_request/form_main.css">
            </head>
            <body>
                <div class="mistake_header" style="margin-left:300px;">
                    <div class="logo" >
                        <img style="width: 150px; height: 100px;margin-top:-10px;" src="images/turbotech.png">
                    </div>
                    <div class="namecompany" style="text-align:center; margin-top:-117px; margin-left:-100px;">
                        <h1 style="font-size: 25px;">ក្រុមហ៊ុនធើបូថេក   ឯ.ក</h1>
                        <h1 style=" font-size: 19px; margin-top: 0;">TURBOTECH CO., LTD</h1>
                    </div>
                </div>
                <div class="heading">
                    <h3 class="center_heading">របាយការណ៍គណនាកម្រៃជើងសារ ប្រចាំខែ.............</h3>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ល.រ</th>
                            <th>លេខសម្គាល់អតិថិជន</th>
                            <th>ឈ្មោះអតិថិជន</th>
                            <th>វិក័យបត្រលេខ</th>
                            <th>ប្រភេទសេវា</th>
                            <th>ទឹកប្រាក់ប្រចាំខែ</th>
                            <th>ផលកម្រៃត្រូវទទួល</th>
                            <th>កាត់ពន្ធទុក(១៥%)</th>
                            <th>ប្រាក់បើកជូនភ្នាក់ងារ</th>

                        </tr>
                        <tr>
                            <th>No</th>
                            <th>Customer ID</th>
                            <th>Customer Name</th>
                            <th>Invoice</th>
                            <th>Package</th>
                            <th>Month Fee</th>
                            <th>Commission Fee</th>
                            <th>Tax</th>
                            <th>Amount($)</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td> 
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>ទឹកប្រាក់សរុប</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <table class="commission_footer">
                    <tbody>
                        <tr>
                            <td>
                                <p style="margin-buttom: 50px;">បញ្ចាក់ដោយ</p>
                                <p>ឈ្មោះ..................................</p>
                                <p>ថ្ងៃទី............../.............../..............</p>
                            </td>
                            <td>
                                <p>ត្រួតពិនិត្យដោយ</p>
                                <p>ឈ្មោះ..................................</p>
                                <p>ថ្ងៃទី............../.............../..............</p>  
                            </td>
                            <td>
                                <p>រៀបចំដោយ</p>
                                <p>ឈ្មោះ..................................</p>
                                <p>ថ្ងៃទី............../.............../..............</p> 
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="footer_commission">
                    <p​>&nbsp;&nbsp;របាយការណ៍គណនាកម្រៃជើងសារប្រចាំខែ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;TT-HRAD-SAPP-FM-003-00</p>
                </div>
            </body>
            </html>';

        $config = [
            'mode' => '+aCJK',
            "autoScriptToLang" => true,
            "autoLangToFont" => true,
            'orientation' => 'L'
        ];

        $mpdf = new \Mpdf\Mpdf($config);
        $mpdf->WriteHTML($html);
        $filename = 'commission.pdf';
        $mpdf->SetDisplayMode('fullwidth');
        // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');

    }
}

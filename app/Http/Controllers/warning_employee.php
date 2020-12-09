<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class warning_employee extends Controller
{
    public function warning_employeePDF()
    {
        
    $html='<html>
            <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/e_request/form_main.css">
            </head>
            <style>
            </style>
                <body>
                    <div class="container">
                        <div class="logo" style="margin-left:20px;">
                            <img style="width: 150px; height: 100px;margin-top:-10px;" src="images/turbotech.png">
                        </div>
                        <div class="namecompany" style="text-align:center;margin-top:-117px;">
                            <h1 style="font-size: 25px;">ក្រុមហ៊ុនធើបូថេក   ឯ.ក</h1>
                            <h1 style=" font-size: 19px; margin-top: 0;">TURBOTECH CO., LTD</h1>
                        </div> 
                        <div class="heading">
                            <h3 class="center_heading">ប្រធានគណៈកម្មាធិការធនធានមនុស្ស<br>ជម្រាបជូនមក</h3>
                            <p style="text-indent: 80px;">កម្មករ-និយោជិកឈ្មោះ.......................................................អត្តសញ្ញាប័ណ្ឌការងារលេខ...............................មុខងារជា...........................................បម្រើការងារនៅ.....................................................នៃក្រុមហ៊ុន ធើបូថេក ឯ.ក ។</p>
                        </div>
                        <table class="warning_employee">
                            <tbody>
                                <tr>
                                    <td style="width: 12%; font-size: 16px; font-weight: bold;" >កម្មវត្ថុ:</td>
                                    <td style="width: 88%; font-size: 15px;">ប្រមានលើការបំពេញការងារមិនបានល្អ</td>
                                </tr>
                                <tr>
                                    <td style="width: 12%;font-size: 16px; font-weight: bold;">យោង:</td>
                                    <td style="width: 88%;font-size: 15px; padding: 0;">..........................................................................................................................................</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="heading">
                            <p style="text-indent: 80px;">តបតាមកម្មវត្តុ និងយោងខាងលើ ក្នុងនាមខ្ញុំជា <span style="font-size: 16px; font-weight: bold;">ប្រធានគណៈកម្មាធិកាធនធានមនុស្ស</span> សូមធ្វើការប្រមានដល់កម្មករ-និយោជិកមានឈ្មោះខាងលើ ចំពោះទង្វើខុសឆ្គងមួយចំនួនដូចខាងក្រោម៖</p>
                            <table style="width: 100%; text-align: left; border:none;">
                                <tbody>
                                    <tr>
                                        <td style="width: 14%; border: none;"></td>
                                        <td style="width: 86%; border: none;">.............................................................................................................................................</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 14%;border: none;"></td>
                                        <td style="width: 86%;border: none;">.............................................................................................................................................</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 14%;border: none;"></td>
                                        <td style="width: 86%;border: none;">.............................................................................................................................................</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 14%;border: none;"></td>
                                        <td style="width: 86%;border: none;"​font-weight: bold;>លក្ខខណ្ឌតម្រូវឲ្យអនុវត្ត៖</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 14%;border: none;"></td>
                                        <td style="width: 86%;border: none;">.............................................................................................................................................</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 14%;border: none;"></td>
                                        <td style="width: 86%;border: none;">.............................................................................................................................................</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 14%;border: none;"></td>
                                        <td style="width: 86%;border: none;">.............................................................................................................................................</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="heading">
                            <p style="text-indent: 80px;">អាស្រ័យហេតុ នេះសូមកម្មករ-និយោជិកអនុវត្តតាមលក្ខខណ្ឌកែតម្រូវខាងលើនេះឲ្យមានប្រសិទ្ធ<br>ភាពខ្ពស់បំផុត ក្នុងរយះពេល............................ខែ គិតចាប់ពីថ្ងៃទី.........................ខែ...........................ឆ្នាំ២០២០ តទៅ។ បើពុំមានការកែប្រែទេអនុកម្មាធិការប្រឹក្សាវិន័យ និងចាត់វិធានការតាមវិធានរដ្ឋបាល។</p>
                            <p style="text-indent: 80px;">សូម កម្មករ-និយោជិក ទទួលការស្រលាញ់រាប់អានពីខ្ញុំ។</p>
                        </div>
                        <table style="width: 100%; border:none;">
                            <tbody>
                                <tr>
                                    <td style="width: 50%;text-align: right;border: none;"></td>
                                    <td style="width: 50%;text-align: right;border: none;"><p>រាជធានីភ្នំពេញ, ថ្ងៃទី................ខែ.............ឆ្នាំ២០២០</p></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;text-align: right;border: none;"></td>
                                    <td style="width: 50%;text-align: right;font-size: 16px;font-weight: bold;border: none;"><p>ប្រធានគណៈកម្មាធិការធនធានមនុស្ស</p></td>
                                </tr>
                            
                            </tbody>
                        </table>
                        <div class="copy_to" style="text-align: left;">
                            <p style="font-weight: bold;"><u>ចម្លងជូន:</u></p>
                            <p>-&nbsp; &nbsp;សមាជិកគណៈកម្មាធិការនាយក</p>
                            <p>-&nbsp; &nbsp;នាយកដ្ឋាននិសវន៍កម្មផ្ទៃក្នុង<br><b>&nbsp; &nbsp; &nbsp;"ដើម្បីជ្រាបជាព័ត៏មាន"</b></p>
                            <p>-&nbsp; &nbsp;សាមីខ្លួន <b>"ដើម្បីអនុវត្ត"</br></p>
                            <p>-&nbsp; &nbsp;ឯកសារ-កាលប្បវត្តិ</p>
                        </div>
                        
                        <div class="footer" style="margin-top: 35px;">
                            <p​>&nbsp;&nbsp;ទម្រង់របាយការណ៍ត្អូញត្អែរ(Staff Complaint Report) &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;TT-HRAD-SCPP-FM-003-00</p>
                        </div>
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
            $filename = 'training_request.pdf';
            $mpdf->SetDisplayMode('fullwidth');
            // $mpdf->Output($filename, 'D');//download
            return $mpdf->Output($filename,'I');
    }
}

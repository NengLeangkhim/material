<?php

namespace App\Http\Controllers\e_request\pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class working_performance_appraisal_form extends Controller
{
    public function working_performance_appraisal_form()
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
            <div style="margin-left:20px;margin-right:20px; ">
                <div class="logo" style="margin-left:20px;">
                    <img style="width: 170px; height: 100px;margin-top:-10px;" src="img/formimage/turbotech.png">
                </div>
                <div class="namecompany" style="text-align:center;margin-top:-117px;">
                    <h1 style="font-size: 25px;">ក្រុមហ៊ុនធើបូថេក​​ ឯ.ក</h1><br>
                    <h1 style=" font-size: 19px;margin-top:-30px;">TURBOTECH CO., LTD</h1>
                </div>
                <br>
                <br>
                <div style="text-align:center;font-size:15px;margin-top:-25px;">
                    <h3 >ទម្រង់សរុបលទ្ធផលវាយតម្លៃ</h3><br>
                    <p style="margin-top:-38px;font-size:12px;">Working Performance Appraisal Form</p><br>
                    <p style="margin-top:-35px;font-size:13px;"><u>(សម្រាប់ផ្នែកធនធានមនុស្សបំពេញ)</u></p><br>
                </div>
                <div style="margin-top:-20px;">
                <tbody>
                    <table style="margin-left:10px;">
                        <tr>
                            <td style="text-align:right;font-size:14px;padding:5px 85px;padding-right:10px;">ឈ្មោះ</td>
                            <td style="text-align:right;font-size:14px;padding:5px 97px;">&nbsp;</td>
                            <td style="text-align:right;font-size:14px;padding-left:25px;padding-right:10px;padding:5px 0px;">តួនាទី</td>
                            <td style="text-align:right;font-size:14px;padding:5px 97px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align:right;font-size:14px;padding:5px 0%;padding-left:10px;padding-right:10px;">កន្លែងបំពេញការងារ</td>
                            <td>&nbsp;</td>
                            <td style="text-align:right;font-size:14px;padding-left:10px;padding-right:10px;">អត្តលេខ</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align:right;font-size:14px;padding:5px 0%;padding-left:10px;">រយៈពេលវាយតម្លៃ</td>
                            <td colspan="3" style="text-align:left;font-size:14px;padding:5px 0%;padding-left:10px;">
                                <p> 
                                    ពី៖ 
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    <span>ដល់៖</span>
                                </p>                                
                             </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="font-size:14px;padding:5px 0%;padding-left:10px;padding-right:10px;padding-bottom:10px;">ប្រភេទនៃការវាយតម្លៃ៖<br><br>
                                <p><input type="checkbox"> វាយតម្លៃការងារសាកល្បង &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                                    <span><input type="checkbox"> វាយតម្លៃការងារប្រចាំឆ្នាំ</span></p><br>
                                <p><input type="checkbox"> វាយតម្លៃពិសេស (មុខឬក្រោយកាលកំណត់)&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                                    <span><input type="checkbox"> វាយតម្លៃហ្វឹកហាត់ការងារ</span></p>
                            </td>

                        </tr>
                        <tr>
                            <td style="text-align:right;font-size:14px;padding:5px 0%;padding-left:10px;padding-right:10px;">អ្នកគ្រប់គ្រងផ្ទាល់</td>
                            <td>&nbsp;</td>
                            <td style="text-align:center;font-size:14px;padding:5px 0%;padding-left:7px;">កម្រិតវប្បធម៌</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </tbody>
                <p style="margin-top:-1px;font-size:15px;"><b>ផ្នែកទី១៖ ពិន្ទុលទ្ធផលការងារ</b></p><br>
                <p style="margin-top:-40px;font-size:15px;margin-left:40px;"><b>ចំណុចទី១៖ ផ្នែកប្រតិបត្តិការ</b></p><br>
                <div style="margin-left:10px;">
                    <table style="margin-top:-40px;">
                        <tr>
                            <td rowspan="2" style="font-size:14px;padding:5px 6px;">លរ​</td>
                            <td rowspan="2" style="font-size:14px;padding:5px 2px;">ចំណុចដែលត្រូវវាយតម្លៃ</td>
                            <td rowspan="1" colspan="2" style="font-size:14px;padding:5px 0px;text-align:center;">លទ្ធផលសម្រេចបាន</td>
                            <td rowspan="1" colspan="2" style="font-size:14px;text-align:center;padding-left:10px;">ពិន្ទុ</td>
                            <td rowspan="2" style="font-size:14px;text-align:center;padding:5px 22px;">មូលវិចារ</td>
                        </tr>
                        <tr>
              
                            <td style="font-size:14px;padding:5px 5px;">កម្រិតស្តង់ដារ</td>
                            <td style="font-size:14px;padding:5px 5px;">លទ្ធផលជាក់ស្តែង</td>
                            <td style="font-size:14px;padding:5px 14px;">ទ&nbsp;ម្ងន់</td>
                            <td style="font-size:14px;padding:5px 14px;">អត្រា</td>

                        </tr>
                        <tr>
                            <td style="font-size:14px;padding:5px 10px;">១</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
     
                        </tr>                        
                        <tr>
                            <td colspan="4"  style="font-size:14px;padding:5px 0px;text-align:center;"><b>សរុប</td>
                            <td></td>
                            <td style="background-color:#b06166;"></td>
                            <td></td>

                        </tr>
                    </table>
                </div>
                <p style="margin-top:-1px;font-size:15px;margin-left:40px;"><b>ចំណុចទី២៖ ផ្នែកជំនាញ</b></p><br>
                <div style="margin-left:10px;margin-right:-20px;">
                    <table style="margin-top:-40px;">
                        <tr>
                            <td rowspan="2" style="font-size:14px;padding:5px 6px;">លរ​ </td>
                            <td rowspan="2" style="font-size:14px;padding:5px 10px;text-align:center;width:38%;">ចំណុចដែលត្រូវវាយតម្លៃ</td>
                            <td rowspan="1" style="font-size:14px;text-align:center;padding:5px 20px;">ពិន្ទុ</td>
                            <td rowspan="1" colspan="2" style="font-size:14px;text-align:center;padding-left:10px;padding:5px 40px;">ពិន្ទុ</td>
                            <td rowspan="4" style="font-size:14px;padding:5px 20px;text-align:center;">មូលវិចារ</td>
                        </tr>
                        <tr>
                            <td style="font-size:14px;padding:5px 10px;text-align:center;">អតិបរមា</td>
                            <td style="font-size:14px;padding:5px 11px;text-align:center;">សាមីខ្លួន</td>
                            <td style="font-size:14px;padding:5px 10px;text-align:center;padding-top:7px;padding-bottom:-10px">&nbsp;&nbsp;អ្នកវាយតម្លៃ &nbsp;</td>

                        </tr>
                       
                        <tr>
                            <td colspan="2" style="text-align:center;font-size:14px;padding:5px 10px;"><b>លទ្ធផលរួម</td>
                            <td style="text-align:center;font-size:14px;">១០០</td>
                            <td>&nbsp;</td>
                    

                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:center;font-size:14px;padding:5px 10px;"><b>សរុប</td>
                            <td>&nbsp;</td>
                            <td colspan="2"​ style="background-color:#ffc85c;">&nbsp;</td>
                        </tr>
                    </table>
                </div>
                <div>
                    <p style="font-size:14px;"><i>បញ្ជាក់៖ លទ្ធផលបានពីបុគ្គលិក កំណត់យកតែ ៣០% និង​ បានមកពីថ្នាក់ដឹកនាំឬគណៈកម្មាធិការគឺ ៧០%</i></p>
                </div>
                <p style="margin-top:-20px;font-size:15px;"><b>ផ្នែកទី២៖ សរុបលទ្ធផលផ្លូវការ</b></p><br>
                <div style="margin-left:10px;">
                    <table style="margin-top:-35px;">
                        <tr>
                            <td rowspan="2" style="font-size:14px;padding:5px 5px;width:30%;text-align:center;">ចំណុចវាស់វែង</td>
                            <td rowspan="1" colspan="3" style="font-size:14px;padding:5px 80px;text-align:center;width:60%;">កម្រិតវាស់វែង</td>
                            <td rowspan="2" style="font-size:14px;text-align:center;padding:5px 15px;width:20%;">មូលវិចារ</td>
                        </tr>
                        <tr>
                            <td style="font-size:14px;padding:5px 5px;text-align:center;">ទម្ងន់</td>
                            <td style="font-size:14px;padding:5px 5px;text-align:center;">អត្រា</td>
                            <td style="font-size:14px;padding:5px 5px;text-align:center;">កម្រិតលទ្ធផល</td>

                        </tr>
                        <tr>
                            <td style="font-size:14px;padding:5px 10px;">១. ផ្នែកប្រតិបត្តិការ</td>
                            <td style="background-color:#ec5858;text-align:center;">៧០%</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td  style="font-size:14px;padding:5px 10px;">២. ផ្នែកជំនាញ</td>
                            <td style="background-color:#ffc85c;text-align:center;">៣០%</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="font-size:14px;padding:5px 10px;text-align:center;">សរុប</td>
                            <td></td>
                            <td></td>

                        </tr>
                    </table>
                </div>
                <div class="footer22" style="margin-top:-210px;margin-right:-10px;">
                    <p>&nbsp;ទម្រង់សរុបលទ្ទផលវាយតម្លៃបុគ្គលិក &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    TT-HRAD-EPA-FM-002-00</p>
                </div>
                <br>
                <p style="margin-top:-1px;font-size:15px;"><b>ផ្នែកទី៣៖ សរុបលទ្ធផលនៃការវាយតម្លៃ</b></p><br>
                <div style="margin-left:10px;">
                    <table style="margin-top:-35px;">
                        <tr>
                            <td rowspan="2" style="font-size:14px;padding:50px 10px;width: 40%;text-align:center;">កម្រិតពិន្ទុ</td>
                            <td style="font-size:14px;padding:5px 10px;width:16%;text-align:center;">A</td>
                            <td style="font-size:14px;padding:5px 10px;width:16%;text-align:center;">B</td>
                            <td style="font-size:14px;padding:5px 10px;width:16%;text-align:center;">C</td>
                            <td style="font-size:14px;padding:5px 10px;width:16%;text-align:center;">D</td>
                            <td style="font-size:14px;padding:5px 10px;width:16%;text-align:center;">E</td>
                            <td rowspan="2" style="font-size:14px;padding:5px 12px;width:12%;text-align:center;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="font-size:14px;padding:5px 10px;width:16%;text-align:center;">91-100</td>
                            <td style="font-size:14px;padding:5px 10px;width:16%;text-align:center;">81-90</td>
                            <td style="font-size:14px;padding:5px 10px;width:16%;text-align:center;">71-80</td>
                            <td style="font-size:14px;padding:5px 10px;width:16%;text-align:center;">61-70</td>
                            <td style="font-size:14px;padding:5px 10px;width:16%;text-align:center;">0-60</td>
                           
                        </tr>                        
                    </table>
                </div>
                <p style="margin-top:0spx;font-size:15px;"><b>ផ្នែកទី៥៖ លទ្ធផលសម្រេចនៃការវាយតម្លៃ​ និង​ ប្រាក់បៀវត្សរ៍ត្រូវកើន</b></p><br>
                <div style="margin-left:10px;">
                    <table style="margin-top:-35px;">
                        <tr>
                            <td style="font-size:14px;padding:5px 10px;width:70%;">កម្រិត A, B, C, D, E</td>
                            <td style="font-size:14px;padding:5px 110px;text-align:center;width:40%;">&nbsp;</td>

                        </tr>
                        <tr>
                            <td style="padding:5px 10px;">ពិន្ទុវាយតម្លៃមុន</td>  
                            <td></td>                        
                        </tr>   
                        <tr>
                            <td style="padding:5px 10px;">ប្រាក់បៀវត្សរ៍ចាស់</td>    
                            <td></td>                       
                        </tr> 
                        <tr>
                            <td style="padding:5px 10px;">ពិន្ទុវាយតម្លៃថ្មី</td>    
                            <td></td>                       
                        </tr> 
                        <tr>
                            <td style="padding:5px 10px;">ចំនួនប្រាក់បៀវត្សរ៍កើន</td>   
                            <td></td>                        
                        </tr> 
                        <tr>
                            <td style="padding:5px 10px;">ប្រាក់បៀវត្សរ៍ថ្មី</td>    
                            <td></td>                       
                        </tr> 
                    </table>
                </div>
                <p style="margin-top:-1px;font-size:15px;"><b>ផ្នែកទី៦៖ មតិយោបល់</b></p><br>
                <div style="margin-left:10px;">
                    <table style="margin-top:-35px;">
                        <tr>
                            <td style="font-size:14px;padding:5px 20px;width:62%;text-align:center;">យោបល់របស់ប្រធានអនុគណៈកម្មធិការវាយតម្លៃ</td>
                            <td style="font-size:14px;padding:5px 10px;text-align:center;width:40%;">កាលបរិច្ឆេទ:............../........../...........</td>

                        </tr>
                        <tr>
                            <td style="padding:15px 10px;">
                                <p style="">..................................................................................</p><br>
                                <p style="">..................................................................................</p><br>
                                <p style="">..................................................................................</p><br>
                                <p style="">..................................................................................</p><br>
                                <p style="">..................................................................................</p><br>
                                <p style="">................................................................................<span>។</span></p><br>
                            </td>
                            <td style="font-size:14px;padding:5px 0px;text-align:center;padding-top:-32%;">ហត្ថលេខា</td>


                        </tr>
                        <tr>
                            <td style="font-size:14px;padding:5px 10px;text-align:center;">យោបល់របស់អគ្គនាយក</td>
                            <td style="font-size:14px;padding:5px 10px;text-align:center;width:40%;">កាលបរិច្ឆេទ:............../........../...........</td>
                        </tr>
                        <tr>
                            <td style="padding:15px 10px;">
                                <p style="">..................................................................................</p><br>
                                <p style="">..................................................................................</p><br>
                                <p style="">..................................................................................</p><br>
                                <p style="">..................................................................................</p><br>
                                <p style="">..................................................................................</p><br>
                                <p style="">................................................................................<span>។</span></p><br>
                            </td>
                            <td style="font-size:14px;padding:5px 0px;text-align:center;padding-top:-32%;">ហត្ថលេខា</td>
                        </tr>
                    </table>
                </div>
                <div class="footer22" style="margin-top:-190px;margin-right:-10px;">
                    <p>&nbsp;ទម្រង់សរុបលទ្ទផលវាយតម្លៃបុគ្គលិក &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    TT-HRAD-EPA-FM-002-00</p>
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
        $filename = 'working_performance_appraisal_form.pdf';

        // // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');
    }
}

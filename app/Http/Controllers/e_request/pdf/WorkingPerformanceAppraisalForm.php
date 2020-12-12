<?php

namespace App\Http\Controllers\e_request\pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkingPerformanceAppraisalForm extends Controller
{
    public function WorkingPerformanceAppraisalForm()
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
                    <h3 >ទម្រង់វាយតម្លៃការងារបុគ្គលិក</h3><br>
                    <p style="margin-top:-38px;font-size:12px;">Working Performance Appraisal Form</p><br>
                    <p style="margin-top:-35px;font-size:13px;"><u>(សម្រាប់និយោជិក & ថ្នាក់ដឹកនាំផ្ទាល់)</u></p><br>
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
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    <span>ដល់៖</span>
                                </p>                                
                             </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="font-size:14px;padding:5px 0%;padding-left:10px;padding-right:10px;padding-bottom:10px;">ប្រភេទនៃការវាយតម្លៃ៖<br><br>
                            <p><input type="checkbox"> វាយតម្លៃការងារសាកល្បង &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                            <span><input type="checkbox"> វាយតម្លៃការងារប្រចាំឆ្នាំ</span></p><br>
                            <p><input type="checkbox"> វាយតម្លៃពិសេស (មុខឬក្រោយកាលកំណត់)&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                            <span><input type="checkbox"> វាយតម្លៃហ្វឹកហាត់ការងារ</span></p></td>

                        </tr>
                        <tr>
                            <td style="text-align:right;font-size:14px;padding:5px 0%;padding-left:10px;padding-right:10px;">អ្នកគ្រប់គ្រងផ្ទាល់</td>
                            <td>&nbsp;</td>
                            <td style="text-align:center;font-size:14px;padding:5px 0%;padding-left:7px;">កម្រិតវប្បធម៌</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </tbody>
                <div>

                    <p style="font-size:15px;"><b>ផ្នែកទី១៖ សំណួរពិភាក្សា</b></p><br>

                <div style="margin-left:10px;margin-top:-35px;">
                    <table >
                        <tr>
                            <td style="padding:5px 0%;padding-right:150px;padding-left:10px;font-size:14px;"><i>១.១ ចូរបញ្ជាក់ពីការយល់ដឹងក្នុងតួនាទី និង ភារកិច្ចសំខាន់ៗរបស់អ្នក</i></td>
                        </tr>
                        <tr>
                            <td style="padding:15px 10px;">
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:5px 0%;padding-left:10px;font-size:14px;"><i>១.២ តើអ្នកគិតថាអ្វីទៅជាសមិទ្ធផលចម្បងដែលអ្នកបានសម្រេចក្នុងពេលកន្លងទៅ?</i></td>
                        </tr>
                        <tr>
                            <td style="padding:15px 10px;">
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                            </td>
                        </tr>
                        </table>
                            <div class="footer22" style="margin-top:-230px;margin-right:-10px;">
                                <p>&nbsp;ទម្រង់វាយតម្លៃបុគ្គលិក &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                TT-HRAD-EPA-FM-000-00</p>
                            </div>
                        <table>
                        <tr>
                            <td style="padding:15px 10px;"> 
                                
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:5px 0%;padding-left:10px;font-size:14px;"><i>១.៣ ចូរបង្ហាញពីការងាយស្រួលក្នុងការអនុវត្តន៍ការងាររបស់អ្នក</i></td>
                        </tr>
                        <tr>
                            <td style="padding:15px 10px;">
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:5px 0%;padding-left:10px;font-size:14px;"><i>១.៤ ក្នុងផ្នែកដែលអ្នកកំពុងបម្រើ តើអ្នកយល់ថាមានការងារសំខាន់អ្វីខ្លះសម្រាប់ឆ្នាំក្រោយ?</i></td>
                        </tr>
                        <tr>
                            <td style="padding:15px 10px;">
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:5px 0%;padding-left:10px;font-size:14px;"><i>១.៥ តើអ្នកគិតថាអ្នកគួរតែកែលម្អ ឬអភិវត្ឍខ្លួនឯកអ្វីខ្លះទៀត ដើម្បីអាចបំពេញការងារបានប្រសើរជាងឆ្នាំកន្លងទៅ?</i></td>
                        </tr>                        
                        <tr>
                            <td style="padding:15px 10px;">
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                                 <p style="">...................................................................................................................................................</p><br>                        
                            </td>
                        </tr>
                        </table>
                            <div class="footer22" style="margin-top:-230px;margin-right:-10px;">
                                <p>&nbsp;ទម្រង់វាយតម្លៃបុគ្គលិក &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                TT-HRAD-EPA-FM-001-00</p>
                            </div>
                        <table>
                        <tr>
                            <td style="padding:15px 10px;">
                               
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                                <p style="">...................................................................................................................................................</p><br>
                            </td>
                        </tr>
                    </table>
                </div>
                <p style="margin-top:-1px;font-size:15px;"><b>ផ្នែកទី២៖ ពិន្ទុលទ្ធផលការងារ</b></p><br>
                <p style="margin-top:-40px;font-size:15px;"><b>ចំណុចទី១៖ ផ្នែកប្រតិបត្តិការ</b></p><br>
                <div style="margin-left:10px;">
                    <table style="margin-top:-40px;">
                        <tr>
                            <td rowspan="2" style="font-size:14px;padding:5px 5px;">លរ​ &nbsp; &nbsp; ចំណុចដែលត្រូវវាយតម្លៃ</td>
                            <td rowspan="1" colspan="2" style="font-size:14px;padding:5px 0px;text-align:center;">លទ្ធផលសម្រេចបាន</td>
                            <td rowspan="1" colspan="2" style="font-size:14px;text-align:center;padding-left:10px;">ពិន្ទុ</td>
                            <td rowspan="2" style="font-size:14px;text-align:center;padding:5px 15px;">មូលវិចារ</td>
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
                        </tr>
                        <tr>
                            <td  style="font-size:14px;padding:5px 10px;">២</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td  style="font-size:14px;padding:5px 10px;">៣</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td  style="font-size:14px;padding:5px 10px;">៤</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td  style="font-size:14px;padding:5px 10px;">៥</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td  style="font-size:14px;padding:5px 10px;">៦</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3"  style="font-size:14px;padding:5px 0px;text-align:center;"><b>សរុប</td>
                            <td></td>
                            <td style="background-color:#a35d6a;"></td>
                            <td></td>

                        </tr>
                    </table>
                </div>
                <p style="margin-top:-1px;font-size:15px;"><b>ចំណុចទី២៖ ផ្នែកជំនាញ</b></p><br>
                <div style="margin-left:10px;">
                    <table style="margin-top:-40px;">
                        <tr>
                            <td rowspan="2" style="font-size:14px;padding:5px 3px;">លរ​ </td>
                            <td rowspan="2" style="font-size:14px;padding:5px 10px;text-align:center;width:42%;">ចំណុចដែលត្រូវវាយតម្លៃ</td>
                            <td rowspan="1" style="font-size:14px;text-align:center;padding:5px 10px;">ពិន្ទុ</td>
                            <td rowspan="1" colspan="2" style="font-size:14px;text-align:center;padding-left:10px;">ពិន្ទុ</td>
                            <td rowspan="2" colspan="1" style="font-size:14px;text-align:center;padding:5px 15px;">មូលវិចារ</td>
                        </tr>
                        <tr>
                            <td style="font-size:14px;padding:5px 10px;text-align:center;">អតិបរមា</td>
                            <td style="font-size:14px;padding:5px 0px;text-align:center;">សាមីខ្លួន</td>
                            <td style="font-size:14px;padding:5px 9px;text-align:center;">អ្នកវាយតម្លៃ</td>

                        </tr>
                        <tr>
                            <td style="font-size:14px;padding:5px 10px;">១</td>
                            <td style="font-size:14px;padding:5px 10px;">
                                <b>ជំនាញការងារ</b><br>
                                    ១.១ គុណភាពការងារ<br>
                                    ១.២​ បរិមាណការងារ<br>
                                    ១.៣ ការចេះបត់បែន និងសម្របសម្រួល<br>
                                    ១.៤ ការបើកទឹកចិត្តខ្លួនឯង<br>
                                    ១.៥​ ការកំណត់ការងារអាទិភាព<br>
                                    ១.៦ ការរៀបចំផែនការងារ<br>
                                    ១.៧&nbsp; ការផ្តល់ការណែនាំអំពីសេវាកម្មដល់អតិថិជន
                            </td>
                            <td style="text-align:center;font-size:14px;">២០</td>
                            <td></td>
                            <td></td>

                        </tr>
                        <tr>
                            <td  style="font-size:14px;padding:5px 10px;">២</td>
                            <td style="font-size:14px;padding:5px 10px;">
                                <b>ជំនាញវិភាគ</b><br>
                                    ២.១ ការវិភាគបញ្ហា និងស្វែងរកដំណោះស្រាយ<br>
                                    ២.២​ មានគំនិតច្នៃប្រឌិតច្រើន<br>
                                    ២.៣ ការវិនិច្ឆ័យប្រកបដោយភាពច្បាស់លាស់<br>

                            </td>
                            <td style="text-align:center;font-size:14px;">២០</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td  style="font-size:14px;padding:5px 10px;">៣</td>
                            <td style="font-size:14px;padding:5px 10px;">
                                ​<b>ជំនាញទំនាក់ទំនង</b><br>
                                    ៣.១ សមត្ថភាពក្នុងការបញ្ចុះបញ្ចូលតាមរយៈការនិយាយ<br>
                                    ៣.២​ សមត្ថភាពក្នុងការបញ្ចុះបញ្ចូលតាមរយៈការសរសេរ<br>
                            </td>
                            <td style="text-align:center;font-size:14px;">១០</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                        <div class="footer22" style="margin-top:-220px;margin-right:-10px;">
                            <p>&nbsp;ទម្រង់វាយតម្លៃបុគ្គលិក &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            TT-HRAD-EPA-FM-001-00</p>
                        </div>
                    <table>
                        <tr>
                            <td rowspan="2" style="font-size:14px;padding:5px 3px;">លរ​ </td>
                            <td rowspan="2" style="font-size:14px;padding:5px 10px;text-align:center;width:42%;">ចំណុចដែលត្រូវវាយតម្លៃ</td>
                            <td rowspan="1" style="font-size:14px;text-align:center;padding:5px 10px;">ពិន្ទុ</td>
                            <td rowspan="1" colspan="2" style="font-size:14px;text-align:center;padding-left:10px;">ពិន្ទុ</td>
                            <td rowspan="2" colspan="1" style="font-size:14px;text-align:center;padding:5px 15px;">មូលវិចារ</td>
                        </tr>
                        <tr>
                            <td style="font-size:14px;padding:5px 10px;text-align:center;">អតិបរមា</td>
                            <td style="font-size:14px;padding:5px 0px;text-align:center;">សាមីខ្លួន</td>
                            <td style="font-size:14px;padding:5px 9px;text-align:center;">អ្នកវាយតម្លៃ</td>

                        </tr>
                        <tr>
                            <td  style="font-size:14px;padding:5px 10px;">៤</td>
                            <td style="font-size:14px;padding:5px 10px;">​
                                <b>ជំនាញអន្តរបុគ្គល</b><br>
                                    ៤.១ មានគំនិតវិជ្ជមាន និងចេះឲ្យតម្លៃអ្នកដទៃ<br>
                                    ៤.២​ សមត្ថភាពក្នុងការធ្វើជាក្រុម<br>
                                    ៤.៣​ រក្សាបាននូវព័ត៌មានសម្ងាត់របស់ក្រុមហ៊ុន<br>
                            </td>
                            <td style="text-align:center;font-size:14px;">២០</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td  style="font-size:14px;padding:5px 10px;">៥</td>
                            <td style="font-size:14px;padding:5px 10px;">
                                <b>វត្តមានការងារ</b><br>
                                    ៥.១ វត្តមាននៅកន្លែងការងារបានល្អ<br>
                                    ៥.២​ ភាពទៀងទាត់នៃពេលវេលា<br>
                            </td>
                            <td style="text-align:center;font-size:14px;">១០</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                            <tr>
                            <td  style="font-size:14px;padding:5px 10px;">៦</td>
                            <td style="font-size:14px;padding:5px 10px;">
                                <b>ជំនាញគ្រប់គ្រង</b><br>
                                    ៦.១ ចេះសម្របសម្រួលការងារបានល្អ<br>
                                    ៦.២​ រៀបចំគម្រោង និងវត្ថុបំណងការងារល្អ<br>
                                    ៦.៣ ប្រើប្រាស់សម្ភារៈឲ្យត្រឹមត្រូវតាមស្ថានភាព<br>
                                    ៦.៤ ចេះរក្សាទុកដាក់ឯកសារគ្រប់គ្រងប្រភេទបានល្អ<br>
                                    ៦.៥​ មានសិល្បៈនៃការចេះបត់បែន សម្របសម្រួល<br>
                                    ៦.៦ ការខិតខំប្រឹងប្រែងប្រកបដោយជំនឿចិត្ត<br>
                                    ៦.៧ មានគំនិតច្នៃប្រឌិតខ្ពស់ក្នុងការគ្រប់គ្រង
                            </td>
                            <td style="text-align:center;font-size:14px;">២០</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:center;font-size:14px;padding:5px 10px;"><b>លទ្ធផលរួម</td>
                            <td style="text-align:center;font-size:14px;">១០០</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>                   
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:center;font-size:14px;padding:5px 10px;"><b>សរុប</td>
                            <td>&nbsp;</td>
                            <td​>&nbsp;</td>                        
                            <td colspan="2"​ style="background-color:#ffc85c;">&nbsp;</td>
                        </tr>
                    </table>
                </div>
                <div>
                    <p style="font-size:14px;"><i>បញ្ជាក់៖ លទ្ធផលបានពីបុគ្គលិក កំណត់យកតែ ៣០% និង​ បានមកពីថ្នាក់ដឹកនាំឬគណៈកម្មាធិការគឺ ៧០%</i></p>
                </div>
                <p style="margin-top:-20px;font-size:15px;"><b>ផ្នែកទី៣៖ សរុបលទ្ធផលផ្លូវការ</b></p><br>
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
               
                        </tr>
                        <tr>
                            <td colspan="3" style="font-size:14px;padding:5px 10px;text-align:center;"><b>សរុប</td>
                            <td></td>
                            <td></td>

                        </tr>
                    </table>
                </div>
                <div class="footer22" style="margin-top:-20px;">
                    <p>&nbsp;ទម្រង់វាយតម្លៃបុគ្គលិក &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    TT-HRAD-EPA-FM-001-00</p>
                </div>
                <p style="margin-top:-1px;font-size:15px;"><b>ផ្នែកទី៤៖ មតិយោបល់</b></p><br>
                <div style="margin-left:10px;">
                    <table style="margin-top:-35px;">
                        <tr>
                            <td style="font-size:14px;padding:5px 20px;width:70%;text-align:center;">យោបល់របស់សាមីនិយោជិក</td>
                            <td style="font-size:14px;padding:5px 10px;text-align:center;width:40%;">កាលបរិច្ឆេទ:............../........../...........</td>

                        </tr>
                        <tr>
                            <td style="padding:15px 10px;line-height=:10px;">
                                <p style="">....................................................................................</p><br>
                                <p style="">....................................................................................</p><br>
                                <p style="">....................................................................................</p><br>
                                <p style="">....................................................................................</p><br>
                                <p style="">....................................................................................</p><br>
                                <p style="">....................................................................<span>។</span></p><br>
                            </td>
                            <td style="font-size:14px;padding:5px 0px;text-align:center;padding-top:-32%;">ហត្ថលេខា</td>


                        </tr>
                        <tr>
                            <td style="font-size:14px;padding:5px 10px;text-align:center;">យោបល់របស់ថ្នាក់ដឹកនាំផ្ទាល់</td>
                            <td style="font-size:14px;padding:5px 10px;text-align:center;width:40%;">កាលបរិច្ឆេទ:............../........../...........</td>
                        </tr>
                        <tr>
                            <td style="padding:15px 10px;">
                                <p style="">....................................................................................</p><br>
                                <p style="">....................................................................................</p><br>
                                <p style="">....................................................................................</p><br>
                                <p style="">....................................................................................</p><br>
                                <p style="">....................................................................................</p><br>
                                <p style="">....................................................................<span>។</span></p><br>
                            </td>
                            <td style="font-size:14px;padding:5px 0px;text-align:center;padding-top:-32%;">ហត្ថលេខា</td>

                        </tr>

                    </table>
                </div>
                <div class="footer22" style="margin-top:180px;">
                    <p>&nbsp;ទម្រង់វាយតម្លៃបុគ្គលិក &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    TT-HRAD-EPA-FM-001-00</p>
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
        $filename = 'WorkingPerformanceAppraisalForm.pdf';

        // // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');
    }
}

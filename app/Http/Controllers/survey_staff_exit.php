<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class survey_staff_exit extends Controller
{
    public function survey_staff_exitPDF()

    {
    	$html='<html>
            <head>
                <title>E-Request Survey Staff Exit</title>
                <link rel="stylesheet" href="css/e_request/form_main.css">
            </head>
            <body>
                <div class="mistake_header">
                    <div class="logo" style="margin-left:20px;">
                        <img style="width: 180px; margin-top:-10px;" src="images/turbotech.png">
                    </div>
                    <div class="namecompany" style="text-align:center;margin-top:-117px;">
                        <h1 style="font-size: 25px;">ក្រុមហ៊ុនធើបូថេក   ឯ.ក</h1>
                        <h1 style=" font-size: 19px; margin-top: 0;">TURBOTECH CO., LTD</h1>
                    </div>
                </div>
                <div class="heading">
                    <h3 class="center_heading">ការស្ទាបស្ទង់មតិកម្មករ-និយោជិកចាកចេញ</h3>
                    <p style="line-height: 22px;">នាយកដ្ឋានធនធានមនុស្ស និង រដ្ឋបាល នៃ <b>ក្រុមហ៊ុន ធើបូថេក ឯ.ក</b> សូមថ្លែងអំណរគុណយ៉ាងជ្រាលជ្រៅ<br>ចំពោះកម្មករ-និយោជិក ដែលបានចំណាយកម្លាំងកាយ ចិត្ត និងប្រាជ្ញាស្មារតី បំពេញការងារជូនធើបូថេកកន្លងមក។ ដើម្បីទទួលបានព័ត៌មានត្រឡប់ជាក់ស្ដែងនៃការចាកចេញរបស់អ្នកពីធើបូថេក ក្នុងគោលបំណងប្រមូលព័ត៌មានទាំងនោះមកកែលម្អធើបូថេក ទៅថ្ងៃមុខ សូមកម្មករ-និយោជិកមេត្តាចំណាយពេលបំពេញកម្រងសំណួរខាងក្រោមនេះ៖</p>
                    <h3 style="font-size: 16px;">១.ព័ត៌មានកម្មករ-និយោជិក</h3>
                </div>
                <table class="survey_staff_info">
                    <tbody>
                        <tr>
                            <td>ឈ្មោះ....................................</td>
                            <td>ភេទ.......................................</td>
                            <td>ប័ណ្ទការងារលេខ....................................</td>
                        </tr>          
                        <tr>
                            <td>តួនាទី....................................</td>
                            <td>កន្លែងបម្រើការងារ.............................</td>
                            <td>ថ្ងៃចូលបម្រើការងារ........../........./.........</td>
                        </tr>          
                        <tr>
                            <td colspan="3">ថ្ងៃលាឈប់ចុងក្រោយ.............../.................../................</td>
                        </tr>          
                    </tbody>
                </table>
                <h3 style="font-size: 16px;">២.កម្រងសំណួរ(សូមជ្រើសរើសដោយ ក្នុងប្រអប់ចម្លើយដែលអ្នកយល់ថាត្រឹមត្រូវសម្រាប់អ្នក)</h3>
                <table class="staff_question_exit">
                    <tbody>
                        <tr>
                            <td style="width: 43%;">កម្រងសំណួរ</td>
                            <td style="width: 13%;">ពេញចិត្តបំផុត</td>
                            <td style="width: 10%; padding-left: 7px;">ពេញចិត្ត</td>
                            <td style="width: 5%;">ធម្មតា</td>
                            <td style="width: 13%;padding-left: 7px;">មិនពេញចិត្ត</td>
                            <td style="width: 17%;">មិនពេញចិត្តបំផុត</td>
                        </tr>
                        <tr>
                            <td style="width: 43%; text-align: left;">តួនាទី ភារកិច្ច និងការបំពេញការងារ</td>
                            <td style="width: 13%;"><input type="checkbox"></input></td>
                            <td style="width: 10%;"><input type="checkbox"></input></td>
                            <td style="width: 5%;"><input type="checkbox"></input></td>
                            <td style="width: 13%;"><input type="checkbox"></input></td>
                            <td style="width: 17%;"><input type="checkbox"></input></td>
                        </tr>
                        <tr>
                            <td style="width: 43%; text-align: left;">កម្មវិធីបណ្ដុះបណ្ដាល និងអភិវឌ្ឍន៍</td>
                            <td style="width: 13%;"><input type="checkbox"></input></td>
                            <td style="width: 10%;"><input type="checkbox"></input></td>
                            <td style="width: 5%;"><input type="checkbox"></input></td>
                            <td style="width: 13%;"><input type="checkbox"></input></td>
                            <td style="width: 17%;"><input type="checkbox"></input></td>
                        </tr>
                        <tr>
                            <td style="width: 43%; text-align: left;">ឳកាសសម្រាប់ការតម្លើងឋានៈ និងតួនាទី</td>
                            <td style="width: 13%;"><input type="checkbox"></input></td>
                            <td style="width: 10%;"><input type="checkbox"></input></td>
                            <td style="width: 5%;"><input type="checkbox"></input></td>
                            <td style="width: 13%;"><input type="checkbox"></input></td>
                            <td style="width: 17%;"><input type="checkbox"></input></td>
                        </tr>
                        <tr>
                            <td style="width: 43%; text-align: left;">ការផ្ដល់ប្រាប់បៀវត្សន៍សម្រាប់តួនាទីនេះ</td>
                            <td style="width: 13%;"><input type="checkbox"></input></td>
                            <td style="width: 10%;"><input type="checkbox"></input></td>
                            <td style="width: 5%;"><input type="checkbox"></input></td>
                            <td style="width: 13%;"><input type="checkbox"></input></td>
                            <td style="width: 17%;"><input type="checkbox"></input></td>
                        </tr>
                        <tr>
                            <td style="width: 43%; text-align: left;">ស្ថានភាពការងារ</td>
                            <td style="width: 13%;"><input type="checkbox"></input></td>
                            <td style="width: 10%;"><input type="checkbox"></input></td>
                            <td style="width: 5%;"><input type="checkbox"></input></td>
                            <td style="width: 13%;"><input type="checkbox"></input></td>
                            <td style="width: 17%;"><input type="checkbox"></input></td>
                        </tr>
                        <tr>
                            <td style="width: 43%; text-align: left;">ម៉ោងបំពេញការងារ</td>
                            <td style="width: 13%;"><input type="checkbox"></input></td>
                            <td style="width: 10%;"><input type="checkbox"></input></td>
                            <td style="width: 5%;"><input type="checkbox"></input></td>
                            <td style="width: 13%;"><input type="checkbox"></input></td>
                            <td style="width: 17%;"><input type="checkbox"></input></td>
                        </tr>
                        <tr>
                            <td style="width: 43%; text-align: left;">ការធ្វើការងារជាក្រុម</td>
                            <td style="width: 13%;"><input type="checkbox"></input></td>
                            <td style="width: 10%;"><input type="checkbox"></input></td>
                            <td style="width: 5%;"><input type="checkbox"></input></td>
                            <td style="width: 13%;"><input type="checkbox"></input></td>
                            <td style="width: 17%;"><input type="checkbox"></input></td>
                        </tr>
                        <tr>
                            <td style="width: 43%; text-align: left;">ការទំនាក់ទំនងជាមួយថ្នាក់ដឹកនាំផ្ទាល់</td>
                            <td style="width: 13%;"><input type="checkbox"></input></td>
                            <td style="width: 10%;"><input type="checkbox"></input></td>
                            <td style="width: 5%;"><input type="checkbox"></input></td>
                            <td style="width: 13%;"><input type="checkbox"></input></td>
                            <td style="width: 17%;"><input type="checkbox"></input></td>
                        </tr>
                        <tr>
                            <td style="width: 43%; text-align: left;">ការគ្រប់គ្រងនិងចាត់ចែងរបស់ថ្នាក់ដឹកនាំផ្ទាល់</td>
                            <td style="width: 13%;"><input type="checkbox"></input></td>
                            <td style="width: 10%;"><input type="checkbox"></input></td>
                            <td style="width: 5%;"><input type="checkbox"></input></td>
                            <td style="width: 13%;"><input type="checkbox"></input></td>
                            <td style="width: 17%;"><input type="checkbox"></input></td>
                        </tr>
                        <tr>
                            <td style="width: 43%; text-align: left;">ការលើកទឹកចិត្តពីថ្នាក់ដឹកនាំ</td>
                            <td style="width: 13%;"><input type="checkbox"></input></td>
                            <td style="width: 10%;"><input type="checkbox"></input></td>
                            <td style="width: 5%;"><input type="checkbox"></input></td>
                            <td style="width: 13%;"><input type="checkbox"></input></td>
                            <td style="width: 17%;"><input type="checkbox"></input></td>
                        </tr>
                        <tr>
                            <td style="width: 43%; text-align: laft; font-weight: bold;">វាយតម្លៃជារួម</td>
                            <td style="width: 13%;"><input type="checkbox"></input></td>
                            <td style="width: 10%;"><input type="checkbox"></input></td>
                            <td style="width: 5%;"><input type="checkbox"></input></td>
                            <td style="width: 13%;"><input type="checkbox"></input></td>
                            <td style="width: 17%;"><input type="checkbox"></input></td>
                        </tr>    
                    </tbody>
                </table>
                <div class="heading" style="line-height: 20px;">
                    <h3 style="font-size: 16px; padding-top: 5px;">៣.យោបល់បន្ថែម (បើមាន)៖</h3>
                    <p>..................................................................................................................................................................</p>
                    <p>..................................................................................................................................................................</p>
                    <p>..................................................................................................................................................................</p>
                    <p>...............................................................................................................................................................<span>។</span></p>
                    
                </div>
                <table class="survey_signature">
                    <tr>
                        <td style="width: 50%;">កាលបរិច្ឆេទ:................/................/..............</td>
                        <td style="width: 50%; text-align: right;">ហត្ថលេខា:...............................................................</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;"><p><i>សូមថ្លែងអំណរគុណយ៉ាងជ្រាលជ្រៅ ចំពោះការផ្ដល់ព័ត៌មានដ៍ពិតប្រាកដ និងមានតម្លៃរបស់អ្នក!</i></p></td>
                    </tr>
                </table>
                
                <div class="footer" style="margin-top: 17px;">
                    <p​>&nbsp;&nbsp;ទម្រង់ស្ទាបស្ទង់មតិបុគ្គលិកចាកចេញ ​&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; TT-HRAD-RTM-FM-002-00</p>
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
        $filename = 'staff_note.pdf';
        $mpdf->SetDisplayMode('fullwidth');
        // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class training_staff_note extends Controller
{
    public function training_staff_notePDF()

    {
    	$html='<html>
            <head>
                <title>E-Request training Staff Note</title>
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
                    <h3 class="center_heading">កំណត់ត្រាណែនាំ និង ហ្វឺកហ្វឺននិយោជិតនិយោជិក</h3>
                    <h3 style="font-size: 16px;">I.ព័ត៌មានកម្មករ-និយោជិក</h3>
                </div>
                <table class="staff_info">
                    <tbody>
                        <tr>
                            <td>ឈ្មោះ</td>
                            <td></td>
                            <td>តួនាទី</td>
                            <td></td>
                        </tr>          
                        <tr>
                            <td>នាយកដ្ឋាន/ផ្នែក</td>
                            <td></td>
                            <td>ថ្ងៃចូលបម្រើការងារ</td>
                            <td></td>
                        </tr>          
                        <tr>
                            <td>ឈ្មោះថ្នាក់ដឹកនាំ</td>
                            <td></td>
                            <td>តួនាទី</td>
                            <td></td>
                        </tr>          
                    </tbody>
                </table>
                <h3 style="font-size: 16px;">II.ចំណុចដែលបានណែនាំ និង ហ្វឺកហ្វឺន</h3>
                <table class="staff_note">
                    <tbody>
                        <tr>
                            <td rowspan="2" style="width: 30%;">ចំណុចណែនាំ និង បណ្ដុះបណ្ដាល</td>
                            <td rowspan="2" style="width: 40%;">បរិយាយ</td>
                            <td rowspan="1" colspan="2" style="width:30%;">លទ្ធផលសម្រេចបាន</td>
                        </tr>
                        <tr>
                            <td colspan="1" style="width:15%;">បញ្ចប់</td>
                            <td colspan="1" style="width:15%;">បញ្ចប់</td>
                        </tr>  
                        <tr>
                            <td colspan="4" style="text-align: left; font-weight: bold;">នាយកដ្ឋានជំនាញ(....................................................)</td>
                        </tr>
                        <tr>
                            <td style="width: 30%;"></td>
                            <td style="width: 40%;"></td>
                            <td style="width:15%;"><input type="checkbox"></input></td>
                            <td style="width:15%;"><input type="checkbox"></input></td>
                        </tr>             
                        <tr>
                            <td style="width: 30%;"></td>
                            <td style="width: 40%;"></td>
                            <td style="width:15%;"><input type="checkbox"></input></td>
                            <td style="width:15%;"><input type="checkbox"></input></td>
                        </tr>             
                        <tr>
                            <td style="width: 30%;"></td>
                            <td style="width: 40%;"></td>
                            <td style="width:15%;"><input type="checkbox"></input></td>
                            <td style="width:15%;"><input type="checkbox"></input></td>
                        </tr>             
                        <tr>
                            <td style="width: 30%;"></td>
                            <td style="width: 40%;"></td>
                            <td style="width:15%;"><input type="checkbox"></input></td>
                            <td style="width:15%;"><input type="checkbox"></input></td>
                        </tr>             
                        <tr>
                            <td style="width: 30%;"></td>
                            <td style="width: 40%;"></td>
                            <td style="width:15%;"><input type="checkbox"></input></td>
                            <td style="width:15%;"><input type="checkbox"></input></td>
                        </tr>             
                        <tr>
                            <td style="width: 30%;"></td>
                            <td style="width: 40%;"></td>
                            <td style="width:15%;"><input type="checkbox"></input></td>
                            <td style="width:15%;"><input type="checkbox"></input></td>
                        </tr>             
                        <tr>
                            <td style="width: 30%;"></td>
                            <td style="width: 40%;"></td>
                            <td style="width:15%;"><input type="checkbox"></input></td>
                            <td style="width:15%;"><input type="checkbox"></input></td>
                        </tr>             
                        <tr>
                            <td style="width: 30%;"></td>
                            <td style="width: 40%;"></td>
                            <td style="width:15%;"><input type="checkbox"></input></td>
                            <td style="width:15%;"><input type="checkbox"></input></td>
                        </tr>             
                        <tr>
                            <td style="width: 30%;"></td>
                            <td style="width: 40%;"></td>
                            <td style="width:15%;"><input type="checkbox"></input></td>
                            <td style="width:15%;"><input type="checkbox"></input></td>
                        </tr>             
                        <tr>
                            <td style="width: 30%;"></td>
                            <td style="width: 40%;"></td>
                            <td style="width:15%;"><input type="checkbox"></input></td>
                            <td style="width:15%;"><input type="checkbox"></input></td>
                        </tr>             
                        <tr>
                            <td style="width: 30%;"></td>
                            <td style="width: 40%;"></td>
                            <td style="width:15%;"><input type="checkbox"></input></td>
                            <td style="width:15%;"><input type="checkbox"></input></td>
                        </tr>                          
                    </tbody>
                </table>
                <div class="heading">
                    <h3 style="font-size: 16px;">III.សេចក្ដីបញ្ចាក់</h3>
                </div>
                <table class="summary">
                    <tr>
                        <td style="padding-bottom: 20px; font-weight: bold;">កម្មករ-និយោជិក</td>
                        <td style="padding-bottom: 20px; border-left: 1px solid black; font-weight: bold;">អ្នកតាមដាន(នាយកដ្ឋាន)</td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 40px;"><p>ខ្ញុំសូមបញ្ចាក់ថា ខ្ញុំពិតជាទទួលបានការពន្យល់ ណែនាំការបណ្ដុះបណ្ដាល និង បានយល់ច្បាស់ត្រឹមត្រូវសព្វគ្រប់ និង យល់ដឹងច្បាស់លាស់អំពើតួនាទី ភាកិច្ច និង ការទទួលខុសត្រូវ របស់ខ្ញុំពិតប្រាកដមែន។</p></td>
                        <td style="padding-bottom: 40px; border-left: 1px solid black;"><p>ខ្ញុំសូមបញ្ចាក់ថា ខ្ញុំពិតជាបានពន្យល់ ណែនាំ បណ្ដុះបណ្ដាល ដល់កម្មករ-និយោជិកបានយល់ច្បាស់ត្រឹមត្រូវ និងយល់ដឹងបានច្បាស់លាស់អំពីតួនាទី ភារកិច្ច និងការទទួលខុសត្រូវរបស់គាត់ពិតប្រាកដមែន។</p></td>
                    </tr>
                </table>
                <div class="footer" style="margin-top: 10px;">
                    <p​>&nbsp;&nbsp;កំណត់ត្រាណែនាំ និង បណ្ដុះបណ្ដាលនិយោជិត &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; TT-HRAD-NEOTP-FM-503-00</p>
                </div>
                <table class="summary">
                    <tr>
                        <td style="padding-top: 50px;">ហត្ថលេខា&nbsp; &nbsp;៖...................................................</td>
                        <td style="padding-top: 50px;border-left: 1px solid black;">ហត្ថលេខា&nbsp; &nbsp;៖...................................................</td>
                    </tr>
                    <tr>
                        <td>ឈ្មោះ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;៖....................................................</td>
                        <td  style="border-left: 1px solid black;">ឈ្មោះ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;៖....................................................</td>
                    </tr>
                    <tr>
                        <td>កាលបរិច្ឆេទ៖....................................................</td>
                        <td style="border-left: 1px solid black;">កាលបរិច្ចេទ៖....................................................</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;border-top: 1px solid black; padding-bottom: 20px; font-weight: bold;"><p>តំណាងធនធានមនុស្ស</p></td>
                    </tr>
                    <tr>
                        <td colspan="2"><p>សូមទទួលស្គាល់ថា ការពន្យល់ណែនាំការងាររបស់ថ្នាក់ដឹកនាំ ដល់កម្មករ-និយោជិកខាងលើ គឺពិតជាត្រឹមត្រូវ និងច្បាស់លាស់តាមនិយាមការងារ ការទទួលខុសត្រូវ ដូចដែលមានចែង ក្នុងកិច្ចពិពណ៌នាការងារជាក់ស្ដែង របស់ធើបូថេកពិតប្រាកដមែន។</p></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center; padding-top: 80px;">ហត្ថលេខា&nbsp; &nbsp;៖...................................................</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">ឈ្មោះ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;៖....................................................</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">កាលបរិច្ឆេទ៖....................................................</td>
                    </tr>
                </table>
                <div class="footer" style="margin-top: 510px;">
                    <p​>&nbsp;&nbsp;កំណត់ត្រាតាមដានការងារនិយោជិក ​&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; TT-HRAD-STDP-FM-010-00</p>
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

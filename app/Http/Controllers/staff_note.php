<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class staff_note extends Controller
{
    public function staff_notePDF()

    {
    	$html='<html>
            <head>
                <title>E-Request Staff note</title>
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
                    <h3 class="center_heading">កំណត់ត្រាតាមដានការងារនិយោជិក</h3>
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
                <h3 style="font-size: 16px;">II.ចំណុចដែរបានធ្វើការតាមដាន</h3>
                <table class="staff_note">
                    <tbody>
                        <tr>
                            <td rowspan="2" style="width: 30%;">ចំណុចតាមដាន</td>
                            <td rowspan="2" style="width: 40%;">បរិយាយ</td>
                            <td rowspan="1" colspan="2" style="width:30%;">លទ្ធផលសម្រេចបាន</td>
                        </tr>
                        <tr>
                            <td colspan="1" style="width:15%;">ត្រឹមត្រូវ</td>
                            <td colspan="1" style="width:15%;">កែលម្អ</td>
                        </tr>  
                        <tr>
                            <td colspan="4" style="text-align: left; font-weight: bold;">១. នាយកដ្ឋានជំនាញ(....................................................)</td>
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
                        <td style="padding-bottom: 50px;"><p>ខ្ញុំសូមបញ្ចាក់ថា ខ្ញុំពិតជាទទួលបានការពន្យល់ ណែនាំការបណ្ដុះបណ្ដាល និង បានយល់ច្បាស់ត្រឹមត្រូវសព្វគ្រប់ពីអំពើតួនាទី ភាកិច្ច និង ការទទួលខុសត្រូវ របស់ខ្ញុំពិតប្រាកដមែន។</p></td>
                        <td style="padding-bottom: 50px; border-left: 1px solid black;"><p>ខ្ញុំសូមបញ្ចាក់ថា ខ្ញុំពិតជាបានពន្យល់ ណែនាំ បណ្ដុះបណ្ដាល ដល់កម្មករ-និយោជិកបានយល់ច្បាស់ត្រឹមត្រូវសព្វគ្រប់ពីអំពីតួនាទី និង ការទទួលខុសត្រូវរបស់ខ្ញុំពិតប្រាកដមែន។</p></td>
                    </tr>
                </table>
                <div class="footer" style="margin-top: 20px;">
                    <p​>&nbsp;&nbsp;កំណត់ត្រាតាមដានការងារនិយោជិក ​&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; TT-HRAD-STDP-FM-010-00</p>
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
                        <td style="padding-bottom: 20px; border-top: 1px solid black;"><b>អ្នកតាមដាន (ផ្នែក)</b></td>
                        <td style="padding-bottom: 20px; border-top: 1px solid black; border-left: 1px solid black;"><b>តំណាងធនធានមនុស្ស</b></td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 50px;">ខ្ញុំសូមបញ្ចាក់ថា ខ្ញុំពិតជាទទួលបានការពន្យល់ ណែនាំការបណ្ដុះបណ្ដាល និង បានយល់ច្បាស់ត្រឹមត្រូវសព្វគ្រប់ពីអំពើតួនាទី ភាកិច្ច និង ការទទួលខុសត្រូវ របស់ខ្ញុំពិតប្រាកដមែន។</td>
                        <td style="padding-bottom: 50px; border-left: 1px solid black;">ខ្ញុំសូមបញ្ចាក់ថា ខ្ញុំពិតជាបានពន្យល់ ណែនាំ បណ្ដុះបណ្ដាល ដល់កម្មករ-និយោជិកបានយល់ច្បាស់ត្រឹមត្រូវសព្វគ្រប់ពីអំពីតួនាទី និង ការទទួលខុសត្រូវរបស់ខ្ញុំពិតប្រាកដមែន។</td>
                    </tr>
                    <tr>
                        <td>ហត្ថលេខា៖...................................................</td>
                        <td style="border-left: 1px solid black;">ហត្ថលេខា&nbsp; &nbsp;៖...................................................</td>
                    </tr>
                    <tr>
                        <td>ឈ្មោះ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;៖....................................................</td>
                        <td style="border-left: 1px solid black;">ឈ្មោះ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;៖....................................................</td>
                    </tr>
                    <tr>
                        <td>កាលបរិច្ឆេទ៖....................................................</td>
                        <td style="border-left: 1px solid black;">កាលបរិច្ចេទ៖....................................................</td>
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

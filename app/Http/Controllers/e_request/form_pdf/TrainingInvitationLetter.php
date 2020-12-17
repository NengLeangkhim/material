<?php

namespace App\Http\Controllers\e_request\form_pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrainingInvitationLetter extends Controller
{
    public function TrainingInvitationLetter()
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
                <h1 style=" font-size: 19px;margin-top:-28px;">TURBOTECH CO., LTD</h1>
            </div>
  
            <div class="title18" style="margin-top:65px;">
                <h3>លិខិតអញ្ជើញ</h3><br>
            </div>
            <div class="row1_18">
                <table style="border:none;margin-top:10px;">
                    <tr style="border:none;">
                        <td style="border:none;"><b>កាលបរិច្ឆេទ</td>
                        <td style="border:none;padding-left:21.5%;">៖ .....................................................................................................................</td>
                    </tr>
                </table>
                <table style="border:none;margin-top:10px;">
                    <tr style="border:none;">
                        <td style="border:none;"><b>គោរពជូនពី</td>
                        <td style="border:none;padding-left:22.5%;">៖ .....................................................................................................................</td>
                    </tr>
                </table>
                <table style="border:none;margin-top:10px;">
                    <tr style="border:none;">
                        <td style="border:none;"><b>ជូនចំពោះ</td>
                        <td style="border:none;padding-left:24%;">៖ .....................................................................................................................</td>
                    </tr>
                </table>
                <table style="border:none;margin-top:10px;">
                    <tr style="border:none;">
                        <td style="border:none;"><b>ចម្លងជូន</td>
                        <td style="border:none;padding-left:25.1%;">៖ .....................................................................................................................</td>
                    </tr>
                </table>
                <table style="border:none;margin-top:10px;">
                    <tr style="border:none;">
                        <td style="border:none;"><b>យោង</td>
                        <td style="border:none;padding-left:27.8%;">៖ .....................................................................................................................</td>
                    </tr>
                </table>
                <table style="border:none;margin-top:10px;">
                    <tr style="border:none;">
                        <td style="border:none;"><b>កម្ម&nbsp;វ&nbsp;ត្ថុ</td>
                        <td style="border:none;padding-left:26.7%;">៖ <b>ចូលរួមវគ្គបណ្តូះបណ្តាលបុគ្គលិក</td>
                    </tr>
                </table>
                <br>
                <div class="row2_18" style="font-size=15px;">
                    <p style="margin-left:50px;margin-top:-2px;margin-right:20px;">តបតាមកម្មវត្ថុខាងលើ ខ្ញុំបា​នមានកិត្តិយសសូមជម្រាបជូនថា បុគ្គលិកដែលមានរាយនាមខាង</p><br>
                    <p style="margin-left:25px;margin-top:-35px;margin-right:20px;">ក្រោមនេះត្រូវបានគោរពអញ្ជើញចូលរួមវគ្គបណ្តុះបណ្តលស្តីពី៖........................................................................<br>
                    ...............................................................................................................................ដែលរៀបចំដោយ៖.............................
                    .............................................................................................និងទទួលការឧបត្ថម្ភពី៖.............................................ចាប់
                    ពីថ្ងៃទី...................ខែ......................ឆ្នាំ......................... &nbsp; &nbsp;ដល់ថ្ងៃទី.......................ខែ...................ឆ្នាំ...................ពេល
                    ព្រឹកពី ម៉ោង..................ដល់..................ពេលរសៀលពីម៉ោង..................ដល់........................។</p>
                </div>
                <br>
                <div class="row3_18"​ style="text-align:center;margin-top:-45px;">
                    <h3>បញ្ជីរាយនាមបុគ្គលិក</h3>
                </div>
                <table class="table" style="margin-top:-10px;margin-left: 20px; margin-right: 20px;">
                <tbody>
                    <tr>
                        <td style="padding:5px 10px;"><p>លរ</p></td>
                        <td style="padding:5px 90px;"><p>ឈ្មោះ</p></td>
                        <td style="padding:5px 20px;"><p>ភេទ</p></td>
                        <td><p> &nbsp; &nbsp; &nbsp; &nbsp; តួនាទី &nbsp; &nbsp; &nbsp; &nbsp;</p></td>
                        <td style="padding:5px 30px;"><p>កន្លែងការងារ</p></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:3px 0px;"><p>១</p></td>
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
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:3px 0px;"><p>៣</p></td>
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
                    </tr>
                    <tr>
                        <td colspan="1" style="padding:3px 0px;"><p>៥</p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                        <td colspan="1"><p></p></td>
                    </tr>
                </tbody>
            </table>
                <div class="row4_18" style="font-size=15px;margin-top:25px;">
                    <p style="margin-left:50px;margin-right:20px;">អាស្រ័យហេតុនេះ សូមបុគ្គលិកដែលមានរាយនាមខាងលើ អញ្ជើញចូលរួមវគ្គបណ្តុះបណ្តាលនេះ</p><br>
                    <p style="margin-left:25px;margin-right:20px;margin-top:-35px;">ដោយក្តីសោមនស្សរីករាយ ព្រមទាំងរៀបចំផ្ទេរការងារ និង​ ការទទួលខុសត្រូវដល់បុគ្គលិកផ្សេងដើម្បីអនុវត្តឲ្យមានប្រសិទ្ធភាព
                    បំផុត។</p><br>
                    <p style="margin-left:50px;margin-top:-30px;">សូមបុគ្គលិកទាំងអស់ទទួលការរាប់អានដ៏ខ្ពង់ខ្ពស់ពីខ្ញុំបាទ។</p>
                </div>
                <br>
                <div class="lastrow18">
                    <p>ភ្នំពេញ.ថ្ងៃទី.................ខែ.............ឆ្នាំ................</p><br>
                    <h3>អ្នកសម្របសម្រួលកម្មវិធី</h3>
                </div>
                <div class="footer18">
                    <p>&nbsp;លិខិតអញ្ជើញ (TrainingInvitationLetter) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    TT-HRAD-SCPP-FM-007-00</p>
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
        $filename = 'TrainingInvitationLetter.pdf';

        // // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');
    }
}

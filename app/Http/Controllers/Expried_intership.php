<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Expried_intership extends Controller
{
    public function Expried_internshipPDF()

    {
    	$html='<html>
            <head>
                <title>E-Request expried_intership</title>
                <link rel="stylesheet" href="css/e_request/form_main.css">
            </head>
            <body>
                <table class="top-header">
                    <tr>
                        <td class="left"><h3>ការិយាល័យកណ្ដាល</h3></td>
                    </tr>
                    <tr>
                        <td class="center"><h3>សេចក្ដីសម្រេច</h3></td>
                    </tr>
                    <tr>
                        <td class="center"><h3>ស្ដីពី</h3></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 80px;">- បានឃើញអនុស្សរនៈ និងលក្ខន្តិកៈរបស់ <b>ក្រុមហ៊ុន​​ ធើបូថេក ង.ក</b>។</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 80px;">- យោងតាមភាពចាំបាច់របស់​ <b>ក្រុមហ៊ុន​​ ធើបូថេក ង.ក</b>។</td>
                    </tr>
                    <tr>
                        <td class="center"><h3 class="center_heading">សម្រេច</h3></td>
                    </tr>
                </table>
                <table class="expried_internship">
                    <tr>
                        <td class="right" style="width: 20%; font-weight: bold; padding-top: -75px; padding-right: 10px;">ប្រការ ១៖</td>
                        <td style="width: 80%;">អនុញ្ញាតឲ្យ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;​ក្នុងតួនាទីជា &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;កាន់អត្តសញ្ញាណប័ណ្ណការងារលេខ បម្រើការងារនៅ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ឆ្លងផុតការសាកល្បងដោយជោកជ័យ ព្រមទាំងទទួលបានប្រាក់បៀវត្សរ៏គោលចំនួនក្នុងមួយខែនិងប្រាក់ឧបត្ថមនានាតាមគោលការណ៍កំណត់របស់ <b>ក្រុមហ៊ុន ធើបូថេក​​ ឯ.ក។</b></td>
                    </tr>
                    <tr>
                        <td class="right" style="width: 20%; font-weight: bold; padding-right: 10px;">ប្រការ ២៖</td>
                        <td style="width: 80%;">សេចក្ដីសម្រេចនេះ មានប្រសិទ្ធភាពអនុវត្ត ចាប់ពីថ្ងៃ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ខែ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ឆ្នាំ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;តទៅ។</td>
                    </tr>
                    <tr>
                        <td class="right" style="width: 20%;font-weight: bold; padding-top: -25px; padding-right: 10px;">ប្រការ ៣៖</td>
                        <td style="width: 80%;">កាលបរិច្ឆេទសម្រាប់ការវាយតម្លៃលទ្ធផលការងារនិយោជិក អាចអនុវត្តចន្លោះពេលចាប់ពីថ្ងៃ​​​ទី &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ខែ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ឆ្នាំ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ដល់ថ្ងៃទី &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ខែ  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ឆ្នាំ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;។</td>
                    </tr>
                    <tr>
                        <td class="right" style="width: 20%;font-weight: bold; padding-top: -25px; padding-right: 10px;">ប្រការ ៤៖</td>
                        <td style="width: 80%;">គ្រប់នាយកដ្ធានពាក់ព័ន្ធ នៃ <b>ក្រុមហ៊ុន ធើបូថេក ឯ.ក</b> និងសាមីជនត្រូវអនុវត្តនូវសេចក្ដី<br>សម្រេចនេះតាមភារកិច្ចរៀងៗខ្លួន។</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="right">ថ្ងៃ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ឆ្នាំជូត ទោស័ក ព.ស​២៥៦៤</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="right">ត្រូវនឹងថ្ងៃទី &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ខែ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ឆ្នាំ២០២០</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="right" style="font-weight: bold; padding-right: 40px;">អគ្គនាយក</td>
                    </tr>
                </table>
                <table class="copy">
                    <tbody>
                        <tr>
                            <td><b>ចម្លងជូនៈ</b></td>
                        </tr>
                        <tr>
                            <td>-ដូចមានចែងក្នុងប្រការ៤</td>
                        </tr>
                        <tr>
                            <td>"ដើម្បីជូនជ្រាបជាព័ត៌មាន"</td>
                        </tr>
                        <tr>
                            <td>-សាមីខ្លួន "ដើម្បីអនុវត្ត"</td>
                        </tr>
                        <tr>
                            <td>-ឯកសារកាលប្បវត្ដិ</td>
                        </tr>
                    </tbody>
                </table>
                <div class="heading">
                    <p style="font-size: 12px; padding-left: 100px; padding-top: 50px;">TT-HRAD-EPA-FM-003-00</p>
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
        $filename = 'Expried_intership.pdf';
        $mpdf->SetDisplayMode('fullwidth');
        // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');

    }

}

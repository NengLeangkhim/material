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
                <div class="expried_intership">
                    <div class="top_left_heading">
                        <h3>ការិយាល័យកណ្ដាល</h3>
                    </div>
                    <div class="center_heading">
                        <h3>សេចក្ដីសម្រេច</h3>
                        <h3>ស្ដីពី</h3>
                        <h3 style="text-align: center;">ការឆ្លងផុតការងារសាកល្បង​ និង​ ការផ្ដល់ប្រាក់បៀវត្សរ៍ថ្មី</h3>
                    </div>
                    <div class="list_rule">
                        <ul>
                            <li>បានឃើញអនុស្សរនៈ និងលក្ខន្តិកៈរបស់ <b>ក្រុមហ៊ុន​​ ធើបូថេក ង.ក</b>។</li>
                            <li>យោងតាមភាពចាំបាច់របស់​ <b>ក្រុមហ៊ុន​​ ធើបូថេក ង.ក</b>។</li>
                        </ul>
                        <h3 class="center_heading">សម្រេច</h3>
                    </div>
                    <div​​ class="row"">
                        <h3><b>ប្រការ ១៖</b></h3>
                        <p style="margin-left: 100px;">អនុញ្ញាតឲ្យ​ក្នុងតួនាទីជាកាន់អត្តសញ្ញាណប័ណ្ណការងារលេខ</p>
                        <p style="margin-left: 100px;>បម្រើការងារនៅឆ្លងផុតការសាកល្បងដោយជោកជ័យព្រមទាំងទទួលបានប្រាក់បៀវត្សរ៏គោលចំនួនក្នុងមួយខែនិងប្រាក់ឧបត្ថមនានាតាមគោលការណ៍កំណត់របស់ក្រុមហ៊ុន ធើបូថេក​​ ឯ.ក</p>
                    </div>
                    <div​​ class="row">
                        <h3><b>ប្រការ ២៖</b></h3>
                        <p>សេចក្ដីសម្រេចនេះមានប្រសិទ្ធភាពអនុវត្ត ចាប់ពីថ្ងៃ    ខែ  ឆ្នាំ    តទៅ។</p>
                    </div>
                    <div​​ class="row">
                        <h3><b>ប្រការ ៣៖</b></h3>
                        <p>កាលបរិច្ឆេទសម្រាប់ការវាយតម្លៃលទ្ធផលការងារនិយោជិក អាចអនុវត្តចន្លោះចាប់ពីថ្ងៃ​​​    ទី    ខែ   ឆ្នាំ      ដល់ថ្ងៃទី</p>
                    </div>
                    <div​​ class="row">
                        <h3><b>ប្រការ ៤៖</b></h3>
                        <p>គ្រប់នាយកដ្ធានពាក់ព័ន្ធ នៃ<b>ក្រុមហ៊ុន ធើបូថេក ឯ.ក</b>​នឹងសាមីជនត្រូវអនុវត្តនូវសេចក្ដីសម្រេចនេះតាមភារកិច្ចរៀងៗខ្លួន។</p>
                    </div>
                    <div class="footer" style="float: right; width: auto;">
                        <p>ថ្ងៃ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ឆ្នាំជួតទោស័កព.ស២៥៦៤</p>
                        <p>ត្រូវនឹងថ្ងៃ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ទី&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ខែ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ឆ្នាំ២០២០</p>
                        <div class="signature">
                            <h3><b>អគ្គនាយក</b></h3>
                        </div>
                    
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
        $filename = 'Expried_intership.pdf';
        $mpdf->SetDisplayMode('fullwidth');
        // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');

    }

}

<?php

namespace App\Http\Controllers\e_request\pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class font_standard extends Controller
{
    public function font_standardPDF()

    {
    	$html='<html>
            <head>
                <title>E-Request Font Standard</title>
                <link rel="stylesheet" href="css/e_request/form_main.css">
            </head>
            <body>
            <div class="font_standard">
                <p class="left">ទម្រង់ខ្នាតអក្សរសម្រាប់ប្រើប្រាស់ដូចខាងក្រោម៖</p>
                <div class="heading" style="padding-top: 40px; padding-bottom: 20px;">
                    
                    <p class="center" style="font-weight: bold;">សេចក្ដីសម្រេច<br>ស្ដីពី</p>
                    <p class="center" style="font-weight: bold;">ការធ្វើវិសោធនកម្ម..........................................................</h3>
                    <p class="left pdd-l-20">បានឃើញអនុស្សរណៈ និងលក្ខន្តិកៈ របស់ ក្រុមហ៊ុន ធើបូថេក សឺលូសិន ឯ.ក ។</p>
                    <p class="left pdd-l-20">....................................................................................................................................................</p>
                    <p class="left pdd-l-20">....................................................................................................................................................</p>
                </div>
                <p class="center" style="padding-top: 50px;">សម្រេច</p>
                <table class="font_standard">
                    <tr>
                        <td class="left" style="width: 15%; font-weight: bold; padding-right: 10px;">ប្រការ ១៖</td>
                        <td style="width: 85%;">ធ្វើវិសោធកម្ម<span>...............................................................................................................</span>។</td>
                    </tr>
                    <tr>
                        <td class="left" style="width: 15%; font-weight: bold; padding-right: 10px;">ប្រការ ២៖</td>
                        <td style="width: 85%;">សេចក្ដីសម្រេចណាដែរមានខ្លឹមសារផ្ទុយពីសេចក្ដីសម្រេចនេះ ចាត់ទុកជានិរាករណ៍</td>
                    </tr>
                    <tr>
                        <td class="left" style="width: 15%;font-weight: bold; padding-top: -25px; padding-right: 10px;">ប្រការ ៣៖</td>
                        <td style="width: 85%;">និយោជិកទាំងអស់ នៃក្រុមហ៊ុន ធើបូថេក សឺលូសិន ឯ.ក ត្រូវអនុវត្តតាមសេចក្ដីសម្រេចនេះ ឲ្យបានត្រឹមត្រូវនឹងមានប្រសិទ្ធភាពបំផុត។</td>
                    </tr>
                    <tr>
                        <td class="left" style="width: 15%;font-weight: bold; padding-top: -25px; padding-right: 10px;">ប្រការ ៤៖</td>
                        <td style="width: 85%;">សេចក្ដីសម្រេចនេះ មានប្រសិទ្ធភាព ចាប់ពីថ្ងៃទី<span>................</span>ខែ<span>..................</span>ឆ្នាំ<span>..................</span><br>ឫចាប់ពីថ្ងៃទីចុះហត្ថលេខានេះតទៅ។</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="right pdd-r-10">ថ្ងៃ<span>....................</span>កើត​/រោចខែ<span>.................</span>ឆ្នាំ<span>.....................</span>ព.ស ២៥៦<span>...</span></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="right pdd-r-10"><span>.................,</span>ថ្ងៃទី<span>..................</span>ខែ<span>...................</span>ឆ្នាំ ២០១<span>.........</span></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="right pdd-r-100"><b>អគ្គនាយក</b></td>
                    </tr>
                </table>
                <div class="copy_to left" style="padding-top: 200px;">
                    <p style="font-weight: bold;"><u>ចម្លងជូន:</u></p>
                    <p> &nbsp; &nbsp;ដូចក្រការ៣ខាងលើ</p>
                    <p> &nbsp; &nbsp;<b>"ដើម្បីជ្រាបជាព័ត៏មាន និងអនុវត្ត"</b></p>
                    <p> &nbsp; &nbsp;ឯកសារ-កាលប្បវត្តិ</p>
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
        $filename = 'font-standard.pdf';
        $mpdf->SetDisplayMode('fullwidth');
        // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');

    }
}

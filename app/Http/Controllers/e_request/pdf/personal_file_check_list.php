<?php

namespace App\Http\Controllers\e_request\pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class personal_file_check_list extends Controller
{
    public function personal_file_check_listPDF()

    {
    	$html='<html>
            <head>
                <title>E-Request Staff note</title>
                <link rel="stylesheet" href="css/e_request/form_main.css">
            </head>
            <body>
            <div class="personal_file_check_list">
                <div class="logo center">
                    <img style="width: 200px;" src="images/turbotech.png">
                </div>
                <div class="center mg-0" >
                    <h1 style="font-size: 35px;">ក្រុមហ៊ុនធើបូថេក   ឯ.ក</h1>
                    <h1 style=" font-size: 25px;">TURBOTECH CO., LTD</h1>
                </div>
                <div class="heading" style="padding-top: 40px; padding-bottom: 20px;">
                    <h3 class="center">បញ្ចីសង្ខេបព័ត៌មានបុគ្គលិក</h3>
                    <h3 class="center" style="font-size: 16px;">Personal File Check List</h3>
                </div>
                <table class="personal_file left">
                    <tbody>  
                        <tr>
                            <td style="width: 15%;">ឈ្មោះ</td>
                            <td style="width: 40%;">៖<span>.....................................................</span></td>
                            <td style="width:5%;">1.</td>
                            <td style="width:40%;"><input type="checkbox"></input>ពាក្សចូលបម្រើការងារ</td>
                        </tr>
                        <tr>
                            <td style="width: 15%;"></td>
                            <td style="width: 40%;"></td>
                            <td style="width:5%;">2.</td>
                            <td style="width:40%;"><input type="checkbox"></input>ប្រវត្តិរូបសង្ខេប/លិខិតអមការងារ</td>
                        </tr>                                       
                        <tr>
                            <td style="width: 15%;">Name</td>
                            <td style="width: 40%;">៖<span>.....................................................</span></td>
                            <td style="width:5%;">3.</td>
                            <td style="width:40%;"><input type="checkbox"></input>វិញ្ញាបនប័ត្របញ្ចាក់ការសិក្សា</td>
                        </tr>
                        <tr>
                            <td style="width: 15%;"></td>
                            <td style="width: 40%;"></td>
                            <td style="width:5%;">4.</td>
                            <td style="width:40%;"><input type="checkbox"></input>តារាងវាយតម្លៃជ្រើសរើសដំបូង</td>
                        </tr>                                       
                        <tr>
                            <td style="width: 15%;">ភេទ</td>
                            <td style="width: 40%;">៖<span>.....................................................</span></td>
                            <td style="width:5%;">5.</td>
                            <td style="width:40%;"><input type="checkbox"></input>អត្តសញ្ញាណប័ណ្ឌសញ្ចាតិខ្មែរ</td>
                        </tr>
                        <tr>
                            <td style="width: 15%;"></td>
                            <td style="width: 40%;"></td>
                            <td style="width:5%;">6.</td>
                            <td style="width:40%;"><input type="checkbox"></input>សៀវភៅគ្រួសារ/សំបុត្រកំណើត</td>
                        </tr>                                       
                        <tr>
                            <td style="width: 15%;">Sex</td>
                            <td style="width: 40%;">៖<span>.....................................................</span></td>
                            <td style="width:5%;">7.</td>
                            <td style="width:40%;"><input type="checkbox"></input>សម្រង់ព័ត៌មានបុគ្គលិក</td>
                        </tr>
                        <tr>
                            <td style="width: 15%;"></td>
                            <td style="width: 40%;"></td>
                            <td style="width:5%;">8.</td>
                            <td style="width:40%;"><input type="checkbox"></input>កិច្ចសន្យាអ្នកធានា</td>
                        </tr>                                       
                        <tr>
                            <td style="width: 15%;">តួនាទី</td>
                            <td style="width: 40%;">៖<span>.....................................................</span></td>
                            <td style="width:5%;">9.</td>
                            <td style="width:40%;"><input type="checkbox"></input>លិខិតតែងតាំង</td>
                        </tr>
                        <tr>
                            <td style="width: 15%;"></td>
                            <td style="width: 40%;"></td>
                            <td style="width:5%;">10.</td>
                            <td style="width:40%;"><input type="checkbox"></input>លិខិតផ្ដល់ការងារ</td>
                        </tr>                                       
                        <tr>
                            <td style="width: 15%;">Position</td>
                            <td style="width: 40%;">៖<span>.....................................................</span></td>
                            <td style="width:5%;">11.</td>
                            <td style="width:40%;"><input type="checkbox"></input>កិច្ចសន្យាការងា</td>
                        </tr>
                        <tr>
                            <td style="width: 15%;"></td>
                            <td style="width: 40%;"></td>
                            <td style="width:5%;">12.</td>
                            <td style="width:40%;"><input type="checkbox"></input>សៀវភៅការងារ</td>
                        </tr>                                       
                        <tr>
                            <td style="width: 15%;">លេខបណ្ណ</td>
                            <td style="width: 40%;">៖<span>.....................................................</span></td>
                            <td style="width:5%;">13.</td>
                            <td style="width:40%;"><input type="checkbox"></input>បណ្ណបើកបរ</td>
                        </tr>
                        <tr>
                            <td style="width: 15%;"></td>
                            <td style="width: 40%;"></td>
                            <td style="width:5%;">14.</td>
                            <td style="width:40%;"><input type="checkbox"></input>លិខិតថ្កោលទោស</td>
                        </tr>                                       
                        <tr>
                            <td style="width: 15%;">ID Card</td>
                            <td style="width: 40%;">៖<span>.....................................................</span></td>
                            <td style="width:5%;">15.</td>
                            <td style="width:40%;"><input type="checkbox"></input>លិខិតពិនិត្យសុខភាព</td>
                        </tr>
                        <tr>
                            <td style="width: 15%;"></td>
                            <td style="width: 40%;"></td>
                            <td style="width:5%;">16.</td>
                            <td style="width:40%;"><input type="checkbox"></input>កំណត់ត្រាការងារបុគ្គលិក</td>
                        </tr>                                       
                        <tr>
                            <td style="width: 15%;">លេខទូរស័ព្ទ</td>
                            <td style="width: 40%;">៖<span>.....................................................</span></td>
                            <td style="width:5%;">17.</td>
                            <td style="width:40%;"><input type="checkbox"></input>លិខិតបញ្ចាក់កិរិយាមាយាទ</td>
                        </tr>
                        <tr>
                            <td style="width: 15%;"></td>
                            <td style="width: 40%;"></td>
                            <td style="width:5%;">18.</td>
                            <td style="width:40%;"><input type="checkbox"></input>លិខិតឆែកអ្នកធានា</td>
                        </tr>                                       
                                                            
                    </tbody>
                </table>
                <div class="personal_file_footer">
                    <p class="left">TT-HRAD-NEOTP-FM-001-00</p>
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
        $filename = 'personal_file_check_list.pdf';
        $mpdf->SetDisplayMode('fullwidth');
        // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');

    }
}

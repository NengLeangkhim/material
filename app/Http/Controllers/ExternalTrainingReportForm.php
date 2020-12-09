<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExternalTrainingReportForm extends Controller
{
    public function ExternalTrainingReportForm()
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
            <div style="margin-left:20px;margin-right:20px; font-size:15px;">
                <div class="logo" style="margin-left:20px;">
                    <img style="width: 170px; height: 100px;margin-top:-10px;" src="img/formimage/turbotech.png">
                </div>
                <div class="namecompany" style="text-align:center;margin-top:-117px;">
                    <h1 style="font-size: 25px;">ក្រុមហ៊ុនធើបូថេក​​ ឯ.ក</h1><br>
                    <h1 style=" font-size: 19px;margin-top:-30px;">TURBOTECH CO., LTD</h1>
                </div>
                <br>
                <br>
                <div style="text-align:center;font-size:15px;margin-top:-30px;">
                    <h3 >របាយការណ៍</h3><br>
                    <h3 style="margin-top:-40px;">ស្តីពី</h3><br>
                    <h3 style="margin-top:-46px;">លទ្ធផលការចូលរួមបណ្តុះបណ្តាល</h3><br>
                </div>
                <div style="margin-top:-40px;">
                    <b>១. អំពីអ្នកចូលរួម</b>
                </div>
                <div style="margin-top:-30px;">
                    <table style="margin-top:30px;">
                        <tr>
                            <td style="padding:5px 0%;padding-left:10px;">ឈ្មោះ៖.................................................................................</td>
                            <td style="padding-left:10px;padding-right:10px;">ភេទ៖...........................................................................</td>
                        </tr>
                        <tr>
                            <td style="padding:5px 0%;padding-left:10px;">តួនាទី៖..................................................................................</td>
                            <td style="padding-left:10px;">នាយកដ្ឋាន៖.............................................................</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding:5px 0%;padding-left:10px;padding-right:10px;">កាលបរិច្ឆេទចូលបម្រើការងារក្នុងតួនាទីបច្ចុប្បន្ន៖.............................................................................................</td>

                        </tr>
                        <tr>
                            <td colspan="2" style="padding:5px 0%;padding-left:10px;padding-right:10px;">កាលបរិច្ឆេទចូលបម្រើការងារ៖................................................................................................................................</td>

                        </tr>
                        <tr>
                            <td colspan="2" style="padding:5px 0%;padding-left:10px;padding-right:10px;">ឧបត្ថម្ភដោយ៖...............................................................................................................................................................</td>

                        </tr>
                    </table>

                <div>
                <div style="margin-top:5px;">
                    <b>២. អំពីវគ្គបណ្តុះបណ្តាល</b>
                </div>
                <div style="margin-top:-30px;">
                    <table style="margin-top:33px;">
                        <tr>
                            <td style="padding:5px 0%;padding-right:120px;padding-left:10px;">ប្រធានបទបណ្តុះបណ្តាល </td>
                            <td colspan="2" style="padding-right:10px;padding-left:10px;">.........................................................................</td>
                        </tr>
                        <tr>
                            <td style="padding:5px 0%;padding-left:10px;padding-left:10px;">អង្គភាពបណ្តុះបណ្តាល</td>
                            <td colspan="2" style="padding-right:10px;padding-left:10px;">.........................................................................</td>
                        </tr>
                        <tr>
                            <td style="padding:5px 0%;padding-left:10px;padding-left:10px;">កាលបរិច្ឆេទចាប់ផ្តើម</td>
                            <td style="padding-right:10px;padding-left:10px;">........./............./...........</td>
                            <td style="padding-right:10px;padding-left:10px;">ចំនួនថ្ងៃ​៖.........................</td>
                        </tr>
                        <tr>
                            <td style="padding:5px 0%;padding-left:10px;padding-left:10px;">កាលបរិច្ឆេទបញ្ចប់</td>
                            <td colspan="2" style="padding-right:10px;padding-left:10px;">............../.............../...............</td>
                        </tr>
                        <tr>
                            <td style="padding:5px 0%;padding-left:10px;padding-left:10px;">ទីកន្លែងបណ្តុះបណ្តាល</td>
                            <td colspan="2" style="padding-right:10px;padding-left:10px;">.........................................................................</td>
                        </tr>
                    </table>
                </div>
                <div>
                    <div style="margin-top:8px;">
                        <b>៣. សង្ខេបខ្លឹមសារវគ្គបណ្តុះបណ្តាលទាំងមូល</b>
                    </div>               
                        <p style="margin-top:0px;">...................................................................................................................................................</p><br>
                        <p style="margin-top:-30px;">...................................................................................................................................................</p><br>
                        <p style="margin-top:-30px;">...................................................................................................................................................</p><br>
                        <p style="margin-top:-30px;">...................................................................................................................................................</p><br>
                        <p style="margin-top:-30px;">...................................................................................................................................................</p><br>
                        <p style="margin-top:-30px;">.................................................................................................................................................<span>។</span></p><br>
                </div>
                <div>
                    <div style="margin-top:-40px;">
                        <b>៤. វត្ថុបំណងសំខាន់នៃវគ្គ</b>
                    </div>             
                  
                    <p style="margin-top:0px;">...................................................................................................................................................</p><br>
                    <p style="margin-top:-30px;">...................................................................................................................................................</p><br>
                    <p style="margin-top:-30px;">...................................................................................................................................................</p><br>
                    <p style="margin-top:-30px;">...................................................................................................................................................</p><br>
                    <p style="margin-top:-30px;">...................................................................................................................................................</p><br>
                    <p style="margin-top:-30px;">.................................................................................................................................................<span>។</span></p><br>
                </div>
              
                <div>
                    <div class="footer22" style="margin-top:-260px;">
                        <p>&nbsp;របាយការណ៍ចូលរួមវគ្គបណ្តុះបណ្តាលខាងក្រៅ (External Training Report Form) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        TT-HRAD-STDP-FM-012-00</p>
                    </div>   
                    <br>  
                     <div style="margin-top:-15px;">
                        <b>៥. ចំណេះដឹងដែលទាក់ទងនឹងការងារបច្ចុប្បន្ន</b>
                    </div> 
                          
                        <p style="margin-top:0px;">...................................................................................................................................................</p><br>
                        <p style="margin-top:-30px;">...................................................................................................................................................</p><br>
                        <p style="margin-top:-30px;">...................................................................................................................................................</p><br>
                        <p style="margin-top:-30px;">...................................................................................................................................................</p><br>
                        <p style="margin-top:-30px;">...................................................................................................................................................</p><br>
                        <p style="margin-top:-30px;">.................................................................................................................................................<span>។</span></p><br>
                </div>
                <div>
                    <div style="margin-top:-10px;">
                        <b>៦. ចំណេះដឹងដែលមិនទាក់ទងនឹងការងារបច្ចុប្បន្ន</b>
                    </div>
                        <p style="margin-top:0px;">...................................................................................................................................................</p><br>
                        <p style="margin-top:-30px;">...................................................................................................................................................</p><br>
                        <p style="margin-top:-30px;">...................................................................................................................................................</p><br>
                        <p style="margin-top:-30px;">...................................................................................................................................................</p><br>
                        <p style="margin-top:-30px;">...................................................................................................................................................</p><br>
                        <p style="margin-top:-30px;">.................................................................................................................................................<span>។</span></p><br>
                <div>
                    <div style="margin-top:-10px;">
                        <b>៧. យោបល់រួមចំពោះវគ្គបណ្តុះបណ្តាល</b>
                    </div>           
                        <p style="margin-top:0px;">...................................................................................................................................................</p><br>
                        <p style="margin-top:-30px;">...................................................................................................................................................</p><br>
                        <p style="margin-top:-30px;">...................................................................................................................................................</p><br>
                        <p style="margin-top:-30px;">...................................................................................................................................................</p><br>
                        <p style="margin-top:-30px;">...................................................................................................................................................</p><br>
                        <p style="margin-top:-30px;">.................................................................................................................................................<span>។</span></p><br>
                </div>
                <div>
                    <p style="margin-top:-30px;font-size:15px;">&nbsp; &nbsp; &nbsp; <i><b>បញ្ជាក់៖</b></i>&nbsp; សូមបំពេញទម្រង់លទ្ធផលនេះ និងបញ្ជូនមកនាយកដ្ឋានធនធានមនុស្ស និង​ រដ្ឋកាល <br>
                    វិញ ១សប្តាហ៍ក្រោយពីបញ្ចប់វគ្គបណ្តុះបណ្តាល។ </p>
                </div>
                <br>
                <div class="footer22">
                    <p>&nbsp;របាយការណ៍ចូលរួមវគ្គបណ្តុះបណ្តាលខាងក្រៅ (External Training Report Form) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    TT-HRAD-STDP-FM-012-00</p>
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
        $filename = 'ExternalTrainingReportForm.pdf';

        // // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');
    }
}

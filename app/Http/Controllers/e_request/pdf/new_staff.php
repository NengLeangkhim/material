<?php

namespace App\Http\Controllers\e_request\pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class new_staff extends Controller
{
    public function new_staffPDF()

    {
    	$html='<html>
            <head>
                <title>E-Request New-Staff</title>
                <link rel="stylesheet" href="css/e_request/form_main.css">
            </head>
            <body>
                <div class="mistake_header">
                    <div class="logo" style="margin-left:20px;">
                        <img style="width: 170px; ;margin-top:-10px;" src="images/turbotech.png">
                    </div>
                    <div class="namecompany" style="text-align:center;margin-top:-117px;">
                        <h1 style="font-size: 25px;">ក្រុមហ៊ុនធើបូថេក   ឯ.ក</h1>
                        <h1 style=" font-size: 19px; margin-top: 0;">TURBOTECH CO., LTD</h1>
                    </div>
                </div>
                <div class="heading">
                    <h3 class="center_heading">តារាងឧទ្ទេសនាមការងារកម្មករ-និយោជិកថ្មី</h3>
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
                            <td>ឈ្មោះថ្នាក់ដឹកនាំផ្ទាល់</td>
                            <td></td>
                            <td>តួនាទី</td>
                            <td></td>
                        </tr>                           
                    </tbody>
                </table>
                <div class="heading">
                    <h3 style="font-size: 16px;">II.សូមស្វាគមន៍ដែលបានចូលជាគ្រួសារដ៍ធំរបស់ធើបូថេក</h3>
                    <p style="padding-left: 20px;">លោក/លោកស្រី/អ្នកនាងកញ្ញាជាទីគោរព និង រាប់អាន</p>
                    <p style="padding-left: 20px;">ក្រុមហ៊ុន ធើបូថេក ឯ.ក សូមស្វាគមន៍វត្តមានរបស់អ្នក ដែរបានក្លាយជាសមាជិកថ្មីរបស់យើង ។ យើងជឿជាក់ថា វត្តមានរបស់អ្នកនៅក្នុង ធើបូថេក ពិតជាអាចធ្វើឲ្យធើបូថេកកាន់តែរីកចំម្រើន និងខ្លាំងខ្លាទៅថ្ងៃមុខទៀត ។ យើងសូមបដិសណ្ធាកិច្ចចំពោះវត្តមានដ៍ថ្លៃថ្លារបស់អ្នក និង សូមធ្វើការណែនាំ និង ភារកិច្ចមួយចំនួនដែលអ្នកត្រូវបំពេញ &nbsp;។ &nbsp;យើងសង្ឃឹមយ៉ាងមុតមាំថា ក្រោយពេលការណែនាំការងារជាបឋមនេះ &nbsp;អ្នកនឹងទទួលបាននូវចំណេះដឹងដូចខាងក្រោមនេះ៖</p>
                </div>
                <table class="new_staff">
                    <tbody>
                        <tr>
                            <td colspan="4" style="text-align: left; font-weight: bold;">នាយកដ្ឋានធនធានមនុស្ស និង រដ្ឋបាល</td>
                        </tr>
                        <tr>
                            <td rowspan="2" style="width: 29%; text-align: center;">ការងារត្រូវណែនាំ</td>
                            <td rowspan="2" style="width: 45%; text-align: center;">បរិយាយ</td>
                            <td rowspan="1" colspan="2" style="width:30%; text-align: center;">លទ្ធផលសម្រេចបាន</td>
                        </tr>
                        <tr>
                            <td colspan="1" style="width:13%;text-align: center;">បញ្ចប់</td>
                            <td colspan="1" style="width:13%;text-align: center;">មិនបញ្ចប់</td>
                        </tr>  
                        
                        <tr>
                            <td style="width: 29%;text-align: center;">អំពីធើបូថេក</td>
                            <td style="width: 45%;">ប្រវត្តិធើបូថេក រចនាសម្ព័ន្ធកម្មករ-និយោជិក រចនាសម្ព័ន្ធការងារ ទស្សនៈវិស័យ បេសកកម្ម វត្ថុបំណងអជីវកម្ម</td>
                            <td style="width:13%;text-align: center;"><input type="checkbox"></input></td>
                            <td style="width:13%;text-align: center;"><input type="checkbox"></input></td>
                        </tr>             
                        <tr>
                            <td style="width: 29%;text-align: center;">គោលការធនធានមនុស្ស</td>
                            <td style="width: 45%;">គោលការណ៍ នីតិវិធី សេចក្ដីណែនាំ និង សេចក្ដីជូនដំណឹងផ្សេងៗ</td>
                            <td style="width:13%;text-align: center;"><input type="checkbox"></input></td>
                            <td style="width:13%;text-align: center;"><input type="checkbox"></input></td>
                        </tr>             
                        <tr>
                            <td style="width: 29%;text-align: center;">គោលការណ៍សុវត្ថិភាព</td>
                            <td style="width: 45%;">បង្ហាញកន្លែងសម្រាក ទ្វាសុវត្ថិភាពពេលមានអាសន្ន បន្ទប់អនាម័យ កន្លែងអាហារ និង តំបន់ហាមឃាត់នានា</td>
                            <td style="width:13%;text-align: center;"><input type="checkbox"></input></td>
                            <td style="width:13%;text-align: center;"><input type="checkbox"></input></td>
                        </tr>             
                        <tr>
                            <td style="width: 29%;text-align: center;">សេចក្ដីណែនាំផ្សេងៗ</td>
                            <td style="width: 45%;">គោលការណ៍ប្រតិបត្តិធនធានមនុស្ស ការទំនាក់ទំនងការងារ ការសុំច្បាប់ ការដោះស្រាយជម្លោះការងារ ការសុំការ<br>លាលែងពីការងារ</td>
                            <td style="width:13%;text-align: center;"><input type="checkbox"></input></td>
                            <td style="width:13%;text-align: center;"><input type="checkbox"></input></td>
                        </tr> 
                    </tbody>
                </table>
                <div class="footer" style="margin-top: 35px;">
                    <p​>&nbsp;&nbsp;កំណត់ត្រាតាមដានការងារនិយោជិក ​​&nbsp; ​​&nbsp; ​​&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; TT-HRAD-STDP-FM-010-00</p>
                </div>
                <table class="new_staff">
                    <tbody>            
                        <tr>
                            <td style="width: 29%;text-align: center;">វិធានវិន័យ<br>និងកម្រិតប្រតិបត្តិ</td>
                            <td style="width: 45%;">ការដាក់ពិន័យ កំហុសធ្ងន់ ការបញ្ឍប់ពី<br>ការងារ</td>
                            <td style="width:13%;text-align: center;"><input type="checkbox"></input></td>
                            <td style="width:13%;text-align: center;"><input type="checkbox"></input></td>
                        </tr>             
                        <tr>
                            <td style="width: 29%;text-align: center;">បៀវត្ស និង អត្ថប្រយោជន៍</td>
                            <td style="width: 45%;">ប្រាប់ឈ្នួលប្រចាំខែ ប្រចាំសប្តាហ៍ ប្រាក់ថែមម៉ោង និងប្រាប់ឧបត្ថម្ភនានា</td>
                            <td style="width:13%;text-align: center;"><input type="checkbox"></input></td>
                            <td style="width:13%;text-align: center;"><input type="checkbox"></input></td>
                        </tr>             
                        <tr>
                            <td style="width: 29%;text-align: center;">ផ្សេងៗ</td>
                            <td style="width: 45%;">ម៉ោងការងារ ការសម្រាក និងការជូនដំណឹងឈប់សម្រាក</td>
                            <td style="width:13%;text-align: center;"><input type="checkbox"></input></td>
                            <td style="width:13%;text-align: center;"><input type="checkbox"></input></td>
                        </tr>
                    </tbody>
                </table>             
                <div class="heading">
                    <h3 style="font-size: 16px;">III.សេចក្ដីបញ្ចាក់</h3>
                </div>
                <table class="summary">
                    <tr>
                        <td style="padding-bottom: 20px; font-weight: bold; padding-top: 10px;">កម្មករ-និយោជិក</td>
                        <td style="padding-bottom: 20px; font-weight: bold; padding-top: 10px;">អ្នកសម្របសម្រួល</td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 50px;padding-top: 5px;"><p>ខ្ញុំសូមបញ្ចាក់ថា ខ្ញុំពិតជាទទួលបានការពន្យល់ ណែនាំការបណ្ដុះបណ្ដាល និង បានយល់ច្បាស់ត្រឹមត្រូវសព្វគ្រប់ និងយល់ច្បាស់លាស់អំពើតួនាទី ភាកិច្ច និង ការទទួលខុសត្រូវក្នុងតួនាទី របស់ខ្ញុំពិតប្រាកដមែន។</p></td>
                        <td style="padding-bottom: 50px;padding-top: 5px;"><p>ខ្ញុំសូមបញ្ចាក់ថា ខ្ញុំពិតជាបានពន្យល់ ណែនាំ បណ្ដុះបណ្ដាល ដល់កម្មករ-និយោជិកបានយល់ច្បាស់ត្រឹមត្រូវនិងយល់ច្បាស់លាស់អំពើតួនាទី ភាកិច្ច និង ការទទួលខុសត្រូវក្នុងតួនាទី របស់គាត់ពិតប្រាកដមែន។</p></td>
                    </tr>
                    <tr>
                        <td style="padding-top: 50px;">ហត្ថលេខា&nbsp; &nbsp;៖...................................................</td>
                        <td style="padding-top: 50px;">ហត្ថលេខា&nbsp; &nbsp;៖...................................................</td>
                    </tr>
                    <tr>
                        <td>ឈ្មោះ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;៖....................................................</td>
                        <td>ឈ្មោះ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;៖....................................................</td>
                    </tr>
                    <tr>
                        <td>កាលបរិច្ឆេទ៖....................................................</td>
                        <td>កាលបរិច្ចេទ៖....................................................</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center; border-top: 1px solid black; font-weight: bold;">តំណាងធនធានមនុស្ស</td>
                    </tr>
                    <tr>
                        <td colspan="2"><p>សូមទទួលស្គាល់ថា ការពន្យល់ណែនាំការងាររបស់ថ្នាក់ដឹកនាំដល់កម្មករ-និយោជិកខាងលើ គឺ ពិត<br>ជាត្រឹមត្រូវ និងច្បាស់លាស់តាមនិយាមការងារ ការទទួលខុសត្រូវ ដូចដែលមានចែងក្នុងកិច្ចពិពណ៌នា<br>ការងារជាក់ស្ដែងរបស់ ធើបូថេក ពិតប្រាកដមែន។</p></td>
                    </tr>
                    <tr>
                        <td style="padding-top: 50px;">ហត្ថលេខា&nbsp; &nbsp;៖...................................................</td>
                        <td style="padding-top: 50px;">ហត្ថលេខា&nbsp; &nbsp;៖...................................................</td>
                    </tr>
                    <tr>
                        <td>ឈ្មោះ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;៖....................................................</td>
                        <td>ឈ្មោះ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;៖....................................................</td>
                    </tr>
                    <tr>
                        <td>កាលបរិច្ឆេទ៖....................................................</td>
                        <td>កាលបរិច្ចេទ៖....................................................</td>
                    </tr>
                </table>
                <div class="footer" style="margin-top: 120px;">
                    <p​>&nbsp;&nbsp;តារាងឧទ្ទេសនាមការងារនិយោជិកថ្មី  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; TT-HRAD-STDP-FM-010-00</p>
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
        $filename = 'new-staff.pdf';
        $mpdf->SetDisplayMode('fullwidth');
        // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');

    }
}

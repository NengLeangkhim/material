<?php

namespace App\Http\Controllers\e_request\pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class training_need_analysis extends Controller
{
    public function training_need_analysisPDF()

    {
    	$html='<html>
            <head>
                <title>E-Request training_need_analysis</title>
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
                    <h3 class="center">តារាងស្ទង់មតិតម្រូវការការសិក្សារបស់បុគ្គលិក</h3>
                    <h3 style="font-size: 16px;">១.អំពីបុគ្គលិក</h3>
                </div>
                <table class="training_analysis_staff_info" style="margin-left: 20px; margin-right: 20px;">
                    <tbody>
                        <tr>
                            <td style="width: 50%;">ឈ្មោះ៖ <span>.........................................................</span></td>
                            <td style="width: 50%;">ភេទ៖ <span>................................................................</span></td>
                        </tr>          
                        <tr>
                            <td style="width: 50%;">តួ​នាទី៖ <span>..........................................................</span></td>
                            <td style="width: 50%;">នាយកដ្ឋាន៖ <span>.......................................................</span></td>
                        </tr>          
                        <tr>
                            <td style="width: 50%;">កាលបរិច្ឆេទចូលបម្រើតួនាទីបច្ចុប្បន្ន</td>
                            <td style="width: 50%;">..........................................................................</td>
                        </tr>          
                        <tr>
                            <td style="width: 50%;">កាលបរិច្ឆេទចូលបម្រើការងារដំបូង</td>
                            <td style="width: 50%;">..........................................................................</td>
                        </tr>          
                    </tbody>
                </table>
                <div class="heading">
                    <h3 style="font-size: 16px;">២.ការជ្រើសរើស</h3>
                </div>
                <div class="training_analysis_heading">
                    <p​>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;សូមជ្រើសរើសប្រធានបទ &nbsp;ឫ &nbsp;ជំនាញណាមួយដែលអ្នកគិតថាសក្តិសមបំផុតសម្រាប់អ្នក &nbsp;ជាពិសេសលើការងារប្រចាំថ្ងៃរបស់អ្នក។ &nbsp; សូមជ្រើសរើសដោយការគូស &nbsp;TICK &nbsp;ពីលេខ១ដល់លេខ៥ ដែលលេខ១មាន<br>ន័យថាមិនសូវចាំបាច់ និងលេខ៥ ចាំបាច់បំផុត។</p>
                    <h3 class="center">សូមជ្រើសរើសប្រធានបទប្រាំក្នុង ចំណោមប្រធានបទខាងក្រោម៖</h3>
                </div>
                <table class="training_analysis">
                    <tbody>
                        <tr>
                            <td style="width: 5%;" >1.</td>
                            <td style="width: 60%;">Negotiation Skill/strategy(យុទ្ធសាស្រ្តក្នុងការចរចារ)</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>1</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>2</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>3</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>4</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>5</td>
                        </tr>
                        <tr>
                            <td style="width: 5%;" >2.</td>
                            <td style="width: 60%;">Presentation Skill(ជំនាញធ្វើបទបង្ហាញ)</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>1</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>2</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>3</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>4</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>5</td>
                        </tr>
                        <tr>
                            <td style="width: 5%;" >3.</td>
                            <td style="width: 60%;">Techniques to Motivates Staff(បច្ចេកទេសលើកទឹកចិត្តបុគ្គលិក)</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>1</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>2</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>3</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>4</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>5</td>
                        </tr>
                        <tr>
                            <td style="width: 5%;" >4.</td>
                            <td style="width: 60%;">Effective Time Management(ការគ្រប់គ្រងពេលវេលា)</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>1</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>2</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>3</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>4</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>5</td>
                        </tr>
                        <tr>
                            <td style="width: 5%;" >5.</td>
                            <td style="width: 60%;">Leadership and Management style(ការគ្រប់គ្រង និងដឹកនាំ)</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>1</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>2</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>3</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>4</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>5</td>
                        </tr>
                        <tr>
                            <td style="width: 5%;" >6.</td>
                            <td style="width: 60%;">Supervisory Skill(ជំនាញត្រួតត្រា)</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>1</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>2</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>3</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>4</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>5</td>
                        </tr>
                        <tr>
                            <td style="width: 5%;" >7.</td>
                            <td style="width: 60%;">New Product Pricing(ការកំណត់តម្លៃផលិតផល)</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>1</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>2</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>3</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>4</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>5</td>
                        </tr>
                        <tr>
                            <td style="width: 5%;" >8.</td>
                            <td style="width: 60%;">Customer Service Skill(ជំនាញសេវាកម្មអតិថិជន)</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>1</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>2</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>3</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>4</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>5</td>
                        </tr>
                        <tr>
                            <td style="width: 5%;" >9.</td>
                            <td style="width: 60%;">Human Resource Management(ការគ្រប់គ្រងធនធនមនុស្ស)</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>1</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>2</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>3</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>4</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>5</td>
                        </tr>
                        <tr>
                            <td style="width: 5%;" >10.</td>
                            <td style="width: 60%;">Sale Management(ការគ្រប់គ្រងការលក់)</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>1</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>2</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>3</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>4</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>5</td>
                        </tr>
                        <tr>
                            <td style="width: 5%;" >11.</td>
                            <td style="width: 60%;">Financial Management(ការគ្រប់គ្រងហិរញ្ញវត្ថុ)</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>1</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>2</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>3</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>4</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>5</td>
                        </tr>
                        <tr>
                            <td style="width: 5%;" >12.</td>
                            <td style="width: 60%;">Promoting Product(ការជម្រុញការលក់ផលិតផល)</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>1</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>2</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>3</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>4</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>5</td>
                        </tr>
                        <tr>
                            <td style="width: 5%;" >13.</td>
                            <td style="width: 60%;">Promoting Product(ការជម្រុញការលក់ផលិតផល)</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>1</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>2</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>3</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>4</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>5</td>
                        </tr>
                        <tr>
                            <td style="width: 5%;" >14.</td>
                            <td style="width: 60%;">.......................................................................</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>1</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>2</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>3</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>4</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>5</td>
                        </tr>
                        <tr>
                            <td style="width: 5%;" >15.</td>
                            <td style="width: 60%;">.......................................................................</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>1</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>2</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>3</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>4</td>
                            <td style="width: 7%;" ><input type="checkbox"></input>5</td>
                        </tr>
                    </tbody>
                </table>
                <div class="training_analysis_heading">
                    <p​>សូមបញ្ចាក់ថា ក្នុងករណីប្រធានបទខាងលើមិនចាំចាប់សម្រាប់អ្នក ហើយអ្នកគិតថាមានជំនាញផ្សេងក្រៅពីនេះសូមបំពេញចូលកន្លែងទំនេរ។</p>
                </div>
                <div class="footer" style="margin-top: 15px;">
                    <p​>&nbsp;&nbsp;ទម្រង់វិភាគតម្រូវការបណ្ដុះបណ្ដាល(Training Need Analysis) &nbsp;​&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; TT-HRAD-STOP-FM-010-00</p>
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
        $filename = 'training_need_analysis.pdf';
        $mpdf->SetDisplayMode('fullwidth');
        // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');

    }
}

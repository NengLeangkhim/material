<?php

namespace App\Http\Controllers\e_request\pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class meeting_note extends Controller
{
    public function meeting_notePDF()

    {
    	$html='<html>
            <head>
                <title>E-Request Spend_Eating_form</title>
                <link rel="stylesheet" href="css/e_request/form_main.css">
            </head>
            <body>
                <div class="meeting_note">
                    <div class="heading">
                        <h3 class="center" style="padding-top: 20px;">កំណត់ហេតុ</h3>
                        <h3 class="center">ស្ដីពី</h3>
                        <h3 class="center" style="padding-top: 20px;">កិច្ចប្រជុំ<span>..........................................</span></h3>
                    </div>
                    <div class="heading_text">
                        <p style="text-indent: 40px;">ឆ្នាំពីរពាន់ដប់<span>.........</span>ខែ<span>.........</span>ទី<span>.........</span>ថ្ងៃ<span>............</span>វេលាម៉ោង<span>...............</span>នៅក្នុងក្រុមហ៊ុន ធើបូថេក សឺលូសិន ឯ.ក ការិយាល័យកណ្ដាលបានបើកកិច្ចប្រជុំ ក្រោមអធិបតីភាព <span style="font-weight: bold; font-size: 16px;">លោកអគ្គនាយក</span> ក្រុមហ៊ុន។</p>
                        <h3>សមាសភាពចូលរួមមាន៖</h3>
                    </div>
                    <table class="meeting_join_name">
                        <tbody>
                            <tr>
                                <td>១- លោក<span>........................</span></td>
                                <td>តួនាទី<span>........................</span></td>
                                <td class="pdd-l-10" style="border-left: 1px solid black; border-collapse: collapse;">៣- លោក<span>........................</span></td>
                                <td>តួនាទី<span>........................</span></td>

                            </tr>
                            <tr>
                                <td>២- លោក<span>........................</span></td>
                                <td>តួនាទី<span>........................</span></td>
                                <td class="pdd-l-10" style="border-left: 1px solid black; border-collapse: collapse;">៤- កញ្ញា<span>........................</span></td>
                                <td>តួនាទី<span>........................</span></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="heading_text">
                        <h3>របៀបវារៈនៃកិច្ចប្រជុំ</h3>
                        <p>១- <span>................................................................................................</span></p>
                        <p>២- <span>................................................................................................</span></p>
                        <p>៣- ផ្សេងៗ និងសំណូមពរ</p>
                        
                    </div>
                    <div class="heading_text">
                        <h3>ដំណើរការអង្គប្រជុំ</h3>
                        <p style="text-indent: 40px;">លោកអធិបតីអង្គប្រជុំ បានមានមតិស្វាគមន៍ និងថ្លែងអំណរអរគុណចំពោះវត្តមានសមាជិក-សមាជិកាអង្គប្រជុំ ដែរបានចូលរួម ព្រមទាំងប្រកាសបើកអង្គប្រជុំ។</p>
                    </div>
                    <div class="heading_text">
                        <h3>របៀបវារះទី១ បទបង្ហាញ<span>........................</span></h3>
                        <h4 style="text-indent: 40px;">I. &nbsp; &nbsp;&nbsp;&nbsp;នាយកដ្ឋាន<span>...........................</span></h4>
                        <p style="text-indent: 80px;">លោក/លោកស្រី<span>..........................</span>បានធ្វើបទបង្ហាញ អំពីរបាយការណ៍<span>..............................</span>ដូចខាងក្រោម៖</p>
                        <p style="text-indent: 80px;">១. <span>..........................................................................................................</span></p>
                        <h4 style="text-indent: 40px;">II. &nbsp;&nbsp;&nbsp;&nbsp;នាយកដ្ឋាន<span>.............................</span></h4>
                        <p style="text-indent: 80px;">លោក/លោកស្រី<span>..........................</span>បានធ្វើបទបង្ហាញ អំពីរបាយការណ៍<span>..............................</span>ដូចខាងក្រោម៖</p>
                        <p style="text-indent: 80px;">១. <span>..........................................................................................................</span></p>
                        
                        
                    </div>
                    <div class="heading_text">
                        <h3>របៀបវារះទី២ ផែនការការងារសម្រាប់ការអនុវត្តបន្ត</h3>
                        <h4 style="text-indent: 40px;">I. &nbsp; &nbsp;&nbsp;&nbsp;ផែនការរួមសម្រាប់ការអនុវត្តគ្រប់នាយកដ្ឋាន</h4>
                        <p style="text-indent: 80px;">១. <span>..........................................................................................................</span></p>
                        <h4 style="text-indent: 40px;">II. &nbsp;&nbsp;&nbsp;&nbsp;នាយកដ្ឋាន រដ្ឋបាល និងហិរញ្ញវត្ថុ(Admin &Finance Dept.)</h4>
                        <p style="text-indent: 80px;">១. <span>..........................................................................................................</span></p>
                        <h4 style="text-indent: 40px;">III. &nbsp;&nbsp;&nbsp;នាយកដ្ឋាន បច្ចេកទេស(Technical Dept.)</h4>
                        <p style="text-indent: 80px;">១. <span>..........................................................................................................</span></p>
                        <h4 style="text-indent: 40px;">IV. &nbsp;&nbsp;&nbsp;&nbsp;នាយកដ្ឋាន គាំទ្រអតិថិជន(Support Dept.)</h4>
                        <p style="text-indent: 80px;">១. <span>..........................................................................................................</span></p>
                        <h4 style="text-indent: 40px;">V. &nbsp;&nbsp;&nbsp;&nbsp;នាយកដ្ឋាន ទីផ្សារ និងការលក់(Sale& Marketing Dept.)</h4>
                        <p style="text-indent: 80px;">១. <span>..........................................................................................................</span></p>
                        <h4 style="text-indent: 40px;">VI. &nbsp;&nbsp;&nbsp;នាយកដ្ឋាន អភិវឌ្ឍន៍ផលិតផល(Product Development Dept.)</h4>
                        <p style="text-indent: 80px;">១. <span>..........................................................................................................</span></p>
                    </div>
                    <div class="heading_text">
                        <h3>របៀបវារៈទី៣ ផ្សេងៗ នឹងសំណូមពរ</h3>
                        <p style="text-indent: 40px;">១. លោក/លោកស្រីប្រធាននាយកដ្ឋាន<span>...........................</span>បានស្នើសុំឲ្យនាយកដ្ឋានពាក់ព័ន្ធ ចូលរួមអនុវត្តលើ៖</p>
                        <p style="text-indent: 60px;"><span>............................................................................................................................................</span></p>
                        <p style="text-indent: 60px;">អង្គប្រជុំបានបញ្ចប់ដោយជោកជ័យ នៅវេលាម៉ោង<span>....................</span>នឹង<span>.............................</span>នាថ្ងៃខែឆ្នាំដដែល ប្រកបដោយបរិយាកាសរីករាយ និងស្និតស្នាល។</p>
                        <table class="meeting_signature">
                            <tbody>
                                <tr>
                                    <td><p>អធិបតីអង្គប្រជុំ</p></td>
                                    <td><p>លេខាធិការកត់ត្រា</p></td>
                                </tr>
                                <tr>
                                    <td><p><span>...........................................................</span></p></td>
                                    <td><p><span>...........................................................</span></p></td>
                                </tr>
                            </tbody>
                        </table>
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
        $filename = 'meeting_note.pdf';
        $mpdf->SetDisplayMode('fullwidth');
        // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');

    }
}

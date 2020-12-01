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
            </head>
            <body>
                
            <div class="expried_intership">
                
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
        // // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');

    }

}

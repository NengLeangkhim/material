<?php

namespace App\Http\Controllers\e_request\pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class Certificate extends Controller{
 
    public function certificatePDF()

    {
    	$html='<html>
            <head>
                <title>E-Request Certificate</title>
                <link rel="stylesheet" href="css/e_request/form_main.css">
            </head>
            <body>
                <div class="certificate" style=" margin-left: 1cm; margin-right: 1cm;">
                    <div class="certificate_date" style="margin-top: 3.5cm; padding-bottom: 80px;">
                        <p>Date:......./......./.......</p>
                    </div>
                    <div class="certificate_heading">
                        <h3><b>TO WHOM IT MAY CONCERN</b></h3>
                    </div>
                    <div class="cerfificate_text">
                        <p>This is to certify that (Name of Requestor) has been employed by our <b>TURBOTECH COL.,LTD</b> as (Position) from (Date) to (Date).</p>
                        <p>During his/her tenure in <b>TURBOTECH</b>, (Name of Requestor) showed in full dedication to his work which make him one of the assets in our institution</p>
                        <p>This certificate is being issued unpon the request of aforesaid person for whatever legal matter it will serve him/her best.</p>
                        <p>Sincarely Your,</p>
                    </div>
                    <div class="certificate_signature" style="float: left; margin-top: 100px; margin-buttom: 2cm;">
                        <hr>
                        <h3 style="padding-bottom: 20px;">CHHUN SOPHEARAK</h3>
                        <h3>CHIEF EXECUTIVE OFFICER</h3>
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
        $filename = 'Certificate.pdf';
        $mpdf->SetDisplayMode('fullwidth');
        // // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');

    }

}

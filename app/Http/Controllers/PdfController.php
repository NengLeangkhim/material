<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mpdf\Mpdf;
use PDF;
class PdfController extends Controller
{
    public function create()
    {
       

        $mpdf = new \Mpdf\Mpdf([
            'autoLangToFont' => true,
            'autoScriptToLang' => true,
        ]);

        $mpdf->WriteHTML('
        <style>
            body {
                font-size: 200%;
            }
        </style>

        This is some English. <br>

        <p style="font-family: ;">ប្រទេសកម្ពុជា</p>
        ');

        $mpdf->Output();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class PdfController extends Controller
{
    public function create()
    {
       $html='<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>សំណើសុំឧបត្ថម្ភការសិក្សា</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">

    <style>
        @font-face {
            font-family: Khmer OS Content;
            src: url(\'fonts/KhmerOS_content.tff\');
        }
        body{
            font-family: \'Khmer OS Content\', serif;
            font-size: 48px;

        }
    </style>
</head>
<body>
    <p>ប្រទេសកម្ពុជា</p>
</body>
</html>';

        $config = [
            'mode' => '+aCJK',
            "autoScriptToLang" => true,
            "autoLangToFont" => true,
        ];

        $mpdf = new \Mpdf\Mpdf($config);
        $mpdf->WriteHTML($html);
        $filename = 'Quote.pdf';
        $mpdf->SetDisplayMode('fullwidth');
        // // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class PdfController extends Controller
{
    public function create()
    {
        $data = ['title' => 'Laravel 7'];
        $pdf = PDF::loadView('pdf', $data);
        $pdf->setPaper('f4','landscape');
        $pdf->setFont('utf-8');
        return $pdf->stream('Nicesnippets.pdf');
    }
}

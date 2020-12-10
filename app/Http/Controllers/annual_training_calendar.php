<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class annual_training_calendar extends Controller{

    public function annual_training_calendarPDF()

    {
    	$html='<html>
            <head>
                <title>Annual Training Calendar</title>
                <link rel="stylesheet" href="css/e_request/pdf-form.css">
            </head>
            <body>

                <div class="container">
                    <div class="pdd-lr-40px">
                        <table class="w-100 txt-center">
                            <tr>
                                <td class="w-35 txt-right">
                                    <img src="images/turbotech.png" width="180px">
                                </td>

                                <td class="w-45 txt-center">

                                    <h1 class="title-30 lh-40 pdd-0"> ក្រុមហ៊ុនធើបូថេក ឯ.ក </h1>
                                    <h1 class="title-25 pdd-0" style="margin-top: 300px"> TURBOTECH CO., LTD </h1>
                                </td>

                                <td class="w-40">

                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="w-100 txt-center pdd-top-20px pdd-10px">
                        <h3 class="title-20 mg-0 txt-center"> ប្រតិទិនបណ្តុះបណ្តាលប្រចាំឆ្នាំ </h3>
                        <h3 class="title-20 mg-0 txt-center"> Annual Training Schedule </h3>
                    </div>

                    <table autosize="1" class="w-100 txt-center mg-0">
                        <tr class="bg-f1a8e0">
                            <th style="width:5%" class="color-fff border-1 h-60 txt-center title-11 w-6">ល.រ</th>
                            <th style="width:15% !important;" class="color-fff border-1 h-60 txt-center title-11 w-12">ប្រធានបទបណ្តុះបណ្តាល</th>
                            <th style="width:5%" class="color-fff border-1 h-60 txt-center title-11 w-6-25">មករា</th>
                            <th style="width:5%" class="color-fff border-1 h-60 txt-center title-11 w-6-25">កុម្ភៈ</th>
                            <th style="width:5%" class="color-fff border-1 h-60 txt-center title-11 w-6-25">មិនា</th>
                            <th style="width:5%" class="color-fff border-1 h-60 txt-center title-11 w-6-25">មេសា</th>
                            <th style="width:6%" class="color-fff border-1 h-60 txt-center title-11 w-6-25">ឧសភា</th>
                            <th style="width:5%" class="color-fff border-1 h-60 txt-center title-11 w-6-25">មិថុនា</th>
                            <th style="width:5%" class="color-fff border-1 h-60 txt-center title-11 w-6-25">កក្កដា</th>
                            <th style="width:5%" class="color-fff border-1 h-60 txt-center title-11 w-6-25">សីហា</th>
                            <th style="width:6%" class="color-fff border-1 h-60 txt-center title-11 w-6-25">កញ្ញា</th>
                            <th style="width:5%" class="color-fff border-1 h-60 txt-center title-11 w-6-25">តុលា</th>
                            <th style="width:5%" class="color-fff border-1 h-60 txt-center title-11 w-6-25">វិច្ឆិកា</th>
                            <th style="width:5%" class="color-fff border-1 h-60 txt-center title-11 w-6-25">ធ្នូ</th>
                            <th style="width:10%" class="color-fff border-1 h-60 txt-center title-11 w-6-25">គ្រូសម្របស្រួល</th>
                            <th style="width:8%" class="color-fff border-1 h-60 txt-center title-11 w-6-25">អ្នកចូលរួម</th>
                        </tr>
                        <tr class="">
                            <th colspan="16" class="border-1 h-40 txt-center title-16">កម្មវិធីបណ្តុះបណ្តាល</th>
                        </tr>
                        <tr class="">
                            <th colspan="16" class="border-1 bg-orange h-40 txt-left title-15"><i>I. <u>កម្មវិធីបណ្តុះបណ្តាលខាងក្នុង</i></u></th>
                        </tr>
                        <tr class="">
                            <th style="width:5%" class="border-1 bg-eaa7ff44 h-40 txt-center title-13">1.1 </th>
                            <th style="width:15%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:6%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:6%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:10%" class="border-1 h-40"></th>
                            <th style="width:8%" class="border-1 h-40"></th>
                        </tr>
                        <tr class="">
                            <th style="width:5%" class="border-1 bg-eaa7ff44 h-40 txt-center title-13">1.2 </th>
                            <th style="width:15%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:6%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:6%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:10%" class="border-1 h-40"></th>
                            <th style="width:8%" class="border-1 h-40"></th>
                        </tr>
                        <tr class="">
                            <th style="width:5%" class="border-1 bg-eaa7ff44 h-40 txt-center title-13">1.3</th>
                            <th style="width:15%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:6%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:6%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:10%" class="border-1 h-40"></th>
                            <th style="width:8%" class="border-1 h-40"></th>
                        </tr>
                        <tr class="">
                            <th style="width:5%" class="border-1 bg-eaa7ff44 h-40 txt-center title-13">1.4</th>
                            <th style="width:15%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:6%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:6%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:10%" class="border-1 h-40"></th>
                            <th style="width:8%" class="border-1 h-40"></th>
                        </tr>
                        <tr class="">
                            <th style="width:5%" class="border-1 bg-eaa7ff44 h-40 txt-center title-13">1.5</th>
                            <th style="width:15%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:6%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:6%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:10%" class="border-1 h-40"></th>
                            <th style="width:8%" class="border-1 h-40"></th>
                        </tr>
                        <tr class="">
                            <th style="width:5%" class="border-1 bg-eaa7ff44 h-40 txt-center title-13">1.6</th>
                            <th style="width:15%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:6%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:6%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:10%" class="border-1 h-40"></th>
                            <th style="width:8%" class="border-1 h-40"></th>
                        </tr>
                        <tr class="">
                            <th style="width:5%" class="border-1 bg-eaa7ff44 h-40 txt-center title-13">1.7</th>
                            <th style="width:15%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:6%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>

                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:6%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:10%" class="border-1 h-40"></th>
                            <th style="width:8%" class="border-1 h-40"></th>
                        </tr>
                        <tr class="border-none">
                            <th colspan="16"  style="width:100%" class="border-1 h-30 border-none txt-center title-13"></th>
                        </tr>
                        <tr class="height-50px">
                            <th colspan="8" style="width:56%" class="border-1 border-lbr txt-left title-10">ប្រតិទិនបណ្តុះបណ្តាលប្រចាំឆ្នាំ (Annual Training Schedule)</th>
                            <th colspan="8" style="width:44%" class="border-1 border-lbr txt-right"><h1 class=" title-10 enfont">TT-HRAD-STDP-FM-002-00</h1></th>
                        </tr>
                    </table>

                    <table>
                        <tr class="">
                            <th style="width:5%" class="border-1 bg-eaa7ff44 h-40 txt-center title-13">1.8 </th>
                            <th style="width:15%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:6%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:6%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:10%" class="border-1 h-40"></th>
                            <th style="width:8%" class="border-1 h-40"></th>
                        </tr>
                        <tr class="">
                            <th style="width:5%" class="border-1 bg-eaa7ff44 h-40 txt-center title-13">1.9 </th>
                            <th style="width:15%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:6%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:6%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:10%" class="border-1 h-40"></th>
                            <th style="width:8%" class="border-1 h-40"></th>
                        </tr>
                        <tr class="">
                            <th style="width:5%" class="border-1 bg-eaa7ff44 h-40 txt-center title-13">1.10</th>
                            <th style="width:15%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:6%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:6%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:5%" class="border-1 h-40"></th>
                            <th style="width:10%" class="border-1 h-40"></th>
                            <th style="width:8%" class="border-1 h-40"></th>
                        </tr>
                        <tr class="">
                            <th colspan="16" style="width:100%" class="border-1​ bg-orange h-40 txt-left title-15"><i>II. <u>កម្មវិធីបណ្តុះបណ្តាលខាងក្រៅ</i></u></th>
                        </tr>
                        <tr class="">
                            <th style="width:5%" class="border-1 bg-eaa7ff44 h-40 txt-center title-13">2.1</th>
                            <th colspan="4" style="width:30%" class="border-1 h-40"></th>
                            <th rowspan="10" colspan="8" style="width:42%" class="border-1 h-40 txt-center font-w-400"> អាស្រ័យលើកាលនៃការបណ្តុះបណ្តាលខាងក្រៅ </th>
                            <th rowspan="10" colspan="2" style="width:15%" class="border-1 h-40 txt-center font-w-400"> <p>គ្រូសម្របសម្រួលខាងក្រៅ</p> </th>
                            <th style="width:8%" class="border-1 h-40"></th>
                        </tr>
                        <tr class="">
                            <th style="width:5%" class="border-1 bg-eaa7ff44 h-40 txt-center title-13">2.2</th>
                            <th colspan="4" style="width:30%" class="border-1 h-40"></th>
                            <th style="width:8%" class="border-1 h-40"></th>
                        </tr>
                        <tr class="">
                            <th style="width:5%" class="border-1 bg-eaa7ff44 h-40 txt-center title-13">2.3</th>
                            <th colspan="4" style="width:30%" class="border-1 h-40"></th>
                            <th style="width:8%" class="border-1 h-40"></th>
                        </tr>
                        <tr class="">
                            <th style="width:5%" class="border-1 bg-eaa7ff44 h-40 txt-center title-13">2.4</th>
                            <th colspan="4" style="width:30%" class="border-1 h-40"></th>
                            <th style="width:8%" class="border-1 h-40"></th>
                        </tr>
                        <tr class="">
                            <th style="width:5%" class="border-1 bg-eaa7ff44 h-40 txt-center title-13">2.5</th>
                            <th colspan="4" style="width:30%" class="border-1 h-40"></th>
                            <th style="width:8%" class="border-1 h-40"></th>
                        </tr>
                        <tr class="">
                            <th style="width:5%" class="border-1 bg-eaa7ff44 h-40 txt-center title-13">2.6</th>
                            <th colspan="4" style="width:30%" class="border-1 h-40"></th>
                            <th style="width:8%" class="border-1 h-40"></th>
                        </tr>
                        <tr class="">
                            <th style="width:5%" class="border-1 bg-eaa7ff44 h-40 txt-center title-13">2.7</th>
                            <th colspan="4" style="width:30%" class="border-1 h-40"></th>
                            <th style="width:8%" class="border-1 h-40"></th>
                        </tr>
                        <tr class="">
                            <th style="width:5%" class="border-1 bg-eaa7ff44 h-40 txt-center title-13">2.8</th>
                            <th colspan="4" style="width:30%" class="border-1 h-40"></th>
                            <th style="width:8%" class="border-1 h-40"></th>
                        </tr>
                        <tr class="">
                            <th style="width:5%" class="border-1 bg-eaa7ff44 h-40 txt-center title-13">2.9</th>
                            <th colspan="4" style="width:30%" class="border-1 h-40"></th>
                            <th style="width:8%" class="border-1 h-40"></th>
                        </tr>
                        <tr class="">
                            <th style="width:5%" class="border-1 bg-eaa7ff44 h-40 txt-center title-13">2.10</th>
                            <th colspan="4" style="width:30%" class="border-1 h-40"></th>
                            <th style="width:8%" class="border-1 h-40"></th>
                        </tr>
                        <tr class="">
                            <th style="width:5%" class="border-1 bg-eaa7ff44 h-40 txt-center title-13">2.11</th>
                            <th colspan="4" style="width:30%" class="border-1 h-40"></th>
                            <th colspan="8" style="width:5%" class="border-1 h-40"></th>
                            <th colspan="2" style="width:5%" class="border-1 h-40"></th>
                            <th style="width:8%" class="border-1 h-40"></th>
                        </tr>
                        <tr class="border-none">
                            <th colspan="8" class="border-1 h-20 border-none txt-center title-13"></th>
                            <th colspan="8" class="border-1 h-20 border-none "></th>
                        </tr>
                        <tr class="height-50px">
                            <th colspan="8" class="border-1 border-lbr txt-left title-10">ប្រតិទិនបណ្តុះបណ្តាលប្រចាំឆ្នាំ (Annual Training Schedule)</th>
                            <th colspan="8" class="border-1 border-lbr txt-right"><h1 class=" title-10 enfont">TT-HRAD-STDP-FM-002-00</h1></th>
                        </tr>
                    </table>

                    <table>
                        <tr class="txt-left">
                            <th colspan="16" style="width:100%" class="h-70 txt-left title-17"></th>
                        </tr>
                        <tr class="txt-left">
                            <th colspan="16" style="width:100%"  class="h-40 txt-left title-17"><u> សម្គាល់៖</u></th>
                        </tr>
                        <tr class="txt-left">
                            <th style="width:5%" class="h-25 font-w-400 txt-left title-17"></th>
                            <th colspan="14" style="width:95%"  class="h-25 font-w-400 txt-left title-12">1. គ្រប់កម្មវិធីបណ្តុះបណ្តាលខាងលើអាចធ្វើការផ្លាស់ប្តូដោយយោងតាមស្ថានភាពជាក់ស្តែង</th>
                        </tr>
                        <tr class="txt-left">
                            <th style="width:5%" class="h-25 font-w-400 txt-left title-17"></th>
                            <th colspan="14" style="width:95%" class="h-25 font-w-400 txt-left title-12">2. ប្រធានបទបណ្តុះបណ្តាលខ្លះអាចត្រូវបញ្ចូលគ្នាក្នុងករណីចាំបាច់</th>
                        </tr>
                        <tr class="txt-left">
                            <th style="width:5%" class="h-25 font-w-400 txt-left title-17"></th>
                            <th colspan="14" style="width:95%" class="h-25 font-w-400 txt-left title-12">3. គ្រូសម្របសម្រួលដែលពាក់ព័ន្ធមានភារកិច្ចក្នុងសម្របសម្រួល ត្រូវរៀបចំសម្ភារៈបណ្តុះបណ្តាលអោយទាន់ពេលវេលា</th>
                        </tr>
                        <tr class="txt-left">
                            <th style="width:5%" class="h-25 font-w-400 txt-left title-17"></th>
                            <th colspan="14" style="width:95%" class="h-25 font-w-400 txt-left title-12">4. ផ្នែករៀបចំសម្របសម្រួលការបណ្តុះបណ្តាល ត្រូវជូនសំណឹងដល់គ្រូសម្របសម្រួលទាំងអស់អោយបានមុនយ៉ាងតិចមួយខែដើម្បីត្រៀមក្នុងការរៀបចំ</th>
                        </tr>
                        <tr class="txt-left">
                            <th style="width:5%" class="h-25 font-w-400 txt-left title-17"></th>
                            <th colspan="14" style="width:95%" class="h-25 font-w-400 txt-left title-12">5. ប្រសិនបើគ្រូសម្របសម្រលចង់ធ្វើការផ្លាសប្តូរ ឬ​ បន្ថែមអ្វីមួយក្នុងការបណ្តុះបណ្តាល ត្រូវរាយការណ៍មកផ្នែកសម្របសម្រួលដើម្បីស្នើសុំការអនុម័តបន្ថែម</th>
                        </tr>
                        <tr class="txt-left">
                            <th style="width:5%" class="h-25 font-w-400 txt-left title-17"></th>
                            <th colspan="14" style="width:95%" class="h-25 font-w-400 txt-left title-12">6. ប្រធានបទនៃការបណ្តុះបណ្តាលនៅខាងក្រៅអាចមានការប្រែសម្រួលអាស្រ័យលើកម្មវិធីដែលត្រូវបានរៀបចំដោយអ្នកជំនាញខាងក្រៅ</th>
                        </tr>

                        <tr class="txt-left">
                            <th colspan="13"  class="h-25 font-w-400 txt-left title-17"></th>
                            <th colspan="3" class="h-25 font-w-400 txt-center title-12">កាលបរិច្ឆេទ.........../.........../..............</th>
                        </tr>

                        <tr class="txt-left">
                            <th colspan="13" style="width:77%" class="h-25 font-w-400 txt-left title-17"></th>
                            <th colspan="3" style="width:23%" class="h-25 font-w-400 txt-center title-12">អ្នករៀបចំ</th>
                        </tr>

                        <tr class="border-none">
                            <th colspan="16" style="width:100%" class="border-1 h-19rem border-none txt-center title-13"></th>
                        </tr>
                        <tr class="height-50px">
                            <th colspan="8" style="width:56%" class="border-1 border-lbr txt-left title-10">ប្រតិទិនបណ្តុះបណ្តាលប្រចាំឆ្នាំ (Annual Training Schedule)</th>
                            <th colspan="8" style="width:44%" class="border-1 border-lbr txt-right"><h1 class=" title-10 enfont">TT-HRAD-STDP-FM-002-00</h1></th>
                        </tr>
                    </table>



                </div>


            </body>
            </html>';

        $config = [
            'mode' => '+aCJK',
            "autoScriptToLang" => true,
            "autoLangToFont" => true,
            'orientation' => 'L'

        ];

        $mpdf = new \Mpdf\Mpdf($config);
        $mpdf->WriteHTML($html);
        $filename = 'Certificate.pdf';
        $mpdf->SetDisplayMode('fullwidth');
        // // $mpdf->Output($filename, 'D');//download
        return $mpdf->Output($filename,'I');

    }

}

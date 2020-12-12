<?php

namespace App\Http\Controllers\bsc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;

class InvoicePreviewController extends Controller
{
    public function invoice_preview($invoiceId){

        error_reporting(E_ALL);
        ini_set("display_errors", 1);

        $config = [
            'mode' => '+aCJK',
            "autoScriptToLang" => true,
            "autoLangToFont" => true,
        ];

        $mpdf = new \Mpdf\Mpdf($config);



        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        //request api
        $token = $_SESSION['token'];
        $request = Request::create('/api/bsc_preview_invoioce/'.$invoiceId.'', 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        $data = json_decode($res->getContent());

        $invoice_head = $data->data->preview_invoice;
        $invoice_detail = $data->data->preview_invoice_detail;
        $invoice_cur = $data->data->preview_currency_rate;
        $invoices=DB::select("SELECT * FROM public.get_gazetteers_address('".$invoice_head->address_name."') as address");
        $address = $invoices[0]->address;

        $mylogo=$this->logosource($invoice_head,$invoice_detail,$address,$invoice_cur);
        $mpdf->WriteHTML($mylogo);
        $mpdf->Output();


    }
    public function logosource($invoice_head,$invoice_detail,$address,$invoice_cur){
        $logo = '<table style="border:none;pedding:0;margin:0;width:100%">
        <tr>
            <td>
                <img width="190" style="margin-top:-70px"  src="images/turbotech.png"/>
            </td>
        <td style="padding:0px;margin:0;width:75%;">
            <table style="width:100%;font-family:khcontent">
                <tr style="width:100%;text-align:center;">
                    <td style="text-align:center;width:100%;line-height:35px">
                        <div style="text-align:center;width:100%;">
                            <h3 style="color: #1fa8e1;font-size:25px;font-family:khmeros">ក្រុមហ៊ុន ធើបូថេក ឯ.ក</h3>
                            <h3 class="" style="color: #1fa8e1;font-size:24px;margin-top: 10px;font-weight: bold">TURBOTECH CO.,LTD</h3>
                        </div>
                    </td>
                </tr>
                <tr style="width:100%;text-align:center;letter-spacing:-0.5"><td style="width:100%;text-align:center;padding-top:10px"><p style="text-align:center;font-size: 14px;font-weight: bold;text-align:center"><span class="khcontent"​>លេខអត្តសញ្ញាណកម្ម អតប</span> (VAT TIN) :K008-901701793</p></td></tr>
                <tr>
                    <td style="line-height:16px">
                        <div style="padding-top:20px;font-size: 12px;text-align:left;letter-spacing:-0.5">

                            <p class="khcontent" style="font-size: 11px;text-align:left">អាសយដ្ឋាន  :&nbsp;&nbsp;ផ្លូវ ៥៩៨ ភូមិ ខ១ សង្កាត់ ច្រាំងចំរេះទី២ ខណ្ឌ ឫស្សីកែវ រាជធានីភ្នំពេញ </p>
                            <p style="font-size: 11px;">Address : Address : Street 598, Village Khor Muoy, Sangkat Chrang Chamreh II, Khan Russey Keo, Phnom Penh.</p>
                            <p style="font-size: 11px;text-align:left"><span class="khcontent">ទូរស័ព្ទ</span> (Tel) : &nbsp;(855) 23 999 998, <span class="khcontent">អុីមែល</span> (Email) : &nbsp;info@turbotech.com, Website : &nbsp;www.turbotech.com</p>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
        </tr>
        </table>
        '.$this->head().'
        '.$this->getCustomer($invoice_head,$address).'
        '.$this->getTotal($invoice_detail,$invoice_head,$invoice_cur).'
        '.$this->getNote().'
        '.$this->getSignature().'


    ';
        return $logo;
    }

    public function head(){
        $head ='<hr style="height: 3px;color: black;">
            <table style="border:none;padding:0;margin:0;width:100%">
                <tr>
                    <td style="text-align: center;">
                        <p style="font-size: 18px;font-weight: bold;">វិក្កយបត្រ</p>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <p style="font-family:khmeros;font-size: 18px;">INVOICE</p>
                    </td>
                </tr>
            </table>';
        return $head;
    }

    public function getCustomer($invoice_head,$address){

        $customer='
        <div class="row">
            <div style="float: left;width: 60%;">
                <table>
                    <tbody>
                        <tr bgcolor="#1fa8e1">
                            <td align="left" colspan="3" style="font-weight: bold; border-right: 1px dotted #000;padding: 5px;" valign="top">
                                <span style="color: white;font-size: 16px;font-weight: bold;"><b>អតិថិជន​ / CUSTOMER</b></span>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="top" width="25%"> <span style="font-size: 13px;">CID / ACCID</span></td>
                            <td align="left" valign="top">:</td>
                            <td width="73%" style="border-right: 1px dotted #000;"> <span style="font-size: 13px;">'.$invoice_head->ma_customer_id.'</span> </td>
                        </tr>
                        <tr>
                            <td align="left" valign="top"><span style="font-family: khmeros;font-size: 12px;">ឈ្មោះក្រុមហ៊ុន</span></td>
                            <td align="left" valign="top">:</td>
                            <td style="border-right: 1px dotted #000;"> <span style="font-size: 13px;">'.$invoice_head->company_name_kh.'</span></td>
                        </tr>
                        <tr>
                            <td align="left" valign="top"><span style="font-size: 13px;">Company Name</span></td>
                            <td align="left" valign="top">:</td>
                            <td style="border-right: 1px dotted #000;"><span style="font-size: 13px;">'.$invoice_head->company_name_en.'</span></td>
                        </tr>
                        <tr>
                            <td align="left" valign="top"><span style="font-family: khmeros;font-size: 12px;">អាសយដ្ឋាន</span></td>
                            <td align="left" valign="top">:</td>
                            <td style="border-right: 1px dotted #000;"><span style="font-family: khmeros;font-size: 12px;">'.$address.'</span></td>
                        </tr>
                        <tr>
                            <td align="left" valign="top"><span style="font-size: 13px;">Address</span></td>
                            <td align="left" valign="top">:</td>
                            <td style="font-size: 12px;border-right: 1px dotted #000;"><span>'.$address.'</span></td>
                        </tr>
                        <tr>
                            <td align="left" valign="top"><span style="font-family: khmeros;font-size: 12px;">ឈ្មោះ & ទូរស័ព្ទ​ <br> Contact</span></td>
                            <td align="left" valign="top">:</td>
                            <td style="border-right: 1px dotted #000;"><span style="font-size: 13px;">'.$invoice_head->contact_name.'/ Tel:'.$invoice_head->contact_phone.'</span></td>
                        </tr>
                        <tr>
                            <td align="left" valign="top"><span style="font-family: khmeros;font-size: 12px;">អុីមែល​ / Email</span></td>
                            <td align="left" valign="top">:</td>
                            <td style="border-right: 1px dotted #000;"><span style="font-size: 13px;">'.$invoice_head->contact_email.'</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="float: left;width: 40%;">
                <table>
                    <tbody>
                        <tr bgcolor="#1fa8e1">
                            <td align="left" colspan="3" style="font-weight: bold;padding: 5px;" valign="top">
                                <span style="color: white;font-family: khmeros;font-size: 16px;"><b>BILL INFORMATION</b></span>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="top" width="41%"><span style="font-family: khmeros;font-size: 12px;">លេខរៀងវិក្កយបត្រ <br> Invoice No</span></td>
                            <td align="left" valign="top">:</td>
                            <td width="56%"><span style="font-size: 13px;">'.$invoice_head->invoice_number.'</span></td>
                        </tr>
                        <tr>
                            <td align="left" valign="top"><span style="font-family: khmeros;font-size: 12px;">ថ្ងៃចេញវិក្កយបត្រ <br> Billing Date</span></td>
                            <td align="left" valign="top">:</td>
                            <td><span style="font-size: 13px;">'.date('d/m/Y',strtotime($invoice_head->billing_date)).'</span></td>
                        </tr>
                        <tr>
                            <td align="left" valign="top"><span style="font-family: khmeros;font-size: 12px;">ថ្ងៃផុតកំណត់បង់ប្រាក់​ <br> Due Date</span></td>
                            <td align="left" valign="top">:</td>
                            <td><span style="font-size: 13px;">'.date('d/m/Y',strtotime($invoice_head->due_date)).'</span></td>
                        </tr>
                        <tr>
                            <td align="left" valign="top"><span style="font-family: khmeros;font-size: 12px;">រយៈពេលប្រើប្រាស់ <br> Period</span></td>
                            <td align="left" valign="top">:</td>
                            <td><span style="font-size: 13px;">'.date('d/m/Y',strtotime($invoice_head->effective_date)).' to '.date('d/m/Y',strtotime($invoice_head->end_period_date)).'</span></td>
                        </tr>
                        <tr>
                            <td align="left" valign="top"><span style="font-family: khmeros;font-size: 12px;">យោង​ <br> Reference</span></td>
                            <td align="left" valign="top">:</td>
                            <td><span style="font-size: 13px;">'.$invoice_head->reference.'</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        ';
        return $customer;
    }

    public function getTotal($invoice_detail,$invoice_head,$invoice_cur){
        $vat_number = $invoice_head->vat_number;
        $vat_type = $invoice_head->vat_type;
        $rate = 0;
        if(count($invoice_cur) >0){
            foreach($invoice_cur as $currency){
                $rate = $currency->rate;
            }
        }
        $tr = '';
        $amount =0;
        $new_amount = 0;
        $old_amount =0;
        $vat = 0;
        $i = 1;
        if(!empty($invoice_detail)){
            foreach ($invoice_detail as $detail) {
                if($vat_number ==""){
                    $old_amount = $detail->amount;
                    $qty= $detail->qty;
                    $display = "display: none";
                    $vat = ($old_amount*10)/100;
                    $total_new_amount = $old_amount + $vat;
                    $new_unit_price = $total_new_amount / $qty;
                    $new_amount +=$total_new_amount;
                    $total_riel = $new_amount * $rate;
                }else{
                    $new_unit_price = $detail->unit_price;
                    $qty = $detail->qty;
                    $total_new_amount = $detail->amount;
                    $vat += ($total_new_amount*10)/100;
                    $old_amount += $total_new_amount;
                    $new_amount =$vat + $old_amount;
                    $total_riel = $new_amount * $rate;
                    $display = "";
                }

                $description = $detail->description;
                if($description == "null"){
                    $description = "";
                }else{
                    $description ;
                }
                $amount +=$detail->amount;
                $tr .= '<tr>
                            <td style="text-align: center;font-size: 11px;">'.$i++.'</td>
                            <td style="font-size: 11px;padding-left: 5px;">'.$detail->customer_branch_name.'</td>
                            <td style="font-size: 11px;padding-left: 5px;">'.$detail->product_name.'</td>
                            <td style="font-size: 12px;padding-left: 5px;">'.$description.'</td>
                            <td style="text-align: center;font-size: 11px;">'.$qty.' '.$detail->unit_name.'</td>
                            <td style="text-align: right;font-size: 11px;padding:10px;">$ '.number_format($new_unit_price,4,".",",").'</td>
                            <td style="text-align: right;font-size: 11px;padding:10px;">$ '.number_format($total_new_amount,4,".",",").'</td>
                        </tr>';
            }
        }

        $description = '
                <table rules="all" border="1" style="width:100%;border: 1px solid black;border-collapse: collapse;">
                    <thead>
                        <tr style="background-color:#1fa8e1;">
                            <th width="5%" style="padding:5px;"><span style="color: white;font-size: 11px;font-weight: bold;">ល.រ​ <br> No</span></th>
                            <th width="18%" style="padding:5px;"><span style="color: white;font-size: 11px;font-weight: bold;">សាខាអតិថិជន <br> Customer Branch</span></th>
                            <th width="15%" style="padding:5px;"><span style="color: white;font-size: 11px;font-weight: bold;">​ផលិតផល <br>Item</span></th>
                            <th width="22%" style="padding:5px;"><span style="color: white;font-size: 11px;font-weight: bold;">បរិយាយសេវាកម្ម​ <br> Description</span></th>
                            <th width="10%" style="padding:5px;"><span style="color: white;font-size: 11px;font-weight: bold;">បរិមាណ <br> Quantity</span></th>
                            <th width="15%" style="padding:5px;"><span style="color: white;font-size: 11px;font-weight: bold;">ថ្លៃ​ឯកតា <br> Unit Price</span></th>
                            <th width="15%" style="padding:5px;"><span style="color: white;font-size: 11px;font-weight: bold;">ថ្លៃសេវា <br> Amount</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        '.$tr.'
                        <tr>
                            <td colspan="4" rowspan="3" style="padding-left: 10px;">
                                <span style="font-family: khmeros;font-size: 11px;"> * រាល់បញ្ហារបស់លោកអ្នកសូមទូរស័ព្ទមកលេខ: ០២៣​​ ៩៩៩​ ៩៩៨​ ។</span>​ <br>
                                <span style="font-size: 11px;">Any queries please call to: 023 999 998.</span>​ <br>
                                <span style="font-family: khmeros;font-size: 11px;"> *សូមអញ្ជើញទូទាត់ប្រាក់ អោយបានមុនថ្ងៃកំណត់ខាងលើ ដើម្បីជៀសវាងការផ្អាកសេវា​ ។</span> <br>
                                <span style="font-size: 11px;">Please make all payments before due date to avoid service suspension.</span>​ <br>
                                <span style="font-family: khmeros;font-size: 11px;"> * លោកអ្នកអាចធ្វើការទូទាត់ថ្លៃសេវាតាមរយៈមធ្យោបាយណាមួយខាងក្រោមៈ </span> <br>
                                <span style="font-size: 11px;">Payment is available at any accounts below:</span> <br>
                                <span style="font-size: 13px;">- Bank : ABA</span> <br>
                                <span style="font-size: 13px;">- Acc Name: TURBOTECH CO LTD</span> <br>
                                <span style="font-size: 13px;">- Account No.: 000488896</span>
                            </td>
                            <td colspan="2" style="text-align: right;padding:5px;">
                                <span style="font-size: 11px;'.$display.'"> <strong>Total</strong> </span><br>
                                <span style="font-size: 11px;'.$display.'"> <strong>Vat Total</strong> </span><br>
                                <span style="font-size: 11px;"> <strong>Grand Total</strong> </span>
                            </td>
                            <td style="text-align: right;font-size: 11px;padding:10px;">
                                <span style="'.$display.'"><strong> $ '.number_format($amount,4,".",",").'</strong></span> <br>
                                <span style="'.$display.'"><strong> $ '.number_format($vat,4,".",",").'</strong></span> <br>
                                <span><strong> $ '.number_format($new_amount,4,".",",").'</strong></span>
                            </td>


                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: right;padding:5px;">

                                <span style="text-align:center;font-size: 10px;font-weight: bold;"><span​>សរុបជាប្រាក់រៀល (បូករួមទំាងអាករ)</span​> <br>
                                <span style="font-size: 10px;"><strong>Total Riel (VAT '.$vat_type.')</strong> </span>
                            </td>
                            <td style="text-align: right;padding:10px;"><span style="font-size: 11px;"> <strong>៛ '.number_format($total_riel,0,"",",").'</strong></span></td>
                        </tr>
                    </tbody>

            </table>

        ';
        return $description;

    }

    public function getNote(){

        $note = '
            <table style="border:none;padding:0;margin:0;width:100%">
                <tr>
                    <td style="font-size: 10px;">Note: The exchange rate of USD to Riel hereof shall be subject to the exchange rate published by National Bank of Cambodia. <strong>1 USD=4000 Riel</strong></td>
                </tr>
            </table>
        ';
        return $note;
    }

    public function getSignature(){

        $signature ='
        <div style="position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            color: white;
            text-align: center;
        ">
            <table border="0" cellpadding="1" cellspacing="1" style="width: 100%;">
                <tbody>
                    <tr>
                        <td><br/><br/><br/><br/><br/><br/></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;"><span style="font-size:11px;">-------------------------------------------------</span></td>
                        <td style="text-align: center;"><span style="font-size:11px;">-------------------------------------------------</span></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;"><span style="font-size:11px;font-family: khmeros;">ហត្ថលេខា និងឈ្មោះអតិថិជន</span></td>
                        <td style="text-align: center;"><span style="font-size:11px;font-family: khmeros;">ហត្ថលេខា និងឈ្មោះអ្នកលក់</span></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;"><span style="font-size:11px;">Customer\'s Signature & Name</span></td>
                        <td style="text-align: center;"><span style="font-size:11px;">Seller\'s Signature & Name</span></td>
                    </tr>
                </tbody>
            </table><br>
            '.$this->getBottom().'
        </div>';
        return $signature;
    }

    public function getBottom(){
        $bottom = '
            <table style="border:none;padding:0;margin:0;width:100%">
                <tr>
                    <td><span style="font-size: 10px;font-family: khmeros;">​​​<strong>សំគាល់៖</strong> ច្បាប់ដើមសម្រាប់អ្នកទិញ ច្បាប់ចម្លងសម្រាប់អ្នកលក់</span></td>
                </tr>
                <tr>
                    <td style="font-size: 10px;">Note: Original invoice for customer, copied invoice for seller</td>
                </tr>
            </table>
        ';
        return $bottom;
    }
}


<?php

namespace App\Http\Controllers\api\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mpdf\Mpdf;
use App\model\api\crm\ModelCrmQuote as Quote;
use App\model\api\crm\ModelCrmQuoteBranch as QuoteBranch;
use App\model\api\crm\ModelCrmQuoteBranchDetail as QuoteBranchDetail;
use App\Http\Resources\QuoteResource;
use App\Http\Resources\QuoteBranchResource;
use App\Http\Resources\QuoteBranchDetailResource;
use App\model\api\crm\ModelCrmQuoteStatusType as QuoteStatusType;
use App\model\api\stock\ModelStockProduct as Stock;
use App\model\crm\ModelCrmQuote as Q;

class PreviewQuoteController extends Controller
{
    public function index($recordId){

        //report errors
        error_reporting(E_ALL);
        ini_set("display_errors", 1);

        $config = [
            'mode' => '+aCJK',
            "autoScriptToLang" => true,
            "autoLangToFont" => true,
        ];

        $mpdf = new \Mpdf\Mpdf($config);


        //request api
        // $token = $_SESSION['token'];
        $request = Request::create('/api/quote/'.$recordId.'', 'GET');
        $request->headers->set('Accept', 'application/json');
        // $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        $data = json_decode($res->getContent());
        $quote = $data->data;
        $no = $quote->quote_number;


        $html =  $this->logosource().'
        <div style="width: 100%; padding-top: 5px; padding-bottom: -2px; text-align: center;"><span style="font-size:19px;"><span style="color: rgb(31, 168, 225);"><span style="font-family: verdana;"><b>QUOTATION</b></span></span></span></div>


        <div style="width: 100%; margin-top: 5px;">
            <table border="0" cellpadding="1" cellspacing="1" style="font-family: Verdana;" width="100%">
                <tbody>
                    <tr>
                        <td align="left" valign="top" width="60%">
                        '.$this->getQuoteTo($quote).'
                        </td>
                        <td valign="top" width="40%">
                        '.$this->getQuoteInfo($quote).'
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


        <div style="width: 100%;  margin-top: 8px;">
            <table cellpadding="3" cellspacing="0" style="border-collapse: collapse;" width="100%">
                <thead>
                    <tr bgcolor="#1fa8e1" color="#ffffff">
                        <td style="height:25px; width:40px; TEXT-ALIGN: center;"><span style="font-size:11px;"><strong><span style="font-family: arial, helvetica, sans-serif;"><span style="color: rgb(255, 255, 255);">NO</span></span></strong></span></td>
                        <td style="TEXT-ALIGN: center;"><span style="font-size:11px;"><span style="color: rgb(255, 255, 255);"><span style="font-family: arial, helvetica, sans-serif;"><strong><span style="font-weight: bold;">ITEM DESCRIPTION</span></strong></span></span></span></td>
                        <td style="width: 65px; text-align: center;"><span style="font-size:11px;"><span style="color: rgb(255, 255, 255);"><span style="font-family: arial, helvetica, sans-serif;"><strong>QTY</strong></span></span></span></td>
                        <td style="width: 80px; text-align: right;"><span style="font-size:11px;"><span style="color: rgb(255, 255, 255);"><span style="font-family: arial, helvetica, sans-serif;"><strong>UNIT PRICE</strong></span></span></span></td>

                        <td style="width: 80px; text-align: right;"><span style="font-size:11px;"><span style="font-family: arial, helvetica, sans-serif;"><span style="color: rgb(255, 255, 255);"><strong>AMOUNT</strong></span></span></span></td>
                    </tr>
                </thead>
                <tbody>
                    '.$this->getQuoteItem($recordId).'
                </tbody>
            </table>
        </div>
        &nbsp;

        <table border="0" cellpadding="1" cellspacing="1" height="288" width="100%">
            <tbody>
                <tr>
                    <td style="padding-bottom:7px;" colspan="3"><span style="color:#1fa8e1;"><span style="font-size: 11px;"><span style="font-family: verdana;"><strong>III. TERMS AND CONDITIONS :</strong></span></span></span>
                    </td>
                </tr>';
            //	if($quoteServices['deposit']!=0){
                    $html .= '<tr>
                    <td style="width: 110px;" valign="top"><span style="font-size:10px;"><span style="font-family: verdana;"><strong>
                        &nbsp;&nbsp;&nbsp;&nbsp;1. Deposit</strong></span></span></td>

                        <td style="width: 10px;" valign="top"><span style="font-size:10px;"><span style="font-family: verdana;">:</span></span></td>

                        <td style="text-align: justify;" valign="top"><span style="font-size:10px;"><span style="font-family: verdana;">Customer is required to pay a deposit as security on the internet agreement and equipment lend to customer. The deposit is refundable if the customer fulfills its obligation under this general term and conditions.</span></span></td>
                    </tr>';
            //	}

                $html .= '
                <tr>
                    <td valign="top"><span style="font-size:10px;"><span style="font-family: verdana;"><strong><span style="margin-top: 1px;">
                    &nbsp;&nbsp;&nbsp;&nbsp;2. Payment</span></strong></span></span></td>

                    <td valign="top"><span style="font-size:10px;"><span style="font-family: verdana;">:</span></span></td>

                    <td style="text-align: justify;" valign="top"><span style="font-size:10px;"><span style="font-family: verdana;">The customer shall bear all government taxes, levies and other costs imposed by law. Customer shall pay their monthly fee by the due date as detailed on the invoice and the payment made are not refundable.</span></span></td>
                </tr>
                <tr>
                    <td valign="top"><span style="font-size:10px;"><span style="font-family: verdana;"><strong><span style="margin-top: 1px;">
                    &nbsp;&nbsp;&nbsp;&nbsp;3. Late Payment </span></strong></span></span></td>

                    <td valign="top"><span style="font-size:10px;"><span style="font-family: verdana;">:</span></span></td>

                    <td style="text-align: justify;" valign="top"><span style="font-size:10px;"><span style="font-family: verdana;">TURBOTECH reserves the right to lock or suspend Internet access if payment is not made before or on the due date as detailed on the invoice. All service payments must be made by direct transfer to TURBOTECH account receivable or with TURBOTECH Bank account.</span></span></td>
                </tr>
                <tr>
                    <td valign="top"><span style="font-size:10px;"><span style="font-family: verdana;"><strong>
                    &nbsp;&nbsp;&nbsp;&nbsp;4. Installation </strong></span></span></td>

                    <td valign="top"><span style="font-size:10px;"><span style="font-family: verdana;">:</span></span></td>

                    <td style="text-align: justify;" valign="top"><span style="font-size:10px;"><span style="font-family: verdana;">
                    Maximum 3 (Three) working days in Phnom Penh area and maximum 7 (Seven) working day for province area.</span></span></td>
                </tr>
                <tr>
                    <td valign="top"><span style="font-size:10px;"><span style="font-family: verdana;"><strong>
                    &nbsp;&nbsp;&nbsp;&nbsp;5. Support </strong></span></span></td>

                    <td valign="top"><span style="font-size:10px;"><span style="font-family: verdana;">:</span></span></td>

                    <td style="text-align: justify;" valign="top"><span style="font-size:10px;"><span style="font-family: verdana;">The technical support 24/7 for Customer Service and Network Operations Center Hotline.</span></span></td>
                </tr>
                <tr>
                    <td valign="top"><span style="font-size:10px;"><span style="font-family: verdana;"><strong>
                    &nbsp;&nbsp;&nbsp;&nbsp;6. Contract </strong></span></span></td>

                    <td valign="top"><span style="font-size:10px;"><span style="font-family: verdana;">:</span></span></td>

                    <td style="text-align: justify;" valign="top"><span style="font-size:10px;"><span style="font-family: verdana;">The Agreement contracted 12 months starting from the 1st TURBOTECH official invoice date issue and auto renewable unless with 30 days written notice from either Customer or TURBOTECH by the end of the contract. Any customer who early termination contract need to repay 50 USD as penalty.</span></span></td>
                </tr>
                <tr>
                    <td valign="top"><span style="font-size:10px;"><span style="font-family: verdana;"><strong>
                    &nbsp;&nbsp;&nbsp;&nbsp;7. Addition </strong></span></span></td>

                    <td valign="top"><span style="font-size:10px;"><span style="font-family: verdana;">:</span></span></td>

                    <td style="text-align: justify;" valign="top"><span style="font-size:10px;"><span style="font-family: verdana;">Option 1 and 6 are not avialable for customers payment in semesterly or yearly.</span></span></td>
                </tr>
            </tbody>
        </table>

        '.$this->getSignBlock(1).'
        <div style=" position:fixed; bottom:-24px; height:30px; width:100%; padding-top: 4px; padding-bottom: 4px; text-align: center; border-top:solid 1px #1fa8e1;"><span style="color:#1fa8e1;"><span style="font-family: verdana;"><span style="font-size: 10px;">#6, Street 289, Sangkat Boeng Kok II, Khan Toul Kork, Phnom Penh, Cambodia.<br />
        Tel: (855) 23 999 998 | Email: sales@turbotech.com. | Website: www.turbotech.com</span></span></span></div>' ;

        $mpdf->WriteHTML($html);
        $filename = 'Quote-'.$no.'.pdf';
        // // $mpdf->Output($filename, 'D');//download
        $mpdf->Output($filename, 'I');
    }
    public function logosource(){
         $logo = '<table style="border:none;pedding:0;margin:0;width:100%">
         <tr>
             <td>
                 <img width="190" style="margin-top:-70px"  src="https://www.turbotech.com/storages/assets/img/system/turbotech.png"/>
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
     ';
         return $logo;
     }

    public  function numberToRoman($number) {
         $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
         $returnValue = '';
         while ($number > 0) {
             foreach ($map as $roman => $int) {
                 if($number >= $int) {
                     $number -= $int;
                     $returnValue .= $roman;
                     break;
                 }
             }
         }
         return $returnValue;
     }

    public  function getQuoteTo($q){
        $add = '';
        $name = '';
        $pos = '';
        $phone = '';
        $email = '';

        if($q->address!=null){
            $address = Q::getAddress($q->address->gazetteer_code);
            $add = $address[0]->get_gazetteers_address_en;
        }
        if($q->contact!=null){
            $name = $q->contact->name_en;
            $pos = $q->contact->position;
            $phone = $q->contact->phone;
            $email = $q->contact->email;
        }

         $output = '
         <table cellpadding="1" cellspacing="1" style="border: solid 1px #1fa8e1; font-size: 11px; font-family: Verdana;" width="90%">
                 <tbody>
                     <tr bgcolor="#1fa8e1" style="border: solid 1px #1fa8e1">
                         <td align="left" colspan="3" style="font-weight: bold; border: solid 1px #1fa8e1;" valign="top">
                                                 <span style="font-size:12px;"><strong><span style="color: rgb(255, 255, 255)" >QUOTATION TO:</span>
                                                 </strong></span></td>
                     </tr>
                     <tr>
                         <td align="left" style="font-weight: bold;" valign="top" width="25%">Company Name</td>
                         <td align="left" style="font-weight: bold;" valign="top">:</td>
                         <td style="font-weight: bold;" width="73%">'.$q->crm_lead->customer_name_en.'</td>
                     </tr>
                     <tr>
                         <td align="left" valign="top">Address</td>
                         <td align="left" valign="top">:</td>
                         <td>'.$add.'</td>
                     </tr>
                     <tr>
                         <td align="left" valign="top">Contact Name</td>
                         <td align="left" valign="top">:</td>
                         <td>'.$name.'</td>
                     </tr>
                     <tr>
                         <td align="left" valign="top">Position</td>
                                                 <td align="left" valign="top">:</td>
                         <td>'.$pos.'</td>
                     </tr>
                     <tr>
                         <td align="left" valign="top">Telephone</td>
                                                 <td align="left" valign="top">:</td>
                         <td>'.$phone.'</td>
                     </tr>
                     <tr>
                         <td align="left" valign="top">E-mail</td>
                                                 <td align="left" valign="top">:</td>
                         <td>'.$email.'</td>
                     </tr>
                 </tbody>
             </table>';


         return $output;

     }

    public  function getQuoteInfo($q){
        $time = strtotime($q->create_date);
        $newformat = date('d-m-Y',$time);

         $output = '<table border="0" cellpadding="1" cellspacing="1" style="font-size:11px; font-family: Verdana;" width="100%">
                 <tbody>
                     <tr bgcolor="#1fa8e1">
                         <td align="left" colspan="2" valign="top"><span style="color:#FFFFFF;"><span style="font-size: 12px;"><strong>QUOTE INFORMATION:</strong></span></span></td>
                     </tr>
                     <tr>
                         <td align="left" valign="top" width="20%">Quote Number</td>
                         <td width="55%">: '.$q->quote_number.'</td>
                     </tr>
                     <tr>
                         <td align="left" valign="top">Quote Date</td>
                         <td>: '.$newformat.'</td>
                     </tr>
                     <tr>
                         <td align="left" valign="top">Valid Until</td>
                         <td>: '.$q->due_date.'</td>
                     </tr>
                     <tr>
                         <td align="left" bgcolor="#1fa8e1" colspan="2" valign="top"><span style="color:#FFFFFF;"><span style="font-size: 12px;"><strong>SALE INFORMATION:</strong></span></span></td>
                     </tr>
                     <tr>
                         <td align="left" valign="top">Name</td>

                         <td width="55%">: '.$q->assign_to->first_name_en.' '.$q->assign_to->last_name_en.'</td>
                     </tr>
                     <tr>
                         <td align="left" valign="top">Telephone</td>

                         <td>: '.$q->assign_to->contact.'</td>
                     </tr>
                     <tr>
                         <td align="left" valign="top">E-mail</td>
                         <td>: sales@turbotech.com</td>
                     </tr>
                 </tbody>
             </table>';
         return $output;

     }

    public  function getQuoteItem($qid){
        // $token = $_SESSION['token'];
        $request = Request::create('/api/quotebranch/'.$qid.'', 'GET');
        $request->headers->set('Accept', 'application/json');
        // $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        $data = json_decode($res->getContent());
        $quotebranch = $data->data;


        $i =1;
        $output = '';
        // $    = 0;
        $services = [1,2,3];


         // if(!empty($services)){
             //body
             //============ each branch infomation===========
            foreach($quotebranch as $qb){

                $branchname=$qb->crm_lead_branch->name;

                // $token = $_SESSION['token'];
                $request = Request::create('/api/quotebranch/detail/'.$qb->id.'', 'GET');
                $request->headers->set('Accept', 'application/json');
                // $request->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($request);
                $data = json_decode($res->getContent());
                $quotedetail = $data->data;

                $output .= '
                <tr bgcolor="#e6e6ff">
                    <td colspan="5" style="height:25px; border-bottom: 1px solid #e6e6ff;">
                        <span style="font-family:verdana;"><strong><span style="font-size: 12px;">'.$branchname.'</span></strong></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="height:25px; border-bottom: 1px solid #e6e6ff;">
                        <span style="font-family:verdana;"><strong><span style="font-size: 12px;">'.$this->numberToRoman($i) .'. Services or Products Description</span></strong></span>
                    </td>
                </tr>';

             foreach ($quotedetail as $qq) {
                dd($qq);

                // $data = Stock::getServiceByBranchId($qq->stock_product_id);
                // dd(json_encode($data));

                 // $qty = (int)$rows['quantity'];
                 // $unittype= 'Month(s)';
                 // if($rows["productid"]==10229){ // deposit
                 // 	$this->deposit=10229;
                 // 	$unittype= 'Time';
                 // }if($rows["productid"]==1083 || $rows["productid"]==34848){ // Installation
                 // 	$unittype= 'Time';
                 // }
                 // if($vatnumber!=''){ // business
                 // 	$amount = $vattype=='Include'?($rows['amount']/1.1):$rows['amount'];
                 // }else{ // home
                 // 	$amount = $vattype=='Include'?$rows['amount']:($rows['amount']*1.1);
                 // }
                 // if($rows['quantity']==6 || $rows['quantity']==12){
                 // 	$qty = 1;
                 // 	if($vatnumber!=''){
                 // 		$unitprice = $vattype=='Include'?($rows['amount']/1.1):$rows['amount'];
                 // 	}else{
                 // 		$unitprice = $vattype=='Include'?$rows['amount']:($rows['amount']*1.1);
                 // 	}
                 // 	if($rows['quantity']==6){
                 // 		$unittype='Semester';
                 // 	}else{
                 // 		$unittype='Year';
                 // 	}
                 // }else{
                 // 	if($vatnumber!=''){
                 // 		$unitprice = $vattype=='Include'?($rows['listprice']*1.1):$rows['listprice'];
                 // 	}else{
                 // 		$unitprice = $vattype=='Include'?$rows['listprice']:($rows['listprice']*1.1);
                 // 	}
                 // }
                 // display in table
                 $output .='<tr>
                 <td style="font-family:verdana; border-bottom: 1px solid #e6e6ff; text-align: center; vertical-align: middle;">
                                 <span style="font-size:11px;"> sequence_no </span></td>
                 <td align="left" style="font-family:verdana; border-bottom: 1px solid #e6e6ff;" valign="middle">
                                 <span style="font-size:11px;"> servicename </span><br />
                                 <span style="font-size:9px;"> comment </span>
                             </td>
                 <td style="font-family:verdana; border-bottom: 1px solid #e6e6ff; text-align: left;" valign="middle">
                             <span style="font-size:11px;"> $qty  $unittype</span></td>
                 <td style="font-family:verdana; border-bottom: 1px solid #e6e6ff; text-align: right;" valign="middle">
                                 <span style="font-size:11px;">$  number_format($unitprice,2) </span></td>

                 <td style="font-family:verdana; border-bottom: 1px solid #e6e6ff; TEXT-ALIGN: right" valign="middle">
                             <span style="font-size:11px;">$  number_format($amount,2) </span></td>
                         </tr>';
                 // $subtotal += $amount;
             }

             // if($vatnumber != ''){
             // 	$vattotal = $subtotal * 0.1;
             // 	$total = $subtotal + $vattotal;
             // }else{
             // 	$total = $subtotal;
             // }
             // end loop
             $footer ='';
             // if($vatnumber!=''){
                 $footer = '	<tr bgcolor="#e6e6ff">
                 <td colspan="4" rowspan="1" style="height:25px; text-align: right; border-bottom: 1px solid #c9dce4;">
                                 <span style="font-family:verdana; font-size:11px;">Sub Total</span>
                             </td>
                 <td style=" border-bottom: 1px solid #c9dce4; TEXT-ALIGN: right;"><span style="font-family:verdana; font-size:11px;">$  number_format($subtotal,2) </span></td>
                 </tr>
                 <tr bgcolor="#e6e6ff">
                     <td colspan="4" rowspan="1" style="height:25px; text-align: right;"><span style="font-family:verdana; font-size:11px;">VAT (10%)</span></td>
                     <td style="TEXT-ALIGN: right"><span style="font-size:11px;"><span style="font-family:verdana; text-align: right;">$  number_format($vattotal,2) </span></span></td>
                 </tr>';
             // }
             $output .= ' <tr style="background-color: #c9dce4;">
                 <td colspan="4" rowspan="1" style="height:25px; text-align: right;"><span style="color:#000;"><span style="font-family:verdana; font-size: 11px;"><span style="font-weight: bold;">Total with VAT </span><strong>(USD)</strong></span></span></td>
                 <td nowrap="nowrap" style="TEXT-ALIGN: right"><span style="color:#000;"><span style="font-family:verdana; font-size: 11px;"><strong>$  number_format($total,2) </strong></span></span></td>
             </tr>';
             $i++;
         // }

         // get products display
        //  $subtotalProducts =0;
         // $products = Quote::quoteProducts($recordId);
        //  $products=[1,2];
         // if(!empty($products)){
            //  $output .= '<tr>
            //      <td colspan="5" style="height:25px; border-bottom: 1px solid #e6e6ff;">
            //          <span style="font-family:verdana;"><strong><span style="font-size: 12px;">'. $this->numberToRoman($i) .'.Equipment, Installation & Maintenance (First Time Payment)</span></strong></span>
            //      </td>
            //  </tr>';
             // loop display
            //  foreach ($products as $rows) {
            //      // $qty = (int)$rows['quantity'];
            //      // $unittype= 'Unit';
            //      // if($vatnumber!=''){ // business
            //      // 	$unitprice = $vattype=='Include'?($rows['listprice']*1.1):$rows['listprice'];
            //      // 	$amount = $vattype=='Include'?($rows['amount']/1.1):$rows['amount'];
            //      // }else{ // home
            //      // 	$unitprice = $vattype=='Include'?$rows['listprice']:($rows['listprice']*1.1);
            //      // 	$amount = $vattype=='Include'?$rows['amount']:($rows['amount']*1.1);
            //      // }
            //      // display in table
            //      $output .='<tr>
            //      <td style="font-family:verdana; border-bottom: 1px solid #e6e6ff; text-align: center; vertical-align: middle;">
            //                      <span style="font-size:11px;"> sequence_no </span></td>
            //      <td align="left" style="font-family:verdana; border-bottom: 1px solid #e6e6ff;" valign="middle">
            //                      <span style="font-size:11px;"> servicename </span><br />
            //                      <span style="font-size:9px;"> comment </span>
            //                  </td>
            //      <td style="font-family:verdana; border-bottom: 1px solid #e6e6ff; text-align: left;" valign="middle">
            //                  <span style="font-size:11px;"> $qty  $unittype</span></td>
            //      <td style="font-family:verdana; border-bottom: 1px solid #e6e6ff; text-align: right;" valign="middle">
            //                      <span style="font-size:11px;">$  number_format($unitprice,2) </span></td>

            //      <td style="font-family:verdana; border-bottom: 1px solid #e6e6ff; TEXT-ALIGN: right" valign="middle">
            //                  <span style="font-size:11px;">$  number_format($amount,2) </span></td>
            //              </tr>';
            //      // $subtotalProducts += $amount;
            //  }

             // if($vatnumber != ''){
             // 	$vattotal = $subtotalProducts * 0.1;
             // 	$totalProducts = $subtotalProducts + $vattotal;
             // }else{
             // 	$totalProducts = $subtotalProducts;
             // }
             // end loop
             $footer ='';
             // if($vatnumber!=''){
                 $footer = '	<tr bgcolor="#e6e6ff">
                 <td colspan="4" rowspan="1" style="height:25px; text-align: right; border-bottom: 1px solid #c9dce4;">
                                 <span style="font-family:verdana; font-size:11px;">Sub Total</span>
                             </td>
                 <td style=" border-bottom: 1px solid #c9dce4; TEXT-ALIGN: right;"><span style="font-family:verdana; font-size:11px;">$ number_format($subtotalProducts,2)</span></td>
                 </tr>
                 <tr bgcolor="#e6e6ff">
                     <td colspan="4" rowspan="1" style="height:25px; text-align: right;"><span style="font-family:verdana; font-size:11px;">VAT (10%)</span></td>
                     <td style="TEXT-ALIGN: right"><span style="font-size:11px;"><span style="font-family:verdana; text-align: right;">$ number_format($vattotal,2)</span></span></td>
                 </tr>';
             // }
             // if($totalProducts > 0){
                 $output .=' <tr style="background-color: #c9dce4;">
                     <td colspan="4" rowspan="1" style="height:25px; text-align: right;"><span style="color:#000;"><span style="font-family:verdana; font-size: 11px;"><span style="font-weight: bold;">Total with VAT </span><strong>(USD)</strong></span></span></td>
                     <td nowrap="nowrap" style="TEXT-ALIGN: right"><span style="color:#000;"><span style="font-family:verdana; font-size: 11px;"><strong>$ number_format($totalProducts,2)</strong></span></span></td>
                 </tr>';
             // }

         // }


        }

         //============ End each branch infomation===========


        //footer
        //grand total all branch
         $output .= '<tr style="background-color: #1fa8e1;">
             <td colspan="4" rowspan="1" style="height:25px; text-align: right;"><span style="color:#fff;"><span style="font-family:verdana; font-size: 11px;"><span style="font-weight: bold;">Grand Total </span><strong>(USD)</strong></span></span></td>
             <td nowrap="nowrap" style="TEXT-ALIGN: right"><span style="color:#fff;"><span style="font-family:verdana; font-size: 11px;"><strong>$ number_format($total + $totalProducts,2)</strong></span></span></td>
         </tr>';

         // return array('service'=>$output,'deposit'=>$this->deposit);
         return $output;

     }


    public  function getSignBlock($recordId){
         // $q = Quote::quoteinfo($recordId);
         $output = '<div style="width:100%; bottom:25px;"><br/>
         <table border="0" cellpadding="1" cellspacing="1" style="width: 100%;">
             <tbody>
             <tr>
                 <td style="width: 30%;" valign="top"><br />
                 <span style="font-size:11px;"><span style="font-family: arial, helvetica, sans-serif;"><strong>Customer:</strong></span></span><br />
                 <br />
                 <br />
                 &nbsp;</td>
                 <td style="width: 6%; " valign="top">&nbsp;</td>
                 <td style="width: 30%;" valign="top"><br />
                 <span style="font-size:11px;"><span style="font-family: arial, helvetica, sans-serif;"><strong>Acknowledged by:</strong></span></span></td>
                 <td style="width: 6%; " valign="top">&nbsp;</td>
                 <td colspan="1" style="width: 28%;" valign="top"><br />
                 <span style="font-size:11px;"><span style="font-family: arial, helvetica, sans-serif;"><strong>Prepared by:</strong></span></span><br />
                 <br />
                 <br />


                 &nbsp;</td>
             </tr>
             <tr>
                 <td valign="top"><span style="font-size:11px;"><span style="font-family: arial, helvetica, sans-serif;">.....................................................</span></span></td>
                 <td valign="top">&nbsp;</td>
                 <td><span style="font-size:11px;"><span style="font-family: arial, helvetica, sans-serif;">.....................................................</span></span></td>
                 <td valign="top">&nbsp;</td>
                 <td valign="top"><span style="font-size:11px;"><span style="font-family: arial, helvetica, sans-serif;">....................................................</span></span></td>
             </tr>
             <tr>
                 <td valign="top"><span style="font-size:11px;"><span style="font-family: arial, helvetica, sans-serif;">Name:&nbsp;&nbsp;&nbsp; ......................................</span></span></td>
                 <td valign="top">&nbsp;</td>
                 <td><span style="font-size:11px;"><span style="font-family: arial, helvetica, sans-serif;">Name:&nbsp;&nbsp;&nbsp; ackname</span></span></td>
                 <td valign="top">&nbsp;</td>
                 <td valign="top"><span style="font-size:11px;"><span style="font-family: arial, helvetica, sans-serif;">Name:&nbsp;&nbsp;&nbsp;preparedby</span></span></td>
             </tr>
             <tr>
                 <td valign="top"><span style="font-size:11px;"><span style="font-family: arial, helvetica, sans-serif;">Position: ......................................</span></span></td>
                 <td valign="top">&nbsp;</td>
                 <td><span style="font-size:11px;"><span style="font-family: arial, helvetica, sans-serif;">Position: Financial Compliance Officer </span></span></td>
                 <td valign="top">&nbsp;</td>
                 <td valign="top"><span style="font-size:11px;"><span style="font-family: arial, helvetica, sans-serif;">Position: Sale Manager</span></span></td>
             </tr>
             <tr>
                 <td valign="top"><span style="font-size:11px;"><span style="font-family: arial, helvetica, sans-serif;">Date:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; .........../............/.............</span></span></td>
                 <td valign="top">&nbsp;</td>
                 <td><span style="font-size:11px;"><span style="font-family: arial, helvetica, sans-serif;">Date:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; .........../............/.............</span></span></td>
                 <td valign="top">&nbsp;</td>
                 <td valign="top"><span style="font-size:11px;"><span style="font-family: arial, helvetica, sans-serif;">Date:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; .........../............/.............</span></span></td>
             </tr>
             </tbody>
         </table> </div>';

         return $output;
     }
}

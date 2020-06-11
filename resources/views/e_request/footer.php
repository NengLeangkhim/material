<!-- <div class="container"> -->
<style>
.panding_label{font-family: khmer OS Content ,cursive;color: #1fa8e0;}
.approve_label{font-family: khmer OS Content ,cursive;color: #218838;}
.reject_label{font-family: khmer OS Content ,cursive;color: #f00;}
.comment_label{font-family: khmer OS Content ,cursive;color: #000;}
.action_by{font-family: 'Times New Roman', Times, serif;font-size: 20px;}
.cmt_txt{font-style: italic; color: #f00;}
</style>
<?php
echo (empty($pending_by))?'':'<label class="panding_label"><u style="color:#000">បានដាក់ក្នុងការរង់ចាំដោយ ៖</u> <span class="action_by">'.$pending_by.'</span> នៅថ្ងៃទី ៖ '.conv_datetime($pending_date).'</label><br><label class="comment_label"><u>មតិយោបល់ ៖ </u> <span class="cmt_txt">'.$comment_pd.'</span></label><br>';
echo (empty($approve_by))?'':'<label class="approve_label"><u style="color:#000">បានអនុម័តដោយ ៖</u> <span class="action_by">'.$approve_by.'</span> នៅថ្ងៃទី ៖ '.conv_datetime($approve_date).'</label><br><label class="comment_label"><u>មតិយោបល់ ៖ </u> <span class="cmt_txt">'.$comment_ap.'</span></label><br>';
echo (empty($reject_by))?'':'<label class="reject_label"><u style="color:#000">បានបដិសេធដោយ ៖</u> <span class="action_by">'.$reject_by.'</span> នៅថ្ងៃទី ៖ '.conv_datetime($reject_date).'</label><br><label  class="comment_label"><u>មតិយោបល់ ៖ </u> <span class="cmt_txt">'.$comment_re.'</span></label><br>';
?>
    <div class="row">
        <div class="col-12">
            <hr style="background:#1fa8e0;border-width:2px">
        </div>
        <div class="col-12" align="center">
            <p class="footer">                                     
                ផ្លូវ៥៩៨ សង្កាត់ច្រាំងចំរេះទី២ ខណ្ឌឬស្សីកែវ​ រាជធានីភ្នំពេញ ព្រះរាជាណាចក្រកម្ពុជា
            </p> 
            <p class="footer">                                     
                Street 598, Sangkat Chrang Chamreh 2, Khan Russey Keo, Phnom Penh, Kingdom of Cambodia.
            </p>
            <p class="footer">                                     
                Tel: (855) 23 999 998, E-mail: info@turbotech.com, Website: www.turbotech.com
            </p>
        </div>
    </div>
<!-- </div> -->

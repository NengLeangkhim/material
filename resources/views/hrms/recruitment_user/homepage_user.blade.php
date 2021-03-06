

<?php
  use Illuminate\Support\Facades\DB;
  $r = DB::select("select id, email from ma_user where status='t'");
  // convert number to khmer number
  Function conv_kh($str)
    {
        $s=array();
        $st="";
        for($i=0;$i<strlen($str); $i++){
            $s[]=substr($str,$i,1);
        }
        foreach($s as $ss){
            switch($ss){
                case 1:
                    $st.='១';
                    break;
                case 2:
                    $st.='២';
                    break;
                case 3:
                    $st.='៣';
                    break;
                case 4:
                    $st.='៤';
                    break;
                case 5:
                    $st.='៥';
                    break;
                case 6:
                    $st.='៦';
                    break;
                case 7:
                    $st.='៧';
                    break;
                case 8:
                    $st.='៨';
                    break;
                case 9:
                    $st.='៩';
                    break;
                case 0:
                    $st.='០';
                    break;
            }
        }
        return $st;
    }

  $num = conv_kh(count($r));
  

?>



<div class="row" style="padding: 15px 10px 10px 10px">

      <div class="col-xl-12 col-sm-12">

          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style=" ">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class=" d-block w-100" src="images/company_logo.png" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class=" d-block w-100" src="images/interview2.png" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="images/networking-760x227.jpg" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
          </div>

            {{-- <div >
              <img class="img_can_dashboard" src="images/company_logo.png"  >
            </div> --}}
      </div>

      <div class="col-md-12">
          <div class=" row list-item item romana_single_post1"​ style="width:100%; padding: 15px;">
                  <p></p>
                  <p style="margin-left: 15px; font-size: 16px; font-family: 'Bokor', Tahoma, Geneva, Verdana, sans-serif;"><b> សួរស្តីអ្នកទាំងអស់គ្នា!  </b><br></p>
                  <div style="font-family: Khmer OS Battambang; font-size: 12px;">
                      <div style="margin-left: 10px;">
                      ជាបឋមខ្ញុំសូមឆ្លៀតយកឱកាសនេះស្វាគមន៍អ្នកទាំងអស់គ្នាមកកាន់ក្រុមហ៊ុនធើបូថេកដែលជាក្រុមហ៊ុនផ្តល់នូវសេវាកម្មអុីនធើណេតឈានមុខគេនៅកម្ពុជានិងជាក្រុមហ៊ុនផ្ដល់ដំណោះស្រាយអាជីវកម្មនៅកម្ពុជា។ 
                      សព្វថ្ងៃធើបូថេកមានបុគ្គលិកដែលមានទេពកោសល្យចំនួន <?php echo $num;?> នាក់។ សមាជិកបុគ្គលិកថ្មីទាំងនោះ 
                      ១/៣ នៃពួកគេគឺជានិស្សិតបញ្ចប់ការសិក្សាថ្មីៗ (BA &amp; BBA)។ ។<br>
                      </div>


                      <br>
                      <div style="margin-left: 10px;">
                      ហើយជាងនេះផងដែរ ក្រុមហុ៊នយើងក៏បានរៀបចំរួចជាស្រេចដល់បេក្ខជនដែលមានចំណាប់អារម្ភណ៍ចង់ធ្វើការសម្ភាសចូលធ្វើរការងារជាមួយធើបូថេក ទៅតាមមុខដំណែងការងារដែលបានផ្តល់ឲ្យ 
                      បេក្ខជនអាចធ្វើការដាក់ពាក្យតាមរយៈ វេបសាយរបស់យើងដើម្បីធ្វើរការសម្ភាស់ដោយផ្ទាល់ និងសាកល្បងសម្ថតភាពតាមរយៈ វេបសាយនេះផងដែរ។ 
                      </div>
                  </div>

          </div>
      </div>

</div>


<script type="text/javascript">
    $('.carousel').carousel()
    $('.carousel').carousel({
        interval: 100
    })
</script>
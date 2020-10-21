function mydemo(){
    alert("dsvfd");

}
function check_session(){
	$.ajax({
        type:'GET',
        url: "check_session",
        success: function(data){
            if(parseInt(data)==0){
                alert("session expired!");
                location.replace('/');
                return true;
            }else{
                return false;
            }
      }
    });
}
  jQuery("a").click(function(e){
    if(check_session()){
      return;
    }
    e.preventDefault();
    var link = $(this).attr("value");
    var code = $(this).attr("data-code");
    var href = $(this).attr("href");
    if (typeof link !== typeof undefined && link !== false) {
      $(".content-wrapper").html(spinner());
      $("#nav_bar_sub_r").html(get_pushmenu());
      $.ajax({
        type: 'GET',
        url:link,
        async:false,
        success:function(data){
            $(".content-wrapper").show();
            if(data.length>0){
              $(".content-wrapper").html(data);
            }else{
              $(".content-wrapper").html(jnot_found());
            }
            // $(".select2").select2();
            $('.display').DataTable({
              responsive: true
            });
        },
        error:function(){
          $(".content-wrapper").html(jerror());
        }
     });
    }else if (typeof code !== typeof undefined && code !== false) {
        $(".content-wrapper").html(spinner());
        $("#nav_bar_sub_r").html(get_pushmenu());
        $.ajax({
          type: 'POST',
          url:'sub_r_nav',
          async:false,
          data:{
            _mo:code,
            _token : $('meta[name="csrf-token"]').attr('content'),
          },
          success:function(data){
              // $(".content-wrapper").show();
              $("#nav_bar_sub_r").html(data);
              set_selected_nav('nav_bar_sub_r');
              $(".content-wrapper").show();
              $(".content-wrapper").html('');
              // $(".select2").select2();
          },
          error:function(){
            $(".content-wrapper").html(jerror());
          }
       });
      }
      else if (typeof href !== typeof undefined && href !== false) {
        var target = $(this).attr("target");
        $("#nav_bar_sub_r").html(get_pushmenu());
        if (typeof target !== typeof undefined && target !== false) {
          window.open(href, target);
        }else{
          window.location.href = href;
        }
      }
});
//only work on tag a with onclick and go_to
function set_selected_nav(tar){
  var s=$("#"+tar).find("a")[1];
  var z=$("#"+tar).find("a")[1]; 
  s=$(s).attr("onclick");
  s=s.split("'")[1];
  if(s.length>0){
    go_to(s);
    $(z).addClass('active');// add class active 
  }
}
function get_pushmenu(){
  return '<li class="nav-item"><a class="nav-link bar-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a></li>';
}
// function addlead(){
//   var link = $(this).attr("​value");
//   alert(link);
// }
function spinner(){
  return'<center></br><div class="spinner-border text-primary center" role="status"><span class="sr-only">Loading...</span></div>&nbsp&nbsp<label style="font-weight:bold;font-size:16px;">Please wait...</label></center>';
}
function jerror(){
  // return get_maintain_page();
  return'<center><label style="font-weight:bold;font-size:16px;">Error</label></center>';
}
function jnot_found(){
  // return get_not_found_page();
  return'<center><label style="font-weight:bold;font-size:16px;">Not Found</label></center>';
}

jQuery("a[data-id]").click(function(e){ // Function Click focus on link menu
  e.preventDefault(); 
  var href = $(this).attr("href");// get value href
  if (typeof href !== typeof undefined && href !== false) {// check condition 
      $('a[data-id]').removeClass('active'); //remove class active
      var id = $(this).attr("data-id");// get value data-id from link click
      $('a[data-id='+id+']').addClass('active'); // set link active
  }  
})
function navbar_active(id){ // Function Click focus on link menu
      $('a[data-navbar]').removeClass('active'); //remove class active
      $('a[data-navbar='+id+']').addClass('active'); // set link active 
}
$(function() {
  //var content_menu_width = $('.os-content').width();
  $('div.div_animation').each(function(i) {
    var a_width = $('div.div_animation').outerWidth( true );
    var p_width = $(this).find('p').width();
    if ( p_width > a_width) {
      $(this).find('p').addClass('nav_animation');
      //alert('ok');
    }
    //alert(a_width);
  })
});
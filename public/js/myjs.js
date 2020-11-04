function mydemo(){
    alert("dsvfd");

}
function check_session(){
	$.ajax({
        type:'GET',
        url: "check_session",
        // async:false,
        success: function(data){
            if(parseInt(data)==0){
              Swal.fire({ //get from sweetalert function
                title: 'SESSOIN EXPIRED',
                text: "The session has ben expired please login again",
                icon: 'alert',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
              }).then((result) => {
                if (result.value) {
                  location.replace('/');
                  return true;
                }
              });
            }else{
                return false;
            }
      },
    });
}
jQuery("a[value]").click(function(e){
  if(check_session()){
    return;
  }
  showloading();
  var link = $(this).attr("value");
  $(".content-wrapper").html('');
  $("#nav_bar_sub_r").html(get_pushmenu());
      $.ajax({
        type: 'GET',
        url:link,
        // async:false,
        success:function(data){
          hideloading();
            $(".content-wrapper").show();
            if(data.length>0){
              $(".content-wrapper").html(data);
            }else{
              $(".content-wrapper").html(jnot_found());
            }
        },
        error:function(){
          hideloading();
          $(".content-wrapper").html(jerror());
        }
     });
});
jQuery("a[data-code]").click(function(e){
      if(check_session()){
        return;
      }
      showloading();
      var code = $(this).attr("data-code");
      $(".content-wrapper").html('');
      $("#nav_bar_sub_r").html(get_pushmenu());
        $.ajax({
          type: 'POST',
          url:'sub_r_nav',
          // async:false,
          data:{
            _mo:code,
            _token : $('meta[name="csrf-token"]').attr('content'),
          },
          success:function(data){
            hideloading();
              $("#nav_bar_sub_r").html(data);
              set_selected_nav('nav_bar_sub_r');
              $(".content-wrapper").show();
          },
          error:function(){
            hideloading();
            $(".content-wrapper").html(jerror());
          }
       });
});
jQuery("a[href]").click(function(e){
      if(check_session()){
        return;
      }
      var href = $(this).attr("href");
      var target = $(this).attr("target");
        $("#nav_bar_sub_r").html(get_pushmenu());
        if (typeof target !== typeof undefined && target !== false) {
          window.open(href, target);
        }else{
          window.location.href = href;
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
  // return '';
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


jQuery.fn.center = function () {
  this.css("position","absolute");
  this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) +
                                              $(window).scrollTop()) + "px");
  this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) +
                                              $(window).scrollLeft()) + "px");
  return this;
}

function showloading(){
    $("#moLoading").center();
    $("#moLoadingdiv").show();
}
function hideloading(){
  $("#moLoadingdiv").hide();
}
function errorMessage(){
  Swal.fire({ //get from sweetalert function
    title: 'ERROR Occur',
    text: "Please reload page and try again",
    icon: 'warning',
    showCancelButton: false,
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'OK'
  });
}


var oldXHR = window.XMLHttpRequest;

function newXHR() {
    var realXHR = new oldXHR();
    realXHR.addEventListener("readystatechange", function() {
        if(realXHR.readyState==1){
          showloading();
        }
        if(realXHR.readyState==2){
          showloading();
        }
        if(realXHR.readyState==3){
          showloading();
        }
        if(realXHR.readyState==4){
          switch(realXHR.status){
            case 500:
              hideloading();
              Swal.fire({ //get from sweetalert function
                title: 'ERROR Occur',
                text: "500 Internal Server Error",
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
              });
              break;
            case 200:
              hideloading();
            break;
            case 419:
              hideloading();
              errorMessage();
            break;
            case 0:
              hideloading();
              errorMessage();
            break;
            case 404:
              hideloading();
            break;
            case 413:
              hideloading();
              Swal.fire({ //get from sweetalert function
                title: '413 ERROR Occur',
                text: "413 Payload(file) too large",
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
              });
            break;
            default:
              hideloading();
            break;
          }
        }
    }, false);
    return realXHR;
}
window.XMLHttpRequest = newXHR;


// $( document ).ajaxStart(function(jqxhr) {
//   showloading();
//   console.log(jqxhr);
// });
// $( document ).ajaxStop(function() {
//   hideloading();
// });
// $( document ).ajaxSend(function() {
//   showloading();
// });
// $( document ).ajaxComplete(function() {
//   hideloading();
// });
// $( document ).ajaxError(function(jqXHR) {
//   if(jqXHR==500){
//     hideloading();
//     Swal.fire({ //get from sweetalert function
//       title: 'ERROR Occur',
//       text: "500 Internal Server Error",
//       icon: 'warning',
//       showCancelButton: false,
//       confirmButtonColor: '#3085d6',
//       confirmButtonText: 'OK'
//     });
//   }
//   if(jqXHR==0){
//     hideloading();
//     errorMessage();
//   }
// });
$('body').append('<div class="moLoadingClass" id="moLoadingdiv"><div id="moLoading"><center></br><div class="spinner-border text-primary center" role="status"><span class="sr-only">Loading...</span></div>&nbsp&nbsp<label style="font-weight:bold;font-size:16px;">Loading Please wait...</label></center></div></div>');
$("#moLoading").center();


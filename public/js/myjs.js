function mydemo(){
    alert("dsvfd");

}
function check_session(){
	$.ajax({
        type:'GET',
        url: "check_session",
        async:false,
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
  jQuery(".menu a").click(function(e){
    if(check_session()){
      return;
    }
    e.preventDefault();
    $("#nav_bar_sub_r").html(get_pushmenu());
    $(".content-wrapper").html(spinner());
    var link = $(this).attr("​value");
    if (typeof link !== typeof undefined && link !== false) {
      $.ajax({
        type: 'GET',
        url:link,
        success:function(data){
            $(".content-wrapper").show();
            $(".content-wrapper").html(data);
            $(".select2").select2();
            $('.display').DataTable({
              responsive: true
            });
        }
     });
    }else{
      var code = $(this).attr("​data-code");
      if (typeof code !== typeof undefined && code !== false) {
        $.ajax({
          type: 'POST',
          url:'sub_r_nav',
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
              $(".select2").select2();
          }
       });
      }
    }
});
//only work on tag a with onclick and go_to
function set_selected_nav(tar){
  var s=$("#"+tar).find("a")[1];
  s=$(s).attr("onclick");
  s=s.split("'")[1];
  go_to(s);
}
function get_pushmenu(){
  return '<li class="nav-item"><a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a></li>';
}
// function addlead(){
//   var link = $(this).attr("​value");
//   alert(link);
// }
function spinner(){
  return'<center></br><div class="spinner-border text-primary center" role="status"><span class="sr-only">Loading...</span></div>&nbsp&nbsp<label style="font-weight:bold;font-size:16px;">Please wait...</label></center>';
}

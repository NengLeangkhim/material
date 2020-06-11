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
                location.replace('/logout');
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
    var link = $(this).attr("​value");
    if (typeof link !== typeof undefined && link !== false) {
      $(".content-wrapper").html(spin());
      $.ajax({
        type: 'GET',
        url:link,
        success:function(data){
            $(".content-wrapper").show();
            $(".content-wrapper").html(data);
        }
     });
    }else{
      var code = $(this).attr("​data-code");
      if (typeof code !== typeof undefined && code !== false) {
        $.ajax({
          type: 'GET',
          url:'sub_r_nav',
          data:{
            _mo:code,
            _token : '{!! csrf_token() !!}',
          },
          success:function(data){
              // $(".content-wrapper").show();
              $("#nav_bar_sub_r").html(data);
              $(".content-wrapper").show();
              $(".content-wrapper").html('');
          }
       });
      }
    }
});
function get_pushmenu(){
  return '<li class="nav-item"><a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a></li>';
}
// function addlead(){
//   var link = $(this).attr("​value");
//   alert(link);
// }


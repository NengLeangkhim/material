function mydemo(){
    alert("dsvfd");

}

  jQuery(".menu a").click(function(e){
    e.preventDefault();
    var link = $(this).attr("​value");
    if (typeof link !== typeof undefined && link !== false) {
      $.ajax({
        type: 'GET',
        url:link,
        success:function(data){
            $(".content-wrapper").show();
            $(".content-wrapper").html(data);
        }
     });
    }
});

// function addlead(){
//   var link = $(this).attr("​value");   
//   alert(link);
// }


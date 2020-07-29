



//================================= SOK KIM part===============================

//-----------hr recruitment user------



function go_to(route){

    // $(".content-wrapper").html(spinner());
    // if(check_session()){
    //     return;
    // }
    // if(route.length<=0){
    //     $(".content-wrapper").html(jnot_found());
    //     return;
    // }
    // if(route=='/'){
    //     $(".content-wrapper").html(jnot_found());
    //     return;
    // }

    $.ajax({
        type: 'GET',
        url:route,
        success:function(data){
            $(".content-wrapper").show();
            $(".content-wrapper").html(data);
        },
        error:function(){
          $(".content-wrapper").html(jerror());
        }
     });


}

//--------------end hr recruitment user-------


// ==================================END SOK KIM =======================================
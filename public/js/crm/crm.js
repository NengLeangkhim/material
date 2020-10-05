// ----------Contact---------- //
    //Fuction Click Update Contact
    // function CrmDetailContact(id){
    //     $.ajax({
    //         url:"/contact/detail",   //Request send to "action.php page"
    //         type:"GET",    //Using of Post method for send data
    //         data:{id:id},//Send data to server
    //         success:function(data){
    //             $('#ShowModalContact').html(data);
    //             $('#CrmDetailContactModal').modal('show');   //It will display modal on webpage
    //         }
    //     });   
    // }



    function goto_Action(route,id){
      $(".content-wrapper").html(spinner());
      if(check_session()){
          return;
      }
      if(route.length<=0){
          $(".content-wrapper").html(jnot_found());
          return;
      }
      if(route=='/'){
          $(".content-wrapper").html(jnot_found());
          return;
      }
      $.ajax({
          type: 'GET',
          url:route,
          data:{id_:id},
          success:function(data){
              $(".content-wrapper").show();
              $(".content-wrapper").html(data);
          },
          error:function(){
            $(".content-wrapper").html(jerror());
          }
      });
    }


    
    function getDeleteQuoteLead(route,id) {

        Swal.fire({ //get from sweetalert function
          title: 'Do you want to delete this?',
        //   text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          width: '35%',
          padding: '10px',
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Delete'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              url:route,   
              data:{id:id},
              type:"GET",   
              success:function(data){
                  if(data == 1){
                    alert(data);
                  }
                //   setTimeout(function(){ go_to(goto); }, 300);// Set timeout for refresh content
                //   Swal.fire(
                //     'Deleted!',
                //       alert,
                //     'success'
                //   )
              }
              
             });
            
          }
        })
       
      };







// submit policy report
function ReportPolicy()
    {
        let num_miss = 0;
        $(".input_required").each(function(){
            if($(this).val()=="" || $(this).val()==null){ num_miss++;}
        });
        if(num_miss>0){
            $(".input_required").each(function(){
                if($(this).val()=="" || $(this).val()==null){ $(this).css("border-color","red"); }
            });
            sweetalert('error', 'Please input or select field *');
        }else{
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            let from=$('#policy_data_from').val();
            let to=$('#policy_data_to').val();

            if(new Date(from)>new Date(to))
            {
                sweetalert('error', 'From date is bigger than To date');
                return;
            }

            $.ajax({
                type:"POST",
                url:'/hrm_policy_report',
                data:{
                    _token: CSRF_TOKEN,
                    from   : from,
                    to     : to
                },
                dataType: "JSON",
                success:function(data){
                    $("#example1").DataTable().destroy();
                    $("#example1 tbody").empty();
                    $.each(data, function(i, value) {
                        create_date=moment(value.create_date).format('DD-MM-YYYY LTS');
                        let tr="<tr><td>"+value.name+"</td><td>"+value.user_name+"</td><td>"+create_date+"</td></tr>";
                        $("#example1").append(tr);
                    });
                    $('#example1').DataTable();
                }
            });
        }
    }

    // submit read policy report
    function ReportReadPolicy()
    {
        let num_miss = 0;
        $(".required").each(function(){
            if($(this).val()=="" || $(this).val()==null){ num_miss++;}
        });
        if(num_miss>0){
            $(".required").each(function(){
                if($(this).val()=="" || $(this).val()==null){ $(this).css("border-color","red"); }
            });
            sweetalert('error', 'Please input or select field *');
        }else{
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            let from=$('#read_policy_data_from').val();
            let to=$('#read_policy_data_to').val();
            let read_policy=$('#mypolicy').val();
            let user=$('#user').val();
            if(new Date(from)>new Date(to))
            {
                sweetalert('error', 'From date is bigger than To date');
                return;
            }

            $.ajax({
                type:"POST",
                url:'/hrm_read_policy_report',
                data:{
                    _token: CSRF_TOKEN,
                    from   : from,
                    to     : to,
                    user   : user,
                    read_policy : read_policy
                },
                dataType: "JSON",
                success:function(data){
                    $("#example2").DataTable().destroy();
                    $("#example2 tbody").empty();
                    $.each(data, function(i, value) {
                        create_date=moment(value.create_date).format('DD-MM-YYYY LTS');
                        let tr="<tr><td>"+value.name+"</td><td>"+value.position_name+"</td><td>"+value.policy_name+"</td><td>"+create_date+"</td></tr>";
                        $("#example2").append(tr);
                    });
                    $('#example2').DataTable();
                }
            });
        }
    }

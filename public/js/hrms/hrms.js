// Notification
function hrms_notification(notification){
    Swal.fire(
        notification,
        '',
        'success'
    )
}

// Export Data from database to Excel
    function HRMS_ExportHoliday(){
        if(check_session()){
            return;
        }
        window.location.href = "/hrm_export_holiday";
    }
// Export Data from database to Excel


// Delete Data
function hrm_delete_data(id, route, goto, alerts,permission) {
    if(check_session()){
      return;
    }
    $.ajax({
        type: 'GET',
        url: 'hrm_delete_data',
        data: {
            _token: '<?php echo csrf_token() ?>',
            perm: permission
        },
        success: function (data) {
            if(data=='1'){
                // event.preventDefault();
                Swal.fire({ //get from sweetalert function
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: route,   //Request send to "action.php page"
                            data: { id: id },
                            type: "GET",    //Using of Post method for send data
                            success: function (data) {
                                setTimeout(function () { go_to(goto); }, 300);// Set timeout for refresh content
                                Swal.fire(
                                    'Deleted!',
                                    alerts,
                                    'success'
                                )
                                // }
                            }

                        });

                    }
                })
            }else{
                alert('No Permission');
            }
        }
    });

};

// Show modal
function HRM_ShowDetail(rout,modalName,id=-1,modal=''){
    if(check_session()){
      return;
    }
    $.ajax({
        type: 'GET',
        url: rout,
        data: {
            _token: '<?php echo csrf_token() ?>',
            id: id
        },
        success: function (data) {
            document.getElementById('modal').innerHTML = data;
            $('#'+modalName).modal('show');
            if(modal.length>0){
                $('#'+modal).DataTable({
                });
            }
        }
    });
}

// Show password
function ShowPassword(){
    if(check_session()){
      return;
    }
    var e=document.getElementById('inputsalary');
    if(e.type=="password"){
        e.type="number";
    }else{
        e.type="password";
    }
}
function hrms_date(){
    $( "input[type='date']" ).each(function( index,item ) {
        console.log(item);
        $(item).attr("type","text");
        // $(item).attr("autocomplete","off");
        value=$(item).attr('value');
        $(item).css("cursor","pointer");
        $(item).datetimepicker({
            format: 'L'
        });
        $(item).attr('value',value);
      });
}
// All Employee
    // modal add and edit employee
        function hrms_add_edit_employee(id=-1){
            if(check_session()){
                return;
            }
            $.ajax({
                type: 'GET',
                url: '/add_edit_employee',
                data:{
                    _token: '<?php echo csrf_token() ?>',
                    id:id
                },
                success: function (data) {
                    document.getElementById('add_edit_employee').innerHTML=data;
                    // $('#modal_employee').modal('show');
                    // $("#emDepartment").select2();
                    // $("#emPosition").select2();
                    // hrms_date();
                }
            });
        }
    // end modal add and edit employee
    // Add modal Employee in View
        function hrms_modal_add_edit_employee(id=-1){
            if(check_session()){
                return;
            }
            $.ajax({
                type: 'GET',
                url: '/hrm_add_edit_employee',
                data:{
                    _token: '<?php echo csrf_token() ?>',
                    id:id
                },
                success: function (data) {
                    document.getElementById('modal').innerHTML=data;
                    $('#modal_employee').modal('show');
                    $("#emDepartment").select2();
                    $("#emPosition").select2();
                    hrms_date();
                }
            });
        }
        function hrms_validation(id){
            i=0;
            $('#'+id).find('select,input').each(function(){
                if($(this).prop('required')){
                    if($(this).val().length<=0){
                        i++;
                        $('#'+$(this).attr('id')).addClass('is-invalid');
                    }else{
                        $('#'+$(this).attr('id')).removeClass('is-invalid');
                    }
                }
            })
            if(i==0){
                return true;
            }else{
                return false;
            }
        }
        // insert or Update employee
        function hrms_insert_update_employee(){
            if(!hrms_validation('fm-employee')){return;}
            if(check_session()){return;}
            Swal.fire({ //get from sweetalert function
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Save it!'
                }).then((result) => {
                    if (result.value) {
                        var form_element=document.getElementById('fm-employee');
                        var form_data = new FormData(form_element);
                        var request = new XMLHttpRequest();
                        request.open("POST","hrms_insert_update_employee");
                        request.onreadystatechange=function(){
                            if(this.readyState==4 && this.status==200){
                                console.log(this.responseText);
                                data=JSON.parse(this.responseText);
                                if($.isEmptyObject(data.error)){
                                    setTimeout(function () { go_to('hrm_allemployee'); }, 300);
                                    hrms_notification(data.success);
                                    $('#modal_employee').modal('hide');
                                }else{
                                    var $inputs = $('#fm-employee :input,select,number');
                                    $inputs.each(function (index){
                                        i=0;
                                        idname=$(this).attr('id');
                                        $.each(data.error, function(key,value){
                                            if(idname==key){
                                                i++;
                                            }
                                            if(i==0){
                                                if(idname=='emEmail'){
                                                    $('#email_unique').addClass('d-none');
                                                }
                                                $('#'+idname).removeClass('is-invalid','d-none');
                                            }else{
                                                if(idname=='emEmail'){
                                                    $('#email_unique').removeClass('d-none');
                                                }
                                                $('#'+idname).addClass('is-invalid');
                                            }
                                        })
                                    });
                                }

                            }
                        }
                        request.send(form_data);
                    }
                })
        }



        // insert exit employee information
        function hrms_insert_exit_employee(){
            if(!hrms_validation('fm_exit_information')){return;}
            if(check_session()){return;}
            $.ajax({
                type: 'GET',
                url: 'hrm_insert_exit_employee',
                data: {
                    id: $('#exit_infomation_id').val(),
                    request_exit_date:$('#request_exit_date').val(),
                    type_of_exit:$('#type_of_exit').val(),
                    hr_received_date:$('#hr_received_date').val(),
                    effective_exit_date:$('#effective_exit_date').val(),
                    training_and_development:$('#training_and_development').val(),
                    opportunity_to_promote:$('#opportunity_to_promote').val(),
                    work_presure:$('#work_presure').val(),
                    working_on_holiday:$('#working_on_holiday').val(),
                    motivation:$('#motivation').val(),
                    overall_opion:$('#overall_opion').val(),
                    submit_date:$('#submit_date').val(),
                    manager_approved_date:$('#manager_approved_date').val(),
                    reason_of_exit:$('#reason_of_exit').val(),
                    duties_and_responsibility:$('#duties_and_responsibility').val(),
                    given_salary:$('#given_salary').val(),
                    working_environment:$('#working_environment').val(),
                    team_work:$('#team_work').val(),
                    management_issue:$('#management_issue').val(),
                    comment:$('#comment').val()
                },
                success: function (data) {
                    setTimeout(function () { go_to('hrm_allemployee'); }, 300);
                   hrms_notification(this.responseText);
                   $('#modal_exit_employee').modal('hide');
                }
            });

    
        }



        function hrms_employee_detail(id){
            if(check_session()){
                return;
            }
            $.ajax({
                type: 'GET',
                url: '/profile',
                data:{
                    _token: '<?php echo csrf_token() ?>',
                    id:id
                },
                success: function (data) {
                    $(".content-wrapper").html(data);
                }
            });
        }




        function hrm_delete_employee(id) {
            
            if(check_session()){
            return;
            }
            $.ajax({
                type: 'GET',
                url: 'hrm_delete_data',
                data: {
                    _token: '<?php echo csrf_token() ?>',
                    perm: 'HRM_09010103'
                },
                success: function (data) {
                    if(data=='1'){
                        $('#modal_exit_employee').modal('show');
                        var $inputs = $('#fm_exit_information :input,select,number');
                        $inputs.each(function (index){
                            $(this).val('');
                        });
                        $('#exit_infomation_id').val(id);
                    }else{
                        alert('No Permission');
                    }
                }
            });

        };

    // End Employee



    // Start Holiday
        // Add Modal Holiday to view
        function HRM_AddAndEditHoliday(id=-1){
            if(check_session()){
                return;
            }
            $.ajax({
                type: 'GET',
                url: '/hrm_add_edit_holiday',
                data: {
                    _token: '<?php echo csrf_token() ?>',
                    id: id
                },
                success: function (data) {
                    document.getElementById('modal').innerHTML = data;
                    $('#modal_holiday').modal('show');
                    hrms_date();
                }
            });
        }


        function hrms_insert_update_holiday(){
            if(!hrms_validation('fm_holiday')){return;}
            if(check_session()){return;}
            Swal.fire({ //get from sweetalert function
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Save it!'
                }).then((result) => {
                    if (result.value) {
                        var form_element=document.getElementById('fm_holiday');
                        var form_data = new FormData(form_element);
                        var request = new XMLHttpRequest();
                        request.open("POST","hrm_insert_update_holiday");
                        request.onreadystatechange=function(){
                            if(this.readyState==4 && this.status==200){
                                console.log(this.responseText);
                                data=JSON.parse(this.responseText);
                                if($.isEmptyObject(data.error)){
                                    setTimeout(function () { go_to('hrm_holiday'); }, 300);
                                    hrms_notification(data.success);
                                    // alert(data.success);
                                    $('#modal_holiday').modal('hide');
                                }else{
                                        $.each(data.error, function(key,value){
                                            $('#'+key).addClass('is-invalid');
                                        });
                                }

                            }
                        }
                        request.send(form_data);
                    }
                })


        }
    // End Holiday
    //  Attendance
        function HRM_ShowAttendanceByDate(){
            if(check_session()){
                return;
            }
            var date = document.getElementById('attendance_date').value;

            if(date.length>0){
                if(new Date()<new Date(date)){
                    alert('The Date Must be Smaller or Equal Today');
                }else{
                    $("#attendance_by_date").html(spinner());
                    $.ajax({
                        type: 'GET',
                        url: '/hrm_show_attendance_by_date',
                        data: {
                            _token: '<?php echo csrf_token() ?>',
                            attendance_date: date
                        },
                        success: function (data) {
                            document.getElementById('attendance_by_date').innerHTML = data;
                            $('#tbl_overtime').DataTable({
                                responsive: true
                            });
                            // $('#modal_holiday').modal('show');
                        }
                    });
                }

            }else{
                alert('Please select date ');
            }

        }

        function HRM_CalculateAttendanceDetail($id){
            if(check_session()){
                return;
            }
            var date1 = document.getElementById('attendance_date1').value;
            var date2 = document.getElementById('attendance_date2').value;
            if(date1.length<=0 || date2.length<=0){
                alert('Please select all date');
            }else{
                if (new Date() < new Date(date1) || new Date() < new Date(date2) || new Date(date1)>new Date(date2)){
                    alert('The Date Must be Smaller or Equal Today and From Date must be Bigger than End Date');
                }else{
                    $("#hrm_calculate_detail").html(spinner());
                    $.ajax({
                        type: 'GET',
                        url: '/hrm_calculate_attendance_detail',
                        data: {
                            _token: '<?php echo csrf_token() ?>',
                            id: $id,
                            date_from:date1,
                            date_to:date2
                        },
                        success: function (data) {
                            document.getElementById('hrm_calculate_detail').innerHTML = data;
                            $('#tbl_hrm_attendance_detail').DataTable({

                            });
                        }
                    });
                }
            }
        }
    // End Attendance
   // Overtime
        function hrms_modal_overtime(id=-1){
            if(check_session()){return;}
            $.ajax({
                type: 'GET',
                url: 'hrm_modal_add_edit',
                data: {
                    _token: '<?php echo csrf_token() ?>',
                    id: id
                },
                success: function (data) {
                    document.getElementById('modal').innerHTML = data;
                    $('#modal_overtime').modal('show');
                    time();
                    hrms_date();
                    $('#emName').select2();
                }
            });
        }

        function hrms_insert_update_overtime(){
            if(!hrms_validation('fm_holiday')){return;}
            if(check_session()){return;}
            Swal.fire({ //get from sweetalert function
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Save it!'
                }).then((result) => {
                    if (result.value) {
                        var form_element=document.getElementById('fm_holiday');
                        var form_data = new FormData(form_element);
                        var request = new XMLHttpRequest();
                        request.open("POST","hrm_insert_update_overtime");
                        request.onreadystatechange=function(){
                            if(this.readyState==4 && this.status==200){
                                console.log(this.responseText);
                                data=JSON.parse(this.responseText);
                                if($.isEmptyObject(data.error)){
                                    setTimeout(function () { go_to('hrm_overtime'); }, 300);
                                    hrms_notification(data.success);
                                    // alert(data.success);
                                    $('#modal_overtime').modal('hide');
                                }else{
                                        $.each(data.error, function(key,value){
                                            $('#'+key).addClass('is-invalid');
                                        });
                                }

                            }
                        }
                        request.send(form_data);
                    }
                })


        }
        function OvertimeDetail(){
            if(check_session()){
                return;
            }
            var m=document.getElementById('otMonth').value;
            var y=document.getElementById('otYear').value;
            $("#otDetail").html(spinner());
            $.ajax({
                type: 'GET',
                url: '/hrm_overtime',
                data: {
                    _token: '<?php echo csrf_token() ?>',
                    month : m,
                    year : y
                },
                success: function (data) {
                    document.getElementById('otDetail').innerHTML = data;
                }
            });
        }
   // End Overtime

   // Warning & Punishment
        function hrsm_modal_add_edit_warning_and_punishment(id=-1){
            if(check_session()){return;}
            $.ajax({
                type: 'GET',
                url: '/hrm_modal_warning_and_punishment',
                data: {
                    _token: '<?php echo csrf_token() ?>',
                    id: id
                },
                success: function (data) {
                    document.getElementById('modal').innerHTML = data;
                    $('#modal_warning_and_punishment').modal('show');
                    // hrms_date();
                    $('#warning_date').datetimepicker({
                        format: 'YYYY-MM-D HH:mm',
                        sideBySide: true,
                    });
                    $('select[name=em_warning_by]').select2();
                    $('select[name=em_edit_by]').select2();
                    $('select[name=em_approved_by]').select2();
                    $('select[name=em_staff_warning]').select2();
                }
            });       
        }


        function hrms_modal_add_edit_warning_and_punishment_type(id=-1){
            if(check_session()){return;}
            $.ajax({
                type: 'GET',
                url: '/hrm_modal_warning_and_punishment_type',
                data: {
                    _token: '<?php echo csrf_token() ?>',
                    id: id
                },
                success: function (data) {
                    document.getElementById('modal').innerHTML = data;
                    $('#modal_warning_and_punishment_type').modal('show');
                    hrms_date();
                    
                }
            });
        }


        function hrms_insert_update_warning_and_punishment(){
            if(!hrms_validation('fm_warning_and_punishment')){return;}
            if(check_session()){return;}
            Swal.fire({ //get from sweetalert function
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Save it!'
                }).then((result) => {
                    if (result.value) {
                        var form_element=document.getElementById('fm_warning_and_punishment');
                        var form_data = new FormData(form_element);
                        var request = new XMLHttpRequest();
                        request.open("POST","hrm_insert_update_warning_and_punishment");
                        request.onreadystatechange=function(){
                            if(this.readyState==4 && this.status==200){
                                console.log(this.responseText);
                                data=JSON.parse(this.responseText);
                                if($.isEmptyObject(data.error)){
                                    setTimeout(function () { go_to('hrm_warning_and_punishment'); }, 300);
                                    hrms_notification(data.success);
                                    // alert(data.success);
                                    $('#modal_warning_and_punishment').modal('hide');
                                }else{
                                        $.each(data.error, function(key,value){
                                            $('#'+key).removeClass('d-none');
                                            // $('#'+key).html(value);
                                        });
                                }

                            }
                        }
                        request.send(form_data);
                    }
                })
        }


        function hrms_insert_update_warning_and_punishment_type(){
            alert();
            if(!hrms_validation('fm_warning_and_punishment_type')){return;}
            if(check_session()){return;}
            Swal.fire({ //get from sweetalert function
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Save it!'
                }).then((result) => {
                    if (result.value) {
                        var form_element=document.getElementById('fm_warning_and_punishment_type');
                        var form_data = new FormData(form_element);
                        var request = new XMLHttpRequest();
                        request.open("POST","hrm_insert_update_warning_and_punishment_type");
                        request.onreadystatechange=function(){
                            if(this.readyState==4 && this.status==200){
                                console.log(this.responseText);
                                data=JSON.parse(this.responseText);
                                if($.isEmptyObject(data.error)){
                                    setTimeout(function () { go_to('hrm_warning_and_punishment'); }, 300);
                                    hrms_notification(data.success);
                                    // alert(data.success);
                                    $('#modal_warning_and_punishment_type').modal('hide');
                                }else{
                                        $.each(data.error, function(key,value){
                                            $('#'+key).addClass('is-invalid');
                                        });
                                }

                            }
                        }
                        request.send(form_data);
                    }
                })
        }

        
   // End Warning and Punishment

// End Employee
// Training

    // function hrm_chechEmployee_training(){
    //     var countchecked = $("table input[type=checkbox]:checked").length;
    //     if(countchecked>0){
    //         submit_form ('hrm_insert_update_traininglist','fm_training_list','hrm_traininglist','modal_traininglist');
    //     }else{
    //         alert('Please check employee');
    //     }

    // }
    function hrms_modal_training(id=-1){
        alert();
        if(check_session()){return;}
            $.ajax({
                type: 'GET',
                url: 'hrm_modal_traininglist',
                data: {
                    _token: '<?php echo csrf_token() ?>',
                    id: id
                },
                success: function (data) {
                    document.getElementById('modal').innerHTML = data;
                    $('#modal_training_list').modal('show');
                    date();
                    // $('#emName').select2();
                }
            });
    }

    function hrms_modal_training(ids=-1){
        if(check_session()){
            return;
        }

        $.ajax({
            type: 'GET',
            url: 'hrm_modal_traininglist',
            data: {
                _token: '<?php echo csrf_token() ?>',
                id: ids
            },
            async:false,
            success: function (data) {
                document.getElementById('modal').innerHTML = data;
                $('#modal_training_list').modal('show');
                $('#enddate').datetimepicker({
                    format: 'YYYY-MM-D HH:mm',
                    sideBySide: true,
                });
                $('#startdate').datetimepicker({
                    format: 'YYYY-MM-D HH:mm',
                    sideBySide: true,
                });
            }
        });
    }
    function hrms_validation_employee_training(table_id){
        i=$('#'+table_id).find('input:checked').length;
        if(i>0){
            $('#employee_checked').addClass('d-none');
            return true;
        }else{
            $('#employee_checked').removeClass('d-none');
            return false;
        }
    }
    function hrms_insert_update_training_list(){
        if(!hrms_validation('fm_training_list')){return;}
        if(check_session()){return;}
        Swal.fire({ //get from sweetalert function
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Save it!'
                }).then((result) => {
                    if (result.value) {
                        var form_element=document.getElementById('fm_training_list');
                        var form_data = new FormData(form_element);
                        var request = new XMLHttpRequest();
                        request.open("POST","hrm_insert_update_traininglist");
                        request.onreadystatechange=function(){
                            if(this.readyState==4 && this.status==200){
                                console.log(this.responseText);
                                if(this.responseText=='em'){
                                    $('#employee_checked').removeClass('d-none');
                                    return;
                                }
                                data=JSON.parse(this.responseText);
                                if($.isEmptyObject(data.error)){
                                    setTimeout(function () { go_to('hrm_traininglist'); }, 300);
                                    hrms_notification(data.success);
                                    // alert(data.success);
                                    $('#modal_training_list').modal('hide');
                                }else{
                                        $.each(data.error, function(key,value){
                                            $('#'+key).removeClass('is-invalid');
                                        });
                                }

                            }
                        }
                        request.send(form_data);
                    }
                })

    }


    function hrms_insert_update_trainer(){
        if(!hrms_validation('fm_trainer')){return;}
        if(check_session()){return;}
        Swal.fire({ //get from sweetalert function
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Save it!'
                }).then((result) => {
                    if (result.value) {
                        var form_element=document.getElementById('fm_trainer');
                        var form_data = new FormData(form_element);
                        var request = new XMLHttpRequest();
                        request.open("POST","hrm_add_edit_trainer");
                        request.onreadystatechange=function(){
                            if(this.readyState==4 && this.status==200){
                                console.log(this.responseText);
                                data=JSON.parse(this.responseText);
                                if($.isEmptyObject(data.error)){
                                    setTimeout(function () { go_to('hrm_trainer'); }, 300);
                                    hrms_notification(data.success);
                                    // alert(data.success);
                                    $('#modal_trainer').modal('hide');
                                }else{
                                    $.each(data.error, function(key,value){
                                        $('#'+key).addClass('is-invalid');
                                    });
                                }
                            }
                        }
                        request.send(form_data);
                    }
                })
    }


    function hrms_insert_update_training_course(){
        if(!hrms_validation('fm_trainingType')){return;}
        if(check_session()){return;}
        Swal.fire({ //get from sweetalert function
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Save it!'
                }).then((result) => {
                    if (result.value) {
                        var form_element=document.getElementById('fm_trainingType');
                        var form_data = new FormData(form_element);
                        var request = new XMLHttpRequest();
                        request.open("POST","hrm_add_edit_trainingtype");
                        request.onreadystatechange=function(){
                            if(this.readyState==4 && this.status==200){
                                console.log(this.responseText);
                                data=JSON.parse(this.responseText);
                                if($.isEmptyObject(data.error)){
                                    setTimeout(function () { go_to('hrm_trainingtype'); }, 300);
                                    hrms_notification(data.success);
                                    // alert(data.success);
                                    $('#modal_trainingType').modal('hide');
                                }else{
                                    $.each(data.error, function(key,value){
                                        $('#'+key).addClass('is-invalid');
                                    });
                                }
                            }
                        }
                        request.send(form_data);
                    }
                })

    }



function hrm_training_checkAll(ele) {
    var checkboxes = document.getElementsByTagName('input');
    if (ele.checked) {
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type == 'checkbox') {
                checkboxes[i].checked = true;
            }
        }
    } else {
        for (var i = 0; i < checkboxes.length; i++) {
            console.log(i)
            if (checkboxes[i].type == 'checkbox') {
                checkboxes[i].checked = false;
            }
        }
    }
}
// End Training

// Department and Position
    function hrms_modal_department(id=-1){
        if(check_session()){return;}
        $.ajax({
            type: 'GET',
            url: 'hrm_modal_add_edit_department',
            data: {
                _token: '<?php echo csrf_token() ?>',
                id: id
            },
            success: function (data) {
                document.getElementById('modal').innerHTML = data;
                $('#modal_department').modal('show');
            }
        });
    }
    function hrms_insert_update_department(){
        if(!hrms_validation('fm_department')){return;}
        if(check_session()){return;}
        Swal.fire({ //get from sweetalert function
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Save it!'
                }).then((result) => {
                    if (result.value) {
                        var form_element=document.getElementById('fm_department');
                        var form_data = new FormData(form_element);
                        var request = new XMLHttpRequest();
                        request.open("POST","hrm_add_edit_department");
                        request.onreadystatechange=function(){
                            if(this.readyState==4 && this.status==200){
                                console.log(this.responseText);
                                data=JSON.parse(this.responseText);
                                if($.isEmptyObject(data.error)){
                                    setTimeout(function () { go_to('hrm_department'); }, 300);
                                    hrms_notification(data.success);
                                    // alert(data.success);
                                    $('#modal_department').modal('hide');
                                }else{
                                    $.each(data.error, function(key,value){
                                        $('#'+key).addClass('is-invalid');
                                    });
                                }
                            }
                        }
                        request.send(form_data);
                    }
                })
    }

    function hrms_insert_update_position(){
        if(!hrms_validation('fm_position')){return;}
        if(check_session()){return;}
        Swal.fire({ //get from sweetalert function
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Save it!'
                }).then((result) => {
                    if (result.value) {
                        var form_element=document.getElementById('fm_position');
                        var form_data = new FormData(form_element);
                        var request = new XMLHttpRequest();
                        request.open("POST","hrm_add_edit_position");
                        request.onreadystatechange=function(){
                            if(this.readyState==4 && this.status==200){
                                console.log(this.responseText);
                                data=JSON.parse(this.responseText);
                                if($.isEmptyObject(data.error)){
                                    setTimeout(function () { go_to('hrm_department'); }, 300);
                                    hrms_notification(data.success);
                                    // alert(data.success);
                                    $('#modal_position').modal('hide');
                                }else{
                                    $.each(data.error, function(key,value){
                                        $('#'+key).addClass('is-invalid');
                                    });
                                }
                            }
                        }
                        request.send(form_data);
                    }
                })
    }
// End Department and Position
// Payroll
    function PrintDiv(id){
        var divToPrint = document.getElementById(id);
        newWin = window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }


    // Payroll List Detail
    function hrms_Payroll_List_Detail(rout,modalName,id=-1,date1,date2,months,years,modal=''){
    if(check_session()){
      return;
    }
    $.ajax({
        type: 'GET',
        url: rout,
        data: {
            _token: '<?php echo csrf_token() ?>',
            id: id,
            first_date :date1,
            end_date :date2,
            month :months,
            year :years
        },
        success: function (data) {
            document.getElementById('modal').innerHTML = data;
            $('#'+modalName).modal('show');
            if(modal.length>0){
                $('#'+modal).DataTable({
                });
            }
        }
    });
}
    function hrms_Payroll_List_Details(id,modal,permission){
        if(check_session()){
            return;
        }
        $.ajax({
            type: 'GET',
            url: 'hrm_delete_data',
            data: {
                _token: '<?php echo csrf_token() ?>',
                perm: permission
            },
            success: function (data) {
                if (data == '1') {
                    var year=$('#payroll_list_year').val();
                    var month=$('#payroll_list_month').val();
                    $.ajax({
                        type:'GET',
                        url:'hrm_paroll_list_detail',
                        data:{
                            _token:'<?php echo csrf_token() ?>',
                            user_id:id
                        },
                        success: function(data){
                            $('#modal').innerHTML(data);
                            $('#'+modal).modal('show');
                        }
                    });
                } else {
                    alert('No Permission');
                }
            }
        });
    }


    // Show Payroll Detail
    function hrms_payroll_detail(id,list_id){
    if(check_session()){
      return;
    }
    $.ajax({
        type: 'GET',
        url: 'hrm_payroll_detail',
        data: {
            _token: '<?php echo csrf_token() ?>',
            id: id,
            payroll_list_id:list_id
        },
        success: function (data) {
            document.getElementById('modal').innerHTML = data;
            $('#modal_payrolldetails').modal('show');
            if(modal.length>0){
                $('#modal_payrolldetails').DataTable({
                });
            }
        }
    });
}


    // HR Approve Payroll to Finance
    function HR_Approve_Payroll(id,d_from,d_to,month,e,btn,permission){
        if(check_session()){
            return;
        }
        $.ajax({
            type: 'GET',
            url: 'hrm_delete_data',
            data: {
                _token: '<?php echo csrf_token() ?>',
                perm: permission
            },
            success: function (data) {
                if (data == '1') {
                    // event.preventDefault();
                    Swal.fire({ //get from sweetalert function
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes,Approve it!'
                    }).then((result) => {
                        data=[
                            '','',''
                        ]
                        if (result.value) {
                            $.ajax({
                                url: '/hrm_hrapprove_payroll',   //Request send to "action.php page"
                                data: {
                                    _token: '<?php echo csrf_token() ?>',
                                    eid: id,
                                    edat_from: d_from,
                                    ed_to: d_to,
                                    emonth: month
                                },
                                type: "GET",    //Using of Post method for send data
                                success: function (data) {
                                    setTimeout(function () { go_to('hrm_payroll_list'); }, 300);// Set timeout for refresh content
                                    Swal.fire(
                                        'Approved!',
                                        'Approved Successfully',
                                        'success'
                                    )
                                }

                            });

                        }
                    })
                } else {
                   Swal.fire(
                        'Approved!',
                        'You do not have permission',
                        'success'
                    )
                }
            }
        });










        return null;
        if(confirm("Do you want to approved ?")){
            $.ajax({
                type: 'GET',
                url: '/hrm_hrapprove_payroll',
                data: {
                    _token: '<?php echo csrf_token() ?>',
                    eid:id ,
                    edat_from: d_from,
                    ed_to:d_to,
                    emonth:month
                },
                success: function (data) {
                    var sbtn=document.getElementById(e);
                    sbtn.disabled=true;
                    sbtn.classList.remove("bg-info");
                    sbtn.classList.add("btn-danger");
                    // document.getElementById(e).disabled= true;
                    document.getElementById(btn).disabled= true;
                    alert(data);
                }
            });
        }

    }


    // finace approve payroll
    function HRM_Finance_Approve_Payroll(e,eid){
        if(check_session()){
            return;
        }
        if(confirm("Do you want to approve it ?")){
            $.ajax({
                type: 'GET',
                url: '/hrm_finance_approve_payroll',
                data: {
                    _token: '<?php echo csrf_token() ?>',
                    id: eid
                },
                success: function (data) {
                    // Swal.fire({
                    //     position: 'top-end',
                    //     icon: 'success',
                    //     title: 'Approved',
                    //     showConfirmButton: false,
                    //     timer: 1500
                    // })
                    alert_show('success','Approved Payroll Completely');
                    e.disabled=true;
                    e.classList.remove("bg-info");
                    e.classList.add("btn-danger");
                }
            });
        }
    }



    // Search payroll by month and year
    function HRM_SearchPayrollByMonthYear(){
        if(check_session()){
            return;
        }
        $("#search_payroll_moth_year").html(spinner());
        var emonth=document.getElementById('select_month_payroll').value;
        var eyear = document.getElementById('select_year_payroll').value;
        $.ajax({
            type: 'GET',
            url: '/hrm_payroll',
            data: {
                _token: '<?php echo csrf_token() ?>',
                month: emonth,
                year:eyear
            },
            success: function (data) {
                document.getElementById('search_payroll_moth_year').innerHTML=data;
                $('#tbl_payroll').DataTable({
                    responsive: true
                });
            }
        });
    }
    // HR delect create payroll
    function DeleteComponent(id,date_from,date_to,for_month,permission){
        if(check_session()){
            return;
        }
        $.ajax({
            type: 'GET',
            url: 'hrm_delete_data',
            data: {
                _token: '<?php echo csrf_token() ?>',
                perm: permission
            },
            success: function (data) {
                if (data == '1') {
                    // event.preventDefault();
                    Swal.fire({ //get from sweetalert function
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: 'hrm_hrdelete_component',   //Request send to "action.php page"
                                data: {
                                    _token: '<?php echo csrf_token() ?>',
                                    eid: id,
                                    edat_from: date_from,
                                    ed_to: date_to,
                                    emonth: for_month
                                },
                                type: "GET",    //Using of Post method for send data
                                success: function (data) {
                                    if (data != 'error') {
                                        setTimeout(function () { SearchPayrollByMonthYear(); }, 300);// Set timeout for refresh content
                                        Swal.fire(
                                            'Deleted!',
                                            'Data Delete Successfully',
                                            'success'
                                        )

                                    }

                                }

                            });

                        }
                    })
                } else {
                    alert('No Permission');
                }
            }
        });
        // if(confirm("Do you want to delete it ?")){
        //     $.ajax({
        //         type: 'GET',
        //         url: '/hrm_hrdelete_component',
        //         data: {
        //             _token: '<?php echo csrf_token() ?>',
        //             eid: id,
        //             edat_from: date_from,
        //             ed_to: date_to,
        //             emonth:for_month
        //         },
        //         success: function (data) {
        //             if(data!='error'){
        //                 SearchPayrollByMonthYear();
        //             }
        //         }
        //     });
        // }
    }


    // List Payroll by month and year
    function SearchPayrollByMonthYear(){
        if(check_session()){
            return;
        }
        var year = document.getElementById('select_year').value;
        var month = document.getElementById('select_month').value;
        $("#paroll_by_month").html(spinner());
        $.ajax({
            type: 'GET',
            url: '/hrm_showpayrollbymonth',
            data: {
                _token: '<?php echo csrf_token() ?>',
                eyear: year,
                emonth:month
            },
            success: function (data) {
                document.getElementById('paroll_by_month').innerHTML=data;
                $('#tbl_payroll').DataTable({
                    responsive: true
                });
            }
        });
    }

    function HRM_Export_Payroll(){
        if(check_session()){
            return;
        }
        var year = document.getElementById('select_year_payroll').value;
        var month = document.getElementById('select_month_payroll').value;
        hrm_export_payroll=1;
        window.location.href ="/hrm_export_payroll?emonth="+month+"&&eyear="+year;
    }


    function HRM_PayrollDetail(){

    }

// End Payroll

function preview_image(event) {
    var reader = new FileReader();
    reader.onload = function () {
        var output = document.getElementById('output_image');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
// Mission and Outside
// modal add and edit mission
    function hrms_modal_add_edit_mission(id=-1){
        if(check_session()){
        return;
        }
        $.ajax({
            type: 'GET',
            url: 'hrm_modal_add_edit_missionoutside',
            data: {
                _token: '<?php echo csrf_token() ?>',
                id: id,
            },
            success: function (data) {
                document.getElementById('modal').innerHTML = data;
                $('#modal_missionoutside').modal('show');
                hrms_date();
            }
        });
    }
// end modal add and edit mission
// insert or update mission
    function hrms_insert_update_mission(){
        if(!hrms_validation('fm_missionoutside')){return;}
        hrms_validation_employee_training('tbl_mission');
        if(check_session()){return;}
        Swal.fire({ //get from sweetalert function
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Save it!'
                }).then((result) => {
                    if (result.value) {
                        var form_element=document.getElementById('fm_missionoutside');
                        var form_data = new FormData(form_element);
                        var request = new XMLHttpRequest();
                        request.open("POST","hrm_insertmissionoutside");
                        request.onreadystatechange=function(){
                            if(this.readyState==4 && this.status==200){
                                console.log(this.responseText);
                                data=JSON.parse(this.responseText);
                                if($.isEmptyObject(data.error)){
                                    setTimeout(function () { go_to('hrm_mission_outside'); }, 300);
                                    hrms_notification(data.success);
                                    // alert(data.success);
                                    $('#modal_missionoutside').modal('hide');
                                }else{
                                    $.each(data.error, function(key,value){
                                        $('#'+key).removeClass('d-none');
                                    });
                                }
                            }
                        }
                        request.send(form_data);
                    }
                })
    }
// end insert or update mission
// Search mission by month
function hrms_search_mission(route){
    if(check_session()){
        return;
    }
    var mission_month=document.getElementById('mission_month').value;
    var mission_year=document.getElementById('mission_year').value;
    if(mission_month.length<=0 || mission_year.length<=0){
        alert('Please select month and date !!');
        return;
    }
    $("#mission_search").html(spinner());
    $.ajax({
        type: 'GET',
        url: route,
        data: {
            _token: '<?php echo csrf_token() ?>',
            eyear: mission_year,
            emonth:mission_month
        },
        success: function (data) {
            document.getElementById('mission_search').innerHTML=data;
            $('#tbl_missionAndOutSide').DataTable({
                responsive: true
            });
        }
    });
}




// end mission and outside

function my_overtime_search(){
    var month=document.getElementById('otMonth').value;
    var year=document.getElementById('otYear').value;
    $.ajax({
        type: 'GET',
        url: 'hrm_my_overtime',
        async:false,
        data: {
            _token: '<?php echo csrf_token() ?>',
            eyear: year,
            emonth:month
        },
        success: function (data) {
            console.log(data);
            var ab=JSON.parse(data);
            var i=0;
            $("#tbl_overtime").DataTable().destroy();
            $("#tbl_overtime tbody").empty();
            $.each(ab, function(i, value) {
                i++;
                var tr="<tr><th>"+i+"</th><td>"+value.overtime_date+"</td><td>"+value.start_time+"</td><td>"+value.end_time+"</td><td>"+value.description+"</td><td>"+value.approve+"</td></tr>";
                 $("#tbl_overtime").append(tr);
            });
            $('#tbl_overtime').DataTable();
        }
    });
}


function report_training_search(){
    var from=document.getElementById('date_from').value;
    var to=document.getElementById('date_to').value;
    var departmen=$('#training_report_department').val();
    if(from.length<=0 || to.length<=0 || new Date(from)>new Date(to)){
        alert('Please Select date and date must be bigger than today');
        return;
    }
    $("#training_report_search").html(spinner());
    $.ajax({
        type: 'GET',
        url: 'hrm_training_report_search',
        async:false,
        data: {
            _token: '<?php echo csrf_token() ?>',
            date_from: from,
            date_to:to,
            dep:departmen
        },
        success: function (data) {
            document.getElementById('training_report_search').innerHTML=data;
            $( "table" ).each(function( index,item ) {
            $(this).DataTable();
        });
        }
    });
}



// Payroll List Report
function custom_payroll_list_report(){
    var custom=$('#custom_select_payroll_list_report').val();
    if(custom=='t'){
        $('#select_year_payroll').prop('disabled', 'disabled');
        $('#select_month_payroll').prop('disabled', 'disabled');
        $.ajax({
            type: 'GET',
            url: 'hrm_payroll_list_report_search',
            async:false,
            data: {
                _token: '<?php echo csrf_token() ?>',
                all: custom
            },
            success: function (data) {
                // document.getElementById('training_report_search').innerHTML=data;
                var ab=JSON.parse(data);
                var i=0;
                $("#tbl_payroll_list_report").DataTable().destroy();
                $("#tbl_payroll_list_report tbody").empty();
                $.each(ab, function(i, value) {
                    i++;
                    if(value[11]==true){
                        var btn='<label class="">Yes</label>';
                    }else{
                        var btn='<label class="">No</label>';
                    }
                    if(!value.overtime==null){
                        ot=value.overtime;
                    }else{
                        ot=0;
                    }

                    if(!value.commission==null){
                        commis=value.commission;
                    }else{
                        commis=0;
                    }
                    bonus=0;
                    var tr="<tr><th>"+i+"</th><td>"+value.employee+"</td><td>"+value.role+"</td><td>"+value.base_salary+"</td><td>"+ot+"</td><td>"+commis+"</td><td>"+bonus+"</td><td class='text-center'>"+btn+"</td></tr>";
                    $("#tbl_payroll_list_report").append(tr);
                });
                $('#tbl_payroll_list_report').DataTable();
                }
        });
    }else{
        $('#select_year_payroll').prop('disabled', false);
        $('#select_month_payroll').prop('disabled', false);
        var years=$('#select_year_payroll').val();
        var months=$('#select_month_payroll').val();
        $.ajax({
            type: 'GET',
            url: 'hrm_payroll_list_report_search',
            async:false,
            data: {
                _token: '<?php echo csrf_token() ?>',
                month: months,
                year:years
            },
            success: function (data) {
                // document.getElementById('training_report_search').innerHTML=data;
                var ab=JSON.parse(data);
                var i=0;
                $("#tbl_payroll_list_report").DataTable().destroy();
                $("#tbl_payroll_list_report tbody").empty();
                $.each(ab, function(i, value) {
                    i++;
                    if(value[11]==true){
                        var btn='<label class="">Yes</label>';
                    }else{
                        var btn='<label class="">No</label>';
                    }
                    var tr="<tr><th>"+i+"</th><td>"+value[1]+"</td><td>"+value[2]+"</td><td>"+value[3]+"</td><td>"+value[4]+"</td><td>"+value[5]+"</td><td>"+value[6]+"</td><td class='text-center'>"+btn+"</td></tr>";
                    $("#tbl_payroll_list_report").append(tr);
                });
                $('#tbl_payroll_list_report').DataTable();
            }
        });
    }
}




// Payroll Report
function custom_payroll_report(){
    var custom=$('#custom_select_payroll_report').val();
    if(custom=='t'){
        $('#select_year_payroll').prop('disabled', 'disabled');
        $('#select_month_payroll').prop('disabled', 'disabled');
        $.ajax({
            type: 'GET',
            url: 'hrm_payroll_report_search',
            async:false,
            data: {
                _token: '<?php echo csrf_token() ?>',
                all: custom
            },
            success: function (data) {
                // document.getElementById('training_report_search').innerHTML=data;
                console.log(data);
                var ab=JSON.parse(data);
                var i=0;
                $("#tbl_payroll_report").DataTable().destroy();
                $("#tbl_payroll_report tbody").empty();
                $.each(ab, function(i, value) {
                    i++;
                    if(value.approve==true){
                        var btn='<label class="">Yes</label>';
                    }else{
                        var btn='<label class="">No</label>';
                    }
                    var tr="<tr><th>"+i+"</th><td>"+value.first_name_en+" "+value.last_name_en+"</td><td>"+value.id_number+"</td><td>"+value.position+"</td><td>"+value.bonus_value+"</td><td>"+value.tax+"</td><td>"+(value.bonus_value-value.tax)+"</td><td class='text-center'>"+btn+"</td></tr>";
                    $("#tbl_payroll_report").append(tr);
                });
                $('#tbl_payroll_report').DataTable();
                }
        });
    }else{
        $('#select_year_payroll').prop('disabled', false);
        $('#select_month_payroll').prop('disabled', false);
        var years=$('#select_year_payroll').val();
        var months=$('#select_month_payroll').val();
        $.ajax({
            type: 'GET',
            url: 'hrm_payroll_report_search',
            async:false,
            data: {
                _token: '<?php echo csrf_token() ?>',
                month: months,
                year:years
            },
            success: function (data) {
                // document.getElementById('training_report_search').innerHTML=data;
                var ab=JSON.parse(data);
                var i=0;
                $("#tbl_payroll_report").DataTable().destroy();
                $("#tbl_payroll_report tbody").empty();
                $.each(ab, function(i, value) {
                    i++;
                    if(value.approve==true){
                        var btn='<label class="">Yes</label>';
                    }else{
                        var btn='<label class="">No</label>';
                    }
                    var tr="<tr><th>"+i+"</th><td>"+value.first_name_en+" "+value.last_name_en+"</td><td>"+value.id_number+"</td><td>"+value.position+"</td><td>"+value.bonus_value+"</td><td>"+value.tax+"</td><td>"+(value.bonus_value-value.tax)+"</td><td class='text-center'>"+btn+"</td></tr>";
                    $("#tbl_payroll_report").append(tr);
                });
                $('#tbl_payroll_report').DataTable();
            }
        });
    }
}











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
// All Employee
    // Add modal Employee in View
        function HRM_AddEditEmployee(id=-1){
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
                }
            });
        }

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
                }
            });
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
// End Employee
// Training
    
    function hrm_chechEmployee_training(){
        var countchecked = $("table input[type=checkbox]:checked").length;
        if(countchecked>0){
            submit_form ('hrm_insert_update_traininglist','fm_training_list','hrm_traininglist','modal_traininglist');
        }else{
            alert('Please check employee');
        }
        
    }

function hrm_show_em_table(){

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


// function HRM_CheckStaffTrain(e,trainid){
//     if(e.checked==false){
//         // alert(e.value);
//         $.ajax({
//             type: 'GET',
//             url: '/hrm_delete_trainingstaff',
//             data: {
//                 _token: '<?php echo csrf_token() ?>',
//                 staffid: e.value,
//                 trainid: trainid
//             },
//             success: function (data) {
//                 document.getElementById('otDetail').innerHTML = data;
//             }
//         });
//     }
// }
// End Training
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











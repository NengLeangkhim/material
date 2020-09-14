
// HRM_ShowDetail('hrm_detail_employee', 'modal_employee_detail')
function HRM_ShowDetail(rout,modalName,id=-1){
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
            img_exist();
        }
    });
}


function ShowPassword(){
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

        function HRM_CalculateAttendanceDetail(){
            var date1 = document.getElementById('attendance_date1').value;
            var date2 = document.getElementById('attendance_date2').value;
            if(date1.length<=0 || date2.length<=0){
                alert('Please select all date');
            }else{
                $("#hrm_calculate_detail").html(spinner());
                $.ajax({
                    type: 'GET',
                    url: '/hrm_calculate_attendance_detail',
                    data: {
                        _token: '<?php echo csrf_token() ?>',
                        id: 1
                    },
                    success: function (data) {
                        document.getElementById('hrm_calculate_detail').innerHTML = data;
                    }
                });
            }
        }
    // End Attendance
   // Overtime
        function OvertimeDetail(){
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
    function HRM_TrainedOrNot(e){
        if(e.value=='t'){
            document.getElementById("divtabletrainingstaff").classList.remove("d-none");
            document.getElementById("divtabletrainingstaff").style.display = "block";
        }else{
            document.getElementById("divtabletrainingstaff").style.display = "none";
        }
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


function HRM_CheckStaffTrain(e,trainid){
    if(e.checked==false){
        // alert(e.value);
        $.ajax({
            type: 'GET',
            url: '/hrm_delete_trainingstaff',
            data: {
                _token: '<?php echo csrf_token() ?>',
                staffid: e.value,
                trainid: trainid
            },
            success: function (data) {
                document.getElementById('otDetail').innerHTML = data;
            }
        });
    }
}
// End Training
// Payroll
    function PrintDiv(id){
        var divToPrint = document.getElementById(id);
        newWin = window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }
    // HR Approve Payroll to Finance
    function HR_Approve_Payroll(id,d_from,d_to,month,e,btn){
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
        if(confirm("Do you want to approve it ?")){
            $.ajax({
                type: 'GET',
                url: '/hrm_finance_approve_payroll',
                data: {
                    _token: '<?php echo csrf_token() ?>',
                    id: eid
                },
                success: function (data) {
                    alert(data);
                    e.disabled=true;
                    e.classList.remove("bg-info");
                    e.classList.add("btn-danger");
                }
            });
        }
    }


    // Search payroll by month and year
    function HRM_SearchPayrollByMonthYear(){
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
    function DeleteComponent(id,date_from,date_to,for_month){
        if(confirm("Do you want to delete it ?")){
            $.ajax({
                type: 'GET',
                url: '/hrm_hrdelete_component',
                data: {
                    _token: '<?php echo csrf_token() ?>',
                    eid: id,
                    edat_from: date_from,
                    ed_to: date_to,
                    emonth:for_month
                },
                success: function (data) {
                    if(data!='error'){
                        SearchPayrollByMonthYear();
                    }
                }
            });
        }
    }


    // List Payroll by month and year
    function SearchPayrollByMonthYear(){
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









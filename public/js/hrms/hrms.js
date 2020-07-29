
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
        }
    });
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
                    alert('The Date Must be Smaller or Equal Than Today');
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
    // End Attendance
// End Employee






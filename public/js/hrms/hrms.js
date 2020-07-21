

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

        function HRM_SubmitEmployee(e){
            var fm = document.getElementById('fm-employee');
            var fd=new FormData(fm);
            console.log(fd);
            // $.ajax({
            //     type: 'POST',
            //     url: '/hrm_add_edit_employee',
            //     data: {
            //         _token: '<?php echo csrf_token() ?>',
            //         data:fd
            //     },
            //     cache: false,
            //     processData: false,
            //     contentType: false,
            //     success: function (data) {
            //         document.getElementById('modal').innerHTML = data;
            //         $('#modal-xl').modal('show');
            //     }
            // });
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
// End Employee
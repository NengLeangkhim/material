// All
function Delete(routes) {
    $(".content-wrapper").html(spinner());
    if (check_session()) {
        return;
    }
    if (route.length <= 0) {
        $(".content-wrapper").html(jnot_found());
        return;
    }
    if (route == '/') {
        $(".content-wrapper").html(jnot_found());
        return;
    }
    $.ajax({
        type: 'GET',
        url: route,
        success: function (data) {
            $(".content-wrapper").show();
            $(".content-wrapper").html(data);
        },
        error: function () {
            $(".content-wrapper").html(jerror());
        }
    });
}
// End All

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
// End Employee
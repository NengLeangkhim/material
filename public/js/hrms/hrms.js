function HRM_AddEditEmployee(id=-1){
    // document.getElementById('modal').innerHTML="cdscdc";
    // alert();
    $.ajax({
        type: 'GET',
        url: '/hrm_add_edit_employee',
        data:{
            _token: '<?php echo csrf_token() ?>',
            id:id
        },
        success: function (data) {
            document.getElementById('modal').innerHTML=data;
            $('#modal-xl').modal('show');
        }
    });
}

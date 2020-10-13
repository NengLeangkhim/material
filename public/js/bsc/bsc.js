// Delete Data
function bsc_delete_data(id, route, goto, alerts,permission) {
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
                    text: "You want to delete!",
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

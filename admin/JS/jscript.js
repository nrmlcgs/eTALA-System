// Delete
$(document).on('click', '#delete_row', function () {
    swal({
        title: "Are you sure?",
        text: "This action can't be undo!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                swal("Record has been removed!", {
                    icon: "success",
                });
                $.ajax({
                    type: "POST",
                    cache: false,
                    url: "function/delete_row.php",
                    data: $("#view-student-modal").serialize(),
                    success: function (data){   
                    $("#view-student").modal('hide');
                     setInterval(function() {
                        location.reload();
                         }, 900);
                    }
                });
            } else {
                //   swal("Your file is safe!");
            }
        });
});


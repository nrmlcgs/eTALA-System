$(document).ready(function () {

  $("#table tbody").on("click", ".view-subject-btn", function () {
    $("#view-subject-modal").modal("show");
    $id = $(this).val();
    $.ajax({
      url: "action.php?view-subject=" + $id,
      type: "GET",
      dataType: "json",
      success: function (res) {
        if (res.status == 200) {
          $("#subject_id").val(res.data.subject_id);
          $("#subject_name").val(res.data.subject_name);
          $("#subject_description").val(res.data.description);
        }
      },
    });
  });

});

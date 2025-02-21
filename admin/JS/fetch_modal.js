$(document).ready(function () {
  $("#table tbody").on("click", ".view-student-btn", function () {
    $("#view-student").modal("show");
    $id = $(this).val();
    $.ajax({
      url: "action.php?view-student=" + $id,
      type: "GET",
      dataType: "json",
      success: function (res) {
        if (res.status == 200) {
          $("#student_id").val(res.data.student_id);
          $("#lrn_no").val(res.data.lrn_no);
          $("#gender").val(res.data.gender);
          $("#lastname").val(res.data.lastname);
          $("#firstname").val(res.data.firstname);
          $("#middlename").val(res.data.middlename);
          $("#section").val(res.data.section);
          $("#status").val(res.data.status);
          $("#religion").val(res.data.religion);
          $("#birth_place").val(res.data.birth_place);
          $("#contact_no").val(res.data.contact_no);
          $("#age").val(res.data.age);
          $("#date_of_birth").val(res.data.date_of_birth);
          $("#address").val(res.data.address);
          $("#update_year_level").val(res.data.year_level);
          $("#program").val(res.data.program);
          $("#fetch_sy").val(res.data.school_year);
          $("#fetch_ts").val(res.data.track_strand);

          $val = res.data.year_level;
          if ($val > 4) {
            // ts_view
            $('#ts_view').show();
          } else {
            $('#ts_view').hide();
          }
        }
      },
    });
  });

  $("#table tbody").on("click", ".view-corriculum-btn", function () {
    $("#view-corriculum-modal").modal("show");
    $id = $(this).val();
    $.ajax({
      url: "action.php?view-program=" + $id,
      type: "GET",
      dataType: "json",
      success: function (res) {
        if (res.status == 200) {
          $("#program_id").val(res.data.program_id);
          $("#corriculum").val(res.data.program);
          $("#description").val(res.data.description);
        }
      },
    });
  });

  $("#table tbody").on("click", ".view-section-btn", function () {
    $("#view-section-modal").modal("show");
    $id = $(this).val();
    $.ajax({
      url: "action.php?view-section=" + $id,
      type: "GET",
      dataType: "json",
      success: function (res) {
        if (res.status == 200) {
          $("#section_id").val(res.data.section_id);
          // $("#update_year_level").val(res.data.year_level_id);
          $("#section_name").val(res.data.section_name);
        }
      },
    });
  });

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


  $(".edit-user-btn").on("click", function () {
    $("#update-user-modal").modal("show");
    $id = $(this).val();
    $.ajax({
      url: "action.php?view-user=" + $id,
      type: "GET",
      dataType: "json",
      success: function (res) {
        if (res.status == 200) {
          $("#user_id").val(res.data.user_id);
          $("#user_firstname").val(res.data.firstname);
          $("#user_lastname").val(res.data.lastname);
          $("#username").val(res.data.username);
          $("#email").val(res.data.email);
        }
      },
    });
  });

  $(".container #table tbody").on("click", ".view-sy-btn", function () {
    
    $id = $(this).val();
    $.ajax({
      url: "JS/view-sy.php?view-sy=" + $id,
      type: "GET",
      // dataType: "json",
      success: function (res) {
        $("#sy_body").html(res);
        $("#edit-sy-modal").modal("show");
      },
    });
  });
});

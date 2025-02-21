$(document).ready(function () {
  $("#filter_grade7").change(function () {
    var selectedValue = $(this).val();
    // alert(selectedValue);
    $.ajax({
      url: "action.php",
      type: "POST",
      data: "grade7=" + selectedValue,
      beforeSend: function () {
        $(".container").html("<h1>Loading...</h1>");
      },
      success: function (res) {
        setTimeout(function () {
          $(".container").html(res);
        }, 1000);
      },
    });
  });

  $("#filter_grade8").change(function () {
    var selectedValue = $(this).val();
    // alert(selectedValue);
    $.ajax({
      url: "action.php",
      type: "POST",
      data: "grade8=" + selectedValue,
      beforeSend: function () {
        $(".container").html("<h1>Loading...</h1>");
      },
      success: function (res) {
        setTimeout(function () {
          $(".container").html(res);
        }, 1000);
      },
    });
  });

  $("#filter_grade9").change(function () {
    var selectedValue = $(this).val();
    // alert(selectedValue);
    $.ajax({
      url: "action.php",
      type: "POST",
      data: "grade9=" + selectedValue,
      beforeSend: function () {
        $(".container").html("<h1>Loading...</h1>");
      },
      success: function (res) {
        setTimeout(function () {
          $(".container").html(res);
        }, 1000);
      },
    });
  });

  $("#filter_grade10").change(function () {
    var selectedValue = $(this).val();
    // alert(selectedValue);
    $.ajax({
      url: "action.php",
      type: "POST",
      data: "grade10=" + selectedValue,
      beforeSend: function () {
        $(".container").html("<h1>Loading...</h1>");
      },
      success: function (res) {
        setTimeout(function () {
          $(".container").html(res);
        }, 1000);
      },
    });
  });

  $("#filter_grade11").change(function () {
    var selectedValue = $(this).val();
    // alert(selectedValue);
    $.ajax({
      url: "action.php",
      type: "POST",
      data: "grade11=" + selectedValue,
      beforeSend: function () {
        $(".container").html("<h1>Loading...</h1>");
      },
      success: function (res) {
        setTimeout(function () {
          $(".container").html(res);
        }, 1000);
      },
    });
  });

  $("#filter_grade12").change(function () {
    var selectedValue = $(this).val();
    // alert(selectedValue);
    $.ajax({
      url: "action.php",
      type: "POST",
      data: "grade12=" + selectedValue,
      beforeSend: function () {
        $(".container").html("<h1>Loading...</h1>");
      },
      success: function (res) {
        setTimeout(function () {
          $(".container").html(res);
        }, 1000);
      },
    });
  });

  $("nav .row .col #select_grade").change(function () {
    var selectedValue = $(this).val();
    // alert(selectedValue);
    $.ajax({
      url: "action.php",
      type: "POST",
      data: "records_grade7=" + selectedValue,
      beforeSend: function () {
        $(".container").html("<h1>Loading...</h1>");
      },
      success: function (res) {
        setTimeout(function () {
          $(".container").html(res);
        }, 1000);
      },
    });
  });
});

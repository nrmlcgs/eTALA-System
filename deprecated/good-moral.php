<style>
    #header{
            line-height: 1.5pt;
            text-align: center;
            font-weight: bold;
        }
       
        #hd {
            font-family: "Old English Text MT", serif;
        }
        .custom-hr {
            border: none;
            border-bottom: 2px solid black !important;
            color: black !important;
        }
        .title-section {
            line-height: 1px;
            text-align: center;
            margin-bottom: 20px;
            position: relative;
            font-family: "Arial Narrow";
            font-size: 11pt;
        }
        .title-section .logo-left,
        .title-section .logo-right {
            height: auto; /* Maintains aspect ratio */
            position: absolute;
            top: 70%;
            transform: translateY(-50%);
        }
        .title-section .logo-left {
            top:90%;
            padding: 0;
            left: 0;
            width: 96px; /* Increase the width for the left logo */
            height: 96px; /* Increase the height for the left logo */
        }

        .title-section .logo-right {
            top:90%;
            right: 0; /* Adjust position from right */
            width: 152px; /* Set the width for the right logo */
            height: 57px; /* Set the height for the right logo */
        }
        /* Add your custom styles here */
        .card-header {
        /* border: 1.5px solid black !important; */
            padding: 0 !important;
            margin: 0;
            background-color: #C4BD97;
            text-align: center;
            font-size: 14pt;
            font-weight: bold;
        }

    /* Additional styles for card bodies */
        .card-body {
            border: none !important;
            padding: 0 !important; /* Reset padding if needed */
        }
        .card-body .div1,.div2{
            border: 1.5px solid black !important;
        }
        .card-body p{
            margin-top: 10px;
            line-height: 1.5px;
            font-size: 11pt;
            /* margin-bottom: 0px; */
        }
        .card-body table td{
            line-height: 1px;
            font-family: "Arial Narrow";
            font-size: 11pt;
        }
        .card-body table.table-bordered td,
        .card-body table.table-bordered th {
            border-color: black !important;
        }
            /* Override Bootstrap card border */
            .card {
            border: none !important;
            }
            th[scope="col"][rowspan="2"] {
        text-align: center;
        vertical-align: middle;
        }
        .table th{
            line-height: 1rem;
            text-align: center;
            font-size: 11pt;
            font-family: 'Arial Narrow';
        }
        .table td{
            line-height: 1px;
            font-family: "Arial Narrow";
            font-size: 11pt;
        }
  @media print{
            @page{
                size: 8.5in 11in !important;
                /*  margin: 0 !important;
                /* transform: scale(0.76) !important; */
                transform-origin: 0 0 !important; 
            }
        }
  </style>
<div class="print" style="position:fixed;right:20px;justify-content:center;">
    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" onblur="newData()">
        Print
    </button>
    <!-- <button class="btn btn-sm btn-success" onclick="window.print()"><i class="fa fa-print"></i>
        Print
    </button> -->
</div>
<div class="row" id="test">
    <div class="col-md-12">
        <div class="row" id="header">
            <center><img src="admin/images/Picture2.png" alt="DEPED LOGO" style="width:96px; height: 96px;" class="mb-2"></center>
            <p id="hd" style="font-size: 12pt;">Republic of the Philippines </p>
            <p id="hd" style="font-size: 16pt;">Department of Education</p>
            <p style="font-size: 10pt;">MIMAROPA REGION</p>
            <p style="font-size: 12pt; font-family: Arial, Helvetica, sans-serif;">SCHOOL DIVISION OFFICE OF OCCIDENTAL MINDORO</p>
            <p>OCCIDENTAL MINDORO NATIONAL HIGH SCHOOL</p>
            <p style="font-size: 11pt;">Mamburao, Occidental Mindoro</p>
            <hr class="custom-hr mb-1">
            <p style="text-align: left; margin-top: 10px;">Office of the Principal</p>
        </div>
        <div class="row">
            <br>
            <br>
            <p style="text-align: right; margin-right: 50px;" id="currentDate"></p>
            <br><br>
            <p style="text-align: center; font-size: 16pt; font-weight: bold;" class="mb-5">C E R T I F I C A T I O N</p>
            <br>
            <p style="font-weight: bold; font-size: 14pt;">TO WHOM IT MAY CONCERN:</p>
            <p style="text-align: justify; text-indent: 1.5em; font-size: 14pt;">
                This is to certify that <span id="studentName" style="font-weight: bold; display: inline-block; width: auto-width;"><?php echo $_SESSION['name'];?></span> with LRN <span  id="LRN"><?php echo $_SESSION['lrn_no'];?></span> is a <span id="gradelevels"></span>(<span id="gsection"><?php echo $_SESSION['section'];?></span>) student in this school, School Year 2022-2023.
            </p>
            <p style="text-align: justify; text-indent: 2em;">
                This further certifies that she is of good moral character and has no money and property responsibility in this school.
            </p>
            <p style="text-align: justify; text-indent: 2em;">
                Issued this <span id="datePlaceholder"></span> day <span id="monthPlaceholder"></span> <span id="yearPlaceholder"></span> for <span id="Forpurpose"></span>
            </p>
            <br><br><br><br><br>
            <p style="text-align: right; font-weight: bold; margin-right: 100px; line-height: 1px;" class="mr-200px">MARIVEL V. AGUDA</p>
            <p style="text-align: right; margin-right: 90px; line-height: 1px;">Principal II</p>
            <p style="margin-top:100px; margin-bottom:0px">OMNHS/BBG</p>
            <hr class="custom-hr">
        </div>
        <div class="row align-items-start">
            <div class="col-auto">
                <img src="admin/images/logo_ori.png" alt="" style="width: 96px; height: 96px;">
            </div>
            <div class="col">
                <p style="line-height:1pt;"><i class="fa-regular fa-envelope" style="margin:0px"></i> National Road, Brgy. Payompon, Mamburao, Occidental Mindoro</p>
                <p style="line-height:1pt;"><i class="fas fa- circle-phone"></i> (043) 45813444</p>
                <p style="line-height:1pt;"><i class="fas fa-envelope" style="margin:0px"></i> 301593omnh@gmail.com</p>
                <p style="line-height:1pt;"><i class="fab fa-facebook-square" style="margin: 0;"></i> Occidental Mindoro National High School</p>
            </div>
        </div>


        
       
        
    </div>
    <script>
        // Function to get ordinal indicator for the day
        const getOrdinalIndicator = (day) => {
            if (day >= 11 && day <= 13) {
                return 'th';
            }
            switch (day % 10) {
                case 1:
                    return 'st';
                case 2:
                    return 'nd';
                case 3:
                    return 'rd';
                default:
                    return 'th';
            }
        };
        const currentDateElement = document.getElementById('currentDate');
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        const currentDate = new Date();
        const day = currentDate.getDate();
        const monthIndex = currentDate.getMonth();
        const year = currentDate.getFullYear();

        const formattedDate = day + ' ' + months[monthIndex] + ' ' + year;
        currentDateElement.textContent = formattedDate;


        // const currentDate = new Date();
        const datePlaceholder = document.getElementById('datePlaceholder');
        const monthPlaceholder = document.getElementById('monthPlaceholder');
        const yearPlaceholder=document.getElementById('yearPlaceholder');

        // Get day and month
        // const day = currentDate.getDate();
        // const monthIndex = currentDate.getMonth();
         // Get ordinal indicator for the day
         const ordinalIndicator = getOrdinalIndicator(day);

        // Insert the day and month into the HTML
        datePlaceholder.textContent = day + ordinalIndicator;
        monthPlaceholder.textContent = months[monthIndex];
        yearPlaceholder.textContent=year;
    </script>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Good Moral </h1>
      </div>
      <div class="modal-body">
        <form action="">
            
            <div class="form-group">
                <label for="">LRN No:</label>
                <input type="text" value= "<?php echo $_SESSION['lrn_no'];?>" name="" id="inputLRN" class="form-control" disabled>
            </div>
            <div class="form-group">    
                <label for="">Student Name:</label>
                <input type="text" name="inputName" id="inputName" class="form-control" disabled>
            </div>
            <div class="form-group">
                <label for="">Grade Level:</label>
                <input type="text" name="" id="inputGradeLevel" class="form-control" disabled>
            </div>
            <div class="form-group">
                <label for="">Section:</label>
                <input type="text" name="" id="inputSection" class="form-control" disabled>
            </div>
            <div class="form-group">
                <label for="">Purpose:</label>
                <input type="text" name="" id="inputPurpose" class="form-control">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="printGoodMoral()">Print</button>
      </div>
    </div>
  </div>
</div>
<script>
var currentGradeLevel;
  function newData() {
    var student_lrn=document.getElementById('inputLRN').value;
    $.ajax({
        url:'admin/getStudentInfo.php',
        method:'GET',
        data:{find:1,student_lrn: student_lrn},
        success:function(data){
            if (data && data.completeName) {
            // Data found, populate the fields
            $('#inputName').val(data.completeName);
            $('#inputSection').val(data.section);

            var yrlvl = data.year_level;
                if (yrlvl == 1) {
                    currentGradeLevel = "Grade 7";
                } else if (yrlvl == 2) {
                    currentGradeLevel = "Grade 8";
                } else if (yrlvl == 3) {
                    currentGradeLevel = "Grade 9";
                } else if (yrlvl == 4) {
                    currentGradeLevel = "Grade 10";
                }

                $('#inputGradeLevel').val(currentGradeLevel);

            } else {
                // No record found, display an alert
                alert("No record found for the specified student LRN.");
            }
        },
        error: function (xhr, status, error) {
            console.log("Error");
        }

    });
    
    }
    function printGoodMoral(){
        $('#studentName').text($('#inputName').val());
        $('#LRN').text($('#inputLRN').val());
        $('#gradelevels').text(currentGradeLevel);
        $('#gsection').text($('#inputSection').val());
        $('#Forpurpose').text($('#inputPurpose').val());
        console.log(currentGradeLevel);
        $("#exampleModal").on('hidden.bs.modal', function (e) {
            // setPaperSize('A4');
            window.print();
        });
        $("#exampleModal").modal("hide");
    }
    function setPaperSize(size) {
    var style = document.createElement('style');
    style.appendChild(document.createTextNode(''));

    document.head.appendChild(style);

    var sheet = style.sheet;
    sheet.insertRule('@media print { @page { size: ' + size + '; margin: 1cm; } }', 0);
}


</script>
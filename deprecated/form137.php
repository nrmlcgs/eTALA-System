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
                size: 8.5in 13in !important;
                margin: 0 !important;
                transform: scale(0.76) !important;
                transform-origin: 0 0 !important;
            }
        }
  </style>
<div class="row">
    <div class="col-md-12">
    <div class="print" style="position:fixed;right:20px;justify-content:center; z-index:99;">
    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Print
    </button>
    <!-- <button class="btn btn-sm btn-success" onclick="form137()"><i class="fa fa-print"></i>
        Print</button>
    </div> -->
    </div>

</div>
<div class="row mt-1">
    <div class="col-md-12">
    <div class="title-section">
      <div class="row align-items-center">
        <p style="text-align:left !important; font-size:11pt;" class="mt-2">SF 10-JHS</p>
        <div class="col-md-6 text-left logo-left">
          <!-- Left Logo -->
          <!-- Replace this div with your left logo -->
          <!-- For example: -->
          <img src="admin/images/Picture2.png" alt="Left Logo" class="img-fluid">
        </div>
        <div class="col-md-6 text-right logo-right">
          <!-- Right Logo -->
          <!-- Replace this div with your right logo -->
          <!-- For example: -->
          <img src="admin/images/Picture1.png" alt="Right Logo" class="img-fluid">
        </div>
      </div>
    
      <p style="font-size:11pt">Republic of the Philippines</p>
      <p style="font-size:11pt">Department of Education</p>
      <p style="font-size:14pt;">Learner Permanent Record for Junior High School (SF10-JHS)</p>
      <p style="font-size:10pt"><i>(Formerly Form 137)</i></p>
    </div>
    
    <div class="card">
      <div class="card-header">
       LEARNER'S INFORMATION
      </div>
      <div class="card-body">
        <p  style="font-size:11pt">LAST NAME: <span id="lastName" style="display: inline-block; width: 200px;"></span> FIRST NAME: <span id="firstName" style="display: inline-block; width: 100px;"> </span> NAME EXTN. (Jr.I,II): <span style="display: inline-block; width: 100px;"> </span> MIDDLE NAME: <span id="middleName" style="display: inline-block; width: 100px;"> </span></p>
        <p>Learner Reference Number (LRN): <span id="lrnNo" style="display: inline-block; width: 200px;"></span> Birthdate (mm/dd/yyyy): <span id="birthdate" style="display: inline-block; width: 115px;"></span>Sex: <span id="sex"></span></p>
      </div>
    </div>   
    
    <div class="card">
      <div class="card-header">
        ELIGIBILITY FOR JHS ENROLMENT
      </div>
      <div class="card-body">
        <div>
            <input type="checkbox" name="" id="">Elementary Completer
            <p>Name of Elementary School: <span id="" style="display: inline-block; width: 200px; "> </span> School ID: <span id="" style="display: inline-block; width: 100px; "> </span> Address of School</p>
        </div>
        Other Credential Presented
        <p>&nbsp;&nbsp;&nbsp; <input type="checkbox" name="" id="">PEPT Passer &nbsp;&nbsp;&nbsp; Rating: <span id="" style="display: inline-block; width: 100px; "> </span> <input type="checkbox" name="" id="">ALS Passer &nbsp;&nbsp;&nbsp; Rating: <span id="" style="display: inline-block; width: 100px; "> </span> <input type="checkbox" name="" id="">Others (Pls. Specify): <span id="" style="display: inline-block; width: 100px; "> </span> </p>   
        <p>&nbsp;&nbsp;&nbsp; Date of Examination/Assessment (mm/dd/yyyy): <span id="" style="display: inline-block; width: 100px; "> </span> Name and Address of Testing Center: <span id="" style="display: inline-block; width: 150px; "> </span></p>   
      </div>
    </div>

    <div class="card">
        <div class="card-header">
            SCHOLASTIC RECORD
        </div>
        <div class="card-body">
            <!-- For Grade 7 -->
            <div class="div1 mt-2">
            <p>School: <span id="schoolname1" style="display: inline-block; width: 200px; "></span> School ID: <span id="schoolID1"  style="display: inline-block; width: 100px; "></span> District: <span id="District1"  style="display: inline-block; width: 100px; "></span> Division: <span span id="Division1"  style="display: inline-block; width: 150px; "></span> Region: <span id="Region1"  style="display: inline-block; width: 100px; "> </span></p>
            <p>Classified as Grade: <span id="csg1" style="display: inline-block; width: 50px; "> </span> Section: <span id="section1" style="display: inline-block; width: 70px; "></span> School Year: <span id="SY1" style="display: inline-block; width: 100px; "></span> Name of Adviser/Teacher: <span id="Adviser1" style="display: inline-block; width: 150px; "></span>Signature: <span id="Sign1" style="display: inline-block; width: 100px; "></span></p>
            
            <table class="table table-bordered nowrap" style="border-color: black !important;">
              <thead>
               
                <tr>
                  <th scope="col" rowspan="2"width="400px">Learning Areas</th>
                  <th scope="col" colspan="4">Quarterly Rating</th>
                  <th scope="col" rowspan="2" width="100px">Final <br> Rating</th>
                  <th scope="col" rowspan="2" width="300px">Remarks</th>
                </tr>
                <tr>
                  <th>1</th>
                  <th>2</th>
                  <th>3</th>
                  <th>4</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td>Filipino</td>
                    <td id="filipino1_1"></td>
                    <td id="filipino1_2"></td>
                    <td id="filipino1_3"></td>
                    <td id="filipino1_4"></td>
                    <td id="filipino1_5"></td>
                    <td id="filstat1"></td>
                </tr>
                <tr>
                    <td>English</td>
                    <td id="english1_1"></td>
                    <td id="english1_2"></td>
                    <td id="english1_3"></td>
                    <td id="english1_4"></td>
                    <td id="english1_5"></td>
                    <td id="engstat1"></td>
                </tr>
                <tr>
                    <td>Mathematics</td>
                    <td id="mathematics1_1"></td>
                    <td id="mathematics1_2"> </td>
                    <td id="mathematics1_3"></td>
                    <td id="mathematics1_4"></td>
                    <td id="mathematics1_5"></td>
                    <td id="mathstat1"></td>
                </tr>
                <tr>
                    <td>Science</td>
                    <td id="science1_1"></td>
                    <td id="science1_2"></td>
                    <td id="science1_3"></td>
                    <td id="science1_4"> </td>
                    <td id="science1_5"></td>
                    <td id="scistat1"></td>
                </tr>
                <tr>
                    <td>Araling Panlipunan</td>
                    <td id="ap1_1"></td>
                    <td id="ap1_2"></td>
                    <td id="ap1_3"></td>
                    <td id="ap1_4"></td>
                    <td id="ap1_5"></td>
                    <td id="apstat1"></td>
                </tr>
                <tr>
                    <td>Edukasyon sa Pagpapakatao (ESP)</td>
                    <td id="esp1_1"></td>
                    <td id="esp1_2"></td>
                    <td id="esp1_3"></td>
                    <td id="esp1_4"></td>
                    <td id="esp1_5"></td>
                    <td id="espstat1"></td>
                </tr>
                <tr>
                    <td>Technology and Livelihood Education (TLE)</td>
                    <td id="tle1_1"></td>
                    <td id="tle1_2"></td>
                    <td id="tle1_3"></td>
                    <td id="tle1_4"></td>
                    <td id="tle1_5"></td>
                    <td id="tlestat1"></td>
                </tr>
                <tr>
                    <td>MAPEH</td>
                    <td id="mapeh1_1"></td>
                    <td id="mapeh1_2"></td>
                    <td id="mapeh1_3"></td>
                    <td id="mapeh1_4"></td>
                    <td id="mapeh1_5"></td>
                    <td id="mapehstat1"></td>
                </tr>
                <tr>
                    <td>Music</td>
                    <td id="music1_1"></td>
                    <td id="music1_2"></td>
                    <td id="music1_3"></td>
                    <td id="music1_4"></td>
                    <td id="music1_5"></td>
                    <td id="musicstat1"></td>
                </tr>
                <tr>
                    <td>Arts</td>
                    <td id="arts1_1"></td>
                    <td id="arts1_2"></td>
                    <td id="arts1_3"></td>
                    <td id="arts1_4"></td>
                    <td id="arts1_5"></td>
                    <td id="artstat1"></td>
                </tr>
                <tr>
                    <td>Physical Education</td>
                    <td id="pe1_1"></td>
                    <td id="pe1_2"></td>
                    <td id="pe1_3"></td>
                    <td id="pe1_4"></td>
                    <td id="pe1_5"></td>
                    <td id="pestat1"></td>
                </tr>
                <tr>
                    <td>Health</td>
                    <td id="health1_1"></td>
                    <td id="health1_2"></td>
                    <td id="health1_3"></td>
                    <td id="health1_4"></td>
                    <td id="health1_5"></td>
                    <td id="healthstat1"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">General Average</td>
                    <td id="ga1"></td>
                    <td id="ga1stat"></td>
                </tr>             
                
              </tbody>
              
            </table>
            <table class="table table-bordered" style="border-color: black !important;">
                <thead>
                    <tr>
                        <th colspan="1">Remedial</th>
                        <th colspan="4">Conducted from (mm/dd/yyyy) <span style="display: inline-block; width: 200px; "></span> to (mm/dd/yyyy) <span style="display: inline-block; width: 200px; "></span></th>                                              
                    </tr>
                    <tr>
                        <th width="200px">Learning Areas</th>
                        <th width="200px">Final Rating</th>
                        <th width="180px">Remedial Class Mark</th>
                        <th >Recomputed Final Grade</th>
                        <th  width="300px"></th>
                       
                    </tr>
                </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        
                    </tbody>
            </table>
            </div>
            <!-- For Grade 8 -->
            <div class="div2 mt-2">
            <p>School: <span id="schoolname2" style="display: inline-block; width: 200px; "></span> School ID: <span id="schoolID2"  style="display: inline-block; width: 100px; "></span> District: <span id="District2"  style="display: inline-block; width: 100px; "></span> Division: <span span id="Division2"  style="display: inline-block; width: 150px; "></span> Region: <span id="Region2"  style="display: inline-block; width: 100px; "> </span></p>
            <p>Classified as Grade: <span id="csg2" style="display: inline-block; width: 50px; "> </span> Section: <span id="section2" style="display: inline-block; width: 70px; "></span> School Year: <span id="SY2" style="display: inline-block; width: 100px; "></span> Name of Adviser/Teacher: <span id="Adviser2" style="display: inline-block; width: 150px; "></span>Signature: <span id="Sign2" style="display: inline-block; width: 100px; "></span></p>
            
            <table class="table table-bordered nowrap" style="border-color: black !important;">
              <thead>
               
                <tr>
                  <th scope="col" rowspan="2"width="400px">Learning Areas</th>
                  <th scope="col" colspan="4">Quarterly Rating</th>
                  <th scope="col" rowspan="2" width="100px">Final <br> Rating</th>
                  <th scope="col" rowspan="2" width="300px">Remarks</th>
                </tr>
                <tr>
                  <th>1</th>
                  <th>2</th>
                  <th>3</th>
                  <th>4</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td>Filipino</td>
                    <td id="filipino2_1"></td>
                    <td id="filipino2_2"></td>
                    <td id="filipino2_3"></td>
                    <td id="filipino2_4"></td>
                    <td id="filipino2_5"></td>
                    <td id="filstat2"></td>
                </tr>
                <tr>
                    <td>English</td>
                    <td id="english2_1"></td>
                    <td id="english2_2"></td>
                    <td id="english2_3"></td>
                    <td id="english2_4"></td>
                    <td id="english2_5"></td>
                    <td id="engstat2"></td>
                </tr>
                <tr>
                    <td>Mathematics</td>
                    <td id="mathematics2_1"></td>
                    <td id="mathematics2_2"> </td>
                    <td id="mathematics2_3"></td>
                    <td id="mathematics2_4"></td>
                    <td id="mathematics2_5"></td>
                    <td id="mathstat2"></td>
                </tr>
                <tr>
                    <td>Science</td>
                    <td id="science2_1"></td>
                    <td id="science2_2"></td>
                    <td id="science2_3"></td>
                    <td id="science2_4"> </td>
                    <td id="science2_5"></td>
                    <td id="scistat2"></td>
                </tr>
                <tr>
                    <td>Araling Panlipunan</td>
                    <td id="ap2_1"></td>
                    <td id="ap2_2"></td>
                    <td id="ap2_3"></td>
                    <td id="ap2_4"></td>
                    <td id="ap2_5"></td>
                    <td id="apstat2"></td>
                </tr>
                <tr>
                    <td>Edukasyon sa Pagpapakatao (ESP)</td>
                    <td id="esp2_1"></td>
                    <td id="esp2_2"></td>
                    <td id="esp2_3"></td>
                    <td id="esp2_4"></td>
                    <td id="esp2_5"></td>
                    <td id="espstat2"></td>
                </tr>
                <tr>
                    <td>Technology and Livelihood Education (TLE)</td>
                    <td id="tle2_1"></td>
                    <td id="tle2_2"></td>
                    <td id="tle2_3"></td>
                    <td id="tle2_4"></td>
                    <td id="tle2_5"></td>
                    <td id="tlestat2"></td>
                </tr>
                <tr>
                    <td>MAPEH</td>
                    <td id="mapeh2_1"></td>
                    <td id="mapeh2_2"></td>
                    <td id="mapeh2_3"></td>
                    <td id="mapeh2_4"></td>
                    <td id="mapeh2_5"></td>
                    <td id="mapehstat2"></td>
                </tr>
                <tr>
                    <td>Music</td>
                    <td id="music2_1"></td>
                    <td id="music2_2"></td>
                    <td id="music2_3"></td>
                    <td id="music2_4"></td>
                    <td id="music2_5"></td>
                    <td id="musicstat2"></td>
                </tr>
                <tr>
                    <td>Arts</td>
                    <td id="arts2_1"></td>
                    <td id="arts2_2"></td>
                    <td id="arts2_3"></td>
                    <td id="arts2_4"></td>
                    <td id="arts2_5"></td>
                    <td id="artstat2"></td>
                </tr>
                <tr>
                    <td>Physical Education</td>
                    <td id="pe2_1"></td>
                    <td id="pe2_2"></td>
                    <td id="pe2_3"></td>
                    <td id="pe2_4"></td>
                    <td id="pe2_5"></td>
                    <td id="pestat2"></td>
                </tr>
                <tr>
                    <td>Health</td>
                    <td id="health2_1"></td>
                    <td id="health2_2"></td>
                    <td id="health2_3"></td>
                    <td id="health2_4"></td>
                    <td id="health2_5"></td>
                    <td id="healthstat2"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">General Average</td>
                    <td id="ga2"></td>
                    <td id="ga2stat"></td>
                </tr>
              
                
              </tbody>
              
            </table>
            <table class="table table-bordered" style="border-color: black !important;">
                <thead>
                    <tr>
                        <th colspan="1">Remedial</th>
                        <th colspan="4">Conducted from (mm/dd/yyyy) <span style="display: inline-block; width: 200px; "></span> to (mm/dd/yyyy) <span style="display: inline-block; width: 200px; "></span></th>                       
                    </tr>
                    <tr>
                        <th width="200px">Learning Areas</th>
                        <th width="200px">Final Rating</th>
                        <th width="180px">Remedial Class Mark</th>
                        <th >Recomputed Final Grade</th>
                        <th  width="300px"></th>
                       
                    </tr>
                </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        
                    </tbody>
            </table>
            </div> 
        </div>
    </div>

    <div class="card">
      <div class="card-header">
        CERTIFICATION
      </div>
      <div class="card-body" style="text-align: justify; border:1px !important;" >
        <p >I CERTIFY that this is a true record of <span id="cname" style="display: inline-block; width: auto-width; "> </span> with LRN <span id="lrnNo1" style="display: inline-block; width: auto-width; "></span> and that he/she is eligible for admission to Grade <span id="cgrade" style="display: inline-block; width: 45px; "> </span>.</p>
        <p>Name of School: <span id="cschool" style="display: inline-block; width: 200px; "> </span> School ID: <span id="cschoolID" style="display: inline-block; width: 70px; "> </span> Last School Year Attended: <span id="csy" style="display: inline-block; width: 150px; "> </span></p>
        <!-- <p>Date: _______________ Signature of Principal/School Head over Printed Name: _______________ (Affix School Seal Here)</p> -->
        <br>
        <p><span class="mx-5" style="margin-right:20px;">Date</span> <span class="mx-5" style="text-align: center;">Signature of Principal/School Head over Printed Name</span><span class="mx-5 mr-auto" style="text-align: right;">(Affix School Seal Here)</span></p>

    </div>
    </div>
    
    <!-- Footer Section
    <footer class="text-center">
      <p>&copy; Your School Name</p>
    </footer> -->
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-12">
        <p style="line-height:1px;">SF10-JHS</p>
    <div class="card">
        <!-- <div class="card-header">
            SCHOLASTIC RECORD
        </div> -->
        <div class="card-body">
            <!--For Grade 9 -->
            <div class="div1 mt-2">
            <p>School: <span id="schoolname3" style="display: inline-block; width: 200px; "></span> School ID: <span id="schoolID3"  style="display: inline-block; width: 100px; "></span> District: <span id="District3"  style="display: inline-block; width: 100px; "></span> Division: <span span id="Division3"  style="display: inline-block; width: 150px; "></span> Region: <span id="Region3"  style="display: inline-block; width: 100px; "> </span></p>
            <p>Classified as Grade: <span id="csg3" style="display: inline-block; width: 50px; "></span> Section: <span id="section3" style="display: inline-block; width: 100px; "></span> School Year: <span id="SY3" style="display: inline-block; width: 100px; "></span> Name of Adviser/Teacher: <span id="Adviser3" style="display: inline-block; width: 150px; "></span>Signature: <span id="Sign3" style="display: inline-block; width: 100px; "></span></p>
            
            <table class="table table-bordered nowrap" style="border-color: black !important;">
              <thead>
               
                <tr>
                  <th scope="col" rowspan="2"width="400px">Learning Areas</th>
                  <th scope="col" colspan="4">Quarterly Rating</th>
                  <th scope="col" rowspan="2" width="100px">Final <br> Rating</th>
                  <th scope="col" rowspan="2" width="300px">Remarks</th>
                </tr>
                <tr>
                  <th>1</th>
                  <th>2</th>
                  <th>3</th>
                  <th>4</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td>Filipino</td>
                    <td id="filipino3_1"></td>
                    <td id="filipino3_2"></td>
                    <td id="filipino3_3"></td>
                    <td id="filipino3_4"></td>
                    <td id="filipino3_5"></td>
                    <td id="filstat3"></td>
                </tr>
                <tr>
                    <td>English</td>
                    <td id="english3_1"></td>
                    <td id="english3_2"></td>
                    <td id="english3_3"></td>
                    <td id="english3_4"></td>
                    <td id="english3_5"></td>
                    <td id="engstat3"></td>
                </tr>
                <tr>
                    <td>Mathematics</td>
                    <td id="mathematics3_1"></td>
                    <td id="mathematics3_2"> </td>
                    <td id="mathematics3_3"></td>
                    <td id="mathematics3_4"></td>
                    <td id="mathematics3_5"></td>
                    <td id="mathstat3"></td>
                </tr>
                <tr>
                    <td>Science</td>
                    <td id="science3_1"></td>
                    <td id="science3_2"></td>
                    <td id="science3_3"></td>
                    <td id="science3_4"> </td>
                    <td id="science3_5"></td>
                    <td id="scistat3"></td>
                </tr>
                <tr>
                    <td>Araling Panlipunan</td>
                    <td id="ap3_1"></td>
                    <td id="ap3_2"></td>
                    <td id="ap3_3"></td>
                    <td id="ap3_4"></td>
                    <td id="ap3_5"></td>
                    <td id="apstat3"></td>
                </tr>
                <tr>
                    <td>Edukasyon sa Pagpapakatao (ESP)</td>
                    <td id="esp3_1"></td>
                    <td id="esp3_2"></td>
                    <td id="esp3_3"></td>
                    <td id="esp3_4"></td>
                    <td id="esp3_5"></td>
                    <td id="espstat3"></td>
                </tr>
                <tr>
                    <td>Technology and Livelihood Education (TLE)</td>
                    <td id="tle3_1"></td>
                    <td id="tle3_2"></td>
                    <td id="tle3_3"></td>
                    <td id="tle3_4"></td>
                    <td id="tle3_5"></td>
                    <td id="tlestat3"></td>
                </tr>
                <tr>
                    <td>MAPEH</td>
                    <td id="mapeh3_1"></td>
                    <td id="mapeh3_2"></td>
                    <td id="mapeh3_3"></td>
                    <td id="mapeh3_4"></td>
                    <td id="mapeh3_5"></td>
                    <td id="mapehstat3"></td>
                </tr>
                <tr>
                    <td>Music</td>
                    <td id="music3_1"></td>
                    <td id="music3_2"></td>
                    <td id="music3_3"></td>
                    <td id="music3_4"></td>
                    <td id="music3_5"></td>
                    <td id="musicstat3"></td>
                </tr>
                <tr>
                    <td>Arts</td>
                    <td id="arts3_1"></td>
                    <td id="arts3_2"></td>
                    <td id="arts3_3"></td>
                    <td id="arts3_4"></td>
                    <td id="arts3_5"></td>
                    <td id="artstat3"></td>
                </tr>
                <tr>
                    <td>Physical Education</td>
                    <td id="pe3_1"></td>
                    <td id="pe3_2"></td>
                    <td id="pe3_3"></td>
                    <td id="pe3_4"></td>
                    <td id="pe3_5"></td>
                    <td id="pestat3"></td>
                </tr>
                <tr>
                    <td>Health</td>
                    <td id="health3_1"></td>
                    <td id="health3_2"></td>
                    <td id="health3_3"></td>
                    <td id="health3_4"></td>
                    <td id="health3_5"></td>
                    <td id="healthstat3"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">General Average</td>
                    <td id="ga3"></td>
                    <td id="ga3stat"></td>
                </tr>
              </tbody>
              
            </table>
            <table class="table table-bordered" style="border-color: black !important;">
                <thead>
                    <tr>
                        <th colspan="1">Remedial</th>
                        <th colspan="4">Conducted from (mm/dd/yyyy) <span style="display: inline-block; width: 200px; "></span> to (mm/dd/yyyy) <span style="display: inline-block; width: 200px; "></span></th>                                              
                    </tr>
                    <tr>
                        <th width="200px">Learning Areas</th>
                        <th width="200px">Final Rating</th>
                        <th width="180px">Remedial Class Mark</th>
                        <th >Recomputed Final Grade</th>
                        <th  width="300px"></th>
                       
                    </tr>
                </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        
                    </tbody>
            </table>
            </div>
            <!-- For grade 10 -->
            <div class="div1 mt-2">
            <p>School: <span id="schoolname4" style="display: inline-block; width: 200px; "></span> School ID: <span id="schoolID4"  style="display: inline-block; width: 100px; "></span> District: <span id="District4"  style="display: inline-block; width: 100px; "></span> Division: <span span id="Division4"  style="display: inline-block; width: 150px; "></span> Region: <span id="Region4"  style="display: inline-block; width: 100px; "> </span></p>
            <p>Classified as Grade: <span id="csg4" style="display: inline-block; width: 50px; "> </span> Section: <span id="section4" style="display: inline-block; width: 70px; "></span> School Year: <span id="SY4" style="display: inline-block; width: 100px; "></span> Name of Adviser/Teacher: <span id="Adviser4" style="display: inline-block; width: 150px; "></span>Signature: <span id="Sign4" style="display: inline-block; width: 100px; "></span></p>
            
            <table class="table table-bordered nowrap" style="border-color: black !important;">
              <thead>
               
                <tr>
                  <th scope="col" rowspan="2"width="400px">Learning Areas</th>
                  <th scope="col" colspan="4">Quarterly Rating</th>
                  <th scope="col" rowspan="2" width="100px">Final <br> Rating</th>
                  <th scope="col" rowspan="2" width="300px">Remarks</th>
                </tr>
                <tr>
                  <th>1</th>
                  <th>2</th>
                  <th>3</th>
                  <th>4</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td>Filipino</td>
                    <td id="filipino4_1"></td>
                    <td id="filipino4_2"></td>
                    <td id="filipino4_3"></td>
                    <td id="filipino4_4"></td>
                    <td id="filipino4_5"></td>
                    <td id="filstat4"></td>
                </tr>
                <tr>
                    <td>English</td>
                    <td id="english4_1"></td>
                    <td id="english4_2"></td>
                    <td id="english4_3"></td>
                    <td id="english4_4"></td>
                    <td id="english4_5"></td>
                    <td id="engstat4"></td>
                </tr>
                <tr>
                    <td>Mathematics</td>
                    <td id="mathematics4_1"></td>
                    <td id="mathematics4_2"> </td>
                    <td id="mathematics4_3"></td>
                    <td id="mathematics4_4"></td>
                    <td id="mathematics4_5"></td>
                    <td id="mathstat2"></td>
                </tr>
                <tr>
                    <td>Science</td>
                    <td id="science4_1"></td>
                    <td id="science4_2"></td>
                    <td id="science4_3"></td>
                    <td id="science4_4"> </td>
                    <td id="science4_5"></td>
                    <td id="scistat4"></td>
                </tr>
                <tr>
                    <td>Araling Panlipunan</td>
                    <td id="ap4_1"></td>
                    <td id="ap4_2"></td>
                    <td id="ap4_3"></td>
                    <td id="ap4_4"></td>
                    <td id="ap4_5"></td>
                    <td id="apstat4"></td>
                </tr>
                <tr>
                    <td>Edukasyon sa Pagpapakatao (ESP)</td>
                    <td id="esp4_1"></td>
                    <td id="esp4_2"></td>
                    <td id="esp4_3"></td>
                    <td id="esp4_4"></td>
                    <td id="esp4_5"></td>
                    <td id="espstat4"></td>
                </tr>
                <tr>
                    <td>Technology and Livelihood Education (TLE)</td>
                    <td id="tle4_1"></td>
                    <td id="tle4_2"></td>
                    <td id="tle4_3"></td>
                    <td id="tle4_4"></td>
                    <td id="tle4_5"></td>
                    <td id="tlestat4"></td>
                </tr>
                <tr>
                    <td>MAPEH</td>
                    <td id="mapeh4_1"></td>
                    <td id="mapeh4_2"></td>
                    <td id="mapeh4_3"></td>
                    <td id="mapeh4_4"></td>
                    <td id="mapeh4_5"></td>
                    <td id="mapehstat4"></td>
                </tr>
                <tr>
                    <td>Music</td>
                    <td id="music4_1"></td>
                    <td id="music4_2"></td>
                    <td id="music4_3"></td>
                    <td id="music4_4"></td>
                    <td id="music4_5"></td>
                    <td id="musicstat4"></td>
                </tr>
                <tr>
                    <td>Arts</td>
                    <td id="arts4_1"></td>
                    <td id="arts4_2"></td>
                    <td id="arts4_3"></td>
                    <td id="arts4_4"></td>
                    <td id="arts4_5"></td>
                    <td id="artstat4"></td>
                </tr>
                <tr>
                    <td>Physical Education</td>
                    <td id="pe4_1"></td>
                    <td id="pe4_2"></td>
                    <td id="pe4_3"></td>
                    <td id="pe4_4"></td>
                    <td id="pe4_5"></td>
                    <td id="pestat4"></td>
                </tr>
                <tr>
                    <td>Health</td>
                    <td id="health4_1"></td>
                    <td id="health4_2"></td>
                    <td id="health4_3"></td>
                    <td id="health4_4"></td>
                    <td id="health4_5"></td>
                    <td id="healthstat4"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">General Average</td>
                    <td id="ga4"></td>
                    <td id="ga4stat"></td>
                </tr>
              </tbody>
              
            </table>
            <table class="table table-bordered" style="border-color: black !important;">
                <thead>
                    <tr>
                        <th colspan="1">Remedial</th>
                        <th colspan="4">Conducted from (mm/dd/yyyy) <span style="display: inline-block; width: 200px; "></span> to (mm/dd/yyyy) <span style="display: inline-block; width: 200px; "></span></th>                       
                    </tr>
                    <tr>
                        <th width="200px">Learning Areas</th>
                        <th width="200px">Final Rating</th>
                        <th width="180px">Remedial Class Mark</th>
                        <th >Recomputed Final Grade</th>
                        <th  width="300px"></th>
                       
                    </tr>
                </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        
                    </tbody>
            </table>
            </div>
            <div class="div5 mt-2">
            <p>School: <span id="schoolname5" style="display: inline-block; width: 300px; "></span> School ID: <span id="schoolID5"  style="display: inline-block; width: 100px; "></span> District: <span id="District5"  style="display: inline-block; width: 100px; "></span> Region: <span id="Region5"  style="display: inline-block; width: 100px; "> </span></p>
            <p>Classified as Grade: <span id="csg5" style="display: inline-block; width: 50px; "> </span> Section: <span id="section5" style="display: inline-block; width: 70px; "></span> School Year: <span id="SY5" style="display: inline-block; width: 100px; "></span> Name of Adviser/Teacher: <span id="Adviser5" style="display: inline-block; width: 150px; "></span>Signature: <span id="Sign5" style="display: inline-block; width: 100px; "></span></p>
            
            <table class="table table-bordered nowrap" style="border-color: black !important;">
              <thead>
               
                <tr>
                  <th scope="col" rowspan="2"width="400px">Learning Areas</th>
                  <th scope="col" colspan="4">Quarterly Rating</th>
                  <th scope="col" rowspan="2" width="100px">Final <br> Rating</th>
                  <th scope="col" rowspan="2" width="300px">Remarks</th>
                </tr>
                <tr>
                  <th>1</th>
                  <th>2</th>
                  <th>3</th>
                  <th>4</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td>Filipino</td>
                    <td id="filipino5_1"></td>
                    <td id="filipino5_2"></td>
                    <td id="filipino5_3"></td>
                    <td id="filipino5_4"></td>
                    <td id="filipino5_5"></td>
                    <td id="filstat5"></td>
                </tr>
                <tr>
                    <td>English</td>
                    <td id="english5_1"></td>
                    <td id="english5_2"></td>
                    <td id="english5_3"></td>
                    <td id="english5_4"></td>
                    <td id="english5_5"></td>
                    <td id="engstat5"></td>
                </tr>
                <tr>
                    <td>Mathematics</td>
                    <td id="mathematics5_1"></td>
                    <td id="mathematics5_2"> </td>
                    <td id="mathematics5_3"></td>
                    <td id="mathematics5_4"></td>
                    <td id="mathematics5_5"></td>
                    <td id="mathstat5"></td>
                </tr>
                <tr>
                    <td>Science</td>
                    <td id="science5_1"></td>
                    <td id="science5_2"></td>
                    <td id="science5_3"></td>
                    <td id="science5_4"> </td>
                    <td id="science5_5"></td>
                    <td id="scistat5"></td>
                </tr>
                <tr>
                    <td>Araling Panlipunan</td>
                    <td id="ap5_1"></td>
                    <td id="ap5_2"></td>
                    <td id="ap5_3"></td>
                    <td id="ap5_4"></td>
                    <td id="ap5_5"></td>
                    <td id="apstat5"></td>
                </tr>
                <tr>
                    <td>Edukasyon sa Pagpapakatao (ESP)</td>
                    <td id="esp5_1"></td>
                    <td id="esp5_2"></td>
                    <td id="esp5_3"></td>
                    <td id="esp5_4"></td>
                    <td id="esp5_5"></td>
                    <td id="espstat5"></td>
                </tr>
                <tr>
                    <td>Technology and Livelihood Education (TLE)</td>
                    <td id="tle5_1"></td>
                    <td id="tle5_2"></td>
                    <td id="tle5_3"></td>
                    <td id="tle5_4"></td>
                    <td id="tle5_5"></td>
                    <td id="tlestat5"></td>
                </tr>
                <tr>
                    <td>MAPEH</td>
                    <td id="mapeh5_1"></td>
                    <td id="mapeh5_2"></td>
                    <td id="mapeh5_3"></td>
                    <td id="mapeh5_4"></td>
                    <td id="mapeh5_5"></td>
                    <td id="mapehstat5"></td>
                </tr>
                <tr>
                    <td>Music</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Arts</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Physical Education</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Health</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">General Average</td>
                    <td></td>
                    <td></td>
                </tr>
              
                
              </tbody>
              
            </table>
            <table class="table table-bordered" style="border-color: black !important;">
                <thead>
                    <tr>
                        <th colspan="1">Remedial</th>
                        <th colspan="4">Conducted from (mm/dd/yyyy) <span style="display: inline-block; width: 200px; "></span> to (mm/dd/yyyy) <span style="display: inline-block; width: 200px; "></span></th>                       
                    </tr>
                    <tr>
                        <th width="200px">Learning Areas</th>
                        <th width="200px">Final Rating</th>
                        <th width="180px">Remedial Class Mark</th>
                        <th >Recomputed Final Grade</th>
                        <th  width="300px"></th>
                       
                    </tr>
                </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        
                    </tbody>
            </table>
            </div>
        </div>
    </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h1 class="modal-title fs-5" id="exampleModalLabel">Good Moral </h1> -->
      </div>
      <div class="modal-body">
        <form action="">
            <!-- <div class="form-group">
                <label for="">Student Name:</label>
                <input type="text" name="inputName" id="inputName" class="form-control">
            </div> -->
            <div class="form-group">
                <label for="">LRN No:</label>
                <input type="text" value="<?php echo $_SESSION['lrn_no']; ?>" name="" id="inputLRN" class="form-control" disabled>
            </div>
            <!-- <div class="form-group">
                <label for="">Grade Level:</label>
                <input type="text" name="" id="inputGradeLevel" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Section:</label>
                <input type="text" name="" id="inputSection" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Purpose:</label>
                <input type="text" name="" id="inputPurpose" class="form-control">
            </div> -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="form137()">Print</button>
      </div>
    </div>
  </div>
</div>

</script>
<script> 
    function form137() {
    var lrn_no = document.getElementById('inputLRN').value;
    $.ajax({
        url: 'admin/test2.php',
        method: 'POST',
        data: { lrn_no: lrn_no },
        success: function(data) {
            var lastName = document.getElementById('lastName');
            var firstName = document.getElementById('firstName');
            var middleName = document.getElementById('middleName');
            var lrnNo = document.getElementById('lrnNo');
            var birthdate = document.getElementById('birthdate');
            var sex = document.getElementById('sex');
            var sec1 = document.getElementById('section1');
            var sec2 = document.getElementById('section2');
            var sec3 = document.getElementById('section3');
            var sec4 = document.getElementById('section4');
            $('#schoolname1').text("Occidental Mindoro NHS");
            $('#schoolname2').text("Occidental Mindoro NHS");
            $('#schoolname3').text("Occidental Mindoro NHS");
            $('#schoolname4').text("Occidental Mindoro NHS");
            $('#schoolID1').text("301593");
            $('#schoolID2').text("301678");
            $('#schoolID3').text("301701");
            $('#schoolID4').text("301701");
            $('#District1').text('Mamburao')
            $('#District2').text('Mamburao')
            $('#District3').text('Mamburao')
            $('#District4').text('Mamburao')
            $('#Division1').text('Occidental Mindoro');
            $('#Division2').text('Occidental Mindoro');
            $('#Division3').text('Occidental Mindoro');
            $('#Division4').text('Occidental Mindoro');
            $('#Region1').text('IV-B')
            $('#Region2').text('IV-B')
            $('#Region3').text('IV-B')
            $('#Region4').text('IV-B')
            $('#cname').text(data.student_info.lastname + ", " + data.student_info.firstname + " " + data.student_info.middlename);
            $('#lrnNo1').text( data.student_info.lrn_no);
            $('#cschool').text('Occidental Mindoro NHS');
            $('#cschoolID').text('301701');
            // Set other elements as needed

            // Example: Set values from the received data
            lastName.textContent = data.student_info.lastname;
            firstName.textContent = data.student_info.firstname;
            middleName.textContent = data.student_info.middlename;
            lrnNo.textContent = data.student_info.lrn_no;

            // Assuming data.student_info.date_of_birth is a valid date string
            const rawDateOfBirth = data.student_info.date_of_birth;
            const date = new Date(rawDateOfBirth);

            const formattedDate =
                ("0" + (date.getMonth() + 1)).slice(-2) + "/" +
                ("0" + date.getDate()).slice(-2) + "/" +
                date.getFullYear();
                birthdate.textContent = formattedDate;
                sex.textContent = data.student_info.gender;
                // console.log(data);
                // Process the received JSON data
                // ... (Your existing code to update the UI with received data)
            for (const yearLevel in data.grades) {   
             // Access individual grades for this year level
            data.grades[yearLevel].forEach(grade => {
                // Grade 7
                if(yearLevel==1){
                    // Load the grade section once only
                    // console.log(grade.grade_section);
                    sec1.textContent = grade.grade_section;
                    if (grade.subject === "Filipino") { 
                        $("#filipino1_1").text(grade['1st_grading']);
                        $("#filipino1_2").text(grade['2nd_grading']);
                        $("#filipino1_3").text(grade['3rd_grading']);
                        $("#filipino1_4").text(grade['4th_grading']);
                        $("#filipino1_5").text(grade.final_grade);
                        $("#filstat1").text( grade.passed_failed);
                    }                 
                   
                    if (grade.subject === "English") { 
                        $("#english1_1").text(grade['1st_grading']);
                        $("#english1_2").text(grade['2nd_grading']);
                        $("#english1_3").text(grade['3rd_grading']);
                        $("#english1_4").text(grade['4th_grading']);
                        $("#english1_5").text(grade.final_grade);
                        $("#engstat1").text( grade.passed_failed);
                    }
                    if (grade.subject === "Mathematics") { 
                        $("#mathematics1_1").text(grade['1st_grading']);
                        $("#mathematics1_2").text(grade['2nd_grading']);
                        $("#mathematics1_3").text(grade['3rd_grading']);
                        $("#mathematics1_4").text(grade['4th_grading']);
                        $("#mathematics1_5").text(grade.final_grade);
                        $("#mathstat1").text( grade.passed_failed);

                    }
                    if (grade.subject === "Science") {
                        $("#science1_1").text(grade['1st_grading']);
                        $("#science1_2").text(grade['2nd_grading']);
                        $("#science1_3").text(grade['3rd_grading']);
                        $("#science1_4").text(grade['4th_grading']);
                        $("#science1_5").text(grade.final_grade);
                        $("#scistat1").text( grade.passed_failed);

                    }
                    if (grade.subject === "Araling Panlipunan") {
                        $("#ap1_1").text(grade['1st_grading']);
                        $("#ap1_2").text(grade['2nd_grading']);
                        $("#ap1_3").text(grade['3rd_grading']);
                        $("#ap1_4").text(grade['4th_grading']);
                        $("#ap1_5").text(grade.final_grade);
                        $("#apstat1").text( grade.passed_failed);

                    }
                    if (grade.subject === "ESP") {
                        $("#esp1_1").text(grade['1st_grading']);
                        $("#esp1_2").text(grade['2nd_grading']);
                        $("#esp1_3").text(grade['3rd_grading']);
                        $("#esp1_4").text(grade['4th_grading']);
                        $("#esp1_5").text(grade.final_grade);
                        $("#espstat1").text( grade.passed_failed);

                    }
                    if (grade.subject === "TLE") {
                        $("#tle1_1").text(grade['1st_grading']);
                        $("#tle1_2").text(grade['2nd_grading']);
                        $("#tle1_3").text(grade['3rd_grading']);
                        $("#tle1_4").text(grade['4th_grading']);
                        $("#tle1_5").text(grade.final_grade);
                        $("#tlestat1").text( grade.passed_failed);

                    }
                    if(grade.subject==="Music"){
                        $("#music1_1").text(grade['1st_grading']);
                        $("#music1_2").text(grade['2nd_grading']);
                        $("#music1_3").text(grade['3rd_grading']);
                        $("#music1_4").text(grade['4th_grading']);
                        $("#music1_5").text(grade.final_grade);
                        $("#musicstat1").text( grade.passed_failed)
                    }
                    if(grade.subject==="Arts"){
                        $("#arts1_1").text(grade['1st_grading']);
                        $("#arts1_2").text(grade['2nd_grading']);
                        $("#arts1_3").text(grade['3rd_grading']);
                        $("#arts1_4").text(grade['4th_grading']);
                        $("#arts1_5").text(grade.final_grade);
                        $("#artstat1").text( grade.passed_failed)
                    }
                    if(grade.subject==="PE"){
                        $("#pe1_1").text(grade['1st_grading']);
                        $("#pe1_2").text(grade['2nd_grading']);
                        $("#pe1_3").text(grade['3rd_grading']);
                        $("#pe1_4").text(grade['4th_grading']);
                        $("#pe1_5").text(grade.final_grade);
                        $("#pestat1").text( grade.passed_failed)
                    }
                    if(grade.subject==="Health"){
                        $("#health1_1").text(grade['1st_grading']);
                        $("#health1_2").text(grade['2nd_grading']);
                        $("#health1_3").text(grade['3rd_grading']);
                        $("#health1_4").text(grade['4th_grading']);
                        $("#health1_5").text(grade.final_grade);
                        $("#healthstat1").text( grade.passed_failed)
                    }
                    var m1=parseFloat($("#music1_1").text());
                    var a1 =parseFloat($("#arts1_1").text());
                    var pe1=parseFloat($("#pe1_1").text());
                    var h1=parseFloat($("#health1_1").text());

                    var m2=parseFloat($("#music1_2").text());
                    var a2 =parseFloat($("#arts1_2").text());
                    var pe2=parseFloat($("#pe1_2").text());
                    var h2=parseFloat($("#health1_2").text());

                    var m3=parseFloat($("#music1_3").text());
                    var a3 =parseFloat($("#arts1_3").text());
                    var pe3=parseFloat($("#pe1_3").text());
                    var h3=parseFloat($("#health1_3").text());

                    var m4=parseFloat($("#music1_4").text());
                    var a4 =parseFloat($("#arts1_4").text());
                    var pe4=parseFloat($("#pe1_4").text());
                    var h4=parseFloat($("#health1_4").text());

                    var m5=parseFloat($("#music1_5").text());
                    var a5 =parseFloat($("#arts1_5").text());
                    var pe5=parseFloat($("#pe1_5").text());
                    var h5=parseFloat($("#health1_5").text());
                    
                    $("#mapeh1_1").text(Math.round((m1 + a1 + pe1 + h1) / 4));
                    $("#mapeh1_2").text(Math.round((m2 + a2 + pe2 + h2) / 4));
                    $("#mapeh1_3").text(Math.round((m3 + a3 + pe3 + h3) / 4));
                    $("#mapeh1_4").text(Math.round((m4 + a4 + pe4 + h4) / 4));
                    $("#mapeh1_5").text(Math.round((m5 + a5 + pe5 + h5) / 4));
                    if(parseFloat($("#mapeh1_5").text())>=75){
                        $("#mapehstat1").text("Passed")
                    }
                    else{
                        $("#mapehstat1").text("Failed")
                    }
                    
                    // Assuming grade.final_grade contains numeric values
                    var fil1 = parseFloat($("#filipino1_5").text());
                    var eng1 = parseFloat($("#english1_5").text());
                    var math1 = parseFloat($("#mathematics1_5").text());
                    var sci1 = parseFloat($("#science1_5").text());
                    var ap1 = parseFloat($("#ap1_5").text());

                    // Calculate the average
                    var average = (fil1 + eng1 + math1 + sci1 + ap1) / 5;

                    // Update the text content of the element with ID "ga1" with the calculated average
                    $('#ga1').text(average);
                    if(parseFloat($("#ga1").text())>=75)   {
                        $('#ga1stat').text("Promoted");
                    }                 
                }
                // Grade 8
                else if(yearLevel==2){
                    sec2.textContent=grade.grade_section;
                    if (grade.subject === "Filipino") {
                        $("#filipino2_1").text(grade['1st_grading']);
                        $("#filipino2_2").text(grade['2nd_grading']);
                        $("#filipino2_3").text(grade['3rd_grading']);
                        $("#filipino2_4").text(grade['4th_grading']);
                        $("#filipino2_5").text(grade.final_grade);
                        $("#filstat2").text( grade.passed_failed);
                    }                 
                   
                    if (grade.subject === "English") {
                        $("#english2_1").text(grade['1st_grading']);
                        $("#english2_2").text(grade['2nd_grading']);
                        $("#english2_3").text(grade['3rd_grading']);
                        $("#english2_4").text(grade['4th_grading']);
                        $("#english2_5").text(grade.final_grade);
                        $("#engstat2").text( grade.passed_failed);
                    }
                    if (grade.subject === "Mathematics") { 
                        $("#mathematics2_1").text(grade['1st_grading']);
                        $("#mathematics2_2").text(grade['2nd_grading']);
                        $("#mathematics2_3").text(grade['3rd_grading']);
                        $("#mathematics2_4").text(grade['4th_grading']);
                        $("#mathematics2_5").text(grade.final_grade);
                        $("#mathstat2").text( grade.passed_failed);
                    }
                    if (grade.subject === "Science") {
                        $("#science2_1").text(grade['1st_grading']);
                        $("#science2_2").text(grade['2nd_grading']);
                        $("#science2_3").text(grade['3rd_grading']);
                        $("#science2_4").text(grade['4th_grading']);
                        $("#science2_5").text(grade.final_grade);
                        $("#scistat2").text( grade.passed_failed);
                    }
                    if (grade.subject === "ESP") {
                        $("#esp2_1").text(grade['1st_grading']);
                        $("#esp2_2").text(grade['2nd_grading']);
                        $("#esp2_3").text(grade['3rd_grading']);
                        $("#esp2_4").text(grade['4th_grading']);
                        $("#esp2_5").text(grade.final_grade);
                        $("#espstat2").text( grade.passed_failed);

                    }
                    if (grade.subject === "Araling Panlipunan" ) { 
                        $("#ap2_1").text(grade['1st_grading']);
                        $("#ap2_2").text(grade['2nd_grading']);
                        $("#ap2_3").text(grade['3rd_grading']);
                        $("#ap2_4").text(grade['4th_grading']);
                        $("#ap2_5").text(grade.final_grade);
                        $("#apstat2").text( grade.passed_failed);
                    }
                    
                    if (grade.subject === "TLE") {
                        $("#tle2_1").text(grade['1st_grading']);
                        $("#tle2_2").text(grade['2nd_grading']);
                        $("#tle2_3").text(grade['3rd_grading']);
                        $("#tle2_4").text(grade['4th_grading']);
                        $("#tle2_5").text(grade.final_grade);
                        $("#tlestat2").text( grade.passed_failed);
                    }
                    if(grade.subject==="Music"){
                        $("#music2_1").text(grade['1st_grading']);
                        $("#music2_2").text(grade['2nd_grading']);
                        $("#music2_3").text(grade['3rd_grading']);
                        $("#music2_4").text(grade['4th_grading']);
                        $("#music2_5").text(grade.final_grade);
                        $("#musicstat2").text( grade.passed_failed)
                    }
                    if(grade.subject==="Arts"){
                        $("#arts2_1").text(grade['1st_grading']);
                        $("#arts2_2").text(grade['2nd_grading']);
                        $("#arts2_3").text(grade['3rd_grading']);
                        $("#arts2_4").text(grade['4th_grading']);
                        $("#arts2_5").text(grade.final_grade);
                        $("#artstat2").text( grade.passed_failed)
                    }
                    if(grade.subject==="PE"){
                        $("#pe2_1").text(grade['1st_grading']);
                        $("#pe2_2").text(grade['2nd_grading']);
                        $("#pe2_3").text(grade['3rd_grading']);
                        $("#pe2_4").text(grade['4th_grading']);
                        $("#pe2_5").text(grade.final_grade);
                        $("#pestat2").text( grade.passed_failed)
                    }
                    if(grade.subject==="Health"){
                        $("#health2_1").text(grade['1st_grading']);
                        $("#health2_2").text(grade['2nd_grading']);
                        $("#health2_3").text(grade['3rd_grading']);
                        $("#health2_4").text(grade['4th_grading']);
                        $("#health2_5").text(grade.final_grade);
                        $("#healthstat2").text( grade.passed_failed)
                    }
                    var m2_1=parseFloat($("#music2_1").text());
                    var a2_1 =parseFloat($("#arts2_1").text());
                    var pe2_1=parseFloat($("#pe2_1").text());
                    var h2_1=parseFloat($("#health2_1").text());

                    var m2_2=parseFloat($("#music2_2").text());
                    var a2_2 =parseFloat($("#arts2_2").text());
                    var pe2_2=parseFloat($("#pe2_2").text());
                    var h2_2=parseFloat($("#health2_2").text());

                    var m2_3=parseFloat($("#music2_3").text());
                    var a2_3 =parseFloat($("#arts2_3").text());
                    var pe2_3=parseFloat($("#pe2_3").text());
                    var h2_3=parseFloat($("#health2_3").text());

                    var m2_4=parseFloat($("#music2_4").text());
                    var a2_4 =parseFloat($("#arts2_4").text());
                    var pe2_4=parseFloat($("#pe2_4").text());
                    var h2_4=parseFloat($("#health2_4").text());

                    var m2_5=parseFloat($("#music2_5").text());
                    var a2_5 =parseFloat($("#arts2_5").text());
                    var pe2_5=parseFloat($("#pe2_5").text());
                    var h2_5=parseFloat($("#health2_5").text());
                    // if (grade.subject === "MAPEH") {
                    $("#mapeh2_1").text(Math.round((m2_1 + a2_1 + pe2_1 + h2_1) / 4));
                    $("#mapeh2_2").text(Math.round((m2_2 + a2_2 + pe2_2 + h2_2) / 4));
                    $("#mapeh2_3").text(Math.round((m2_3 + a2_3 + pe2_3 + h2_3) / 4));
                    $("#mapeh2_4").text(Math.round((m2_4 + a2_4 + pe2_4 + h2_4) / 4));
                    $("#mapeh2_5").text(Math.round((m2_5 + a2_5 + pe2_5 + h2_5) / 4));
                    if(parseFloat($("#mapeh2_5").text())>=75){
                        $("#mapehstat2").text("Passed")
                    }
                    else{
                        $("#mapehstat2").text("Failed")
                    }
                    // var eng2 = parseFloat($("#english2_5").text());
                    // console.log(eng2);
                    // Assuming grade.final_grade contains numeric values
                    var fil2 = parseFloat($("#filipino2_5").text());
                    var eng2 = parseFloat($("#english2_5").text());
                    var math2 = parseFloat($("#mathematics2_5").text());
                    var sci2 = parseFloat($("#science2_5").text());
                    var ap2 = parseFloat($("#ap2_5").text());
                    // Calculate the average
                    var average = (fil2 + eng2 + math2 + sci2 + ap2) / 5;
                    console.log(average);
                    // Update the text content of the element with ID "ga1" with the calculated average
                    $('#ga2').text(average);
                    if(parseFloat($("#ga2").text())>=75)   {
                        $('#ga2stat').text("Promoted");
                    }      
                }
                // Year 3
                else if(yearLevel==3){
                    sec3.textContent=grade.grade_section;
                    if (grade.subject === "Filipino") {
                        $("#filipino3_1").text(grade['1st_grading']);
                        $("#filipino3_2").text(grade['2nd_grading']);
                        $("#filipino3_3").text(grade['3rd_grading']);
                        $("#filipino3_4").text(grade['4th_grading']);
                        $("#filipino3_5").text(grade.final_grade);
                        $("#filstat3").text( grade.passed_failed);
                    }                 
                   
                    if (grade.subject === "English") {
                        $("#english3_1").text(grade['1st_grading']);
                        $("#english3_2").text(grade['2nd_grading']);
                        $("#english3_3").text(grade['3rd_grading']);
                        $("#english3_4").text(grade['4th_grading']);
                        $("#english3_5").text(grade.final_grade);
                        $("#engstat3").text( grade.passed_failed);
                    }
                    if (grade.subject === "Mathematics") { 
                        $("#mathematics3_1").text(grade['1st_grading']);
                        $("#mathematics3_2").text(grade['2nd_grading']);
                        $("#mathematics3_3").text(grade['3rd_grading']);
                        $("#mathematics3_4").text(grade['4th_grading']);
                        $("#mathematics3_5").text(grade.final_grade);
                        $("#mathstat3").text( grade.passed_failed);
                    }
                    if (grade.subject === "Science") {
                        $("#science3_1").text(grade['1st_grading']);
                        $("#science3_2").text(grade['2nd_grading']);
                        $("#science3_3").text(grade['3rd_grading']);
                        $("#science3_4").text(grade['4th_grading']);
                        $("#science3_5").text(grade.final_grade);
                        $("#scistat3").text( grade.passed_failed);
                    }
                    if (grade.subject === "ESP") {
                        $("#esp3_1").text(grade['1st_grading']);
                        $("#esp3_2").text(grade['2nd_grading']);
                        $("#esp3_3").text(grade['3rd_grading']);
                        $("#esp3_4").text(grade['4th_grading']);
                        $("#esp3_5").text(grade.final_grade);
                        $("#espstat3").text( grade.passed_failed);

                    }
                    if (grade.subject === "Araling Panlipunan" ) { 
                        $("#ap3_1").text(grade['1st_grading']);
                        $("#ap3_2").text(grade['2nd_grading']);
                        $("#ap3_3").text(grade['3rd_grading']);
                        $("#ap3_4").text(grade['4th_grading']);
                        $("#ap3_5").text(grade.final_grade);
                        $("#apstat3").text( grade.passed_failed);
                    }
                    if (grade.subject === "TLE") {
                        $("#tle3_1").text(grade['1st_grading']);
                        $("#tle3_2").text(grade['2nd_grading']);
                        $("#tle3_3").text(grade['3rd_grading']);
                        $("#tle3_4").text(grade['4th_grading']);
                        $("#tle3_5").text(grade.final_grade);
                        $("#tlestat3").text( grade.passed_failed);
                    }
                    if(grade.subject==="Music"){
                        $("#music3_1").text(grade['1st_grading']);
                        $("#music3_2").text(grade['2nd_grading']);
                        $("#music3_3").text(grade['3rd_grading']);
                        $("#music3_4").text(grade['4th_grading']);
                        $("#music3_5").text(grade.final_grade);
                        $("#musicstat3").text( grade.passed_failed)
                    }
                    if(grade.subject==="Arts"){
                        $("#arts3_1").text(grade['1st_grading']);
                        $("#arts3_2").text(grade['2nd_grading']);
                        $("#arts3_3").text(grade['3rd_grading']);
                        $("#arts3_4").text(grade['4th_grading']);
                        $("#arts3_5").text(grade.final_grade);
                        $("#artstat3").text( grade.passed_failed)
                    }
                    if(grade.subject==="PE"){
                        $("#pe3_1").text(grade['1st_grading']);
                        $("#pe3_2").text(grade['2nd_grading']);
                        $("#pe3_3").text(grade['3rd_grading']);
                        $("#pe3_4").text(grade['4th_grading']);
                        $("#pe3_5").text(grade.final_grade);
                        $("#pestat3").text( grade.passed_failed)
                    }
                    if(grade.subject==="Health"){
                        $("#health3_1").text(grade['1st_grading']);
                        $("#health3_2").text(grade['2nd_grading']);
                        $("#health3_3").text(grade['3rd_grading']);
                        $("#health3_4").text(grade['4th_grading']);
                        $("#health3_5").text(grade.final_grade);
                        $("#healthstat3").text( grade.passed_failed)
                    }
                    var m3_1=parseFloat($("#music3_1").text());
                    var a3_1 =parseFloat($("#arts3_1").text());
                    var pe3_1=parseFloat($("#pe3_1").text());
                    var h3_1=parseFloat($("#health3_1").text());

                    var m3_2=parseFloat($("#music3_2").text());
                    var a3_2 =parseFloat($("#arts3_2").text());
                    var pe3_2=parseFloat($("#pe3_2").text());
                    var h3_2=parseFloat($("#health3_2").text());

                    var m3_3=parseFloat($("#music3_3").text());
                    var a3_3 =parseFloat($("#arts3_3").text());
                    var pe3_3=parseFloat($("#pe3_3").text());
                    var h3_3=parseFloat($("#health3_3").text());

                    var m3_4=parseFloat($("#music3_4").text());
                    var a3_4 =parseFloat($("#arts3_4").text());
                    var pe3_4=parseFloat($("#pe3_4").text());
                    var h3_4=parseFloat($("#health3_4").text());

                    var m3_5=parseFloat($("#music3_5").text());
                    var a3_5 =parseFloat($("#arts3_5").text());
                    var pe3_5=parseFloat($("#pe3_5").text());
                    var h3_5=parseFloat($("#health3_5").text());
                    // if (grade.subject === "MAPEH") {
                    $("#mapeh3_1").text(Math.round((m3_1 + a3_1 + pe3_1 + h3_1) / 4));
                    $("#mapeh3_2").text(Math.round((m3_2 + a3_2 + pe3_2 + h3_2) / 4));
                    $("#mapeh3_3").text(Math.round((m3_3 + a3_3 + pe3_3 + h3_3) / 4));
                    $("#mapeh3_4").text(Math.round((m3_4 + a3_4 + pe3_4 + h3_4) / 4));
                    $("#mapeh3_5").text(Math.round((m3_5 + a3_5 + pe3_5 + h3_5) / 4));
                    if(parseFloat($("#mapeh3_5").text())>=75){
                        $("#mapehstat3").text("Passed")
                    }
                    else{
                        $("#mapehstat3").text("Failed")
                    }
                    
                    // Assuming grade.final_grade contains numeric values
                    var fil3 = parseFloat($("#filipino3_5").text());
                    var eng3 = parseFloat($("#english3_5").text());
                    var math3 = parseFloat($("#mathematics3_5").text());
                    var sci3 = parseFloat($("#science3_5").text());
                    var ap3 = parseFloat($("#ap3_5").text());

                    // Calculate the average
                    var average3 = (fil3 + eng3 + math3 + sci3 + ap3) / 5;

                    // Update the text content of the element with ID "ga1" with the calculated average
                    $('#ga3').text(average3);
                    if(parseFloat($("#ga3").text())>=75)   {
                        $('#ga3stat').text("Promoted");
                    }  
                }

                // Year 4
                else if(yearLevel==4){
                    sec4.textContent=grade.grade_section;
                    if (grade.subject === "Filipino") {
                        $("#filipino4_1").text(grade['1st_grading']);
                        $("#filipino4_2").text(grade['2nd_grading']);
                        $("#filipino4_3").text(grade['3rd_grading']);
                        $("#filipino4_4").text(grade['4th_grading']);
                        $("#filipino4_5").text(grade.final_grade);
                        $("#filstat4").text( grade.passed_failed);
                    }                 
                   
                    if (grade.subject === "English") {
                        $("#english4_1").text(grade['1st_grading']);
                        $("#english4_2").text(grade['2nd_grading']);
                        $("#english4_3").text(grade['3rd_grading']);
                        $("#english4_4").text(grade['4th_grading']);
                        $("#english4_5").text(grade.final_grade);
                        $("#engstat4").text( grade.passed_failed);
                    }
                    if (grade.subject === "Mathematics") { 
                        $("#mathematics4_1").text(grade['1st_grading']);
                        $("#mathematics4_2").text(grade['2nd_grading']);
                        $("#mathematics4_3").text(grade['3rd_grading']);
                        $("#mathematics4_4").text(grade['4th_grading']);
                        $("#mathematic4_5").text(grade.final_grade);
                        $("#mathstat4").text( grade.passed_failed);
                    }
                    if (grade.subject === "Science") {
                        $("#science4_1").text(grade['1st_grading']);
                        $("#science4_2").text(grade['2nd_grading']);
                        $("#science4_3").text(grade['3rd_grading']);
                        $("#science4_4").text(grade['4th_grading']);
                        $("#science4_5").text(grade.final_grade);
                        $("#scistat4").text( grade.passed_failed);
                    }
                    if (grade.subject === "ESP") {
                        $("#esp4_1").text(grade['1st_grading']);
                        $("#esp4_2").text(grade['2nd_grading']);
                        $("#esp4_3").text(grade['3rd_grading']);
                        $("#esp4_4").text(grade['4th_grading']);
                        $("#esp4_5").text(grade.final_grade);
                        $("#espstat4").text( grade.passed_failed);

                    }
                    if (grade.subject === "Araling Panlipunan" ) { 
                        $("#ap4_1").text(grade['1st_grading']);
                        $("#ap4_2").text(grade['2nd_grading']);
                        $("#ap4_3").text(grade['3rd_grading']);
                        $("#ap4_4").text(grade['4th_grading']);
                        $("#ap4_5").text(grade.final_grade);
                        $("#apstat4").text( grade.passed_failed);
                    }
                    
                    if (grade.subject === "TLE") {
                        $("#tle4_1").text(grade['1st_grading']);
                        $("#tle4_2").text(grade['2nd_grading']);
                        $("#tle4_3").text(grade['3rd_grading']);
                        $("#tle4_4").text(grade['4th_grading']);
                        $("#tle4_5").text(grade.final_grade);
                        $("#tlestat4").text( grade.passed_failed);
                    }
                    if(grade.subject==="Music"){
                        $("#music4_1").text(grade['1st_grading']);
                        $("#music4_2").text(grade['2nd_grading']);
                        $("#music4_3").text(grade['3rd_grading']);
                        $("#music4_4").text(grade['4th_grading']);
                        $("#music4_5").text(grade.final_grade);
                        $("#musicstat4").text( grade.passed_failed)
                    }
                    if(grade.subject==="Arts"){
                        $("#arts4_1").text(grade['1st_grading']);
                        $("#arts4_2").text(grade['2nd_grading']);
                        $("#arts4_3").text(grade['3rd_grading']);
                        $("#arts4_4").text(grade['4th_grading']);
                        $("#arts4_5").text(grade.final_grade);
                        $("#artstat4").text( grade.passed_failed)
                    }
                    if(grade.subject==="PE"){
                        $("#pe4_1").text(grade['1st_grading']);
                        $("#pe4_2").text(grade['2nd_grading']);
                        $("#pe4_3").text(grade['3rd_grading']);
                        $("#pe4_4").text(grade['4th_grading']);
                        $("#pe4_5").text(grade.final_grade);
                        $("#pestat4").text( grade.passed_failed)
                    }
                    if(grade.subject==="Health"){
                        $("#health4_1").text(grade['1st_grading']);
                        $("#health4_2").text(grade['2nd_grading']);
                        $("#health4_3").text(grade['3rd_grading']);
                        $("#health4_4").text(grade['4th_grading']);
                        $("#health4_5").text(grade.final_grade);
                        $("#healthstat4").text( grade.passed_failed)
                    }
                    
                    var m4_1=parseFloat($("#music4_1").text());
                    var a4_1 =parseFloat($("#arts4_1").text());
                    var pe4_1=parseFloat($("#pe4_1").text());
                    var h4_1=parseFloat($("#health4_1").text());

                    var m4_2=parseFloat($("#music4_2").text());
                    var a4_2 =parseFloat($("#arts4_2").text());
                    var pe4_2=parseFloat($("#pe4_2").text());
                    var h4_2=parseFloat($("#health4_2").text());

                    var m4_3=parseFloat($("#music4_3").text());
                    var a4_3 =parseFloat($("#arts4_3").text());
                    var pe4_3=parseFloat($("#pe4_3").text());
                    var h4_3=parseFloat($("#health4_3").text());

                    var m3_4=parseFloat($("#music4_4").text());
                    var a3_4 =parseFloat($("#arts4_4").text());
                    var pe3_4=parseFloat($("#pe4_4").text());
                    var h3_4=parseFloat($("#health4_4").text());

                    var m4_5=parseFloat($("#music4_5").text());
                    var a4_5 =parseFloat($("#arts4_5").text());
                    var pe4_5=parseFloat($("#pe4_5").text());
                    var h4_5=parseFloat($("#health4_5").text());
                    // if (grade.subject === "MAPEH") {
                    $("#mapeh4_1").text(Math.round((m4_1 + a4_1 + pe4_1 + h4_1) / 4));
                    $("#mapeh4_2").text(Math.round((m4_2 + a4_2 + pe4_2 + h4_2) / 4));
                    $("#mapeh4_3").text(Math.round((m4_3 + a4_3 + pe4_3 + h4_3) / 4));
                    $("#mapeh4_4").text(Math.round((m4_4 + a4_4 + pe4_4 + h4_4) / 4));
                    $("#mapeh4_5").text(Math.round((m4_5 + a4_5 + pe4_5 + h4_5) / 4));
                    if(parseFloat($("#mapeh4_5").text())>=75){
                        $("#mapehstat4").text("Passed")
                    }
                    else{
                        $("#mapehstat4").text("Failed")
                    }
                    
                    // Assuming grade.final_grade contains numeric values
                    var fil4 = parseFloat($("#filipino4_5").text());
                    var eng4 = parseFloat($("#english4_5").text());
                    var math4 = parseFloat($("#mathematics4_5").text());
                    var sci4 = parseFloat($("#science4_5").text());
                    var ap4 = parseFloat($("#ap4_5").text());

                    // Calculate the average
                    var average4 = (fil4 + eng4 + math4 + sci4+ ap4) / 5;

                    // Update the text content of the element with ID "ga1" with the calculated average
                    $('#ga4').text(average4);
                    if(parseFloat($("#ga4").text())>=75)   {
                        $('#ga4stat').text("Promoted");
                    }  
                }

                // 
    
            });
        }
        // $("#ex")
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('There has been a problem with your ajax request:', errorThrown);
        }
    //     $("#exampleModal").on('hidden.bs.modal', function (e) {
    //     window.print();
    // });
    //     $("#exampleModal").modal("hide");
    })
    .done(function() {
    // This block will execute regardless of success or error
    $("#exampleModal").on('hidden.bs.modal', function (e) {
        //  $('#inputLRN').text()="";
        $('#inputLRN').val("");
        window.print();
    });
    $("#exampleModal").modal("hide");
   
});
  
}

</script>
<?php
include ('include/db_connection.php');


if (isset($_GET['diploma_lrn'])) {
  $lrn_no = $_GET['diploma_lrn'];

  $query = $conn->query("SELECT * FROM `tbl_student_info` WHERE lrn_no = '$lrn_no'");
  $row = $query->fetch_array();
  if ($query) {

    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $section = $row['section'];
    $year_level = $row['year_level'];

    $middleInitial = !empty($row['middlename']) ? strtoupper(substr($row['middlename'], 0, 1)) . '.' : '';

    // Add the complete name
    $complete_name = $row['firstname'] . ' ' . $middleInitial . ' ' . $row['lastname'];
    // echo $complete_name;


    //Settings
    $query1 = $conn->query("SELECT * FROM `tbl_signatory`");
    $row1 = $query1->fetch_array();

    $Punong_guro = $row1['head_name'];
    $principal = $row1['principal_name'];
    $school_manager = $row1['school_manager'];
    $araw = $row1['araw'];
    $buwan = $row1['buwan'];
    $day = $row1['day'];
    $month = $row1['month'];
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="assets/bootstrap-5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">

  <link rel="icon" type="image/x-icon" href="images/logo_ori.png">
  <title>Diploma</title>

</head>

<body>

  <div class="row" id="diplomaprint">
    <canvas id="certificateCanvas" width="1100" height="850"></canvas>
  </div>

  <input type="hidden" id="inputName" value="<?php echo $complete_name ?>" name="lrn_list" class="form-control" />
  <input type="hidden" name="" id="araw" value="<?php echo $araw; ?>" class="form-control">
  <input type="hidden" name="" id="buwan" value="<?php echo $buwan; ?>" class="form-control">
  <input type="hidden" name="" id="dday" value="<?php echo $day; ?>" class="form-control">

  <input type="hidden" name="" id="mmonth" value="<?php echo $month; ?>" class="form-control">
  <input type="hidden" name="inputName1" id="inputSName1" value="<?php echo $Punong_guro; ?>" class="form-control">
  <input type="hidden" name="inputName2" id="inputSName2" value="<?php echo $principal; ?>" class="form-control">
  <input type="hidden" name="inputName3" id="inputSName3" value="<?php echo $school_manager; ?>" class="form-control">


  <script type="text/javascript" src="assets/jquery/jquery-3.7.1.js"></script>

  <script>
    // updateName();
    var canvas = document.getElementById('certificateCanvas');
    var ctx = canvas.getContext('2d');

    // Certificate background
    ctx.fillStyle = '#f0f0f0';
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    // Function to center text horizontally on the canvas
    function centerText(text, y) {
      var textWidth = ctx.measureText(text).width;
      var x = (canvas.width - textWidth) / 2;
      ctx.fillText(text, x, y);
    }

    function drawJustifiedText(ctx, text, x, y, maxWidth, lineHeight) {
      let words = text.split(' ');
      let line = '';

      for (let i = 0; i < words.length; i++) {
        let testLine = line + words[i] + ' ';
        let testWidth = ctx.measureText(testLine).width;
        if (testWidth > maxWidth && i > 0) {
          ctx.fillText(line, x, y);
          line = words[i] + ' ';
          y += lineHeight;
        } else {
          line = testLine;
        }
      }
      ctx.fillText(line, x, y);
    }


    // Certificate header
    ctx.fillStyle = '#000';
    ctx.font = 'bold 13px Times New Roman';
    centerText('REPUBLIKA NG PILIPINAS', 50);
    centerText('Republic of the Philippines', 65);
    centerText('KAGWAWARAN NG EDUKASYON', 85);
    centerText('Department of Education', 105);
    centerText('REHIYON IV - MIMAROPA', 125);
    centerText('Region IV - Mimaropa', 145);
    centerText('SANGAY NG OKSIDENTAL MINDORO', 165);
    centerText('Division of Occidental Mindoro', 185);

    function centerImage(img, y, width, height) {
      var aspectRatio = img.width / img.height;
      var newWidth = width || canvas.width; // Set a default width if not provided
      var newHeight = height || newWidth / aspectRatio;

      var x = (canvas.width - newWidth) / 2;
      ctx.drawImage(img, x, y, newWidth, newHeight);
    }


    var certificateImg1 = new Image();
    certificateImg1.onload = function() {
      // Draw the image (assuming the image is loaded properly)
      centerImage(certificateImg1, 190, 1100, 200);
    };
    certificateImg1.src = 'form/Layer_2-nbg.png'; // Replace 'certificate_image_path.png' with your image path


    // Adjust font styles and content for the certificate
    ctx.font = '19px Old English Text MT';
    centerText('Pinapatunayan na si', 410);

    ctx.font = '12px Times New Roman';
    centerText('THIS      CERTIFIES       THAT', 425);

    // Certificate Content
    ctx.font = '27.5px Brush Script MT';
    centerText('ay   maluwalhating    nakatapos    ng    kurso     sa    Sekundarya     na    itinakda    para    sa    mataas', 500);
    ctx.font = '19px Times New Roman';
    centerText('HAS   SATISFACTORILY   COMPLETED   THESE    SECONDARY    COURSE    AS    PRESCRIBED    FOR    SECONDARY', 520);
    ctx.font = '27.5px Brush Script MT';
    centerText('na     paaralan      ng      Kagawaran      ng      Edukasyon,      kaya     pinagkalooban     siya      nitong', 540);
    ctx.font = '19px Times New Roman';
    centerText('SCHOOLS      BY      THE      DEPARTMENT      OF      EDUCATION,      AND      THEREFORE      IS      AWARDED      THIS', 560);
    // Load the image
    var certificateImg = new Image();
    certificateImg.onload = function() {
      // Draw the image (assuming the image is loaded properly)
      centerImage(certificateImg, 565, 200, 50);
    };
    certificateImg.src = 'form/Layer 4.png'; // Replace 'certificate_image_path.png' with your image path


    // Assuming ctx is your canvas context
    ctx.font = '27.5px Brush Script MT';
    drawJustifiedText(ctx, 'Nilagdaan     sa     Mamburao     Kanlurang     Mindoro,     Pilipinas     ngayong', 50, 635, 900, 20);
    ctx.font = '19px Times New Roman';
    drawJustifiedText(ctx, 'SIGNED              AT          MAMBURAO,          OCCIDENTAL          MINDORO,          PHILIPPINES', 50, 655, 900, 15);

    // Function to draw an image next to the text
    function drawImageNextToText(img, x, y, width, height) {
      ctx.drawImage(img, x, y, width, height);
    }

    // Load the image
    var certificateImg2 = new Image();
    certificateImg2.onload = function() {
      // Draw the image next to the text
      drawImageNextToText(certificateImg2, 850, 590, 175, 175);
    };
    certificateImg2.src = 'form/Layer 3.png';

    // Function to draw a formal signature with title centered underneath
    function drawFormalSignature(name, title, x, y) {
      ctx.font = 'bold 19px "Times New Roman"'; // Adjust the font style and size as needed
      ctx.fillStyle = '#000'; // Adjust the text color as needed

      // Draw the name
      var nameWidth = ctx.measureText(name).width;
      ctx.fillText(name, x, y);

      // Calculate the center position for the title
      var titleWidth = ctx.measureText(title).width;
      var titleX = x + (nameWidth - titleWidth) / 2;

      // Draw the title centered underneath
      ctx.font = '16px "Times New Roman"'; // Adjust the font style and size for the title
      ctx.fillText(title, titleX, y + 20); // Adjust the vertical offset for the title
    }

    // Function to update the student name on the canvas

    var student_lrn = document.getElementById('inputName').value;

    ctx.font = '48px Times New Roman';
    // studentName = data.completeName;
    studentName = student_lrn;
    // Set the background color
    ctx.fillStyle = '#f0f0f0';
    // Set the fill style for the text
    ctx.fillStyle = 'black';
    var textWidth = ctx.measureText(studentName).width;
    var x = (canvas.width - textWidth) / 2;
    var y = 470;
    // Draw the text
    ctx.fillText(studentName, x, y);
    // Draw the underline
    ctx.beginPath();
    ctx.moveTo(x, y + 5); // Underline offset
    ctx.lineTo(x + textWidth, y + 5); // Underline offset
    ctx.stroke();


    function convertToUpperCase(inputElement) {
      inputElement.value = inputElement.value.toUpperCase();
    }
    // Function to get Tagalog words for numbers
    function numberToWords(number) {
      const units = ['', 'Isa', 'Dalawa', 'Tatlo', 'Apat', 'Lima', 'Sais', 'Pito', 'Walo', 'Nwebe'];
      const tens = ['', 'Labing', 'Dalawampu', 'Tatlumpu', 'Apatnapu', 'Limampu', 'Saisnapu', 'Pitumpu', 'Walumpu', 'Nwebenta'];

      if (number >= 0 && number <= 99) {
        const unitDigit = number % 10;
        const tenDigit = Math.floor(number / 10);

        const unitWord = units[unitDigit];
        const tenWord = tens[tenDigit];

        if (tenDigit === 1) {
          return `${tenWord}${unitWord !== '' ? ` ${unitWord}` : ''}`;
        } else {
          return `${tenWord !== '' ? `${tenWord} ` : ''}${unitWord}`;
        }
      }

      return 'Unknown';
    }

    const currentYear = new Date().getFullYear() % 100; // Get the last two digits of the year
    const tagalogWords = numberToWords(currentYear);
    // Function to convert a number to English words
    function numberToEnglishWords(number) {
      const ones = ['', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine'];
      const teens = ['Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'];
      const tens = ['', 'Ten', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];

      if (number === 0) {
        return 'Zero';
      }

      if (number < 10) {
        return ones[number];
      } else if (number < 20) {
        return teens[number - 11];
      } else {
        const unitDigit = number % 10;
        const tenDigit = Math.floor(number / 10);
        return tens[tenDigit] + (unitDigit > 0 ? ' ' + ones[unitDigit] : '');
      }
    }

    // Get the current year
    // const currentYear = new Date().getFullYear();

    // Convert the current year to English words
    const englishWords = numberToEnglishWords(currentYear);


    // function updateSignatories() {
    var sign1 = document.getElementById('inputSName1').value;
    var sign2 = document.getElementById('inputSName2').value;
    var sign3 = document.getElementById('inputSName3').value;
    var araw = document.getElementById('araw').value;
    var buwan = document.getElementById('buwan').value;
    var month = document.getElementById('mmonth').value;
    var dday = document.getElementById('dday').value;
    ctx.font = '27.5px Brush Script MT';
    drawJustifiedText(ctx, 'ika   -   ' + araw + '   ng   ' + buwan + ',  Dalawang   Libo    at    ' + tagalogWords + '', 50, 675, 900, 20);
    ctx.font = '19px Times New Roman';
    drawJustifiedText(ctx, 'THIS    ' + dday + '     DAY      OF      ' + month + '      TWO     THOUSAND      AND      ' + englishWords.toUpperCase() + '.', 50, 695, 900, 25);

    drawFormalSignature(sign1, 'Punong-Guro', 50, 745);
    drawFormalSignature(sign2, 'Principal II', 50, 800);
    drawFormalSignature(sign3, 'Tagapamanihala ng mga Paaralan', 700, 745);
    drawFormalSignature('LOIDA P. ADORNADO, PhD, CESO VI', 'Assistant Schools Division Superintendent', 600, 800);
    // }

    window.print();
  </script>

</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <title>Grade Calculator</title>
</head>

<body>
    <form id="gradeForm">
        <label for="test1">Test 1:</label>
        <input type="number" id="test1" name="test1" min="0" max="100" required>
        <br>
        <label for="test2">Test 2:</label>
        <input type="number" id="test2" name="test2" min="0" max="100" required>
        <br>
        <label for="test3">Test 3:</label>
        <input type="number" id="test3" name="test3" min="0" max="100" required>
        <br>
        <label for="test4">Test 4:</label>
        <input type="number" id="test4" name="test4" min="0" max="100" required>
        <br>
    </form>

    <h2 id="grade"></h2>

    <script>
    var testInputs = document.querySelectorAll('#gradeForm input[type="number"]');

    testInputs.forEach(function(input) {
        input.addEventListener('input', function() {
            var test1 = parseInt(document.getElementById('test1').value);
            var test2 = parseInt(document.getElementById('test2').value);
            var test3 = parseInt(document.getElementById('test3').value);
            var test4 = parseInt(document.getElementById('test4').value);

            var total = test1 + test2 + test3 + test4;
            var average = total / 4;

            var final = document.getElementById('grade').innerHTML = 'Grade: ' + average.toFixed(2);
            if (final >= 75 && final <= 100) {

            }
        });
    });
    </script>
</body>

</html>
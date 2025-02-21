//  <script>
 var testInputs = document.querySelectorAll('#gradeForm input[type="number"]');
    // var testInputs = document.querySelectorAll('#gradeForm input[type="number"]');

    testInputs.forEach(function(input) {
        input.addEventListener('input', function() {
            var grade1 = parseInt(document.getElementById('sub1').querySelector('#grade1').value);
            var grade2 = parseInt(document.getElementById('sub1').querySelector('#grade2').value);
            var grade3 = parseInt(document.getElementById('sub1').querySelector('#grade3').value);
            var grade4 = parseInt(document.getElementById('sub1').querySelector('#grade4').value);

            var total = grade1 + grade2 + grade3 + grade4;
            var average = total / 4;

            if (grade1 > 0 & grade2 > 0 & grade3 > 0 & grade4 > 0) {
                var final = document.getElementById('sub1').querySelector('#final_grades').value = average.toFixed(2);
                if (final >= 75.00 && final <= 100.00) {
                    document.getElementById('sub1').querySelector('#pass_failed').value = 'PASSED';
                } else {
                    document.getElementById('sub1').querySelector('#pass_failed').value = 'FAILED';
                }
            }

            if (grade1 < 1 || grade2 < 1 || grade3 < 1 || grade4 < 1) {
                document.getElementById('sub1').querySelector('#pass_failed').value = '';
                document.getElementById('sub1').querySelector('#final_grades').value = '';
            }

        });

        input.addEventListener('keydown', function(event) {
            // Check if the pressed key is the backspace key
            if (event.key === 'Backspace') {

                // if (grade1 < 1 || grade2 < 1 || grade3 < 1 || grade4 < 1) {
                document.getElementById('sub1').querySelector('#pass_failed').value = '';
                document.getElementById('sub1').querySelector('#final_grades').value = '';
                // }
            }
        });
    });

    //sub2
    testInputs.forEach(function(input) {
        input.addEventListener('input', function() {
            var grade1 = parseInt(document.getElementById('sub2').querySelector('#grade1').value);
            var grade2 = parseInt(document.getElementById('sub2').querySelector('#grade2').value);
            var grade3 = parseInt(document.getElementById('sub2').querySelector('#grade3').value);
            var grade4 = parseInt(document.getElementById('sub2').querySelector('#grade4').value);

            var total = grade1 + grade2 + grade3 + grade4;
            var average = total / 4;

            if (grade1 > 0 & grade2 > 0 & grade3 > 0 & grade4 > 0) {
                var final = document.getElementById('sub2').querySelector('#final_grades').value = average.toFixed(2);
                if (final >= 75.00 && final <= 100.00) {
                    document.getElementById('sub2').querySelector('#pass_failed').value = 'PASSED';
                } else {
                    document.getElementById('sub2').querySelector('#pass_failed').value = 'FAILED';
                }
            }

            if (grade1 < 1 || grade2 < 1 || grade3 < 1 || grade4 < 1) {
                document.getElementById('sub2').querySelector('#pass_failed').value = '';
                document.getElementById('sub2').querySelector('#final_grades').value = '';
            }

        });

        input.addEventListener('keydown', function(event) {
            // Check if the pressed key is the backspace key
            if (event.key === 'Backspace') {
                // if (grade1 == '' || grade2 == '' || grade3 == '' || grade4 == '') {
                document.getElementById('sub2').querySelector('#pass_failed').value = '';
                document.getElementById('sub2').querySelector('#final_grades').value = '';
                // }
            }
        });
    });

    //sub3
    testInputs.forEach(function(input) {
        input.addEventListener('input', function() {
            var grade1 = parseInt(document.getElementById('sub3').querySelector('#grade1').value);
            var grade2 = parseInt(document.getElementById('sub3').querySelector('#grade2').value);
            var grade3 = parseInt(document.getElementById('sub3').querySelector('#grade3').value);
            var grade4 = parseInt(document.getElementById('sub3').querySelector('#grade4').value);

            var total = grade1 + grade2 + grade3 + grade4;
            var average = total / 4;

            if (grade1 > 0 & grade2 > 0 & grade3 > 0 & grade4 > 0) {
                var final = document.getElementById('sub3').querySelector('#final_grades').value = average.toFixed(2);
                if (final >= 75.00 && final <= 100.00) {
                    document.getElementById('sub3').querySelector('#pass_failed').value = 'PASSED';
                } else {
                    document.getElementById('sub3').querySelector('#pass_failed').value = 'FAILED';
                }
            }

            if (grade1 < 1 || grade2 < 1 || grade3 < 1 || grade4 < 1) {
                document.getElementById('sub3').querySelector('#pass_failed').value = '';
                document.getElementById('sub3').querySelector('#final_grades').value = '';
            }

        });

        input.addEventListener('keydown', function(event) {
            // Check if the pressed key is the backspace key
            if (event.key === 'Backspace') {
                // if (grade1 == '' || grade2 == '' || grade3 == '' || grade4 == '') {
                document.getElementById('sub3').querySelector('#pass_failed').value = '';
                document.getElementById('sub3').querySelector('#final_grades').value = '';
                // }
            }
        });
    });

    //sub4
    testInputs.forEach(function(input) {
        input.addEventListener('input', function() {
            var grade1 = parseInt(document.getElementById('sub4').querySelector('#grade1').value);
            var grade2 = parseInt(document.getElementById('sub4').querySelector('#grade2').value);
            var grade3 = parseInt(document.getElementById('sub4').querySelector('#grade3').value);
            var grade4 = parseInt(document.getElementById('sub4').querySelector('#grade4').value);

            var total = grade1 + grade2 + grade3 + grade4;
            var average = total / 4;

            if (grade1 > 0 & grade2 > 0 & grade3 > 0 & grade4 > 0) {
                var final = document.getElementById('sub4').querySelector('#final_grades').value = average.toFixed(2);
                if (final >= 75.00 && final <= 100.00) {
                    document.getElementById('sub4').querySelector('#pass_failed').value = 'PASSED';
                } else {
                    document.getElementById('sub4').querySelector('#pass_failed').value = 'FAILED';
                }
            }

            if (grade1 < 1 || grade2 < 1 || grade3 < 1 || grade4 < 1) {
                document.getElementById('sub4').querySelector('#pass_failed').value = '';
                document.getElementById('sub4').querySelector('#final_grades').value = '';
            }

        });

        input.addEventListener('keydown', function(event) {
            // Check if the pressed key is the backspace key
            if (event.key === 'Backspace') {
                // if (grade1 == '' || grade2 == '' || grade3 == '' || grade4 == '') {
                document.getElementById('sub4').querySelector('#pass_failed').value = '';
                document.getElementById('sub4').querySelector('#final_grades').value = '';
                // }
            }
        });
    });

    //sub5
    testInputs.forEach(function(input) {
        input.addEventListener('input', function() {
            var grade1 = parseInt(document.getElementById('sub5').querySelector('#grade1').value);
            var grade2 = parseInt(document.getElementById('sub5').querySelector('#grade2').value);
            var grade3 = parseInt(document.getElementById('sub5').querySelector('#grade3').value);
            var grade4 = parseInt(document.getElementById('sub5').querySelector('#grade4').value);

            var total = grade1 + grade2 + grade3 + grade4;
            var average = total / 4;

            if (grade1 > 0 & grade2 > 0 & grade3 > 0 & grade4 > 0) {
                var final = document.getElementById('sub5').querySelector('#final_grades').value = average.toFixed(2);
                if (final >= 75.00 && final <= 100.00) {
                    document.getElementById('sub5').querySelector('#pass_failed').value = 'PASSED';
                } else {
                    document.getElementById('sub5').querySelector('#pass_failed').value = 'FAILED';
                }
            }

            if (grade1 < 1 || grade2 < 1 || grade3 < 1 || grade4 < 1) {
                document.getElementById('sub5').querySelector('#pass_failed').value = '';
                document.getElementById('sub5').querySelector('#final_grades').value = '';
            }

        });

        input.addEventListener('keydown', function(event) {
            // Check if the pressed key is the backspace key
            if (event.key === 'Backspace') {
                // if (grade1 == '' || grade2 == '' || grade3 == '' || grade4 == '') {
                document.getElementById('sub5').querySelector('#pass_failed').value = '';
                document.getElementById('sub5').querySelector('#final_grades').value = '';
                // }
            }
        });
    });

    //sub6
    testInputs.forEach(function(input) {
        input.addEventListener('input', function() {
            var grade1 = parseInt(document.getElementById('sub6').querySelector('#grade1').value);
            var grade2 = parseInt(document.getElementById('sub6').querySelector('#grade2').value);
            var grade3 = parseInt(document.getElementById('sub6').querySelector('#grade3').value);
            var grade4 = parseInt(document.getElementById('sub6').querySelector('#grade4').value);

            var total = grade1 + grade2 + grade3 + grade4;
            var average = total / 4;

            if (grade1 > 0 & grade2 > 0 & grade3 > 0 & grade4 > 0) {
                var final = document.getElementById('sub6').querySelector('#final_grades').value = average.toFixed(2);
                if (final >= 75.00 && final <= 100.00) {
                    document.getElementById('sub6').querySelector('#pass_failed').value = 'PASSED';
                } else {
                    document.getElementById('sub6').querySelector('#pass_failed').value = 'FAILED';
                }
            }

            if (grade1 < 1 || grade2 < 1 || grade3 < 1 || grade4 < 1) {
                document.getElementById('sub6').querySelector('#pass_failed').value = '';
                document.getElementById('sub6').querySelector('#final_grades').value = '';
            }

        });

        input.addEventListener('keydown', function(event) {
            // Check if the pressed key is the backspace key
            if (event.key === 'Backspace') {
                // if (grade1 == '' || grade2 == '' || grade3 == '' || grade4 == '') {
                document.getElementById('sub6').querySelector('#pass_failed').value = '';
                document.getElementById('sub6').querySelector('#final_grades').value = '';
                // }
            }
        });
    });
    //sub7
    testInputs.forEach(function(input) {
        input.addEventListener('input', function() {
            var grade1 = parseInt(document.getElementById('sub7').querySelector('#grade1').value);
            var grade2 = parseInt(document.getElementById('sub7').querySelector('#grade2').value);
            var grade3 = parseInt(document.getElementById('sub7').querySelector('#grade3').value);
            var grade4 = parseInt(document.getElementById('sub7').querySelector('#grade4').value);

            var total = grade1 + grade2 + grade3 + grade4;
            var average = total / 4;

            if (grade1 > 0 & grade2 > 0 & grade3 > 0 & grade4 > 0) {
                var final = document.getElementById('sub7').querySelector('#final_grades').value = average.toFixed(2);
                if (final >= 75.00 && final <= 100.00) {
                    document.getElementById('sub7').querySelector('#pass_failed').value = 'PASSED';
                } else {
                    document.getElementById('sub7').querySelector('#pass_failed').value = 'FAILED';
                }
            }

            if (grade1 < 1 || grade2 < 1 || grade3 < 1 || grade4 < 1) {
                document.getElementById('sub7').querySelector('#pass_failed').value = '';
                document.getElementById('sub7').querySelector('#final_grades').value = '';
            }

        });

        input.addEventListener('keydown', function(event) {
            // Check if the pressed key is the backspace key
            if (event.key === 'Backspace') {
                // if (grade1 == '' || grade2 == '' || grade3 == '' || grade4 == '') {
                document.getElementById('sub7').querySelector('#pass_failed').value = '';
                document.getElementById('sub7').querySelector('#final_grades').value = '';
                // }
            }
        });
    });
    //sub8
    testInputs.forEach(function(input) {
        input.addEventListener('input', function() {
            var grade1 = parseInt(document.getElementById('sub8').querySelector('#grade1').value);
            var grade2 = parseInt(document.getElementById('sub8').querySelector('#grade2').value);
            var grade3 = parseInt(document.getElementById('sub8').querySelector('#grade3').value);
            var grade4 = parseInt(document.getElementById('sub8').querySelector('#grade4').value);

            var total = grade1 + grade2 + grade3 + grade4;
            var average = total / 4;

            if (grade1 > 0 & grade2 > 0 & grade3 > 0 & grade4 > 0) {
                var final = document.getElementById('sub8').querySelector('#final_grades').value = average.toFixed(2);
                if (final >= 75.00 && final <= 100.00) {
                    document.getElementById('sub8').querySelector('#pass_failed').value = 'PASSED';
                } else {
                    document.getElementById('sub8').querySelector('#pass_failed').value = 'FAILED';
                }
            }

            if (grade1 < 1 || grade2 < 1 || grade3 < 1 || grade4 < 1) {
                document.getElementById('sub8').querySelector('#pass_failed').value = '';
                document.getElementById('sub8').querySelector('#final_grades').value = '';
            }

        });

        input.addEventListener('keydown', function(event) {
            // Check if the pressed key is the backspace key
            if (event.key === 'Backspace') {
                // if (grade1 == '' || grade2 == '' || grade3 == '' || grade4 == '') {
                document.getElementById('sub8').querySelector('#pass_failed').value = '';
                document.getElementById('sub8').querySelector('#final_grades').value = '';
                // }
            }
        });
    });
    //sub9
    testInputs.forEach(function(input) {
        input.addEventListener('input', function() {
            var grade1 = parseInt(document.getElementById('sub9').querySelector('#grade1').value);
            var grade2 = parseInt(document.getElementById('sub9').querySelector('#grade2').value);
            var grade3 = parseInt(document.getElementById('sub9').querySelector('#grade3').value);
            var grade4 = parseInt(document.getElementById('sub9').querySelector('#grade4').value);

            var total = grade1 + grade2 + grade3 + grade4;
            var average = total / 4;

            if (grade1 > 0 & grade2 > 0 & grade3 > 0 & grade4 > 0) {
                var final = document.getElementById('sub9').querySelector('#final_grades').value = average.toFixed(2);
                if (final >= 75.00 && final <= 100.00) {
                    document.getElementById('sub9').querySelector('#pass_failed').value = 'PASSED';
                } else {
                    document.getElementById('sub9').querySelector('#pass_failed').value = 'FAILED';
                }
            }

            if (grade1 < 1 || grade2 < 1 || grade3 < 1 || grade4 < 1) {
                document.getElementById('sub9').querySelector('#pass_failed').value = '';
                document.getElementById('sub9').querySelector('#final_grades').value = '';
            }

        });

        input.addEventListener('keydown', function(event) {
            // Check if the pressed key is the backspace key
            if (event.key === 'Backspace') {
                // if (grade1 == '' || grade2 == '' || grade3 == '' || grade4 == '') {
                document.getElementById('sub9').querySelector('#pass_failed').value = '';
                document.getElementById('sub9').querySelector('#final_grades').value = '';
                // }
            }
        });
    });
    //sub10
    testInputs.forEach(function(input) {
        input.addEventListener('input', function() {
            var grade1 = parseInt(document.getElementById('sub10').querySelector('#grade1').value);
            var grade2 = parseInt(document.getElementById('sub10').querySelector('#grade2').value);
            var grade3 = parseInt(document.getElementById('sub10').querySelector('#grade3').value);
            var grade4 = parseInt(document.getElementById('sub10').querySelector('#grade4').value);

            var total = grade1 + grade2 + grade3 + grade4;
            var average = total / 4;

            if (grade1 > 0 & grade2 > 0 & grade3 > 0 & grade4 > 0) {
                var final = document.getElementById('sub10').querySelector('#final_grades').value = average.toFixed(2);
                if (final >= 75.00 && final <= 100.00) {
                    document.getElementById('sub10').querySelector('#pass_failed').value = 'PASSED';
                } else {
                    document.getElementById('sub10').querySelector('#pass_failed').value = 'FAILED';
                }
            }

            if (grade1 < 1 || grade2 < 1 || grade3 < 1 || grade4 < 1) {
                document.getElementById('sub10').querySelector('#pass_failed').value = '';
                document.getElementById('sub10').querySelector('#final_grades').value = '';
            }

        });

        input.addEventListener('keydown', function(event) {
            // Check if the pressed key is the backspace key
            if (event.key === 'Backspace') {
                // if (grade1 == '' || grade2 == '' || grade3 == '' || grade4 == '') {
                document.getElementById('sub10').querySelector('#pass_failed').value = '';
                document.getElementById('sub10').querySelector('#final_grades').value = '';
                // }
            }
        });
    });
    //sub11
    testInputs.forEach(function(input) {
        input.addEventListener('input', function() {
            var grade1 = parseInt(document.getElementById('sub11').querySelector('#grade1').value);
            var grade2 = parseInt(document.getElementById('sub11').querySelector('#grade2').value);
            var grade3 = parseInt(document.getElementById('sub11').querySelector('#grade3').value);
            var grade4 = parseInt(document.getElementById('sub11').querySelector('#grade4').value);

            var total = grade1 + grade2 + grade3 + grade4;
            var average = total / 4;

            if (grade1 > 0 & grade2 > 0 & grade3 > 0 & grade4 > 0) {
                var final = document.getElementById('sub11').querySelector('#final_grades').value = average.toFixed(2);
                if (final >= 75.00 && final <= 100.00) {
                    document.getElementById('sub11').querySelector('#pass_failed').value = 'PASSED';
                } else {
                    document.getElementById('sub11').querySelector('#pass_failed').value = 'FAILED';
                }
            }

            if (grade1 < 1 || grade2 < 1 || grade3 < 1 || grade4 < 1) {
                document.getElementById('sub11').querySelector('#pass_failed').value = '';
                document.getElementById('sub11').querySelector('#final_grades').value = '';
            }

        });

        input.addEventListener('keydown', function(event) {
            // Check if the pressed key is the backspace key
            if (event.key === 'Backspace') {
                // if (grade1 == '' || grade2 == '' || grade3 == '' || grade4 == '') {
                document.getElementById('sub11').querySelector('#pass_failed').value = '';
                document.getElementById('sub11').querySelector('#final_grades').value = '';
                // }
            }
        });
    });



    var shs_inputs = document.querySelectorAll('#grade-shs input[type="number"]');
    shs_inputs.forEach(function(input) {
        input.addEventListener('input', function() {
            var grade1 = parseInt(document.getElementById('sgrade1').value);
            var grade2 = parseInt(document.getElementById('sgrade2').value);

            var total = grade1 + grade2;
            var average = total / 2;
            if (grade1 > 0 & grade2 > 0) {
                var final = document.getElementById('sem_avg').value = average.toFixed(2);
                if (final >= 75.00 && final <= 100.00) {
                    document.getElementById('action_taken').value = 'PASSED';
                } else {
                    document.getElementById('action_taken').value = 'FAILED';
                }
            }

            if (grade1 < 1 || grade2 < 1) {
                document.getElementById('action_taken').value = '';
            }
        });

        input.addEventListener('keydown', function(event) {
            // Check if the pressed key is the backspace key
            if (event.key === 'Backspace') {
                // if (grade1 == '' || grade2 == '' || grade3 == '' || grade4 == '') {
                document.getElementById('action_taken').value = '';
                document.getElementById('sem_avg').value = '';
                // }
            }
        });
    });
// </script>
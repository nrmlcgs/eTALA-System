<nav aria-label="breadcrumb" style="display:flex;justify-content:space-between;padding:15px 10px 0px 10px;">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Student List</li>
    </ol>
</nav>
<hr />

<form method="post" style="margin: 5px 0px;">
    <label for="filter"></label>
    <select name="filter" id="filter" style="padding: 10px; width: 200px; border: 1px solid #ccc; border-radius: 5px; font-size:12px;">
        <option value="all">All</option>
        <option value="1">Grade 7</option>
        <option value="2">Grade 8</option>
        <option value="3">Grade 9</option>
        <option value="4">Grade 10</option>
        <option value="5">Grade 11</option>
        <option value="6">Grade 12</option>
    </select>

    <label for="search"></label>
    <input type="text" name="search" id="search" placeholder="Enter name or section" style="padding: 8px; width: 200px; border: 1px solid #ccc; border-radius: 5px; font-size:12px;">

    <input type="submit" name="submit" value="Search" style="padding: 5px 5px; width: 100px; background-color: #3498db; color: white; border: none; border-radius: 5px; cursor: pointer;">

    <button type="button" onclick="printData()" style="padding: 5px 5px; width: 80px; background-color: #3498db; color: white; border: none; border-radius: 5px; cursor: pointer;">
        Print
    </button>

</form>

<table class="table table-bordered table-hover student_table" id="table">
    <thead>
        <tr style="font-size:14px;">
            <th style="width:1%">No.</th>
            <th align="left">LRN No.</th>
            <th align="left">Name</th>
            <th align="left">Year Level</th>
            <th align="left">Section</th>
            <th align="left">Status</th>
            <th align="left">Option</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM `tbl_student_info` WHERE year_level = ? AND (lastname LIKE ? OR firstname LIKE ? OR lrn_no LIKE ? OR section LIKE? OR gender LIKE?) ORDER BY student_id DESC");

        if (isset($_POST["submit"])) {
            $filter = $_POST["filter"];
            $search = isset($_POST["search"]) ? '%' . $_POST["search"] . '%' : '%'; // Check if 'search' key is set

            if ($filter == "all") {
                $stmt = $conn->prepare("SELECT * FROM `tbl_student_info` WHERE lastname LIKE ? OR firstname LIKE ? OR lrn_no LIKE ? OR section LIKE ? OR gender LIKE ?");
                $stmt->bind_param("sssss", $search, $search, $search, $search, $search);
            } else {
                $stmt = $conn->prepare("SELECT * FROM `tbl_student_info` WHERE year_level = ? AND (lastname LIKE ? OR firstname LIKE ? OR lrn_no LIKE ? OR section LIKE ? OR gender LIKE ?) ORDER BY student_id DESC");
                $stmt->bind_param("ssssss", $filter, $search, $search, $search, $search, $search);
            }

            // Execute the prepared statement
            $stmt->execute();
            // Get the result set from the prepared statement
            $result = $stmt->get_result();
            // Fetch data from the result set
            $query = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            // If form is not submitted, show all records
            $query = $conn->query("SELECT * FROM `tbl_student_info` ORDER BY student_id DESC");
        }

        foreach ($query as $row) {
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['lrn_no'] ?></td>
                <td><?= $row['lastname'] . " " . $row['firstname'] . " " . $row['middlename'] ?></td>
                <td>
                    <?php
                    // Year level logic
                    $yearLevel = $row['year_level']; // Replace with your actual column name
                    switch ($yearLevel) {
                        case 1:
                            echo "Grade 7";
                            break;
                        case 2:
                            echo "Grade 8";
                            break;
                        case 3:
                            echo "Grade 9";
                            break;
                        case 4:
                            echo "Grade 10";
                            break;
                        case 5:
                            echo "Grade 11";
                            break;
                        case 6:
                            echo "Grade 12";
                            break;
                            // Add more cases based on your year level values
                        default:
                            echo "Unknown";
                    }
                    ?>
                </td>
                <td><?= $row['section'] ?></td>
                <td><?= $row['status'] ?></td>
                <td class="text-center">
                    <button class="btn btn-sm btn-primary view-student-btn" value="<?= $row['student_id'] ?>"><i class="fa fa-eye"></i> View</button>
                    <button class="btn btn-sm btn-info" id="upload_doc" value="<?= $row['lrn_no'] ?>"><i class="fa fa-file"></i>
                        Document</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<script type="text/javascript" src="assets/jquery/jquery-3.7.1.js"></script>
<script>
    // Upload
    $(document).on('click', '#upload_doc', function() {
        var $s_id = $(this).val();

        $("#upload-docs-modal").modal("show");
        $("#ulrn_no").val($s_id);
        $("#xlrn").val($s_id);
    });
</script>
<script>
    function printData() {
        var table = document.getElementById('table');
        var clonedTable = table.cloneNode(true); // Clone the table to preserve the original

        // Remove the specified header column
        var columnIndexToRemove = 6; // Index of the column to remove (zero-based)
        var headers = clonedTable.getElementsByTagName('thead')[0].getElementsByTagName('th');
        headers[columnIndexToRemove].parentNode.removeChild(headers[columnIndexToRemove]);

        // Remove the corresponding cell from each row
        var tbodyRows = clonedTable.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
        for (var i = 0; i < tbodyRows.length; i++) {
            tbodyRows[i].deleteCell(columnIndexToRemove);
        }

        var tableHtml = clonedTable.outerHTML;

        // Open a new window for printing
        var printWindow = window.open('', '_blank');
        printWindow.document.open();

        // Write the HTML content to the new window
        printWindow.document.write('<html><head><title>Print Table</title></head><body>');
        printWindow.document.write('<h1>Student Management Information System</h1>');
        printWindow.document.write(tableHtml);
        
        printWindow.document.close();
        printWindow.print();
    }
</script>
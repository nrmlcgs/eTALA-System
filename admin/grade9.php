<div class="filter">
    <label for="filter_grade9">Filter section: </label>
    <select name="filter_grade9" id="filter_grade9">
        <option selected disabled hidden>Select section</option>
        <?php
        $result = $conn->query("SELECT * FROM tbl_section  WHERE year_level_id = '3'");
        while ($row = $result->fetch_array()) {
            ?>
            <option value="<?php echo $row['section_name'] ?>">
                <?php echo $row['section_name'] ?>
            </option>
            <?php
        }


        ?>
    </select>
</div>
<hr />
<div class="container">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th style="width:1%">NO.</th>
                <th>LRN NO.</th>
                <th>NAME</th>
                <th>YEAR LEVEL</th>
                <th>SECTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = $conn->query("SELECT * FROM `tbl_student_info` WHERE year_level = '3' ORDER BY student_id DESC");
            foreach ($query as $row) {
                ?>
                <tr>
                    <td>
                        <?= $no++ ?>
                    </td>
                    <td>
                        <?= $row['lrn_no'] ?>
                    </td>
                    <td>
                        <?= $row['lastname'] . " " . $row['firstname'] . " " . $row['middlename'] ?>
                    </td>
                    <td>
                        <?php echo $row['year_level'] == '3' ? '<p>Grade 9</p>' : '' ?>
                    </td>
                    <td>
                        <?= $row['section'] ?>
                    </td>
                </tr>
                <?php
            }

            ?>


        </tbody>
    </table>
</div>
<nav aria-label="breadcrumb" style="display:flex;justify-content:space-between;padding:15px 10px 0px 10px;">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Section List</li>
    </ol>
    <div class="add-student">
        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#add-section-modal"><i
                class="fa fa-plus"></i>
            Add Section</button>
    </div>
</nav>
<hr />
<table class="table table-bordered table-hover" id="table">
    <thead>
        <tr style="font-size:14px;">
            <th>Year Level</th>
            <th>Section</th>
            <th style="width:20%;">Option</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $query = $conn->query("SELECT * FROM `tbl_section` INNER JOIN tbl_year_level ON tbl_section.year_level_id = tbl_year_level.year_level_id ORDER BY year_level DESC");
        foreach ($query as $row) {
            ?>
        <tr>
            <td>
                <?= $row['year_level'] ?>
            </td>
            <td>
                <?= $row['section_name'] ?>
            </td>
            <td class="text-center">
                <button class="btn btn-sm btn-primary view-section-btn" value="<?= $row['section_id'] ?>"><i
                        class="fa fa-edit"></i>
                    Edit</button>

                <a class="btn btn-sm btn-danger delete-section-btn" onclick="return confirm('Are you want to delete?')"
                    href="action.php?delete-section=<?= $row['section_id'] ?>"><i class="fa fa-trash"></i>
                    Delete</a>
            </td>
        </tr>
        <?php
        }

        ?>


    </tbody>
</table>
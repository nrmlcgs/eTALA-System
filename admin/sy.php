<nav aria-label="breadcrumb" style="display:flex;justify-content:space-between;padding:15px 10px 0px 10px;">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">School Year</li>
    </ol>
    <div class="add-student">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-sy-modal"><i
                class="fa fa-plus"></i>
            Add S.Y.</button>
    </div>
</nav>
<hr />
<div class="container">
    <table class="table table-bordered table-hover" id="table">
        <thead>
            <tr style="font-size:14px;">
                <th class="text-center">School Year</th>
                <th style="width:20%;">Option</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = $conn->query("SELECT * FROM `tbl_school_year`");
            foreach ($query as $row) {
                ?>
            <tr>
                <td class="text-center">
                    <?= $row['school_year'] ?>
                </td>
                <td class="text-center">
                    <button class="btn btn-primary view-sy-btn" style="width:auto-width; font-size:12px;" value="<?= $row['sy_id'] ?>"><i
                            class="fa fa-edit"></i>
                        Edit</button>

                    <!--<a class="btn btn-danger delete-sy-btn" style="width:auto-width; font-size:12px;" onclick="return confirm('Are you want to delete?')"-->
                    <!--    href="action.php?delete-sy=<?= $row['sy_id'] ?>"><i class="fa fa-trash"></i>-->
                    <!--    Delete</a>-->
                </td>
            </tr>
            <?php
            }

            ?>


        </tbody>
    </table>
</div>
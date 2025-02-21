<nav aria-label="breadcrumb" style="display:flex;justify-content:space-between;padding:15px 10px 0px 10px;">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Track-Strand List</li>
    </ol>
    <div class="add-track-strand">
        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#add-ts-modal"><i
                class="fa fa-plus"></i>
            Add Track/Strand</button>
    </div>
</nav>
<hr />
<table class="table table-bordered table-hover" id="table-ts">
    <thead>
        <tr style="font-size:14px;">
            <th>No.</th>
            <th>Track</th>
            <th>Strand</th>
            <th style="width:20%;">Option</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $query = $conn->query("SELECT * FROM `tbl_track_strand`");
        foreach ($query as $row) {
            ?>
        <tr>
            <td>
                <?= $no++; ?>
            </td>
            <td>
                <?= $row['track'] ?>
            </td>
            <td>
                <?= $row['strand'] ?>
            </td>
            <td class="text-center">
                <button class="btn btn-sm btn-primary view-ts-btn" id="view-ts-btn" value="<?= $row['id'] ?>"><i
                        class="fa fa-edit"></i>
                    Edit</button>

                <a class="btn btn-sm btn-danger delete-ts-btn" onclick="return confirm('Are you want to delete?')"
                    href="action.php?delete-track-strand=<?= $row['id'] ?>"><i class="fa fa-trash"></i>
                    Delete</a>
            </td>
        </tr>
        <?php
        }

        ?>


    </tbody>
</table>
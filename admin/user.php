<nav aria-label="breadcrumb" style="display:flex;justify-content:space-between;padding:15px 10px 0px 10px;">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">User</li>
    </ol>
    <div class="add-student">
        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#add-user-modal"><i
                class="fa fa-plus"></i>
            Add Users</button>
    </div>
</nav>
<hr />
<table class="table table-bordered table-hover" id="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Username</th>
            <th>User Type</th>
            <th style="width:10%;">Option</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $query = $conn->query("SELECT * FROM `tbl_user` WHERE user_type = '0'");
        foreach ($query as $row) {
            ?>
        <tr>
            <td>
                <?= $row['lastname'] . ", " . $row['firstname']; ?>
            </td>
            <td>
                <?= $row['email'] ?>
            </td>
            <td>
                <?= $row['username'] ?>
            </td>
            <td>
                <?= $row['user_type'] == 0 ? "STAFF" : "" ?>
            </td>
            <td class="text-center">

                <a class="btn btn-sm btn-danger delete-user-btn" onclick="return confirm('Are you want to delete?')"
                    href="action.php?delete-user=<?= $row['user_id'] ?>"><i class="fa fa-trash"></i>
                    Delete</a>
            </td>
        </tr>
        <?php
        }

        ?>


    </tbody>
</table>
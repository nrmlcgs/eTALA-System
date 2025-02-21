<nav aria-label="breadcrumb" style="display:flex;justify-content:space-between;padding:15px 10px 0px 10px;">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">User Logs</li>
    </ol>
</nav>
<hr />
<table class="table table-bordered table-hover" id="table">
    <thead>
        <tr style="font-size:14px;">
            <th>No.</th>
            <th>User</th>
            <th>Activity</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $query = $conn->query("SELECT * FROM `tbl_history_log` INNER JOIN tbl_user ON tbl_history_log.user_id = tbl_user.user_id  ORDER BY log_id DESC");
        foreach ($query as $row) {
            ?>
            <tr>
                <td>
                    <?= $no++; ?>
                </td>
                <td>
                    <?= $row['firstname'] . " " . $row['lastname']; ?>
                </td>
                <td>
                    <?= $row['transaction'] ?>
                </td>
                <td>
                    <?= $row['date_added'] ?>
                </td>
            </tr>
            <?php
        }

        ?>


    </tbody>
</table>
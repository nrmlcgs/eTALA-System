<nav class="navbar navbar-light sticky-top shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand mx-4" href="#"><img src="admin/images/logo_ori.png" width="50px" height="50px"> Student
            Portal</a>
        <div class="btn-group ">
            <button type="button" class="btn dropdown-toggle mx-5" data-bs-toggle="dropdown" data-bs-display="static"><i
                    class="fas fa-user"></i>
                <?php echo $_SESSION['name']; ?>

            </button>

            <ul class="dropdown-menu dropdown-menu-end">
                <li><button class="dropdown-item edit-student-btn" id="manage" value="<?php echo $_SESSION['student_id']; ?>">
                        <i class="fas fa-edit"></i> Manage Account
                    </button></li>
                <li><a class="dropdown-item" href="logout.php" id="logout_btn" onclick="return confirm('Logout of your account?')"><i
                            class="fas fa-sign-out-alt"></i> Log
                        out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="sidebar">
    <ul class="nav flex-column">
        <!-- <li class="nav-item dashboard">
            <a class="nav-link" href="dashboard.php?page=home">

                <i class="fas fa-dashboard"></i> Dashboard
            </a>
        </li> -->
        <li class="nav-item dashboard">
            <a class="nav-link" href="dashboard.php?page=personal_information">

                <i class="fas fa-user"></i> Personal Information
            </a>
        </li>
        <li class="nav-item dashboard">
            <a class="nav-link" href="dashboard.php?page=report_of_grades">

                <i class="fas fa-file"></i> Report of Grades
            </a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="dashboard.php?page=form137">

                <i class="fa fa-file"></i> Form 137
            </a>
        </li> -->
        <!-- <li class="nav-item">
            <a href="javascript:void(0)" data-bs-toggle="collapse" class="nav-link" data-bs-target="#collapse">
                <i class="fa-regular fa-file-lines"></i> Certification <i class="fa fa-fw fa-caret-down"></i></i>
            </a>
            <ul class="collapse list-unstyled bg-light" id="collapse">
                <li class="nav-item">
                    <a style="margin-left:20px;" class="nav-link text-dark" href="dashboard.php?page=diploma"><i
                            class="fa-solid fa-certificate"></i>
                        Diploma</a>
                </li>
                <li class="nav-item">
                    <a style="margin-left:20px;" class="nav-link text-dark" href="dashboard.php?page=good-moral"><i
                            class="fa fa-file"></i> Good
                        Moral</a>
                </li>
            </ul>
        </li> -->
        <li class="nav-item dashboard">
            <?php
            $no = 1;
            $query = $conn->query("SELECT * FROM `tbl_announcement`");
            if ($count = $query->num_rows) {
                ?>
            <a class="nav-link " href="dashboard.php?page=announcement">

                <i class="fa fa-bullhorn"></i> Announcement
                <span class=" float-end badge rounded-pill bg-danger">
                    <?php echo $count; ?>
                </span>
            </a>
            <?php
            } else {
                ?>
            <a class="nav-link " href="dashboard.php?page=announcement">

                <i class="fa fa-bullhorn"></i> Announcement</a>
            <?php
            }
            ?>
        </li>
    </ul>
</div>
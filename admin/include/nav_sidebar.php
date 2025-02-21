<nav class="navbar navbar-light sticky-top shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand mx-4" href="#"><img src="images/logo_ori.png" width="50px" height="50px"> Student
            Management Information System</a>
        <div class="btn-group ">
            <button type="button" class="btn dropdown-toggle mx-5" data-bs-toggle="dropdown" data-bs-display="static"><i class="fas fa-user"></i>
                <?php echo $_SESSION['name']; ?>

            </button>

            <ul class="dropdown-menu dropdown-menu-end">
                <li><button class="dropdown-item edit-user-btn" value="<?php echo $_SESSION['id']; ?>">
                        <i class="fas fa-edit"></i> Manage Account
                    </button></li>
                <li><a class="dropdown-item" href="logout.php" onclick="return confirm('Logout of your account?')"><i class="fas fa-sign-out-alt"></i> Log
                        out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item dashboard">
            <a class="nav-link" href="dashboard.php?page=home">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="dashboard.php?page=student">

                <i class="fas fa-users"></i> Student List
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="links" href="dashboard.php?page=corriculum">

                <i class="fas fa-bars"></i> Curriculum List
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="dashboard.php?page=sy">

                <i class="fa-solid fa-school"></i> School Year
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="dashboard.php?page=record">

                <i class="fa-regular fa-file"></i> Academic Records
            </a>
        </li>
        <!-- <li class="nav-item">
            <a href="javascript:void(0)" data-bs-toggle="collapse" class="nav-link" data-bs-target="#collapse_sf">
                <i class="fa fa-file"></i> Form 137 <i class="fa fa-fw fa-caret-down"></i>
            </a>
            <ul class="collapse list-unstyled bg-light" id="collapse_sf">
                <li class="nav-item">
                    <a style="margin-left:20px;" class="nav-link text-dark" href="dashboard.php?page=form137"><i
                            class="fa-solid fa-certificate"></i>
                        SF 10-JHS</a>
                </li>
                <li class="nav-item">
                    <a style="margin-left:20px;" class="nav-link text-dark" href="dashboard.php?page=sf10-shs"><i
                            class="fa fa-file"></i> SF 10-SHS</a>
                </li>
            </ul>
        </li> -->
        <!-- <li class="nav-item">
            <a href="javascript:void(0)" data-bs-toggle="collapse" class="nav-link" data-bs-target="#collapse">
                <i class="fa-regular fa-file-lines"></i> Certification <i class="fa fa-fw fa-caret-down"></i></i>
            </a>
            <ul class="collapse list-unstyled bg-light" id="collapse">
                <li class="nav-item">
                    <a style="margin-left:20px;" class="nav-link text-dark" onclick="window.open('diploma.php', 'newwindow', 'width=1000, height=1000'); return false;"><i class="fa-solid fa-certificate"></i>
                        Diploma</a>
                </li>
                <li class="nav-item">
                    <a style="margin-left:20px;" class="nav-link text-dark" onclick="window.open('good-moral.php', 'newwindow', 'width=1000, height=1000'); return false;"><i class="fa fa-file"></i> Good
                        Moral</a>
                </li>
            </ul>
        </li> -->
        <?php

        if ($_SESSION['user_type'] == 1) {
        ?>
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php?page=logs">
                    <i class="fas fa-history"></i> Logs
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php?page=user">
                    <i class="fas fa-user"></i> User
                </a>
            </li>
            <li class="nav-item dashboard">
                <a class="nav-link" href="dashboard.php?page=announcement">

                    <i class="fa fa-bullhorn"></i> Announcement
                </a>
            </li>
            <li class="nav-item dashboard">
                <a class="nav-link" href="dashboard.php?page=about">

                    <i class="fa-solid fa-circle-exclamation"></i> About
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" data-bs-toggle="collapse" class="nav-link" data-bs-target="#maintenance">
                    <i class="fas fa-gear"></i> Maintenance <i class="fa fa-fw fa-caret-down"></i></i>
                </a>
                <ul class="collapse list-unstyled bg-light" id="maintenance">
                    <li class="nav-item">
                        <a style="margin-left:20px;" class="nav-link text-dark" href="dashboard.php?page=section"><i class="fa-solid fa-door-open"></i>
                            Section List</a>
                    </li>
                    <li class="nav-item">
                        <a style="margin-left:20px;" class="nav-link text-dark" href="dashboard.php?page=subject"><i class="fa fa-book"></i> Subject
                            List</a>
                    </li>
                    <li class="nav-item">
                        <a style="margin-left:20px;" class="nav-link text-dark" href="dashboard.php?page=track-strand"><i class="fa-solid fa-book-open"></i> Track/Strand
                            List</a>
                    </li>
                    <li class="nav-item">
                        <a style="margin-left:20px;" id="manage_diploma" class="nav-link text-dark"><i class="fa-solid fa-tools"></i> 
                        Tools (Diploma)</a>
                    </li>
                </ul>
            </li>
        <?php
        }

        ?>

    </ul>
</div>
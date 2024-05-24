<?php
include "Config.php";
session_start();
ob_start();
$_SESSION["id"];
if (empty($_SESSION['id'])) {
    header("location:login.php");
}

$sql = "SELECT * FROM `admin` WHERE `id` = {$_SESSION["id"]} ";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Student</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

   <?php
    include "link.php";
   ?>
</head>

<body class="has-sidebar has-fixed-sidebar-and-header">
    <!-- Header -->
    <?php
      include "Header.php";
     ?>

    <main class="main">
        <!-- Sidebar Nav -->
        <?php
          include "Sidebarnav.php";
        ?>

        <div class="content">
            <div class="py-4 px-3 px-md-4">
                <div class="card mb-3 mb-md-4">

                    <div class="card-body">
                        <!-- Breadcrumb -->
                        <nav class="d-none d-md-block" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="">Settings</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                            </ol>
                        </nav>
                        <!-- End Breadcrumb -->

                        <div class="mb-3 mb-md-4 d-flex justify-content-between">
                            <div class="h3 mb-0">My Profile</div>
                        </div>


                        <!-- Profile -->
                        <div id="Wrapper_Profile" class="container-fluid bg-primary-subtle border border-primary d-flex justify-content-center">
                            <div class="profile-body">
                                <div class="body_1">
                                    <form method="post" enctype="multipart/form-data" id="form_profile">
                                        <div class="my_profile">
                                            <div class="card imgholder">
                                                <label for="imgInput" class="upload">
                                                   
                                                        <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
                                                        <input type="file" name="myPhoto" id="imgInput" class="imgInput">
                                                        <input type="hidden" name="old_img" id="old_img" value="<?php echo $row["image"] ?>">
                                        

                                                    <i class="bi bi-plus-circle-dotted"></i>
                                                </label>
                                                <img src="upload_admin/<?php echo $row['image'] ?>" alt="" width="200" height="200" class="img">
                                            </div>
                                        </div>
                                    </form>
                                    <div class="profile_title">
                                        <p class="title_1">My name is <span><?php echo $_SESSION['MYlastName'] ?>.<br>
                                                <?php echo $_SESSION['MyPosition'] ?>
                                            </span>
                                        </p>
                                        <p class="title_2 text-primary"><?php echo $row['description'] ?></p>
                                    </div>
                                </div>
                                <div class="body_2 mt-5 p-5 d-flex justify-content-between align-items-center gap-3">
                                    <div class="layout_1 d-flex justify-content-between align-items-center " style="gap: 300px;">
                                        <div class="title_position ">
                                            <p class="fw-medium" style="font-size: 20px;">Position :</p>
                                            <p class="fs-4 fw-bolder"><?php echo $row['position'] ?></p>
                                        </div>
                                        <div class="phone_Number">
                                            <p class="fw-medium d-flex justify-content-end" style="font-size: 20px; ">Phone :</p>
                                            <p class="fs-4 fw-bolder">+855 <?php echo $row['phone_number'] ?></p>
                                        </div>
                                    </div>
                                    <div class="title_email">
                                        <p class="fw-medium d-flex justify-content-end" style="font-size: 20px; ">Drop your Message :</p>
                                        <p><a class="fs-4 fw-normal " href=""><?php echo $row['email'] ?></a></p>
                                    </div>
                                    <div class="profile_icon">
                                        <i class="bi bi-envelope-open"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Profile  -->
                    </div>
                </div>


            </div>

            <!-- Footer -->
            <footer class="small p-3 px-md-4 mt-auto">
                <div class="row justify-content-between">
                    <div class="col-lg text-center text-lg-left mb-3 mb-lg-0">
                        <ul class="list-dot list-inline mb-0">
                            <li class="list-dot-item list-dot-item-not list-inline-item mr-lg-2"><a class="link-dark" href="#">FAQ</a></li>
                            <li class="list-dot-item list-inline-item mr-lg-2"><a class="link-dark" href="#">Support</a>
                            </li>
                            <li class="list-dot-item list-inline-item mr-lg-2"><a class="link-dark" href="#">Contact
                                    us</a></li>
                        </ul>
                    </div>

                    <div class="col-lg text-center mb-3 mb-lg-0">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item mx-2"><a class="link-muted" href="#"><i class="gd-twitter-alt"></i></a></li>
                            <li class="list-inline-item mx-2"><a class="link-muted" href="#"><i class="gd-facebook"></i></a></li>
                            <li class="list-inline-item mx-2"><a class="link-muted" href="#"><i class="gd-github"></i></a></li>
                        </ul>
                    </div>

                    <div class="col-lg text-center text-lg-right">
                        &copy; 2019 All Rights Reserved.
                    </div>
                </div>
            </footer>
            <!-- End Footer -->
        </div>
    </main>

    <script src="public/JS/App.js"></script>
    <script src="public/JS/App2.js"></script>
    <script src="/MyProfile.js"></script>

</body>

</html>
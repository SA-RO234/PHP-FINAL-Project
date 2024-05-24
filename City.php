<?php
include "Config.php";
ob_start();
session_start();

$_SESSION["id"];

if (empty($_SESSION['id'])) {
    header("location:login.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Province /City</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Boostrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <?php
    include "link.php";
  ?>

</head>

<body class="has-sidebar has-fixed-sidebar-and-header">
    <!-- Header -->
    <header class="header bg-body">
        <nav class="navbar flex-nowrap p-0">
            <div class="navbar-brand-wrapper d-flex align-items-center col-auto">
                <!-- Logo For Mobile View -->
                <a class="navbar-brand navbar-brand-mobile" href="/">
                    <img class="img-fluid w-100" src="public/img/logo-mini.png" alt="Graindashboard">
                </a>
                <!-- End Logo For Mobile View -->

                <!-- Logo For Desktop View -->
                <a class="navbar-brand navbar-brand-desktop" href="index.php">
                    <img class="" src="/public/img/logo1.png" alt="" style="height: 70px ;width: 70px;">
                </a>
                <!-- End Logo For Desktop View -->
            </div>

            <div class="header-content col px-md-3">
                <div class="d-flex align-items-center">
                    <!-- Side Nav Toggle -->
                    <a class="js-side-nav header-invoker d-flex mr-md-2" href="#" data-close-invoker="#sidebarClose" data-target="#sidebar" data-target-wrapper="body">
                        <i class="gd-align-left"></i>
                    </a>
                    <!-- End Side Nav Toggle -->

                    <!-- User Notifications -->
                    <div class="dropdown ml-auto">
                        <a id="notificationsInvoker" class="header-invoker" href="#" aria-controls="notifications" aria-haspopup="true" aria-expanded="false" data-unfold-event="click" data-unfold-target="#notifications" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-animation-in="fadeIn" data-unfold-animation-out="fadeOut">
                            <span class="indicator indicator-bordered indicator-top-right indicator-primary rounded-circle"></span>
                            <i class="gd-bell"></i>
                        </a>

                        <div id="notifications" class="dropdown-menu dropdown-menu-center py-0 mt-4 w-18_75rem w-md-22_5rem unfold-css-animation unfold-hidden" aria-labelledby="notificationsInvoker" style="animation-duration: 300ms;">
                            <div class="card">
                                <div class="card-header d-flex align-items-center border-bottom py-3">
                                    <h5 class="mb-0">Notifications</h5>
                                    <a class="link small ml-auto" href="#">Clear All</a>
                                </div>

                                <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                        <div class="list-group-item list-group-item-action">
                                            <div class="d-flex align-items-center text-nowrap mb-2">
                                                <i class="gd-info-alt icon-text text-primary mr-2"></i>
                                                <h6 class="font-weight-semi-bold mb-0">New Update</h6>
                                                <span class="list-group-item-date text-muted ml-auto">just now</span>
                                            </div>
                                            <p class="mb-0">
                                                Order <strong>#10000</strong> has been updated.
                                            </p>
                                            <a class="list-group-item-closer text-muted" href="#"><i class="gd-close"></i></a>
                                        </div>
                                        <div class="list-group-item list-group-item-action">
                                            <div class="d-flex align-items-center text-nowrap mb-2">
                                                <i class="gd-info-alt icon-text text-primary mr-2"></i>
                                                <h6 class="font-weight-semi-bold mb-0">New Update</h6>
                                                <span class="list-group-item-date text-muted ml-auto">just now</span>
                                            </div>
                                            <p class="mb-0">
                                                Order <strong>#10001</strong> has been updated.
                                            </p>
                                            <a class="list-group-item-closer text-muted" href="#"><i class="gd-close"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End User Notifications -->
                    <!-- User Avatar -->
                    <div class="dropdown mx-3 dropdown ml-2">
                        <a id="profileMenuInvoker" class="header-complex-invoker" href="#" aria-controls="profileMenu" aria-haspopup="true" aria-expanded="false" data-unfold-event="click" data-unfold-target="#profileMenu" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-animation-in="fadeIn" data-unfold-animation-out="fadeOut">
                            <!--img class="avatar rounded-circle mr-md-2" src="#" alt="John Doe"-->
                            <span class="mr-md-2 avatar-placeholder">J</span>
                            <span class="d-none d-md-block"> <?php echo $_SESSION['MYfirstName'] ?> <?php echo $_SESSION['MYlastName'] ?> </span>
                            <i class="gd-angle-down d-none d-md-block ml-2"></i>
                        </a>

                        <ul id="profileMenu" class="unfold unfold-user unfold-light unfold-top unfold-centered position-absolute pt-2 pb-1 mt-4 unfold-css-animation unfold-hidden fadeOut" aria-labelledby="profileMenuInvoker" style="animation-duration: 300ms;">
                            <li class="unfold-item">
                                <a class="unfold-link d-flex align-items-center text-nowrap" href="MyProfile.php">
                                    <span class="unfold-item-icon mr-3">
                                        <i class="gd-user"></i>
                                    </span>
                                    My Profile
                                </a>
                            </li>
                            <li class="unfold-item unfold-item-has-divider">
                                <a class="unfold-link d-flex align-items-center text-nowrap" href="logout.php">
                                    <span class="unfold-item-icon mr-3">
                                        <i class="gd-power-off"></i>
                                    </span>
                                    Sign Out
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End User Avatar -->
                </div>
            </div>
        </nav>
    </header>
    <!-- End Header -->

    <main class="main ">
        <!-- Sidebar Nav -->
        <?php
          include "Sidebarnav.php";
        ?>
            <!--  Content Statistics of Province -->
        <div class="content">

            <!--  Section statistics of student  -->
            <div class="py-4 px-3 px-md-4">
                <div class="card mb-3 mb-md-4">
                    <div class="card-body">
                        <!-- Breadcrumb -->
                        <!-- <nav class="d-none d-md-block" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="Student.php">Province</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">All Province</li>
                            </ol>
                        </nav> -->
                        <!-- End Breadcrumb -->

                        <div class="mb-3 mb-md-4 d-flex justify-content-between">
                            <div class="h3 mb-0">Statistics /Province & City</div>

                            <input type="search" name="" id="live_search" placeholder="Search" class="form-control w-50">

                        </div>

                        <!-- Users -->
                        <div class="table-responsive-xl">
                            <table class="table table-bordered border-primary" id="TableOfMyUsers">
                                <thead>
                                    <tr>
                                        <!-- <th class="py-2 border-primary"># ID</th>
                                        <th class="py-2 border-primary">Country</th> -->
                                        <th class="py-2 border-primary">Province /City</th>
                                        <th class="py-2 border-primary">Student Number</th>
                                    </tr>
                                </thead>
                                <tbody id="myTableBodylocation">

                                    <!--     -->

                                </tbody>

                            </table>
                            <div class="card-footer d-block d-md-flex align-items-center d-print-none">
                                <div class="d-flex mb-2 mb-md-0">Showing 1 to 8 of 24 Entries</div>

                                <nav class="pagination d-flex ml-md-auto d-print-none" aria-label="Pagination">
                                    <ul class="pagination justify-content-end font-weight-semi-bold mb-0">
                                        <li class="page-item" id="PreviousButton" style="cursor: pointer;"> <a id="datatablePaginationPrev" class="page-link" aria-label="Previous"><i class="gd-angle-left icon-text icon-text-xs d-inline-block"></i></a>
                                        </li>
                                        <?php
                                        $sql1 = "SELECT * FROM `student` ";
                                        $result1 = mysqli_query($con, $sql1);
                                        $dataNumber = mysqli_num_rows($result1);

                                        $total = ceil($dataNumber / 5);
                                        for ($i = 1; $i <= $total; $i++) {
                                            //  Create terniry operator 
                                            // $active_class = ($i == $total) ? 'active' : '';
                                            echo '<li class="page-item " id="' . $i . '"  data-page="' . $i . '" " style="cursor: pointer;"><a id="datatablePagination1" class="page-link" >' . $i . '</a></li>';
                                        }
                                        ?>
                                        <li class="page-item" id="NextButton" style="cursor: pointer;"> <a id="datatablePaginationNext" class="page-link" aria-label="Next"><i class="gd-angle-right icon-text icon-text-xs d-inline-block"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>


                        </div>
                        <!-- End Users -->
                    </div>
                </div>
            </div>
               
            <!--  Section for statistics of Course  -->
            <div class="py-4 px-3 px-md-4">
                <div class="card mb-3 mb-md-4">

                    <div class="card-body">
                        <!-- Breadcrumb -->
                        <!-- <nav class="d-none d-md-block" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="Student.php">Province</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">All Province</li>
                            </ol>
                        </nav> -->
                        <!-- End Breadcrumb -->

                        <div class="mb-3 mb-md-4 d-flex justify-content-between">
                            <div class="h3 mb-0">Statistics /Course</div>

                            <input type="search" name="" id="live_search" placeholder="Search" class="form-control w-50">

                        </div>


                        <!-- Users -->
                        <div class="table-responsive-xl">
                            <table class="table table-bordered border-primary" id="TableOfMyUsers">
                                <thead>
                                    <tr>
                                        <!-- <th class="py-2 border-primary"># ID</th>
                                        <th class="py-2 border-primary">Country</th> -->
                                        <th class="py-2 border-primary">Course Name</th>
                                        <th class="py-2 border-primary">Student Number</th>
                                    </tr>
                                </thead>
                                <tbody id="myTableBodycoursestatictics">

                                    <!--     -->

                                </tbody>

                            </table>
                            <div class="card-footer d-block d-md-flex align-items-center d-print-none">
                                <div class="d-flex mb-2 mb-md-0">Showing 1 to 8 of 24 Entries</div>

                                <nav class="pagination d-flex ml-md-auto d-print-none" aria-label="Pagination">
                                    <ul class="pagination justify-content-end font-weight-semi-bold mb-0">
                                        <li class="page-item" id="PreviousButton" style="cursor: pointer;"> <a id="datatablePaginationPrev" class="page-link" aria-label="Previous"><i class="gd-angle-left icon-text icon-text-xs d-inline-block"></i></a>
                                        </li>
                                        <?php
                                        $sql1 = "SELECT * FROM `city` ";
                                        $result1 = mysqli_query($con, $sql1);
                                        $dataNumber = mysqli_num_rows($result1);

                                        $total = ceil($dataNumber / 5);
                                        for ($i = 1; $i <= $total; $i++) {
                                            //  Create terniry operator 
                                            // $active_class = ($i == $total) ? 'active' : '';
                                            echo '<li class="page-item " id="' . $i . '"  data-page="' . $i . '" " style="cursor: pointer;"><a id="datatablePagination1" class="page-link" >' . $i . '</a></li>';
                                        }
                                        ?>
                                        <li class="page-item" id="NextButton" style="cursor: pointer;"> <a id="datatablePaginationNext" class="page-link" aria-label="Next"><i class="gd-angle-right icon-text icon-text-xs d-inline-block"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>


                        </div>
                        <!-- End Users -->
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
    <script src="/City.js"></script>
    <script src="/Student.js"></script>
</body>

</html>

?>
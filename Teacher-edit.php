<?php
include "Config.php";
session_start();
$_SESSION['id'];
if (empty($_SESSION['id'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Create Teacher</title>
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
                                    <a href="Teacher.php">Teacher</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Create New Teacher</li>
                            </ol>
                        </nav>
                        <!-- End Breadcrumb -->

                        <div class="mb-3 mb-md-4 d-flex justify-content-between">
                            <div class="h3 mb-0">Create New Teacher</div>
                        </div>


                        <!-- Form -->
                        <div>
                            <form method="POST" enctype="multipart/form-data" id="formInsertTeacher">
                                <div class="form-row">
                                    <div class="form-group col-12 col-md-4">
                                        <label for="name">Teacher /Name :</label><span style="color: red !important; display: inline; float: none;">*</span>
                                        <input type="text" class="form-control border border-primary" id="teachername" name="teachername" placeholder="Teacher Name" required>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="email">Teacher /Email :</label><span style="color: red !important; display: inline; float: none;">*</span>
                                        <input type="email" class="form-control border border-primary" id="teacheremail" name="teacherEmail" placeholder="Teacher Email" required>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="email">Teacher /Phone Number :</label><span style="color: red !important; display: inline; float: none;">*</span>
                                        <input type="text" class="form-control border border-primary" id="teacherphonenumber" maxlength="10" name="teacherphonenumber" placeholder="Phone Number" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12 col-md-4">
                                        <label for="address">Address :</label><span style="color: red !important; display: inline; float: none;">*</span>
                                        <select name="Address" id="teacherAddress" class="form-control border border-primary" required>
                                            <option value="Phom Phenh(Capital City)">Phom Phenh(Capital City)</option>
                                            <option value="Kampong Cham">Kampong Cham</option>
                                            <option value="Ta Keo">Ta Keo</option>
                                            <option value="Battambang">Battambang</option>
                                            <option value="Koh kong ">Koh kong</option>
                                            <option value="Mondulkiri">Mondulkiri</option>
                                            <option value="Rattanakiri">Rattanakiri</option>
                                            <option value="Siem Reap">Siem Reap</option>
                                            <option value="Prey Veng">Prey Veng</option>
                                            <option value="Kampong Chanang">Kampong Chanang</option>
                                            <option value="Banteay Meanchey">Banteay Meanchey</option>
                                            <option value="Svay Rieng">Svay Rieng</option>
                                            <option value="Ousdom Meanchey">Ousdom Meanchey</option>
                                            <option value="Kep">Kep</option>
                                            <option value="Preah Vihear">Preah Vihear</option>
                                            <option value="Kratie">Kratie</option>
                                            <option value="Tbong Kmom">Tbong Kmom</option>
                                            <option value="Kampot">Kampot</option>
                                            <option value="Preah Sihanouk">Preah Sihanouk</option>
                                            <option value="Kandal">Kandal</option>
                                            <option value="Pailin">Pailin</option>
                                            <option value="Tbong Khmum">Tbong Khmum</option>
                                            <option value="Stung Treng">Stung Treng</option>
                                            <option value="Kampong Thom">Kampong Thom</option>
                                            <option value="Oddar Meanchey">Oddar Meanchey</option>
                                            <option value="Pursat">Pursat</option>
                                            <option value="Kampong Speu">Kampong Speu</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="email">Date of birth :</label><span style="color: red !important; display: inline; float: none;">*</span>
                                        <input type="date" class="form-control border border-primary" id="dateofbirth" name="dateofbirth" required>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="email">Position :</label><span style="color: red !important; display: inline; float: none;">*</span>
                                        <input type="text" class="form-control border border-primary" id="position" name="teacherposition" placeholder="Position" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12 col-md-4">
                                        <label for="gender">Gender :</label><span style="color: red !important; display: inline; float: none;">*</span>
                                        <div class="form-check mx-2">
                                            <input class="form-check-input" type="radio" name="Gender" id="" value="Female">
                                            <label class="form-check-label" for="">Female</label>
                                        </div>
                                        <div class="form-check mx-2">
                                            <input class="form-check-input" type="radio" name="Gender" id="" value="Male">
                                            <label class="form-check-label" for="">Male</label>
                                        </div>
                                        <div class="form-check mx-2">
                                            <input class="form-check-input" type="radio" name="Gender" id="" value="Other">
                                            <label class="form-check-label" for="">Other</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="name">Teacher /HireDate:</label><span style="color: red !important; display: inline; float: none;">*</span>
                                        <input type="date" class="form-control border border-primary" id="teacherhiredatedate" name="teacherhiredate" required>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="email">Department :</label><span style="color: red !important; display: inline; float: none;">*</span>
                                        <select class="form-control border border-primary" id="department" name="department" required>
                                            <option value="Computer science">Computer science</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4">
                                    <label for="image" class="form-label">Upload / image :</label><span style="color: red !important; display: inline; float: none;">*</span>
                                    <input class="form-control form-control-lg" id="image" name="image" type="file" required>
                                </div><br>
                                <label for="Qulification">Qulification :</label><span style="color: red !important; display: inline; float: none;">*</span>
                                <div class="form-floating">
                                    <textarea class="form-control" name="qulification" id="qulification" style="height: 100px"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary float-right mt-5" id="btnInsertTeacher" name="Insertbtn">Create</button>
                            </form>
                        </div>
                        <!-- End Form -->
                    </div>
                </div>


            </div>

            <!-- Footer -->
            <footer class="small p-3 px-md-4 mt-auto">
                <div class="row justify-content-between">
                    <div class="col-lg text-center text-lg-left mb-3 mb-lg-0">
                        <ul class="list-dot list-inline mb-0">
                            <li class="list-dot-item list-dot-item-not list-inline-item mr-lg-2"><a class="link-dark" href="#">FAQ</a></li>
                            <li class="list-dot-item list-inline-item mr-lg-2"><a class="link-dark" href="#">Support</a></li>
                            <li class="list-dot-item list-inline-item mr-lg-2"><a class="link-dark" href="#">Contact us</a></li>
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
                        &copy; 2019 Graindashboard. All Rights Reserved.
                    </div>
                </div>
            </footer>
            <!-- End Footer -->
        </div>
    </main>
    <script src="public/JS/App.js"></script>
    <script src="public/JS/App2.js"></script>
    <!--  Link Student JS  -->
    <script src="/Teacher.js"></script>
</body>

</html>
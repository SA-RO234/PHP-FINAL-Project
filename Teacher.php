<?php
include "Config.php";
session_start();

$_SESSION["id"];
if (empty($_SESSION["id"])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Teacher </title>

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

        <!-- Modal Delete Teacher -->
        <div class="modal fade" id="deleteteachermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                            <h4>Delete Teacher :</h4>
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h3>Are you sure you want to delete this Teacher ! </h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary ModalDeleteBtn" data-bs-target="deleteteachermodal" data-bs-toggle="modal" id="ModalDeleteBtn" name="DeleteMyuser">Yes ! Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <!--  Modal for update -->
        <div class="modal fade " id="modalUpdateTeacher" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Update Teacher :</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data" id="formUpdateTeacher">
                            <div class="form-row">
                                <input type="hidden" name="Teacherid" id="Teacherid">
                                <div class="form-group col-12 col-md-4">
                                    <label for="name">Teacher /Name :</label><span style="color: red !important; display: inline; float: none;">*</span>
                                    <input type="text" class="form-control border border-primary" id="oldteachername" name="oldteachername" placeholder="Teacher Name" required>
                                </div>
                                <div class="form-group col-12 col-md-4">
                                    <label for="email">Teacher /Email :</label><span style="color: red !important; display: inline; float: none;">*</span>
                                    <input type="email" class="form-control border border-primary" id="oldteacheremail" name="oldteacherEmail" placeholder="Teacher Email" required>
                                </div>
                                <div class="form-group col-12 col-md-4">
                                    <label for="email">Teacher /Phone Number :</label><span style="color: red !important; display: inline; float: none;">*</span>
                                    <input type="text" class="form-control border border-primary" maxlength="10" id="oldteacherphonenumber" name="oldteacherphonenumber" placeholder="Phone Number" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12 col-md-4">
                                    <label for="address">Address :</label><span style="color: red !important; display: inline; float: none;">*</span>
                                    <select name="oldAddress" id="oldteacherAddress" class="form-control border border-primary" required>
                                        <option value="Phom Phenh">Phom Phenh</option>
                                        <option value="Kompong Cham">Kompong Cham</option>
                                        <option value="Ta Keo">Ta Keo</option>
                                        <option value="Batdombong ">Batdombong</option>
                                        <option value="Koh kong ">Koh kong</option>
                                        <option value="Mondukiri">Mondukiri</option>
                                        <option value="Seam Reap">Seam Reap</option>
                                        <option value="Prey Veng">Prey Veng</option>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-md-4">
                                    <label for="email">Date of birth :</label><span style="color: red !important; display: inline; float: none;">*</span>
                                    <input type="date" class="form-control border border-primary" id="olddateofbirth" name="olddateofbirth" required>
                                </div>
                                <div class="form-group col-12 col-md-4">
                                    <label for="email">Position :</label><span style="color: red !important; display: inline; float: none;">*</span>
                                    <input type="text" class="form-control border border-primary" id="oldposition" name="oldteacherposition" placeholder="Position" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12 col-md-4">
                                    <label for="gender">Gender :</label><span style="color: red !important; display: inline; float: none;">*</span>
                                    <div class="form-check mx-2">
                                        <input class="form-check-input" type="radio" name="gender" id="oldender" value="Female">
                                        <label class="form-check-label" for="">Female</label>
                                    </div>
                                    <div class="form-check mx-2">
                                        <input class="form-check-input" type="radio" name="gender" id="oldender" value="Male">
                                        <label class="form-check-label" for="">Male</label>
                                    </div>
                                    <div class="form-check mx-2">
                                        <input class="form-check-input" type="radio" name="gender" id="oldender" value="Other">
                                        <label class="form-check-label" for="">Other</label>
                                    </div>
                                </div>
                                <div class="form-group col-12 col-md-4">
                                    <label for="name">Teacher /HireDate:</label><span style="color: red !important; display: inline; float: none;">*</span>
                                    <input type="date" class="form-control border border-primary" id="oldteacherhiredatedate" name="oldteacherhiredate" required>
                                </div>
                                <div class="form-group col-12 col-md-4">
                                    <label for="email">Department :</label><span style="color: red !important; display: inline; float: none;">*</span>
                                    <select class="form-control border border-primary" id="olddepartment" name="olddepartment" required>
                                        <option value="Computer science">Computer science</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <label for="image" class="form-label">Upload / image :</label><span style="color: red !important; display: inline; float: none;">*</span>
                                <input class="form-control form-control w-50" id="image" name="image" type="file" required>
                                <input type="hidden" name="old_image" id="old_image">
                            </div><br>
                            <label for="Qulification">Qulification :</label><span style="color: red !important; display: inline; float: none;">*</span>
                            <div class="form-floating">
                                <textarea class="form-control" name="oldqulification" id="oldqulification" style="height: 100px"></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-target="modalUpdateTeacher" data-bs-toggle="modal" id="btnsaveupdate">Save Change</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

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
                                <li class="breadcrumb-item active" aria-current="page">All Teacher</li>
                            </ol>
                        </nav>
                        <!-- End Breadcrumb -->

                        <div class="mb-3 mb-md-4 d-flex justify-content-between">
                            <div class="h3 mb-0">Teacher</div>
                            <input type="search" class="form-control w-50" name="search" id="Search" placeholder="Search">
                        </div>


                        <!-- Users -->
                        <div class="table-responsive-xl">
                            <table class="table table-bordered border-primary">
                                <thead>
                                    <tr>
                                        <th class="py-2 border-primary">#</th>
                                        <th class="py-2 border-primary">Name</th>
                                        <th class="py-2 border-primary">Gender</th>
                                        <th class="py-2 border-primary">Photo</th>
                                        <th class="py-2 border-primary">Email</th>
                                        <th class="py-2 border-primary">Department</th>
                                        <th class="py-2 border-primary">Date of birth</th>
                                        <th class="py-2 border-primary">Position</th>
                                        <th class="py-2 border-primary">Address</th>
                                        <th class="py-2 border-primary">Phone Number</th>
                                        <th class="py-2 border-primary">Hire Date</th>
                                        <th class="py-2 border-primary">Qulification</th>
                                        <th class="py-2 border-primary">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyTeacher">


                                </tbody>
                            </table>

                            <div class="card-footer d-block d-md-flex align-items-center d-print-none">
                                <div class="d-flex mb-2 mb-md-0">Showing 1 to 8 of 24 Entries</div>

                                <nav class="d-flex ml-md-auto d-print-none" aria-label="Pagination">
                                    <ul class="pagination justify-content-end font-weight-semi-bold mb-0">
                                        <li class="page-item" id="Previouse"> <a class="page-link" style="cursor: pointer;" aria-label="Previous"><i class="gd-angle-left icon-text icon-text-xs d-inline-block"></i></a></li>
                                        <?php
                                        $sql1 = "SELECT * FROM `teacher` ";
                                        $result1 = mysqli_query($con, $sql1);
                                        $datanumber = mysqli_num_rows($result1);
                                        $total = ceil($datanumber / 5);
                                        for ($i = 1; $i <= $total; $i++) {
                                            echo ' <li class="page-item" id="' . $i . '" data-page="' . $i . '" style="cursor: pointer;" ><a id="datatablePaginationPage0" class="page-link">' . $i . '</a></li>';
                                        }
                                        ?>

                                        <li class="page-item" id="Next"> <a class="page-link" style="cursor: pointer;" aria-label="Next"><i class="gd-angle-right icon-text icon-text-xs d-inline-block"></i></a>
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
    <!--  Js -->
    <script src="/Teacher.js"></script>
</body>

</html>
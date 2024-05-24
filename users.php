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
    <title>Admin</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
   <?php
    include "link.php"
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

        <!-- Modal Delete user -->
        <div class="modal fade" id="deleteusermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                            <h4>Delete User:</h4>
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h3>Are you sure you want to delete this users ! </h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary ModalDeleteBtn" id="ModalDeleteBtn" name="DeleteMyuser">Yes ! Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <!--  Modal Update user -->

        <div class="modal fade" tabindex="-1" id="MymodalUpdateUser">
            <div class="modal-dialog w-50">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update User :</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card ">
                            <div class="card-body border border-primary">
                                <form method="post" enctype="multipart/form-data" id="formUpdateAdmin">
                                    <div class="form-row">
                                        <input type="hidden" id="id" name="id">
                                        <div class="form-group col-md-6">
                                            <label for="FirstName">First Name:
                                            </label>
                                            <input id="first_name" type="text" class="form-control border border-primary" name="first_name" required="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="lastName">Last Name:
                                            </label>
                                            <input id="last_name" type="text" class="form-control border border-primary" name="last_name" required="">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="email">Email Address:
                                            </label>
                                            <input id="email" type="email" class="form-control border border-primary" name="email" required="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="position">Position:
                                            </label>
                                            <input id="position" type="text" class="form-control border border-primary" name="position" required="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="phone_number">Phone Number:
                                            </label>
                                            <input id="phone_number" type="text" maxlength="10" class="form-control border border-primary" name="phone_number" required="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="Gender">Gender:
                                            </label>
                                            <select name="gender" id="gender" class="form-control border border-primary">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="password">Password
                                            </label>
                                            <input id="password" type="password" class="form-control border border-primary" name="password" required="" autocomplete="on">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="password-confirm">Confirm Password
                                            </label>
                                            <input id="password_confirm" type="password" class="form-control border border-primary" name="password_confirmation" required="" autocomplete="on">
                                        </div>
                                    </div>


                                    <div class="form-group ">
                                        <label for="image">Upload Image:
                                        </label>
                                        <input id="myoldimage" type="file" class="form-control border border-primary" name="image" required="">
                                        <input type="hidden" name="old_image" id="old_image" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="floatingTextarea2">Description:</label>
                                        <textarea class="form-control border border-primary" placeholder="Description :" id="floatingTextarea2" style="height: 100px" name="description"></textarea>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" id="BtnUpdateAdmin">Save changes</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
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
                                    <a href="Student.php">Admin</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">All Admin</li>
                            </ol>
                        </nav>
                        <!-- End Breadcrumb -->

                        <div class="mb-3 mb-md-4 d-flex justify-content-between">
                            <div class="h3 mb-0">Admin</div>
                            
                                <input type="search" name="" id="live_search" placeholder="Search" class="form-control w-50">
                           
                        </div>


                        <!-- Users -->
                        <div class="table-responsive-xl">
                            <table class="table table-bordered border-primary" id="TableOfMyUsers">
                                <thead>
                                    <tr>
                                        <th class="py-2 border-primary">#</th>
                                        <th class="py-2 border-primary">First Name</th>
                                        <th class="py-2 border-primary">Last Name</th>
                                        <th class="py-2 border-primary">Gender</th>
                                        <th class="py-2 border-primary">Photo</th>
                                        <th class="py-2 border-primary">Email</th>
                                        <th class="py-2 border-primary">Phone Number</th>
                                        <th class="py-2 border-primary">Positon</th>
                                        <th class="py-2 border-primary">Password</th>
                                        <th class="py-2 border-primary">Description</th>
                                        <th class="py-2 border-primary">Action</th>
                                    </tr>
                                </thead>

                                <tbody id="myTableBody">

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
                                        $sql1 = "SELECT * FROM `admin` ";
                                        $result1 = mysqli_query($con, $sql1);
                                        $dataNumber = mysqli_num_rows($result1);

                                        $total = ceil($dataNumber / 5);
                                        for ($i = 1; $i <= $total; $i++) {
                                            //  Create terniry operator
                                            echo '<li class="page-item " id="' . $i . '"  data-page="' . $i . '" " style="cursor: pointer;"><a id="datatablePagination1" class="page-link" >' . $i . '</a></li>';
                                        }
                                        ?>
                                        <li class="page-item" id="NextButton" style="cursor: pointer;"> <a id="datatablePaginationNext" class="page-link" aria-label="Next"><i class="gd-angle-right icon-text icon-text-xs d-inline-block"></i></a></li>
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
    <script src="users.js"></script>
</body>

</html>

?>
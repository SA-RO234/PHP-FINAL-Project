<?php
include "Config.php";
ob_start();
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

        <!-- Modal Delete Course -->
        <div class="modal fade" id="deletecoursemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                            <h4>Delete Course:</h4>
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h3>Are you sure you want to delete this course ! </h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary ModalDeleteBtn" id="ModalDeleteBtn" name="DeleteMycourse">Yes ! Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <!--  Modal Update Course -->
        <div class="modal fade " tabindex="-1" id="MymodalUpdateCourse">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Course :</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card ">
                            <div class="card-body border border-primary">
                                <form method="POST" enctype="multipart/form-data" id="formupdatecourse">
                                    <div class="form-row">
                                        <input type="hidden" id="id" name="id">
                                        <div class="form-group col-12 col-md-6">
                                            <label for="name">Course /Name :</label>
                                            <input type="text" class="form-control border border-primary" id="coursenameupdate" name="coursenameupdate" placeholder="Course Name">
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            <label for="email">Course /Price :</label>
                                            <input type="text" class="form-control border border-primary" id="coursepriceupdate" name="coursepriceupdate" placeholder="Course Price ">

                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-12 col-md-6">
                                            <label for="teacher">Select /Teacher:</label>
                                            <select class="form-control border border-primary" id="byteacherold" name="byteacherupdate">
                                                <?php
                                                $sql = "SELECT * FROM `teacher` ";
                                                $result = mysqli_query($con, $sql);
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option id="byteacherupdate" name="byteacherupdate" value="<?php echo $row["Teacher_id"] ?>"><?php echo $row["Teacher_Name"] ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            <label for="">Description :</label>
                                            <div class="form-floating">
                                                <textarea class="form-control border border-primary" id="descriptionupdate" name="descriptionupdate" style="height: 100px"></textarea>
                                                <label for="floatingTextarea2">Please write something ...</label>
                                            </div>
                                        </div>
                                    </div>

                                    <label for="">Upload /Photo :</label> <br>
                                    <input class="" type="file" name="myphotoupdate" id="myphotoupdate">
                                    <input type="hidden" name="oldimage" id="oldimage">
                                    <button type="submit" class="btn btn-primary float-right " data-target="#MymodalUpdateCourse" id="btnupdatecourse">Save Change</button>
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
                                    <a href="Student.php">Course</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">All Course</li>
                            </ol>
                        </nav>
                        <!-- End Breadcrumb -->

                        <div class="mb-3 mb-md-4 d-flex justify-content-between">
                            <div class="h3 mb-0">Course</div>

                            <input type="search" name="" id="live_search" placeholder="Search" class="form-control w-50">

                        </div>
                        <!-- Student table  -->
                        <div class="table-responsive-xl">
                            <table class="table table-bordered border-primary">
                                <thead>
                                    <tr>
                                        <th class="py-2 border-primary">#ID</th>
                                        <th class="py-2 border-primary">Course Name</th>
                                        <th class="py-2 border-primary">Photo</th>
                                        <th class="py-2 border-primary">by Teacher</th>
                                        <th class="py-2 border-primary">Price</th>
                                        <th class="py-2 border-primary">Description</th>
                                        <th class="py-2 border-primary">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="TbodyforCourse">

                                </tbody>
                            </table>

                            <div class="card-footer d-block d-md-flex align-items-center d-print-none">
                                <div class="d-flex mb-2 mb-md-0">Showing 1 to 8 of 24 Entries</div>

                                <nav class="pagination d-flex ml-md-auto d-print-none" aria-label="Pagination">
                                    <ul class="pagination justify-content-end font-weight-semi-bold mb-0">
                                        <li class="page-item" id="PreviousButton" style="cursor: pointer;"> <a id="datatablePaginationPrev" class="page-link" aria-label="Previous"><i class="gd-angle-left icon-text icon-text-xs d-inline-block"></i></a>
                                        </li>
                                        <?php
                                        $sql1 = "SELECT * FROM `course` ";
                                        $result1 = mysqli_query($con, $sql1);
                                        $datanumber = mysqli_num_rows($result1);
                                        $total = ceil($datanumber / 5);
                                        $currentPage = 1;
                                        //  isset($_GET["page"]) ? (int)$_GET["page"] : 1;
                                        $adjacents = 2;
                                        $max_show = 5;
                                        if ($total <= $max_show) {
                                            for ($i = 1; $i <= $total; $i++) {
                                                echo '<li class="page-item " id="' . $i . '" data-page="' . $i . '" style="cursor: pointer;"><a id="datatablePagination1" class="page-link" >' . $i . '</a></li>';
                                            }
                                        }else{
                                            //  Show first page
                                            echo '<li class="page-item " id="1" data-page="1" style="cursor: pointer;"><a id="datatablePagination1" class="page-link" >1</a></li>';

                                             if($currentPage > $adjacents +2){
                                                echo '<li class="page-item disabled"><a class="page-link" >...</a></li>';
                                             }

                                            //   page around the current page 
                                            $start = max(2,$currentPage - $adjacents);
                                            $end   = min($total-1,$currentPage+$adjacents);
                                            for($i = $start; $i<=$end;$i++){
                                                echo '<li class="page-item " id="' . $i . '" data-page="' . $i . '" style="cursor: pointer;"><a id="datatablePagination1" class="page-link" >' . $i . '</a></li>';
                                            }
                                            if($currentPage < $total - $adjacents - 1){
                                                echo '<li class="page-item disabled" ><a class="page-link" >...</a></li>';
                                            }

                                            //  Show last page 
                                            echo '<li class="page-item " id="' . $total. '" data-page="' . $total . '" style="cursor: pointer;"><a id="datatablePagination1" class="page-link" >' . $total. '</a></li>';
                                        }
                                        ?>
                                        <li class="page-item " id="NextButton" style="cursor: pointer;"> <a id="datatablePaginationNext" class="page-link" aria-label="Next"><i class="gd-angle-right icon-text icon-text-xs d-inline-block"></i></a></li>
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
    <script src="Course.js"></script>
</body>

</html>
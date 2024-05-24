<?php
include "Config.php";
// session_start();
// $_SESSION['id'];
// if (empty($_SESSION['id'])) {
//     header("location:login.php");
// }

// 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Manage</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <?php
    include "link.php";
    ?>
</head>

<body>
    <div class="content container">

        <!-- <div class="Over-view ">
            <img src="/image/let'tlearn.jpg" class="object-fit-cover" alt="">
        </div> -->

        <div class="mt-5  mb-5 d-flex justify-content-center align-items-center">
            <div class="h3 mb-0 text-center this-title">
                <h1>សូមស្វាគម៍ការមកកាន់វគ្គ សិក្សា <br> <span class="text-primary">​ តោះរៀន*</span>!</h1>
            </div>
        </div>

        <div class="container mt-5 d-flex justify-content-between">
            <div class="h3 mb-0">ជ្រើសរើស​​/ វគ្គសិក្សា</div>

            <input type="search" name="" id="live_searchcard" placeholder="Search" class="form-control w-50">

        </div>
        <!-- Course Card  -->
        <div class="container mt-5">
            <div class="row row-cols-4 " id="bodycard">

            </div>
            <h1 class="text-center py-2" id="forNotfound" style="border-radius: 10px;"></h1>
            <div class="card-footer d-block d-md-flex align-items-center d-print-none mt-5 mb-5 ">
                <div class="d-flex mb-2 mb-md-0">Showing 1 to 8 of 24 Entries</div>

                <nav class="pagination d-flex ml-md-auto d-print-none" aria-label="Pagination">
                    <ul class="pagination justify-content-end font-weight-semi-bold mb-0">
                        <li class="page-item" id="PreviousButtoncard" style="cursor: pointer;"> <a id="datatablePaginationPrev" class="page-link" aria-label="Previous"><i class="gd-angle-left icon-text icon-text-xs d-inline-block"></i></a></li>
                        <?php
                        $sql1 = "SELECT * FROM `course`";
                        $result1 = mysqli_query($con, $sql1);
                        $datanumber = mysqli_num_rows($result1);
                        $total = ceil($datanumber / 8);
                        $currentPage = 1;
                        $adjacents = 2;
                        $max_show = 5;

                        if ($total <=  $max_show) {
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
                        <li class="page-item" id="NextButtoncard" style="cursor: pointer;"> <a id="datatablePaginationNext" class="page-link" aria-label="Next"><i class="gd-angle-right icon-text icon-text-xs d-inline-block"></i></a></li>
                    </ul>
                </nav>

            </div>
        </div>
        <!-- End course Card  -->


        <!-- Footer -->
        <footer class="small p-3 px-md-4 mt-auto mb-5 ">
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
                    &copy; 2024 All Rights Reserved.
                </div>
            </div>
        </footer>
        <!-- End Footer -->
    </div>

    <script src="public/JS/App2.js"></script>
    <script src="/Course.js"></script>
</body>

</html>
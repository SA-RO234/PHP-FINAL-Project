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

        <!-- Modal Delete Student -->
        <div class="modal fade" id="deleteStudentmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                            <h4>Delete Student:</h4>
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h3>Are you sure you want to delete this student ! </h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary ModalDeleteBtn" id="ModalDeleteBtn" name="DeleteMyuser">Yes ! Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <!--  Modal Update Student -->
        <div class="modal fade " tabindex="-1" id="MymodalUpdatestudent">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Student :</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card ">
                            <div class="card-body border border-primary">
                                <form method="post" enctype="multipart/form-data" id="formUpdateStudent">
                                    <div class="form-row">
                                        <input type="hidden" id="id" name="id">
                                        <div class="form-group w-100">
                                            <label for="Name">Student Name :</label>
                                            <input id="name" type="text" class="form-control border border-primary" name="name" required="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group w-100">
                                            <label for="email">Email Address :</label>
                                            <input id="email" type="email" class="form-control border border-primary" name="email" required="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="country">Country</label><span style="color: red !important; display: inline; float: none;">*</span>

                                            <select id="country" name="country" class="form-control">
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Åland Islands">Åland Islands</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antarctica">Antarctica</option>
                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Bolivia">Bolivia</option>
                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Bouvet Island">Bouvet Island</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="Cayman Islands">Cayman Islands</option>
                                                <option value="Central African Republic">Central African Republic</option>
                                                <option value="Chad">Chad</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Christmas Island">Christmas Island</option>
                                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="French Southern Territories">French Southern Territories</option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guernsey">Guernsey</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guinea-bissau">Guinea-bissau</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="India">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Isle of Man">Isle of Man</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jersey">Jersey</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                <option value="Korea, Republic of">Korea, Republic of</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macao">Macao</option>
                                                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montenegro">Montenegro</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="Namibia">Namibia</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Netherlands">Netherlands</option>
                                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                <option value="New Caledonia">New Caledonia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="Niue">Niue</option>
                                                <option value="Norfolk Island">Norfolk Island</option>
                                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                <option value="Norway">Norway</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Palau">Palau</option>
                                                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Pitcairn">Pitcairn</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Reunion">Reunion</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russian Federation">Russian Federation</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="Saint Helena">Saint Helena</option>
                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                <option value="Saint Lucia">Saint Lucia</option>
                                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Serbia">Serbia</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">Solomon Islands</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                <option value="Taiwan">Taiwan</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Timor-leste">Timor-leste</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States">United States</option>
                                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Viet Nam">Viet Nam</option>
                                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                <option value="Western Sahara">Western Sahara</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="Province">Province /City :</label>
                                            <select id="Province_city" class="form-control border border-primary" name="province_city">
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
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6 d-flex mt-4">
                                            <div class="form-check mx-2">
                                                <input class="form-check-input" type="radio" name="Gender" id="gender" value="Female">
                                                <label class="form-check-label" for="">Female</label>
                                            </div>
                                            <div class="form-check mx-2">
                                                <input class="form-check-input" type="radio" name="Gender" id="gender" value="Male">
                                                <label class="form-check-label" for="">Male</label>
                                            </div>
                                            <div class="form-check mx-2">
                                                <input class="form-check-input" type="radio" name="Gender" id="gender" value="Other">
                                                <label class="form-check-label" for="">Other</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="date">Register /Date
                                            </label>
                                            <input id="date" type="date" class="form-control border border-primary" name="date" required="">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-12 col-md-6">
                                            <label for="course">Learn /Course :</label>
                                            <select name="course" id="course" class="form-control border border-primary">
                                                <?php
                                                $sql = "SELECT * FROM `course` ";
                                                $result = mysqli_query($con, $sql);
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row["Course_Name"]  ?>"><?php echo $row["Course_Name"] ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="image">Upload Image:</label>
                                        <input type="file" class="form-control border border-primary" id="myimage" name="myimage">
                                        <input type="hidden" name="old_image" id="old_image" class="form-control">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" id="BtnUpdateStudent">Save changes</button>
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
                                    <a href="Student.php">Student</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">All Student</li>
                            </ol>
                        </nav>
                        <!-- End Breadcrumb -->

                        <div class="mb-3 mb-md-4 d-flex justify-content-between">
                            <div class="h3 mb-0">Student</div>

                            <input type="search" name="" id="live_search" placeholder="Search" class="form-control w-50">

                        </div>
                        <!-- Student table  -->
                        <div class="table-responsive-xl">
                            <table class="table table-bordered border-primary">
                                <thead>
                                    <tr>
                                        <th class=" py-2 border-primary">#</th>
                                        <th class="py-2 border-primary">Name</th>
                                        <th class="py-2 border-primary">Gender</th>
                                        <th class="py-2 border-primary">Photo</th>
                                        <th class="py-2 border-primary">Email</th>
                                        <th class="py-2 border-primary">Province / City</th>
                                        <th class="py-2 border-primary">Country</th>
                                        <th class="py-2 border-primary">Learn /Course</th>
                                        <th class="py-2 border-primary">Registration Date</th>
                                        <th class="py-2 border-primary">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="TbodyforStudent">
           
                                </tbody>
                            </table>

                            <div class="card-footer d-block d-md-flex align-items-center d-print-none">
                                <div class="d-flex mb-2 mb-md-0">Showing 1 to 8 of 24 Entries</div>

                                <nav class="pagination d-flex ml-md-auto d-print-none" aria-label="Pagination">
                                    <ul class="pagination justify-content-end font-weight-semi-bold mb-0">
                                        <li class="page-item" id="PreviousButton" style="cursor: pointer;"> <a id="datatablePaginationPrev" class="page-link" aria-label="Previous"><i class="gd-angle-left icon-text icon-text-xs d-inline-block"></i></a></li>
                                        <?php  
                                        $sql1 = "SELECT * FROM `student`";
                                        $result1 = mysqli_query($con, $sql1);
                                        $datanumber = mysqli_num_rows($result1);
                                        $total = ceil($datanumber / 5);
                                        for ($i = 1; $i <= $total; $i++) {
                                            echo '<li class="page-item " id="' . $i . '" data-page="' . $i . '" style="cursor: pointer;"><a id="datatablePagination1" class="page-link" >' . $i . '</a></li>';
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
    <script src="Student.js"></script>
</body>

</html>
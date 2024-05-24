 <!-- Sidebar Nav -->
 <aside id="sidebar" class="js-custom-scroll side-nav">
            <ul id="sideNav" class="side-nav-menu side-nav-menu-top-level mb-0">
                <!-- Title -->
                <li class="sidebar-heading h6">All Information</li>
                <!-- End Title -->

                <!-- Teacher -->
                <li class="side-nav-menu-item side-nav-has-menu active side-nav-opened">
                    <a class="side-nav-menu-link media align-items-center" href="Teacher.html" data-target="#subTeacher">
                        <span class=" d-flex mr-3">
                            <img width="25" height="25" src="https://img.icons8.com/ios/50/teacher.png" alt="teacher" />
                        </span>
                        <span class="side-nav-fadeout-on-closed media-body">Teacher</span>
                        <span class="side-nav-control-icon d-flex">
                            <i class="gd-angle-right side-nav-fadeout-on-closed"></i>
                        </span>
                        <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                    </a>


                    <ul id="subTeacher" class="side-nav-menu side-nav-menu-second-level mb-0" style="display: block;">
                        <li class="side-nav-menu-item active">
                            <a class="side-nav-menu-link" href="Teacher.php">All Teacher</a>
                        </li>
                        <li class="side-nav-menu-item">
                            <a class="side-nav-menu-link" href="Teacher-edit.php">Add new</a>
                        </li>
                    </ul>
                    <!-- End Teacher: -->
                </li>
                <!-- End Teacher -->

                <!-- Student -->
                <li class="side-nav-menu-item side-nav-has-menu active side-nav-opened">
                    <a class="side-nav-menu-link media align-items-center" href="Student.php" data-target="#subStudent">
                        <span class="d-flex mr-2 ">
                            <img class="mx-0 " width="25" height="25" src="https://img.icons8.com/dotty/80/000000/student-male.png" alt="student-male" />
                        </span>
                        <span class="mx-0 side-nav-fadeout-on-closed media-body">Student</span>
                        <span class="side-nav-control-icon d-flex">
                            <i class="gd-angle-right side-nav-fadeout-on-closed"></i>
                        </span>
                        <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                    </a>

                    <!-- Users: subUsers -->
                    <ul id="subStudent" class="side-nav-menu side-nav-menu-second-level mb-0" style="display: block;">
                        <li class="side-nav-menu-item active">
                            <a class="side-nav-menu-link" href="Student.php">All Student</a>
                        </li>
                        <li class="side-nav-menu-item">
                            <a class="side-nav-menu-link" href="Student-edit.php">Add new</a>
                        </li>
                    </ul>
                    <!-- End Student: -->
                </li>
                <!-- End Student -->

                <!-- Course -->
                <li class="side-nav-menu-item side-nav-has-menu active side-nav-opened">
                    <a class="side-nav-menu-link media align-items-center" href="Course.php" data-target="#subCourse">
                        <span class=" d-flex mr-3">
                            <i class="fa-regular fa-calendar-minus fs-4"></i>
                        </span>
                        <span class="side-nav-fadeout-on-closed media-body">Course</span>
                        <span class="side-nav-control-icon d-flex">
                            <i class="gd-angle-right side-nav-fadeout-on-closed"></i>
                        </span>
                        <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                    </a>


                    <ul id="subCourse" class="side-nav-menu side-nav-menu-second-level mb-0" style="display: block;">
                        <li class="side-nav-menu-item active">
                            <a class="side-nav-menu-link" href="Course.php">All Course</a>
                        </li>
                        <li class="side-nav-menu-item">
                            <a class="side-nav-menu-link" href="Course-form.php">Add Course</a>
                        </li>
                    </ul>
                    <!-- End Course: -->
                </li>
                <!-- End Course -->
                <!-- City -->
                <li class="side-nav-menu-item side-nav-has-menu active side-nav-opened">
                    <a class="side-nav-menu-link media align-items-center" href="City.html" data-target="#subCity">
                        <span class="side-nav-menu-icon d-flex ">
                            <i class="fa-solid fa-signal"></i>
                        </span>
                        <span class="mx-3 side-nav-fadeout-on-closed media-body">Statistics</span>
                        <span class="side-nav-control-icon d-flex">
                            <i class="gd-angle-right side-nav-fadeout-on-closed"></i>
                        </span>
                        <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                    </a>

                    <!-- City:  -->
                    <ul id="subCity" class="side-nav-menu side-nav-menu-second-level mb-0" style="display: block;">
                        <li class="side-nav-menu-item active">
                            <a class="side-nav-menu-link" href="City.php">All Statistics</a>
                        </li>
                    </ul>
                    <!-- End City: -->
                </li>
                <!-- End City -->

                <!-- Admin -->
                <li class="side-nav-menu-item side-nav-has-menu active side-nav-opened">
                    <a class="side-nav-menu-link media align-items-center" href="#" data-target="#subUsers">
                        <span class="side-nav-menu-icon d-flex mr-3">
                            <i class="gd-user"></i>
                        </span>
                        <span class="side-nav-fadeout-on-closed media-body">Admin</span>
                        <span class="side-nav-control-icon d-flex">
                            <i class="gd-angle-right side-nav-fadeout-on-closed"></i>
                        </span>
                        <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                    </a>

                    <!-- Users: subUsers -->
                    <ul id="subUsers" class="side-nav-menu side-nav-menu-second-level mb-0" style="display: block;">
                        <li class="side-nav-menu-item active">
                            <a class="side-nav-menu-link" href="users.php">All Admin</a>
                        </li>
                        <li class="side-nav-menu-item">
                            <a class="side-nav-menu-link" href="register.php">Add new</a>
                        </li>
                    </ul>
                    <!-- End Admin: -->
                </li>
                <!-- End Admin -->

                <!-- Authentication -->
                <li class="side-nav-menu-item side-nav-has-menu">
                    <a class="side-nav-menu-link media align-items-center" href="#" data-target="#subPages">
                        <span class="side-nav-menu-icon d-flex mr-3">
                            <i class="gd-lock"></i>
                        </span>
                        <span class="side-nav-fadeout-on-closed media-body">Authentication</span>
                        <span class="side-nav-control-icon d-flex">
                            <i class="gd-angle-right side-nav-fadeout-on-closed"></i>
                        </span>
                        <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                    </a>

                    <!-- Pages: subPages -->
                    <ul id="subPages" class="side-nav-menu side-nav-menu-second-level mb-0">
                        <li class="side-nav-menu-item">
                            <a class="side-nav-menu-link" href="login.php">Login</a>
                        </li>
                        <li class="side-nav-menu-item">
                            <a class="side-nav-menu-link" href="register.php">Register</a>
                        </li>
                    </ul>
                    <!-- End Pages: subPages -->
                </li>
                <!-- End Authentication -->

                <!-- Settings -->
                <li class="side-nav-menu-item">
                    <a class="side-nav-menu-link media align-items-center" href="#">
                        <span class="side-nav-menu-icon d-flex mr-3">
                            <i class="gd-settings"></i>
                        </span>
                        <span class="side-nav-fadeout-on-closed media-body">Settings</span>
                    </a>
                </li>
                <!-- End Settings -->
            </ul>
        </aside>
        <!-- End Sidebar Nav -->
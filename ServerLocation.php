<?php
include "Config.php";
header("Content-Type:application/json");
//   Fetch location
if ($_GET["action"] === "FetchStatictics") {
    // $page = $_POST["page"];

    $sql = "SELECT `Student_Address`, COUNT(*) AS `Student_Number` FROM `student` GROUP BY `Student_Address` ORDER BY `Student_Number` DESC";
    $result = mysqli_query($con, $sql);
    $Statistics = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $Statistics[] = $row;
        }
    }
    mysqli_close($con);
    echo json_encode([
        "data" => $Statistics,
    ]);
}

//  Course Statistics 
if ($_GET["action"] === "mycourseStatistics") {

    $sql = "SELECT `Student_course`, COUNT(*) AS `CourseNumber` FROM `student` GROUP BY `Student_course` ORDER BY `CourseNumber` DESC ";
    $result = mysqli_query($con ,$sql);
    $CourseStatistics = [];
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $CourseStatistics[] = $row;
        }
    }
    echo json_encode([
        "data" => $CourseStatistics
    ]);
}

<?php
include "Config.php";
header("Content-Type:application/json");

//  This is insert Data into database
if ($_GET["action"] === "InsertStudent") {
   if (
      !empty($_POST["studentname"]) && !empty($_POST["Email"]) && !empty($_POST["course"]) && !empty($_POST["Province"]) && !empty($_POST["date"]) && !empty($_POST["Gender"])
      && !empty($_POST["country"])
   ) {
      $StudentName = mysqli_real_escape_string($con, $_POST["studentname"]);
      $StudentEmail = mysqli_real_escape_string($con, $_POST["Email"]);
      $Province    = mysqli_real_escape_string($con, $_POST["Province"]);
      $date        = mysqli_real_escape_string($con, $_POST["date"]);
      $StudentGender = mysqli_real_escape_string($con, $_POST["Gender"]);
      $Country    = mysqli_real_escape_string($con, $_POST["country"]);
      $Course     = $_POST["course"];


      $file_name = $_FILES["myimage"]["name"];
      $file_tmp =  $_FILES["myimage"]["tmp_name"];

      $file_explode = explode(".", $file_name);
      $final_file  = end($file_explode);

      $new_name   = uniqid() . time() . "." . $final_file;
      move_uploaded_file($file_tmp, "upload_Student/" . $new_name);

      $sql  = "INSERT INTO `student`(`Student_ID`, `Student_Name`, `Student_Gender`, `image_Student`, `Student_Email`, `Student_Address`, `Country_student`,`Student_course`,`Date_Student`) VALUES (Null,'$StudentName','$StudentGender','$new_name','$StudentEmail','$Province','$Country','$Course','$date')";
      $result = mysqli_query($con ,$sql);
      if ($result) {
         echo json_encode([
            "status" => 200,
            "message" => "Insert is successfuly !"
         ]);
      }
   } else {
      echo json_encode([
         "status" =>400,
         "message" => "Invalid Student ! "
      ]);
   }
}

//  Fetch data from database 
if ($_GET["action"] === "FetchStudent") {
   $limit = 5;
   $page = isset($_GET["page"]) && is_numeric($_GET["page"]) ? $_GET["page"] : 1;
   $offset = ($page - 1) * $limit;

   // $sql = "SELECT * FROM `student` INNER JOIN `city` ON `student`.`Student_Address` = `city`.`City_ID` LIMIT $limit OFFSET $offset";
   //  $sql = "SELECT * FROM `student` INNER JOIN `course` ON `student`.`Student_course` = `course`.`Course_id` LIMIT $limit OFFSET $offset"; 
   $sql = "SELECT * FROM `student` LIMIT $limit OFFSET $offset ";

   $result = mysqli_query($con, $sql);
   $Data = [];
   while ($row = mysqli_fetch_assoc($result)) {
      $Data[] = $row;
   }
   mysqli_close($con);
   echo json_encode([
      "data" => $Data
   ]);
}

//  Delete Student 
if ($_GET["action"] === "DeleteStudent") {
   $id = $_POST["id"];
   $image = $_POST["image"];
   $sql = "DELETE FROM `student` WHERE `Student_ID` = '$id'";
   $query = mysqli_query($con, $sql);
   if ($query) {
      echo json_encode([
         "status" => 200,
         "message" => "Delete is successfuly ! "
      ]);
   } else {
      echo json_encode([
         "status" => 500,
         "message" => "Server is error ! "
      ]);
   }
}

//  Fetch data as individual 
if ($_GET["action"] === "FetchSingle") {
   $id = $_POST["id"];
   $sql = "SELECT * FROM `student` WHERE `Student_ID` =  '$id'";
   $result = mysqli_query($con, $sql);
   if (mysqli_num_rows($result) > 0) {
      $data  = mysqli_fetch_assoc($result);
      echo json_encode([
         "status" => 200,
         "data" => $data
      ]);
   } else {
      echo json_encode([
         "status" => 404,
         "message" => "Is not found ! "
      ]);
   }
}

// Submit update Student 
if ($_GET["action"] === "UpdateStudent") {
   if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["course"]) && !empty($_POST["country"]) && !empty($_POST["province_city"]) && !empty($_POST["Gender"]) && !empty($_POST["date"])) {
     
      $id = mysqli_real_escape_string($con, $_POST["id"]);
      $name = mysqli_real_escape_string($con, $_POST["name"]);
      $email = mysqli_real_escape_string($con, $_POST["email"]);
      $country = mysqli_real_escape_string($con, $_POST["country"]);
      $province_city = mysqli_real_escape_string($con, $_POST["province_city"]);
      $gender = mysqli_real_escape_string($con, $_POST["Gender"]);
      $date = mysqli_real_escape_string($con, $_POST["date"]);
      $oldcourse = $_POST["course"];

      if ($_FILES["myimage"]["size"] != 0) {
         $fileupname =  $_FILES["myimage"]["name"];
         $fileUptemp = $_FILES["myimage"]["tmp_name"];

         $nameexplode = explode(".", $fileupname);
         $fileend = end($nameexplode);
         $nameoldimage = uniqid() . time() . "." . $fileend;
         move_uploaded_file($fileUptemp, "upload_Student/" . $nameoldimage);
         unlink("upload_Student/" . $_POST["old_image"]);
      } else {
         $nameoldimage = mysqli_real_escape_string($con, $_POST["old_image"]);
      }
      $sql = "UPDATE `student` SET `Student_Name`='$name',`Student_Gender`='$gender',`image_Student`='$nameoldimage',`Student_Email`='$email',`Student_Address`='$province_city',`Country_student`='$country',`Student_course`='$oldcourse',`Date_Student`='$date' WHERE `Student_ID` = '$id'";

      $result = mysqli_query($con, $sql);
      if ($result) {
         echo json_encode([
            "status" => 200,
            "message" => "Update is successfuly !"
         ]);
      } else {
         echo json_encode([
            "status" => 404,
            "message" => "No found Student !"
         ]);
      }
   }else{
      echo json_encode([
         "status" => 500,
         "message" =>"Invalid Something !"
      ]);
   }
}

//  Search database 
if ($_GET["action"] === "SearchStudent") {
   $TermInput = $_POST["Value"];
   $sql = "SELECT * FROM `student` WHERE CONCAT (Student_ID,Student_Name,Student_Gender,Student_Email,Student_Address,Country_student,Student_course,Date_Student) LIKE '%$TermInput%'";
   $result = mysqli_query($con, $sql);
   $output = "";
   if (mysqli_num_rows($result) > 0) {
      foreach ($result as $row) {
         $output .= '
         <tr> 
         <td class= "py-3 border-primary" >' . $row['Student_ID'] . '</td>
        <td class= "py-3 border-primary" >' . $row['Student_Name'] . '</td>
        <td class= "py-3 border-primary" >' . $row['Student_Gender'] . '</td> 
        <td class="py-3 border-primary"><img style="width: 90px; height: 50px;" src="upload_Student/' . $row['image_Student'] . '" alt="" class="object-fit-cover border rounded"></td>
        <td class= "py-3 border-primary" >' . $row['Student_Email'] . '</td>
        <td class= "py-3 border-primary" >' . $row['Student_Address'] . '</td>
        <td class= "py-3 border-primary" >' . $row['Country_student'] . '</td>
        <td class= "py-3 border-primary" >' . $row['Student_course'] . '</td>
        <td class= "py-3 border-primary" >' . $row['Date_Student'] . '</td>
       </tr>
         ';
      }
      echo json_encode([
         "data" => $output
      ]);
   } else {
      echo json_encode([
         "data" => "Not found Student !"
      ]);
   }
}




<?php
include "Config.php";
header("Content-Type:application/json");

//  Insert data into database
if ($_GET["action"] === "InsertTeacher") {
    if (!empty($_POST["teachername"]) && !empty($_POST["teacherEmail"]) && !empty($_POST["Address"]) && !empty($_POST["dateofbirth"]) && !empty($_POST["teacherphonenumber"])
        && !empty($_POST["teacherposition"]) && !empty($_POST["teacherhiredate"]) && !empty($_POST["department"]) && !empty($_POST["Gender"]) && !empty($_POST["qulification"]) && !empty($_FILES["image"]["name"])) {

        $TeacherName = mysqli_real_escape_string($con, $_POST["teachername"]);
        $TeacherEmail = mysqli_real_escape_string($con, $_POST["teacherEmail"]);
        $TeacherPhoneNumber = mysqli_real_escape_string($con, $_POST["teacherphonenumber"]);
        $TeacherAddress = mysqli_real_escape_string($con, $_POST["Address"]);
        $DateOfBirth = mysqli_real_escape_string($con, $_POST["dateofbirth"]);
        $Position = mysqli_real_escape_string($con, $_POST["teacherposition"]);
        $HireDate = mysqli_real_escape_string($con, $_POST["teacherhiredate"]);
        $Department = mysqli_real_escape_string($con, $_POST["department"]);
        $Gender = $_POST["Gender"];
        $Qualification = mysqli_real_escape_string($con, $_POST["qulification"]);

        $file_Name = $_FILES["image"]["name"];
        $file_tmp  = $_FILES["image"]["tmp_name"];

        $file_explode = explode(".", $file_Name);
        $file_extention = end($file_explode);

        $New_image = uniqid() . time() . "." . $file_extention;
        move_uploaded_file($file_tmp, "upload_Teacher/" . $New_image);

        $sql = "INSERT INTO `teacher`(`Teacher_id`, `Teacher_Name`, `Teacher_gender`,`Teacher_image`, `dateOfbirth`, `Teacher_email`, `phone_number`, `teacher_address`, `Hiredate`, `Department`, `position`, `Qualification`) VALUES (NULL,'$TeacherName','$Gender','$New_image','$DateOfBirth','$TeacherEmail','$TeacherPhoneNumber','$TeacherAddress','$HireDate','$Department','$Position','$Qualification')";
        $result = mysqli_query($con , $sql);
        if($result){
            echo json_encode([
                "status" => 200,
                "message" => "Insert is successfuly"
            ]);
        }
    }else{
        echo json_encode([
            "status" => 400,
             "message" => "Invalid information !"
        ]);
    }
}

//  Fetch data from database 
if($_GET["action"] === "FetchTeacher"){
    $limit = 5;
    $page = isset($_GET["page"]) && is_numeric($_GET["page"]) ? $_GET["page"] : 1;
    $offset = ($page - 1) * $limit;
    $sql = "SELECT * FROM `teacher` LIMIT $limit OFFSET $offset";
    $result = mysqli_query($con ,$sql);
    $Data = [];
    while($row = mysqli_fetch_assoc($result)){
        $Data[] = $row;
    }
    mysqli_close($con);
    echo json_encode([
        "data" => $Data
    ]);
}

//  Fetch Individual 
if($_GET["action"] === "FetchSingle"){
   $id = $_POST["id"];
   
   $sql = "SELECT * FROM `teacher` WHERE `Teacher_id` = '$id' ";
   $result = mysqli_query($con , $sql);
   if(mysqli_num_rows($result) > 0){
    $data = mysqli_fetch_assoc($result);
      echo json_encode([
        "status" => 200,
        "data" => $data 
      ]);
   }

}

//  Update data when click submit 
if($_GET["action"] === "UpdateTeacher"){
    if (!empty($_POST["oldteachername"]) && !empty($_POST["oldteacherEmail"]) && !empty($_POST["oldteacherphonenumber"]) && !empty($_POST["oldAddress"]) && !empty($_POST["olddateofbirth"])
    && !empty($_POST["oldteacherposition"]) && !empty($_POST["oldteacherhiredate"]) && !empty($_POST["olddepartment"]) && !empty($_POST["gender"]) && !empty($_POST["oldqulification"])) {
    $TeacherID   = $_POST["Teacherid"];
    $TeacherName = mysqli_real_escape_string($con, $_POST["oldteachername"]);
    $TeacherEmail = mysqli_real_escape_string($con, $_POST["oldteacherEmail"]);
    $TeacherPhoneNumber = mysqli_real_escape_string($con, $_POST["oldteacherphonenumber"]);
    $TeacherAddress = mysqli_real_escape_string($con, $_POST["oldAddress"]);
    $DateOfBirth = mysqli_real_escape_string($con, $_POST["olddateofbirth"]);
    $Position = mysqli_real_escape_string($con, $_POST["oldteacherposition"]);
    $HireDate = mysqli_real_escape_string($con, $_POST["oldteacherhiredate"]);
    $Department = mysqli_real_escape_string($con, $_POST["olddepartment"]);
    $Gender = $_POST["gender"];
    $Qualification = mysqli_real_escape_string($con, $_POST["oldqulification"]);
    
    if($_FILES["image"]["size"] !=0){
    $file_Name = $_FILES["image"]["name"];
    $file_tmp  = $_FILES["image"]["tmp_name"];

    $file_explode = explode(".", $file_Name);
    $file_extention = end($file_explode);

    $New_image = uniqid() . time() . "." . $file_extention;
    move_uploaded_file($file_tmp, "upload_Teacher/" . $New_image);
    unlink("upload_Teacher/".$_POST["old_image"]);
    }else{
        $New_image = $_POST["old_image"];
    }
   $sql =" UPDATE `teacher` SET `Teacher_Name`='$TeacherName',`Teacher_gender`='$Gender',`Teacher_image`='$New_image',`dateOfbirth`='$DateOfBirth',`Teacher_email`='$TeacherEmail',
                                `phone_number`='$TeacherPhoneNumber',`teacher_address`='$TeacherAddress',`Hiredate`='$HireDate',`Department`='$Department',`position`='$Position',`Qualification`='$Qualification' WHERE `Teacher_id` = '$TeacherID'";
    $result = mysqli_query($con , $sql);
    if($result){
        echo json_encode([
            "status" => 200,
            "message" => "Update is successfuly !"
        ]);
    }
}else{
    echo json_encode([
        "status" => 400,
         "message" => "Invalid information !"
    ]);
}
}

//  Delete in database 
if($_GET["action"] === "DeleteTeacher"){
   $id = $_POST["id"];
   $image = $_POST["image"];

   $Sql = "DELETE FROM `teacher` WHERE `Teacher_id` = '$id'";
   $result = mysqli_query($con, $Sql);

   unlink("upload_Teacher/".$image);
   if($result){
    echo json_encode([
        "status" => 200,
        "message" => "Delete is successfuly !"
    ]);
   }
}

//  Search live 
if($_GET["action"] === "SearchLive"){
   $value = $_POST["value"];
    $sql = "SELECT * FROM `teacher` WHERE CONCAT (Teacher_Name,Teacher_gender,dateOfbirth,Teacher_email,phone_number,teacher_address,Hiredate,Department,position,Qualification) LIKE '%$value%'";
    $result = mysqli_query($con , $sql);
    $output="";
    if(mysqli_num_rows($result) > 0){
        foreach ($result as $row){
            $output .='
            <tr>
            <td class="py-3 border-primary">'.$row['Teacher_id'].'</td>
            <td class="align-middle py-3 border-primary">
               <div class="d-flex align-items-center">
                 <div class="position-relative mr-2">
                   <span class="indicator indicator-lg indicator-bordered-reverse indicator-top-left indicator-success rounded-circle"></span>
                      <span class="avatar-placeholder mr-md-2">J</span>
                 </div>'.$row["Teacher_Name"].'</div>
            </td>
            <td class="py-3 border-primary">'.$row['Teacher_gender'].'</td>
            <td class="py-3 border-primary"><img  class="rounded" src="upload_Teacher/'.$row['Teacher_image'].'" style="width: 90px; height: 50px;object-fit:cover" alt=""></td>
            <td class="py-3 border-primary">'. $row['Teacher_email'].'</td>
            <td class="py-3 border-primary" >'.$row['Department'].'</td>
            <td class="py-3 border-primary">'.$row['dateOfbirth'].'</td>
            <td class="py-3 border-primary">'.$row['position'].'</td>
            <td class="py-3 border-primary"><p>'.$row['teacher_address'].'</p></td>
            <td class="py-3 border-primary">'.$row['phone_number'].'</td>
            <td class="py-3 border-primary">'.$row['Hiredate'].'</td>
            <td class="py-3 border-primary">'.$row['Qualification'].'</td>
            <td class="py-3 border-primary">
               <div class="position-relative">
                 <button type="button" value="'.$row['Teacher_id'].'" class="btn btnupdateTeacher" ><i class="gd-pencil icon-text"></i></button>
                 <button type="button" value="'.$row['Teacher_id'].'" class="btn btndeleteteacher" ><i class="gd-trash icon-text"></i></button>
                <button type="hidden" value="'.$row['Teacher_image'].'" class="btn imagedelete" ></button>
               </div>
              </td>
            </tr>
            ';
        }
        echo json_encode([
            "data" => $output
        ]);
    }else{
        echo json_encode([
            "data" => "Not Found Teeacher"
        ]);
    }
}
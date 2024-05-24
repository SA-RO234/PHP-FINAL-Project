<?php
include "Config.php";
header('Content-Type:application/json');

//  Fetch From Database 

if ($_GET["action"] === "FetchData") {
  $limit = 5;
  $mypage  = isset($_GET["page"]) && is_numeric($_GET["page"]) ? $_GET["page"] : 1;

  $offset = ($mypage - 1) * $limit;

  $sql = "SELECT * FROM `course` INNER JOIN `teacher` ON `course`.`by_Teacher` = `teacher`.`Teacher_id` LIMIT $limit OFFSET $offset";
  $result = mysqli_query($con, $sql);

  $data = [];
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $data[] = $row;
    }
    mysqli_close($con);
    echo json_encode([
      "data" => $data
    ]);
  }
}

//  Fetch Card 
if ($_GET["action"] === "FetchDataasCard") {

  $limit = 8;
  $cardPage = isset($_GET["page"]) && (int)$_GET["page"] ? $_GET["page"] : 1;
  $cardoffset = ($cardPage - 1) * $limit;

  $sql = "SELECT * FROM `course` INNER JOIN `teacher` ON `course`.`by_Teacher` = `teacher`.`Teacher_id` LIMIT $limit OFFSET $cardoffset ";
  $result = mysqli_query($con, $sql);

  $data = [];
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $data[] = $row;
    }
    mysqli_close($con);
    echo json_encode([
      "data" => $data
    ]);
  }
}

//  Server Insert \
if ($_GET["action"] === "InsertCourse") {
  if (
    !empty($_POST["coursename"]) && !empty($_POST["courseprice"]) && !empty($_POST["description"]) &&
    !empty($_POST["byteacher"]) && !empty($_FILES["myphoto"]["name"])
  ) {

    $CourseName = mysqli_real_escape_string($con, $_POST["coursename"]);
    $CoursePrice = mysqli_real_escape_string($con, $_POST["courseprice"]);
    $ByTeacher   = mysqli_real_escape_string($con, $_POST["byteacher"]);
    $Description = mysqli_real_escape_string($con, $_POST["description"]);

    $PhotoName = $_FILES["myphoto"]["name"];
    $PhotoTmp  = $_FILES["myphoto"]["tmp_name"];
    $FileExplode = explode(".", $PhotoName);
    $FileEnd  = end($FileExplode);

    $NewPhoto = uniqid() . time() . "." . $FileEnd;
    move_uploaded_file($PhotoTmp, "upload_Course/" . $NewPhoto);

    $sql = "INSERT INTO `course`(`Course_id`, `Course_Name`, `Course_image`, `by_Teacher`, `Course_price`, `Course_description`) VALUES (NULL,'$CourseName','$NewPhoto','$ByTeacher','$CoursePrice','$Description')";
    $excute = mysqli_query($con, $sql);
    if ($excute) {
      echo json_encode([
        "status" => 200,
        "message" => "Insert is Successfuly !"
      ]);
    } else {
      echo json_encode([
        "status" => 500,
        "message" => "Internet Server Error !"
      ]);
    }
  } else {
    echo json_encode([
      "status" => 400,
      "message" => "Invalid Something !"
    ]);
  }
}

//  Fetch individual for update 
if ($_GET["action"] === "UpdateCourse") {
  $id = $_POST["id"];

  $sql = "SELECT * FROM `course` WHERE `Course_id` = '$id'";
  $result = mysqli_query($con, $sql);
  $Myvalue = [];
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $Myvalue[] = $row;
    }
    echo json_encode([
      "data" => $Myvalue
    ]);
  }
}

//  Update data 
if ($_GET["action"] === "UpdateoldCourse") {
  if (
    !empty($_POST["coursenameupdate"]) && !empty($_POST["coursepriceupdate"]) && !empty($_POST["descriptionupdate"]) &&
    !empty($_POST["byteacherupdate"])
  ) {
    $CourseID  = $_POST["id"];
    $CourseNameold = mysqli_real_escape_string($con, $_POST["coursenameupdate"]);
    $CoursePriceold = mysqli_real_escape_string($con, $_POST["coursepriceupdate"]);
    $ByTeacherold   = mysqli_real_escape_string($con, $_POST["byteacherupdate"]);
    $Descriptionold = mysqli_real_escape_string($con, $_POST["descriptionupdate"]);

    if ($_FILES["myphotoupdate"]["size"] != 0) {
      $PhotoNamenew = $_FILES["myphotoupdate"]["name"];
      $PhotoTmpnew  = $_FILES["myphotoupdate"]["tmp_name"];
      $FileExplodenew = explode(".", $PhotoNamenew);
      $FileEndnew  = end($FileExplodenew);

      $NewPhotothenold = uniqid() . time() . "." . $FileEndnew;
      move_uploaded_file($PhotoTmpnew, "upload_Course/" . $NewPhotothenold);
      unlink("upload_Course/" . $_POST["oldimage"]);
    } else {
      $NewPhotothenold = $_POST["oldimage"];
    }

    $sql = "UPDATE `course` SET `Course_Name`='$CourseNameold',`Course_image`='$NewPhotothenold',`by_Teacher`='$ByTeacherold',`Course_price`='$CoursePriceold',`Course_description`='$Descriptionold' WHERE `Course_id` ='$CourseID'";
    $excute = mysqli_query($con, $sql);
    if ($excute) {
      echo json_encode([
        "status" => 200,
        "message" => "Update is Successfuly !"
      ]);
    } else {
      echo json_encode([
        "status" => 500,
        "message" => "Internet Server Error !"
      ]);
    }
  } else {
    echo json_encode([
      "status" => 400,
      "message" => "Invalid Something !"
    ]);
  }
}


//  Delete Course in database 
if ($_GET["action"] === "DeleteCourse") {
  $idfordelete = $_POST["id"];

  $sql = "DELETE FROM `course` WHERE `Course_id` = '$idfordelete'";

  if (mysqli_query($con, $sql)) {
    unlink("upload_Course/" . $_POST["imagefordelete"]);
    echo json_encode([
      "status" => 200,
      "message" => "Delete is successfuly"
    ]);
  } else {
    echo json_encode([
      "status" => 500,
      "message" => "Server Error Fail Delete ! "
    ]);
  }
}

//  Search live
if ($_GET["action"] === "SearchCourse") {
  $searchitem = $_POST["value"];

  $sql = "SELECT * FROM `course` WHERE CONCAT (Course_id,Course_Name,by_Teacher,Course_price,Course_description) LIKE '%$searchitem%' ";
  $result = mysqli_query($con, $sql);
  $Output = "";
  if (mysqli_num_rows($result) > 0) {
    foreach ($result as $row) {
      $Output .= '
      <tr> 
      <td class= "py-3 border-primary" >' . $row['Course_id'] . '</td>
     <td class= "py-3 border-primary" >' . $row['Course_Name'] . '</td>
     <td class="py-3 border-primary"><img style="width: 90px; height: 50px;" src="upload_Course/' . $row['Course_image'] . '" alt="" class="object-fit-cover border rounded"></td>
     <td class= "py-3 border-primary" >' . $row['by_Teacher'] . '</td>
     <td class= "py-3 border-primary" >' . $row['Course_price'] . '$</td>
     <td class= "py-3 border-primary" >' . $row['Course_description'] . '</td>
     <td class="py-3 border-primary">
        <div class="position-relative ">
         <button type="button" class="btn btnEdit" value="' . $row['Course_id'] . '"><i class="gd-pencil icon-text"></i></button>
         <button type="button" class="ml-2 btn BtnDelete" value="' . $row['Course_id'] . '" ><i class="gd-trash icon-text"></i></button>
         <input type="hidden" class="imageDelete" id="oldimagedelete" value="' . $row['Course_image'] . '"></input>
      </div></td>
    </tr>
      ';
    }
    echo json_encode([
      "data" => $Output
    ]);
  } else {
    echo json_encode([
      "status" => 404,
      "message" => "Not found !"
    ]);
  }
}

//  Search live of card
if ($_GET["action"] === "cardkeyup") {
  $keyvalue = $_POST["keyupvalue"];
  $sql = "SELECT * FROM `course` WHERE CONCAT (Course_Name,by_Teacher,Course_price,Course_description) LIKE '%$keyvalue%' ";
  $result = mysqli_query($con, $sql);
  $OutputCourse = '';
  if (mysqli_num_rows($result) > 0) {
    foreach ($result as $row) {
      $OutputCourse .= ' 
        <div class="col">
         <div class="card" style="width: 18rem;">
           <img src="upload_Course/' . $row["Course_image"] . '" class="card-img-top  rounded" alt="..." style="height: 300px; object-fit:cover;">
            <div class="card-body">
               <h5 class="card-title">' . $row["Course_Name"] . '</h5>
                <p class="card-text">' . $row["Course_description"] . '</p>
                  <div class="footer-card d-flex justify-content-between align-items-center">
                   <p class="teacher-section fw-bold">By : ' . $row["by_Teacher"] . '</p>
                   <p class="price-section">Price : <span class="text-primary">' . $row["Course_price"] . '$</span></p>
            </div>
        <a href="#" class="btn btn-primary ml-10">Start learning</a>
        </div>
        "</div>
        "</div>
        ';
    }
    echo json_encode([
      "data" => $OutputCourse
    ]);
  } else {
    echo json_encode([
      "status" => 404,
      "message" => "មិនមាន​ /វគ្គសិក្សានេះទេ​ !"
    ]);
  }
}

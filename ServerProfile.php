<?php
header('Content-Type:application/json');
include "Config.php";

global $con;
//  Insert Data into database
if ($_GET["action"] === "InsertDataUser") {
	if (!empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["email"]) && !empty($_POST["position"]) && !empty($_POST["gender"]) && !empty($_POST["password"]) && !empty($_POST["password_confirmation"]) && !empty($_POST["phone_number"]) && !empty($_POST["description"])) {

		$first_name = mysqli_real_escape_string($con, $_POST["first_name"]);
		$last_name =  mysqli_real_escape_string($con, $_POST["last_name"]);
		$email     =  mysqli_real_escape_string($con, $_POST["email"]);
		$position  =  mysqli_real_escape_string($con, $_POST["position"]);
		$gender    =  mysqli_real_escape_string($con, $_POST["gender"]);
		$password  =  mysqli_real_escape_string($con, $_POST["password"]);
		$Confirm_pass = mysqli_real_escape_string($con, $_POST["password_confirmation"]);
		$phone_number = mysqli_real_escape_string($con, $_POST["phone_number"]);
		$description  = mysqli_real_escape_string($con, $_POST["description"]);

		$file_name = $_FILES["image"]["name"];
		$file_tmp  = $_FILES["image"]["tmp_name"];
		$file_expload = explode('.', $file_name);
		$myImage  = end($file_expload);
		$new_name    = uniqid() . time() . "." . $myImage; // Create new name for image 
		move_uploaded_file($file_tmp, "upload_admin/" . $new_name);

		$sql = " INSERT INTO `admin`(`firstname`,`lastname`,`email`,`gender`,`phone_number`,`image`,`position`,`password`,`confirm_pass`,`description`) VALUES ('$first_name','$last_name','$email','$gender','$phone_number','$new_name','$position','$password','$Confirm_pass','$description')";

		if (mysqli_query($con, $sql)) {
			echo json_encode([
				"status" => 200,
				"message" => "Insert is successfuly ! 😁"
			]);
		} else if (mysqli_query($con, $sql)) {
			echo json_encode([
				"status" => 500,
				"message" => "Internal Server Error ! 😁"
			]);
		}
	}
}

//  Fetch Data from database 
if ($_GET["action"] === "FetchData") {
	//  pagination
	$limit = 5;
	$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

	//  Calculate offset for the query 
	$offset = ($page - 1) * $limit;

	$sql = "SELECT * FROM `admin` LIMIT $limit OFFSET $offset";
	$result = mysqli_query($con, $sql);
	$data = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$data[] = $row;
	}
	mysqli_close($con);
	echo json_encode([
		"data" => $data
	]);
}

//  Edit user individual
if ($_GET["action"] === "FetchSigle") {
	$id = $_POST['id'];
	$sql = "SELECT * FROM `admin` WHERE `id` = '$id'";
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result) > 0) {
		$data = mysqli_fetch_assoc($result);
		echo json_encode([
			"status" => 200,
			"data" => $data
		]);
	} else {
		echo json_encode([
			"status" => 404,
			"message" => "Not Found user with this id ! "
		]);
	}
	mysqli_close($con);
}

//  Update  data 
if ($_GET["action"] === "UpdateAdmin") {
	if (
		!empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["email"]) && !empty($_POST["position"])
		&& !empty($_POST["gender"]) && !empty($_POST["password"]) && !empty($_POST["password_confirmation"])
		&& !empty($_POST["phone_number"]) && !empty($_POST["description"])
	) {
		$id = mysqli_real_escape_string($con, $_POST["id"]);
		$first_name = mysqli_real_escape_string($con, $_POST["first_name"]);
		$last_name =  mysqli_real_escape_string($con, $_POST["last_name"]);
		$email     =  mysqli_real_escape_string($con, $_POST["email"]);
		$position  =  mysqli_real_escape_string($con, $_POST["position"]);
		$gender    =  mysqli_real_escape_string($con, $_POST["gender"]);
		$password  =  mysqli_real_escape_string($con, $_POST["password"]);
		$Confirm_pass = mysqli_real_escape_string($con, $_POST["password_confirmation"]);
		$phone_number = mysqli_real_escape_string($con, $_POST["phone_number"]);
		$description  = mysqli_real_escape_string($con, $_POST["description"]);

		if ($_FILES["image"]["size"] != 0) {
			$originalName = $_FILES["image"]["name"];
			$nameTmp      = $_FILES["image"]["tmp_name"];
			$oldimageExplode = explode(".", $originalName);
			$myimageUpdate = end($oldimageExplode);

			$image_newName =  uniqid() . time() . "." . $myimageUpdate;
			move_uploaded_file($nameTmp, "upload_admin/" . $image_newName);
			unlink("upload_admin/" . $_POST["old_image"]);
		} else {
			$image_newName = mysqli_real_escape_string($con, $_POST["old_image"]);
		}
		$sql = "UPDATE `admin` SET `firstname`='$first_name',`lastname`='$last_name',`email`='$email',`gender`='$gender',
		                           `phone_number`='$phone_number',`image`='$image_newName',`position`='$position',
								   `password`='$password',`confirm_pass`='$Confirm_pass',`description`='$description' WHERE `id` = '$id' ";

		if (mysqli_query($con, $sql)) {
			echo json_encode([
				"status" => 200,
				"message" => "Data Update is successfully !"
			]);
		} else {
			echo json_encode([
				"status" => 500,
				"message" => " Failed to Update Data !"
			]);
		}
		mysqli_close($con);
	} else {

		echo json_encode([
			"status" => 400,
			"message" => " Please fille all the required fields ! "
		]);
	}
}


//  Delete Data 
if ($_GET['action'] === "DeleteUSers") {
	$id = $_POST['userid'];
	$Myimage = $_POST['userimage'];

	$sql = "DELETE FROM `admin` WHERE `id` = '$id' ";
	if (mysqli_query($con, $sql)) {
		unlink("upload_admin/" . $Myimage);
		echo json_encode([
			"status" => 200,
			"message" => "Delete is successfuly  ! "
		]);
	} else {
		echo json_encode([
			"status" => 500,
			"message" => "Fail to delete data ! "
		]);
	}
}

//  Live Search 
if ($_GET["action"] === "SearchLiveUser") {
	$input = $_POST["searchTerm"];

	$sql = "SELECT * FROM `admin` WHERE firstname LIKE '%$input%' ";
	$result = mysqli_query($con, $sql);
	$output = "";
	if (mysqli_num_rows($result) > 0) {
		foreach ($result as $row) {
			$output .= '
			  <tr>
			     <td class= "py-3 border-primary" >' . $row['id'] . '</td>
				 <td class= "py-3 border-primary" >' . $row['firstname'] . '</td>
				 <td class= "py-3 border-primary" >' . $row['lastname'] . '</td>
				 <td class= "py-3 border-primary" >' . $row['gender'] . '</td>
				 <td class="py-3 border-primary"><img style="width: 90px; height: 50px;" src="upload_admin/' . $row['image'] . '" alt="" class="object-fit-cover border rounded"></td>
				 <td class= "py-3 border-primary" >' . $row['email'] . '</td>
				 <td class= "py-3 border-primary" >' . $row['phone_number'] . '</td>
				 <td class= "py-3 border-primary" >' . $row['position'] . '</td>
				 <td class= "py-3 border-primary" >' . $row['password'] . '</td>
				 <td class= "py-3 border-primary" >' . $row['description'] . '</td>
			   </tr>
			   ';
		}
		echo json_encode([
			"data" => $output
		]);
	} else {
		echo json_encode([
			"data" => "Not found User !"
		]);
	}
}

//  Change Photo of Profile 
if ($_GET["action"] === "UpdateofProfile") {
	$ID = $_POST["id"];
	$oldPhoto = $_POST["old_img"];

	if ($_FILES["myPhoto"]["size"] != 0) {
		$myfile   = $_FILES["myPhoto"]["name"];
		$myfiletmp   = $_FILES["myPhoto"]["tmp_name"];

		$Photoexpload = explode(".",$myfile);
		$Photoend   = end($Photoexpload);

		$PhotoNewName = uniqid() . time(). "." .$Photoend;
		move_uploaded_file($myfiletmp , "upload_admin/".$PhotoNewName);
		unlink("upload_admin/".$_POST["old_img"]);
	}else{
		$PhotoNewName = $_POST["old_img"];
	}
	$sql = "UPDATE `admin` SET `image` = '$PhotoNewName' WHERE `id` = '$ID'";
    $excute = mysqli_query($con ,$sql);
   if($excute){
	  echo json_encode([
		"status" => 200,
		"message" => "Profile changed !"
	  ]);
   }
}


 <!DOCTYPE html>
 <html lang="en">

 <head>
 	<!-- Title -->
 	<title>Create new account</title>

 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 	<meta http-equiv="x-ua-compatible" content="ie=edge">

 	<?php
      include "link.php";
	?>
 </head>

 <body class="">
 	<main class="main">
 		<div class="content">
 			<div class="container-fluid">
 				<a href="users.php"><img class="Arrow" src="/image/Arrow_back.png" alt=""></a>
 				<div class="row d-flex justify-content-md-center">
 					<div class="card-wrapper col-12 col-md-4 mt-5">
 						<div class="brand text-center mb-3">
 							<a href="index.php"><img src="public/img/logo1.png"></a>
 						</div>
 						<div class="card card-AddUser " id="card_AddUser">
 							<div class="card-body border border-primary">
 								<h4 class="card-title">Create new account</h4>
 								<form method="post" enctype="multipart/form-data" id="formRegisterAdmin">
 									<div class="form-row">
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
 										<input id="image" type="file" class="form-control border border-primary" name="image" required="">
 									</div>
 									<div class="form-group">
 										<label for="floatingTextarea2">Description:</label>
 										<textarea class="form-control border border-primary" placeholder="Description :" id="floatingTextarea2" style="height: 100px" name="description"></textarea>

 									</div>
 									<div class="form-group no-margin">
 										<input type="submit" value="Sign Up" class="btn btn-primary btn-block" id="InsertBtn" name="submit">
 									</div>
 									<div class="text-center mt-3 small">
 										Already have an account? <a href="login.php">Sign In</a>
 									</div>
 								</form>
 							</div>
 						</div>

 					</div>
 				</div>

 			</div>

 		</div>
 	</main>
 </body>
 <script src="users.js"></script>
 <script src="public/JS/App.js"></script>
 <script src="public/JS/App2.js"></script>

 </html>
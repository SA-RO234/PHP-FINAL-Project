<?php
  include "Config.php";
  ob_start();
  session_start();
  if(!empty($_SESSION["id"])){
	header("location:index.php");

  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Title -->
    <title>Login</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">


    <!-- Template -->
    <link rel="stylesheet" href="/index2.css">
  </head>

  <body class="">

    <main class="main">

      <div class="content">

			<div class="container-fluid pb-5">

				<div class="row justify-content-md-center">
					<div class="card-wrapper col-12 col-md-4 mt-5">
						<div class="brand text-center mb-3">
							<a href="/grains-master/index.php"><img src="public/img/logo1.png"></a>
						</div>
						<div class="card">
							<div class="card-body border border-primary">
								<h4 class="card-title">Login</h4>
								<form method="post" autocomplete="off" >
									<div class="form-group">
										<label for="email">E-Mail Address</label>
										<input id="email" type="email" class="form-control border border-primary"  name="email" required="" autofocus="">
									</div>

									<div class="form-group">
										<label for="password">Password
										</label>
										<input id="password" type="password" class="form-control border border-primary" name="password" required="">
										<div class="text-right">
											<a href="password-reset.html" class="small">
												Forgot Your Password?
											</a>
										</div>
									</div>

									<div class="form-group">
										<div class="form-check position-relative mb-2">
										  <input type="checkbox" class="form-check-input d-none " id="remember" name="remember">
										  <label class="checkbox checkbox-xxs form-check-label ml-1" for="remember"
												 data-icon="&#xe936">Remember Me</label>
										</div>
									</div>

									<div class="form-group ">
										 <input type="submit" class="btn btn-primary form-control " value="Sign In" name="login">
									</div>
									<div class="text-center mt-3 small">
										Don't have an account? <a href="register.php">Sign Up</a>
									</div>
								</form>
							</div>
						</div>
						<footer class="footer mt-3">
							<div class="container-fluid">
								<div class="footer-content text-center small">
									<span class="text-muted">&copy; 2019 Graindashboard. All Rights Reserved.</span>
								</div>
							</div>
						</footer>
					</div>
				</div>



			</div>

      </div>
    </main>

  </body>
</html>

<?php
 if(!empty($_POST['login'])){
	
	$Email = $_POST['email'];
	$Password  = $_POST['password'];
    
	$sql = "SELECT * FROM `admin` WHERE `email` = '$Email' AND `password` = '$Password' " ;

	$_Result =  mysqli_query($con, $sql);
	 if(mysqli_num_rows($_Result) > 0){
        while($row = mysqli_fetch_assoc($_Result)){
	
			$_SESSION["id"] = $row['id'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['MYfirstName'] = $row['firstname'];
			$_SESSION['MYlastName'] = $row['lastname'];
            $_SESSION["MyProfile"]  =  $row['image'];
			$_SESSION['MyPosition'] = $row['position'];
			$_SESSION['Mydescription'] = $row['description'];
			
 			header("location:index.php");
 		}
	 }
	
 }

?>
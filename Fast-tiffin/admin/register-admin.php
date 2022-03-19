<?php 
	session_start();
	error_reporting(0);
	include('includes/dbconnection.php');
	if(isset($_POST['submit']))
	{
		$fname=$_POST['fname'];
		$uname=$_POST['uname'];
		$mobno=$_POST['mobno'];
		$email=$_POST['email'];
		$password=md5($_POST['password']);
		$ret="select Email from tbladmin where Email=:email";
		$query= $dbh -> prepare($ret);
		$query-> bindParam(':email', $email, PDO::PARAM_STR);
		$query-> execute();
		$results = $query -> fetchAll(PDO::FETCH_OBJ);

		if($query -> rowCount() == 0)
		{
		$sql="Insert Into tbladmin(AdminName,UserName,MobileNumber,Email,Password)Values(:fname,:uname,:mobno,:email,:password)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':fname',$fname,PDO::PARAM_STR);
		$query->bindParam(':uname',$uname,PDO::PARAM_STR);
		$query->bindParam(':email',$email,PDO::PARAM_STR);
		$query->bindParam(':mobno',$mobno,PDO::PARAM_INT);
		$query->bindParam(':password',$password,PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if($lastInsertId)
		{
			echo "<script>alert('You have successfully registered');</script>";
		}
		else
		{
			echo "<script>alert('Something went wrong.Please try again');</script>";
		}
		}
		else
		{
			echo "<script>alert('Email-id already exist. Please try again');</script>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>

	<title>Fast-Tiffin.com | Register Admin page</title>
	<link href="scss/style.scss" rel='stylesheet' type='text/css' />
    <link href="dist/css/style.min.css" rel="stylesheet">

	<style>
		.input-field {
    		border: none;
			border: 1px solid #dbdbdb;
			outline: none;
			opacity: 0.5;
		}
		#submit {
  			display: block;
  			width: 100%;
			color: #fff;
    		background-color: #1c2d41;
		}
	</style>

</head>
<body>

<div class="main-wrapper">
      
	  <div class="preloader">
		  <div class="lds-ripple">
			  <div class="lds-pos"></div>
			  <div class="lds-pos"></div>
		  </div>
	  </div>
   
	  <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
		  style="background:url(assets/images/big/texture-bg.jpg) no-repeat center center;">
		  <div class="auth-box row">
			  <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(assets/images/big/sign-up.png); width: 300;height: 400"></div>
			  <div class="col-lg-5 col-md-7 bg-white">
				  <div class="p-3">
					  <div class="text-center">
						  <img src="assets/images/big/icon.png" alt="wrapkit">
					  </div>

					  <h2 class="mt-3 text-center">Sign Up</h2>
					  <p class="text-center">Enter your details here to sign up for admin panel.</p>
					  <form class="mt-4" method="post">

						<div class="row">

							<div class="col-lg-12">
								<div class="form-group">
									<label class="text-dark">Full Name<label> *</label></label>
									<input type="text" placeholder="Full Name" name="fname" required="true" class="input-field">
								</div>
							</div>
							  
							<div class="col-lg-12">
								<div class="form-group">
									<label class="text-dark">Username<label> *</label></label>
									<input type="text" placeholder="User Name" name="uname" required="true" class="input-field">
								</div>
							</div>
							
							<div class="col-lg-12">
								<div class="form-group">
									<label class="text-dark">Mobile Number<label> *</label></label>
									<input type="text" placeholder="Mobile" name="mobno" maxlength="10" pattern="[0-9]+" required="true" class="input-field">
								</div>
							</div>
							
							<div class="col-lg-12">
								<div class="form-group">
									<label class="text-dark">Email ID<label> *</label></label> <br/>
									<input type="email" placeholder="Email" name="email" id="email" required="true" onBlur="userAvailability()" class="input-field">
									<span id="user-availability-status1" style="font-size:12px;"></span>
								</div>
							</div>

							<div class="col-lg-12">
								<div class="form-group">
									<label class="text-dark" for="pwd">Password<label> *</label></label>
									<input type="password" placeholder="Password" name="password" required="true" class="input-field">
								</div>
							</div>


							<div class="col-lg-12 text-center">
								<input type="submit" value="Sign Up" name="submit" id="submit" style="cursor:pointer">
							</div>

							<div class="col-lg-12 text-center mt-5">
								<p><a class="acount-btn" href="login.php">Already Have an Account</a></p>
								<p><a href="../index.php">Back Home</a></p>
							</div>
						</div>

					  </form>
				  </div>
			  </div>
		  </div>
	  </div>

  </div>

	<!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
    </script>

</body>
</html>
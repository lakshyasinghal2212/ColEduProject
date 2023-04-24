<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LOGIN @ COLEDU</title>
	<link rel="shortcut icon" type="png" href="images/icon/favicon.png">
	<title>Login SignUp</title>
	<link rel="stylesheet" type="text/css" href="loginStyle.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- It will redirect to the Home Page after submitting the form -->
</head>
<body>
<div class="form-box">
			<div class="button-box">
				<div id="btn"></div>
				<button type="button" class="toggle-btn" id="log" onclick="login()" style="color: #fff;">Log In</button>
				<button type="button" class="toggle-btn" id="reg" onclick="register()">Register</button>
			</div>
			<div class="social-icons">
				<img src="images/icon/fb2.png">
				<img src="images/icon/insta2.png">
				<img src="images/icon/tt2.png">
			</div>

			<!-- Login Form -->
			<form id="login" class="input-group" method="POST">
				<div class="inp">
					<img src="images/icon/user.png"><input type="text" id="username" name="username" class="input-field" placeholder="Username or Phone Number" style="width: 88%; border:none;" required="required">
				</div>
				<div class="inp">
					<img src="images/icon/password.png"><input type="password" id="password" name="password" class="input-field" placeholder="Password" style="width: 88%; border: none;" required="required">
				</div>
				<button type="submit" class="submit-btn" style="margin-top:50px;">Log In</button>
					<?php
						session_start();
						$conn = mysqli_connect("localhost", "root", 7665, "coledu");
						if($conn == false){
						die("ERROR: Could not connect. ".mysqli_connect_error());
						}
						if($_SERVER['REQUEST_METHOD'] == "POST")
						{
							$username=$_POST['username'];
							$passworduh=$_POST['password'];
							$password = hash('sha1', $passworduh);
							$_SESSION['username']= $username;
							$_SESSION['password']= $password;

							$sql="select * from registration where email='{$username}' && password ='{$password}'||contact='{$username}' && password ='{$password}'";
							$result = mysqli_query($conn,$sql);
							$count=mysqli_num_rows($result);

							if($count==1){
								$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
								$contact=$row['contact'];
								$Discipline=$row['Discipline'];
								$_SESSION['contact']=$contact;
								$_SESSION['Discipline']=$Discipline;
								header("location:index.php");
							}
							else{ 
								echo "Invalid username or/and password!!";
								// unset($_POST['username']);
								// unset($_POST['password']);
							}
						}	
							mysqli_close($conn);
						?>
			</form>
					

						<div class="other" id="other">
							<div class="instead">
								<h3>or</h3>
							</div>
							<button class="connect" onclick="google()">
								<img src="images/icon/google.png"><span>Sign in with Google</span>
							</button>
						</div>
						
							<!-- Registration Form -->
						<form id="register" class="input-group" method="POST" action="register.php">
							<input type="text" class="input-field" name="name"  placeholder="Full Name" required="required">
							<input type="text" class="input-field" name="contact"  placeholder="Mobile number" required="required">
							<input type="email" class="input-field" name="email" placeholder="Email Address" required="required">
							<input type="password" class="input-field" name="password" id="password" placeholder="Create Password"  required="required">
							<br><br>
							<label style="font-size:15px">Select discipline: 
							<select name = "Discipline">
							<option value = "" selected>--Select--</option>
								<option value = "Computer Science/Information Technology">Computer Science/Information Technology</option>
								<option value = "Mechanical Engineering">Mechanical Engineering</option>
								<option value = "Electrical Engineering">Electrical Engineering</option>
								<option value = "Civil Engineering">Civil Engineering</option>
								<option value = "Chemical Engineering">Chemical Engineering</option>

							</select>
							<!-- <input type="checkbox" class="check-box" id="chkAgree" onclick="goFurther()">I agree to the Terms & Conditions -->
							<button type="submit" id="btnSubmit" class="submit-btn">Register</button>
						</form>
			
</body>
<script type="text/javascript" src="script.js"></script>
</html>
<?php
			// session_start();
			$conn = mysqli_connect("localhost", "root", 7665, "coledu");
			if($conn == false){
			die("ERROR: Could not connect. ".mysqli_connect_error());
			}
			if($_SERVER['REQUEST_METHOD'] == "POST")
            {
						$name = $_POST['name'];
						$contact=$_POST['contact'];
						$email = $_POST['email'];
						$passworduh=$_POST['password'];
						$password = hash('sha1', $passworduh);
						$Discipline=$_POST['Discipline'];
						$_SESSION['Discipline']=$Discipline;
						$_SESSION['name']= $name;
						$check_email=mysqli_query($conn,"select name from registration where email='{$email}'");
						$check_contact=mysqli_query($conn,"select name from registration where contact='{$contact}'");

							if(mysqli_num_rows($check_email)>0 || mysqli_num_rows($check_contact)>0){
							echo ("<script language='javascript'> 
							window.alert('Email/Contact already exists!!');
							window.location.href='login.php';</script>");
						}else{
						$sql = "INSERT INTO registration VALUES (id,'$name','$contact','$email','$password','$Discipline')";
						if(mysqli_query($conn, $sql))
						{
							header("location:login.php");
						}
						else{
							echo "ERROR: Hush! Sorry $sql. ". mysqli_error($conn);
                    	}
					}
			}
				mysqli_close($conn);
		?>
<?php
			session_start();
			$conn = mysqli_connect("localhost", "root", 7665, "coledu");
			if($conn == false){
			die("ERROR: Could not connect. ".mysqli_connect_error());
			}
			$cid=$_GET['cid'];
			$id=$_SESSION['id'];
			$sql="DELETE FROM takes WHERE id='{$id}' && cid='{$cid}'";
			if (mysqli_query($conn,$sql)) {
				header('location:mycourses.php');
			}
			else{
				echo "Mysql Error : ".mysql_error();
			}
?>
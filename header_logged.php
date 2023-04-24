<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="png" href="images/icon/favicon.png">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Comaptible" content="IE=edge">
	<title>COLEDU</title>
	<meta name="desciption" content="">
    <meta http-equiv="Cache-control" content="no-cache">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="script.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<script>
		$(window).on('scroll', function(){
  			if($(window).scrollTop()){
  			  $('nav').addClass('black');
 			 }else {
 		   $('nav').removeClass('black');
 		 }
		})
	</script>
</head>
<!-- Navigation Bar -->

<header id="header">

<nav>
<?php
	$conn = mysqli_connect("localhost", "root", 7665, "coledu");
        if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
	$loginst = 0;
	if ($_SESSION['username'])
	{ 
		$user_check = $_SESSION['username'];
		$ses_sql = mysqli_query($conn,"SELECT * FROM courses inner join takes inner join registration on registration.id=takes.id and takes.cid=courses.cid WHERE email='{$user_check}'||contact='{$user_check}' ");
		$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
		$count=mysqli_num_rows($ses_sql);
		$_SESSION['courses_taken']=$count;
		if ($count!=0) {
			$login_user=$row['email'];
			// $Discipline=$row['Discipline'];
			$_SESSION['email']=$login_user;
			$name=$row['name'];
			$studentID=$row['id'];
			$contact=$row['contact'];
			// $_SESSION['Discipline']=$Discipline;
			$_SESSION['name']=$name;
			$_SESSION['studentID']=$studentID;
			$_SESSION['contact']=$contact;
			$_SESSION['id']=$studentID;
			$loginst = 1;
		}		
		else{
				$user_check = $_SESSION['username'];
				$ses_sql = mysqli_query($conn,"SELECT * FROM registration where email='{$user_check}'||contact='{$user_check}' ");
				$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
				$name=$row['name'];
				$contact=$row['contact'];
				$_SESSION['name']=$name;
				$studentID=$row['id'];
				$_SESSION['id']=$studentID;
				$_SESSION['studentID']=$studentID;
				$_SESSION['contact']=$contact;
				$login_user=$row['email'];
				$_SESSION['email']=$login_user;
				$loginst = 1;
			}
	}   
    if ($loginst == 1){ 
		?>
			<div class="logo"><img src="images/icon/logo.png" alt="logo" style="justify-content:left;"></div>
			<ul>
				<li><a class="active" href="/">Home</a></li>
				<li><a href="index.php#services_section">Explore</a></li>
				<li><a href="mycourses.php">My Courses</a></li>
				<li><a href="index.php#about_section">About us</a></li>
			</ul>
			<!-- <div class="srch"><input type="text" class="search" placeholder="Search here..."><img src="images/icon/search.png" alt="search" onclick=slide()></div> -->
			<a class="get-started" href="profile.php">My Account</a>
			<a href="logout.php" onmouseover="this.style.color='silver'" onmouseout="this.style.color='#2e2e2e'">
			Log out</a>
			<img src="images/icon/menu.png" class="menu" onclick="sideMenu(0)" alt="menu">
			
        <?php } else { 
        ?>
			<div class="logo"><img src="images/icon/logo.png" alt="logo"></div>
			<ul>
			<li><a class="active" href="/">Home</a></li>
				<li><a href="#popular_section">Popular</a></li>
				<li><a href="#services_section">Explore</a></li>
				<li><a href="#about_section">About us</a></li>
			</ul>
			<!-- <div class="srch"><input type="text" class="search" placeholder="Search here..."><img src="images/icon/search.png" alt="search" onclick=slide()></div> -->
			<a class="get-started" href="login.php">Get Started</a>
			<img src="images/icon/menu.png" class="menu" onclick="sideMenu(0)" alt="menu">
	   <?php }
	?>
</nav>
<!--container-advertisement-->
<div class="head-container">
			<div class="quote">
				<p>The beautiful thing about learning is that nobody can take it away from you</p>
				<h5>Education is the process of facilitating learning, or the acquisition of knowledge, skills, values, beliefs, and habits. Educational methods include teaching, training, storytelling, discussion and directed research!</h5>
				<div class="play">
					<img src="images/icon/play.png" alt="play"><span><a href="https://youtu.be/bfvUtSumLcE" target="_blank">Watch Now</a></span>
				</div>
			</div>
			<div class="svg-image">
				<img src="images/extra/svg1.jpg" alt="svg">
			</div>
		</div>
<!-- Sliding Information -->
	<!-- <marquee style="background: linear-gradient(to right, #FA4B37, #DF2771); margin-top: 50px;" direction="left" onmouseover="this.stop()" onmouseout="this.start()" scrollamount="20"><div class="marqu">“Education is the passport to the future, for tomorrow belongs to those who prepare for it today. Your attitude, not your aptitude, will determine your altitude. If you think education is expensive, try ignorance. The only person who is educated is the one who has learned how to learn …and change.”</div></marquee>  -->
<!--side menu in mobile-->
		<div class="side-menu" id="side-menu">
			<div class="close" onclick="sideMenu(1)"><img src="images/icon/close.png" alt=""></div>
			<div class="user">
				<img src="images/creator/roshan.jpeg" alt="Username">
				<p>roshank9419</p>
			</div>
			<ul>
				<li><a href="#about_section">About</a></li>
				<li><a href="#portfolio_section">Portfolio</a></li>
				<li><a href="#team_section">Team</a></li>
				<li><a href="#services_section">Services</a></li>
				<li><a href="#contactus_section">Contact</a></li>
				<li><a href="#feedBACK">Feedback</a></li>
			</ul>
		</div>
</header>
</html>
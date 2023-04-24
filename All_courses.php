<link rel="stylesheet" type="text/css" href="style.css">
<!-- Navigation Bar -->
<title>All Courses @ COLEDU</title>
<link rel="shortcut icon" type="png" href="images/icon/favicon.png">
<header id="header">
<?php 
session_start();
if (isset($_SESSION['username'])) {
?>
<nav>
<?php
   
	$conn = mysqli_connect("localhost", "root", 7665, "coledu");
        if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
	$loginst = 0;
	if (isset($_SESSION['username']))
	{ 
		$user_check = $_SESSION['username'];
		$ses_sql = mysqli_query($conn,"SELECT * FROM registration natural join  courses natural join takes WHERE email='{$user_check}'||contact='{$user_check}' ");
		$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
		$count=mysqli_num_rows($ses_sql);
		if ($count!=0) {
			$login_user=$row['email'];
			$_SESSION['email']=$login_user;
			$name=$row['name'];
			$studentID=$row['id'];
			$contact=$row['contact'];
			$_SESSION['name']=$name;
			$_SESSION['studentID']=$studentID;
			$_SESSION['contact']=$contact;
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
				$_SESSION['studentID']=$studentID;
				$_SESSION['contact']=$contact;
				$login_user=$row['email'];
				$_SESSION['email']=$login_user;
				$loginst = 1;
			}
	}   
		?>
			<div class="logo"><img src="images/icon/logo.png" alt="logo"></div>
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
</nav>
<?php
}
else{
  ?>
  <header id="header">

<nav>
            <div class="logo"><img src="images/icon/logo.png" alt="logo"></div>
			<ul>
				<li><a class="active" href="index.php">Home</a></li>
				<li><a href="index.php#services_section">Explore</a></li>
				<li><a href="index.php#about_section">About us</a></li>
			</ul>
			<!-- <div class="srch"><input type="text" class="search" placeholder="Search here..."><img src="images/icon/search.png" alt="search" onclick=slide()></div> -->
			<a class="get-started" href="login.php">Get Started</a>
			<img src="images/icon/menu.png" class="menu" onclick="sideMenu(0)" alt="menu">
</nav>
  <?php
}
?>
<center><h1 style=" color: white; background:linear-gradient(to left, #8A2387, #E94057,#F27121); margin-top:80px;"><br>All Courses<br><br></h1></center>
<link rel="stylesheet" type="text/css" href="teststyle.css" >
<?php
   $conn = mysqli_connect("localhost", "root", 7665, "coledu");
   if($conn == false){
   die("ERROR: Could not connect. ".mysqli_connect_error());
   }
  //  $username=$_SESSION['username'];
   $sql = mysqli_query($conn,"SELECT distinct * from courses order by title");
   if (mysqli_num_rows($sql)>0) {
     $count=0;
     while ($row=mysqli_fetch_assoc($sql)) {
       $cid=$row['cid'];
       $title=$row['title'];
       $source=$row['source'];
       $duration=$row['duration'];

       $count=$count+1;
       ?><center><div class="cardt" style="width=300px;">
       <div class="cardt_header">
          <div class="content">
            <?php
           echo "<h1 style='text-align:left;'><strong>$count.".$title."<p class='mb-0'><br></p></strong></h1>";
           ?>
          </div>
          <div class="content-image">
           <span class="fa fa-html5"></span>
       </div>
       </div>
       <div class="cardt_info">
           <p><span class="fa fa-users"></span><?php echo "$source"?></p>
           <p style="margin-left: auto; color:white;">Duration : <?php echo "$duration"?> </p>
       </div>
       <div class="cardt_footer">
           <span class="fa fa-star-o"></span>
		   <?php
        if (isset($_SESSION['username'])) {
          $sqle="SELECT distinct cid,title,link from takes natural join courses where  id='{$studentID}' && title='{$title}'";
        $resulte=mysqli_query($conn,$sqle);
        $counte=mysqli_num_rows($resulte);
        
        if($counte>0){
        $row=mysqli_fetch_assoc($resulte);
        $link=$row['link'];
        echo "<a href='{$link}' style='margin-left:auto; margin-right:10px;'><button class='btn'>View<span class='fa fa-long-arrow-right'></span></button></a>";
        ?> <a href='unenrollment.php?cid=<?php echo "{$cid}"?>'><button>Unenroll<span class='fa fa-long-arrow-right'></span></button></a> <?php
      }
        else{
          ?> <a href='enrollment.php?cid=<?php echo "{$cid}"?>'><button class='btn'>Enroll<span class='fa fa-long-arrow-right'></span></button></a> <?php
        }
        }
        else{
          echo "<a  href='login.php'><button class='btn'>Enroll<span class='fa fa-long-arrow-right'></span></button></a>";
        }
        ?>
       </div>
     </div></center>
     <?php
     }
   }
?>
<?php
<title>Your Courses @ COLEDU</title>
<link rel="shortcut icon" type="png" href="images/icon/favicon.png">
<link rel="stylesheet" type="text/css" href="style.css">

<!-- Navigation Bar -->

<header id="header">

<nav>
<?php
   session_start();
	$conn = mysqli_connect("localhost", "root", 7665, "coledu");
        if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
	$loginst = 0;
	if ($_SESSION['username'])
	{ 
		$user_check = $_SESSION['username'];
		$ses_sql = mysqli_query($conn,"SELECT * FROM  courses inner join takes inner join registration on registration.id=takes.id and takes.cid=courses.cid WHERE email='{$user_check}'||contact='{$user_check}' ");
		$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
		$count=mysqli_num_rows($ses_sql);
		if ($count!=0) {
			$login_user=$row['email'];
			$_SESSION['email']=$login_user;
			$link=$row['link'];
			$name=$row['name'];
			$studentID=$row['id'];
			$contact=$row['contact'];
			$_SESSION['name']=$name;
			$_SESSION['studentID']=$studentID;
			$_SESSION['contact']=$contact;
			$_SESSION['link']=$link;
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
<center><h1 style=" color: white; background:linear-gradient(to left, #8A2387, #E94057,#F27121); margin-top:80px;"><br>My Courses<br><br></h1></center>
<link rel="stylesheet" type="text/css" href="teststyle.css" >
<?php
   $conn = mysqli_connect("localhost", "root", 7665, "coledu");
   if($conn == false){
   die("ERROR: Could not connect. ".mysqli_connect_error());
   }
   $username=$_SESSION['username'];
   $sql = mysqli_query($conn,"SELECT distinct title,link,takes.cid as cid from  courses inner join takes inner join registration on registration.id=takes.id and takes.cid=courses.cid where email='{$username}'||contact='{$username}' order by title");
   if (mysqli_num_rows($sql)>0) {
     $count=0;
     while ($row=mysqli_fetch_assoc($sql)) {
       $title=$row['title'];
	   $cid=$row['cid'];
       $count=$count+1;
	   $_SESSION['link']=$row['link'];
	   $link=$_SESSION['link'];
       ?><center><div class="cardt" style="width=300px;">
       <div class="cardt_header">
          <div class="content">
            <?php
           echo "<h1 style='text-align:left;'><strong>$count.".$title."<p class='mb-0'><br></p></strong></h1>";
           ?>
           <p>
               learn what is frontend developement and how its works
           </p>
          </div>
          <div class="content-image">
           <span class="fa fa-html5"></span>
       </div>
       </div>
       <div class="cardt_info">
           <p><span class="fa fa-users"></span>Dev Community</p>
           <p>Duration : 5h 21m</p>
       </div>
       <div class="cardt_footer" style="justify-content:end;">
           <span class="fa fa-star-o"></span>
		   <a href='<?php echo "$link"?>' ><button class='btn' style="margin-right:10px;">View<span class='fa fa-long-arrow-right'></span></button></a>
		   <a href='unenrollment.php?cid=<?php echo "{$cid}"?>'><button>Unenroll<span class='fa fa-long-arrow-right'></span></button></a>
       </div>
     </div></center>
     <?php
       
     }
   }
   else {?>
   <center style="margin-top:80px;">
	<p>
	<?php
	echo "Your course list is empty!";?></p>
	</center>
	<?php
   }
?>

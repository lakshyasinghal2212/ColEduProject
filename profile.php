<?php
session_start();
$conn = mysqli_connect("localhost", "root", 7665, "coledu");
if($conn == false){
die("ERROR: Could not connect. ".mysqli_connect_error());
}

$name=$_SESSION['name'];
$username=$_SESSION['email'];
$password=$_SESSION['password'];
$userID=$_SESSION['studentID'];
$contact=$_SESSION['contact'];
$Discipline=$_SESSION['Discipline'];
// echo "$contact";
// echo "$userID";

?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Student Profile @ COLEDU</title>
    <link rel="shortcut icon" type="png" href="images/icon/favicon.png">
    <meta name="author" content="Codeconvey" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="profile.css">
	    <!-- <link rel="stylesheet" href="css/style.css"> -->
        
</head>
<body>
    	<!-- Navigation Bar -->
<nav style="width:1536px; height:74.4px;border-bottom:2px solid rgb(0,0,0);padding-bottom:10px;">
<div class="logo"><img src="images/icon/logo.png" alt="logo"></div>
			<ul style="margin-bottom:0px;">
				<li><a class="active" href="/" style="text-decoration:none;">Home</a></li>
				<li><a href="index.php#services_section"  style="text-decoration:none;">Explore</a></li>
        <li><a href="mycourses.php"  style="text-decoration:none;">My courses</a></li>
				<li><a href="index.php#about_section"  style="text-decoration:none;">About us</a></li>
			</ul>
			<!-- <div class="srch"><input type="text" class="search" placeholder="Search here..."><img src="images/icon/search.png" alt="search" onclick=slide()></div> -->
			<a class="get-started" href="profile.php"  style="text-decoration:none;">My Account</a>
			<a href="logout.php" onmouseover="this.style.color='silver'" onmouseout="this.style.color='#2e2e2e'"  style="text-decoration:none;">
			Log out</a>
			<img src="images/icon/menu.png" class="menu" onclick="sideMenu(0)" alt="menu">
</nav>
    <div class="rt-container">
    	<div class="col-rt-12">
        	<div class="rt-heading">
            	<h1 style ="text-align: center; margin-top: 120px; margin-bottom: 30px; ">Student Profile</h1>
            </div>
        </div>
    </div>

<section>
              
<!-- Student Profile -->

  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <!-- <img class="profile_img" src="" alt="student dp"> -->
            <h3 style="text-align:center;"><?php echo "$name" ?></h3>
          </div>
          <div class="card-body">
            <p class="mb-0" style="text-align:center;"><strong class="pr-1">Student ID:</strong><?php echo "$userID"?></p>
            <?php            
            $sql = mysqli_query($conn,"SELECT distinct title from courses inner join takes inner join registration on registration.id=takes.id and takes.cid=courses.cid where email='{$username}'||contact='{$username}' ");
            $_SESSION['courses_taken']=mysqli_num_rows($sql);
            $courses_taken=$_SESSION['courses_taken'];
            ?>
            <p class="mb-0" style="text-align:center;"><strong class="pr-1">Courses taken:</strong><?php echo "$courses_taken"?></p>

          </div>
        </div>
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <!-- <img class="profile_img" src="" alt="student dp"> -->
            <h3 style="text-align:center;">My courses</h3>
          </div>
          <div class="card-body">
            <?php
            $conn = mysqli_connect("localhost", "root", 7665, "coledu");
            if($conn == false){
            die("ERROR: Could not connect. ".mysqli_connect_error());
            }
            $sql = mysqli_query($conn,"SELECT distinct title from courses inner join takes inner join registration on registration.id=takes.id and takes.cid=courses.cid where email='{$username}' order by title limit 3");
            if (mysqli_num_rows($sql)>0) {
              $count=0;
              while ($row=mysqli_fetch_assoc($sql)) {
                $title=$row['title'];
                $count=$count+1;
                echo "<a href='mycourses.php' style='font-size:17px; text-align:left'><b>$count.)".$title."<p class='mb-0'></p></b></a>";
                echo "<br><br>";
              }
              echo "<a href='mycourses.php' style='font-size:17px; margin-left:230px'><b>View all</b></a>";
            }
             ?>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Details</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              <tr>
                <th width="30%">Name</th>
                <td width="2%">:</td>
                <td><?php echo "$name" ?></td>
              </tr>
              <tr>
                <th width="30%">Discipline</th>
                <td width="2%">:</td>
                <td><?php echo "$Discipline" ?></td>
              </tr>
              <tr>
                <th width="30%">Contact</th>
                <td width="2%">:</td>
                <td><?php echo "$contact" ?></td>
              </tr>
              <tr>
                <th width="30%">Username</th>
                <td width="2%">:</td>
                <td><?php echo "$username" ?></td>
              </tr>
            </table>
          </div>
        </div>
          <div style="height: 26px"></div>
        <!-- <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Other Information</h3>
          </div>
          <div class="card-body pt-0">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div> -->
      </div>
    </div>
  </div>

<!-- partial -->
           
    		</div>
		</div>
    </div>
</section>
	</body>
</html>
<center>
<div>
<link rel="stylesheet" type="text/css" href="teststyle.css" >
<?php
 $conn = mysqli_connect("localhost", "root", 7665, "coledu");
 if($conn == false){
 die("ERROR: Could not connect. ".mysqli_connect_error());
 }
 if (isset($_SESSION['username'])) {
  $id=$_SESSION['id'];
 }
$sql = mysqli_query($conn,"SELECT* from courses order by title limit 3");
if (mysqli_num_rows($sql)>0) {
  $count=0;
  while ($row=mysqli_fetch_assoc($sql)) {
    $title=$row['title'];
    $cid=$row['cid'];
    $source=$row['source'];
    $duration=$row['duration'];
    $count=$count+1;
    ?><div class="cardt" style="width:320px; height:330px;">
    <div class="cardt_header" style="height:230px;">
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
        <p style="margin-left: auto;">Duration : <?php echo "$duration"?></p>
    </div>
    <div class="cardt_footer">
        <span class="fa fa-star-o"></span>
        <?php
        if (isset($_SESSION['username'])) {
          $sqle="SELECT distinct title,link from takes natural join courses where  id='{$id}' && title='{$title}'";
        $resulte=mysqli_query($conn,$sqle);
        $counte=mysqli_num_rows($resulte);
        if($counte>0){
        $row=mysqli_fetch_assoc($resulte);
        $link=$row['link'];
        echo "<a href='{$link}' style='margin-right:auto;'><button class='btn' >View<span class='fa fa-long-arrow-right'></span></button></a>";
        ?> <a href='unenrollment.php?cid=<?php echo "{$cid}"?>' style='margin-left:auto;'><button>Unenroll<span class='fa fa-long-arrow-right'></span></button></a> <?php

      }
        else{
          ?> <a href='enrollment.php?cid=<?php echo "{$cid}"?>'><button class='btn'>Enroll<span class='fa fa-long-arrow-right'></span></button></a> <?php
        }
        }
        else{
          echo "<a href='login.php'><button class='btn'>Enroll<span class='fa fa-long-arrow-right'></span></button></a>";
        }
        ?>
           
    </div>
  </div>
  <?php
  }
}
?>
</div>
</center>
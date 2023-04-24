<?php
session_start();
	$conn = mysqli_connect("localhost", "root", 7665, "coledu");
        if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
	$loginst = 0;
	if (isset($_SESSION['username']))
	{
      include("header_logged.php");
	}
	else {
		include("header.php");
	}
	mysqli_close($conn);
?>
<body>


<!-- SERVICES -->
		<div>
		<div class="diffSection" id="services_section">
		<center><p style="font-size: 50px; margin-bottom:60px; padding: 5px; color: white;  background:linear-gradient(to right, #8A2387, #E94057,#F27121);">Explore</p></center>
		</div>
		</div>

		<?php
			include("test.php");
		?>
		<div style="margin-left:1200px;"><a class="get-started" href="All_courses.php">More Courses</a></div>
<!-- ABOUT -->
<div class="diffSection" id="about_section">
		<center><p style="font-size: 50px;  margin-top:60px; margin-bottom:60px;  padding: 5px; color: white; margin-bottom:20px; background:linear-gradient(to right, #8A2387, #E94057,#F27121);">About</p></center>
		<div class="about-content">
				<div class="side-image">
					<img class="sideImage" src="images/extra/e3.jpg">
				</div>
				<div class="side-text">
					<h2>What you think about us ?</h2>
					<p>Education is the process of facilitating learning, or the acquisition of knowledge, skills, values, beliefs, and habits. Educational methods include teaching, training, storytelling, discussion and directed research.<br> Educational website can include websites that have games, videos or topic related resources that act as tools to enhance learning and supplement classroom teaching. These websites help make the process of learning entertaining and attractive to the student, especially in today's age. <br>Using HTML(HyperText Markup Language), CSS(Cascading Style Sheet), JavaScript, we can make learning more easier and in a interesting way.</p>
				</div>
		</div>
	</div>


<!-- Reviews by Students -->
<div id="makeitfull">
	<a href="#review_section"><img src="images/icon/makeitfull.png"></a>
</div>
<div class="review">
	<div class="diffSection" id="review_section">
		<center><p style="font-size: 40px; padding: 100px; padding-bottom: 40px; color: #2E3D49;">What the Students Say About Us?</p></center>
	</div>
	<div class="rev-container">
		<div class="rev-card">
			<div class="identity">
				<img src="images/creator/person2.png"><p>Manish Kumar</p>
				<h6>DBMS</h6>
				<div class="rating"><img src="images/icon/star.png"><img src="images/icon/star.png"><img src="images/icon/star.png"><img src="images/icon/star.png"><img src="images/icon/star.png"></div>
			</div>
			<div class="rev-cont">
				<p id="title">Review:</p>
				<p id="content">
					I did Java Fundamenetal course with Dr. Jyoti Gajarani. It was a great experience. The brain teasers and assignments, actually the whole lot of content was really good. Some problems were challenging yet interesting. Was explained very well where ever I stuck...
				</p>
			</div>
		</div>
		<div class="rev-card">
			<div class="identity">
				<img src="images/creator/person3.png"><p>Kajol Khatwani</p>
				<h6>DSA</h6>
				<div class="rating"><img src="images/icon/star.png"><img src="images/icon/star.png"><img src="images/icon/star.png"><img src="images/icon/star.png"><img src="images/icon/star.png"></div>
			</div>
			<div class="rev-cont">
				<p id="title">Review:</p>
				<p id="content">
					When I was watching "Dear Zindagi", I could relate Sharukh Khan to Arnav Bhaiya. The way Sharukh Khan was giving life lessons to Alia Bhatt, in the same way Arnav Bhaiya will give coding life lessons which will guide you throughout your code life...
				</p>
			</div>
		</div>
		<div class="rev-card">
			<div class="identity">
				<img src="images/creator/person1.jpeg"><p>Prachi</p>
				<h6>TOC</h6>
				<div class="rating"><img src="images/icon/star.png"><img src="images/icon/star.png"><img src="images/icon/star.png"><img src="images/icon/star.png"><img src="images/icon/star.png"></div>
			</div>
			<div class="rev-cont">
				<p id="title">Review:</p>
				<p id="content">
					ColEdu was an amazing experience for me. I belong to CSE department and had a little experience in computational mathematics but I think it has helped me think things through in a much more analytical manner. Computation is important no matter which branch you are in...
				</p>
			</div>
		</div>
		<div class="rev-card">
			<div class="identity">
				<img src="images/creator/person4.png"><p>Lakshay Singhal</p>
				<h6>Engineering Mathematics</h6>
				<div class="rating"><img src="images/icon/star.png"><img src="images/icon/star.png"><img src="images/icon/star.png"><img src="images/icon/star.png"><img src="images/icon/star.png"></div>
			</div>
			<div class="rev-cont">
				<p id="title">Review:</p>
				<p id="content">
					This was my first complete course at coledu. I attended the Python course in Winter 2021 and loved it which made me join the full course. Shubham bhaiya and Rajendra Bhaiya(TA) have good knowledge about the field and were very helpful in making us understand the concepts..
				</p>
			</div>
		</div>
	</div>
</div>

<!-- FEEDBACK -->
	<div class="title2" id="feedBACK">
		<span>Give Feedback</span>
		<div class="shortdesc2">
			<p>Please share your valuable feedback to us</p>
		</div>
	</div>

	<div class="feedbox">
		<div class="feed">
			<form action="mailto:roshank9419@gmail.com" method="post" enctype="text/plain">
				<label>Your Name</label><br>
				<input type="text" name="" class="fname" required="required"><br>
				<label>Email</label><br>
				<input type="email" name="mail" required="required"><br>
				<label>Additional Details</label><br>
				<textarea name="addtional"></textarea><br>
				<button type="submit" id="csubmit">Send Message</button>
			</form>
		</div>
	</div>
</body>
<?php include("footer.php");
?>
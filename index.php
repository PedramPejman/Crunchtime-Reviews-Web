<div id='animation_background'></div>

<body onunload="">
	<html id="html">
	<meta name="viewport" content="width=device-width"/>

	<?
	require_once('header.php');
	require_once('dbData.php');

	$table= "sessions";

	$con = mysqli_connect($server, $user, $password, $database);

// Check connection to Crunchtime Database
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$sessions = mysqli_query($con, "SELECT * FROM " . $table . " ORDER BY session_id");

	?>
	<div class="loader"></div>
	<body id="body">

		<script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>
		<link href='http://fonts.googleapis.com/css?family=Playfair+Display' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Coming+Soon' rel='stylesheet' type='text/css'>

		<div class="life">

			<head>
				<meta charset="UTF-8">

				<title>Crunch Time Reviews</title>
			</head>

			<body>


				<div class="content">
					<div class="caption">
						<h1 id="crunchtime">Crunch Time</h1>
						<h1 id="reviews">Reviews</h1>
						<span id="college" class="college">University of Virginia</span> 

					</div>

					<div class="content-positioner">
						<div class="sessions-centerer">
							<div class="sessions-positioner">
								<div  id="class-table" class="sessions-content">
									<?
									while ($session = mysqli_fetch_array($sessions)) {
										echo "<div class='plan'>";
										echo "<h3 style='font-size:14px' >" . $session['course_name'] . "<span id='" . $session['course'] . "' style='background-color: " . $session['course_color'] . "'>" . $session['course'] . "</span></h3>";
										echo "<a data-course= ". $session['course'] ." data-date= ". $session['date'] ."  data-session-id= ". $session['session_id'] ." class='attend session-button' id='attend" . $session['course'] . "'>Attend</a>";
										echo "<ul>";
										echo "<li class= 'session_details'>Material: " . $session['material'] . "</li>";
										echo "<li class= 'session_details'>Date: " . $session['date'] . "</li>";
										echo "<li class= 'session_details'>Time: " . $session['time'] . "</li>";
										echo "<li class= 'session_details'>Location: " . $session['location'] . "</li>";

										echo "</ul>";
										echo "</div>";

									}
									?>
									<div class="plan">
										<h3  style='font-size:17px' >Request a Session<span id="new_session">?</span></h3>
										<a id="req" class="request session-button" onclick="request()">Request</a> 
										<ul>
											<li>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="overlay" id="overlay-container">
							<form id="sign-up-overlay" class="sign-up">
								<h1 class="sign-up-title">Sign up to Attend</h1>
								<input type="text" id="student-id" class="sign-up-input" required placeholder="Student id? ex: jtg5er" autofocus required>
								<h2 class="sign-up-note">Note: Signing up does not bind you to attend. It just allows us to make an appropriate number of copies of review sheets and practice exams.</h2>
								<button type="submit" id="sign-me-up" class="sign-up-button">Sign Me Up!</button>
								<h2 class="sign-up-note" id="thank-you-note">You will receive an E-mail containing details about the session shortly! </h2>
								<div>
									<img id="close-icon" src="https://cdn3.iconfinder.com/data/icons/eightyshades/512/18_Close-128.png" alt="X" height="20" width="20">
								</div>
							</form>
						</div>


						<div class="gallery-centerer">    
							<div class="gallery-content gallery-positioner meat">
								<div class="course-container">
									<div class="course-box" id="calculus1">
										<div class="course-cover move-left">
											<h2 class="course-title">APMA 1110</h2>
											<br>
											<ul class="course-intro">
												<li>Techniques of Integration</li>
												<li>Tests of Convergence</li>
												<li>Series and Sequences</li>
												<li>Taylor and Maclaurin Approximations</li>
												<li>Physics Applications</li>
												<li>Ploar Coordinates</li>
												<li>Complex Numbers</li>
											</ul>

											<div class="class-button" id="apma1110"><a class= 'link_out' href='gallery.php?course=1110'>Resources</a>
											</div>
										</div>
									</div>
								</div>

								<div class="course-container">
									<div class="course-box" id="calculus2">
										<div class="course-cover move-left">
											<h2 class="course-title">APMA 2120</h2>
											<br>
											<ul class="course-intro">
												<li>Vectors and Matrices</li>
												<li>Partial Derivatives</li>
												<li>Vector Fields and Contours</li>
												<li>Higher Order Derivatives</li>
												<li>Surface & Volume Integrals</li>
												<li>Gradient, Curl & Divergence</li>

											</ul>
											<div class="class-button" id="apma2120"><a class= 'link_out' href='gallery.php?course=2120'>Resources</a>
											</div>
										</div>
									</div>
								</div>

								<div class="course-container">
									<div class="course-box" id="dfq">
										<div class="course-cover move-left">
											<h2 class="course-title">APMA 2130</h2>
											<br>
											<ul class="course-intro">
												<li>Linear/Separable ODE's</li>
												<li>Second Order ODE's</li>
												<li>Homogeneous ODE's</li>
												<li>Initial Value Problems</li>
												<li>Applications</li>
												<li>Characteristic Equation</li>
												<li>Laplace Transforms</li>
												<li>Systems of ODE's</li>

											</ul>
											<div class="class-button" id="apma2130"><a class= 'link_out' href='gallery.php?course=2130'>Resources</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="ask-centerer">
							<div class="ask-content">
								<div class="ask_with_text">
									<h1>Tell us your problem</h1> <h1 class="icon fa fa-book fa-4x"></h1>
								</div>
								<div class="or">
									<h2>Or..</h2>
								</div>
								<div class="ask_with_picture">
									<div class="icon fa fa-camera fa-4x"></div> <h1>Send us a picture</h1> 
								</div>
							</div>
						</div>


						<div class="page-centerer">
							<div class="page about-content meat">
								<header class="about-header">
									<h1 class="about-title">Crunch Time Reviews</h1>
									<hr id="line-across" class="icon fa fa-bolt fa-1x"><br><br>

									<h3 class="about-subtitle">
										<h2 class="slogan_question"> Missed class? <h3 class="slogan_answer">No problem. Our gallery has you covered.</h3></h2>
										<h2 class="slogan_question"> Exam coming up? <h3 class="slogan_answer">Attend one of our sessions specific to your course. If none scheduled, request one.</h3></h2>
										<h2 class="slogan_question"> Stuck on questions? <h3 class="slogan_answer"> Use our mobile apps (coming late September) to take a picture of a question and we will answer it in your course's next session.</h3> </h2>
									</h3>
									<br>
									<br>
									<hr id="line-across" class="icon fa fa-bolt fa-1x"><br><br>
									<p class="about-support">
										Contact Support
										<br>
										<a class="about-email">CrunchtimeSupport@virginia.edu</a>
									</p>
								</header>

								<p class="about-text">

									Crunch Time Reviews aims to provide help in mathematics courses to students who are, for one reason or another, in a time crunch. Here is how it works:
									<br>
									<br>If a number of students request a session for a quiz or examination in a certain course, a free review session will be held and all students in that course are notified via E-mail. During the 90-minute session, students will have a chance to ask specific questions, address more general concerns (ex. ‘what does this mean..?’, ‘can we review this topic?’, ‘what if you are given…’ ) and get a chance to work example test problems.
									<br>
									<br>Piloted for the first time in the Spring of 2014, Crunchtime Reviews has been funded by the University of Virginia’s School of Engineering and Applied Sciences and therefore is free of charge to all students. The sessions may be held by current UVA professors, instructors or experienced TA’s.
									<br>
									<br>Students can also use the videos and resources available in the <a class="to-gallery">gallery</a>. Although resources on this website are available to anyone who is interested, the lectures provided by the instructors are only open to University of Virginia students.
									<br>
									<br>Please feel free to contact support at <a class="about-email">CrunchtimeSupport@virginia.edu</a> or Pedram Pejman at <a class="about-email">pp5nv@virginia.edu</a>.
									<br>
									<br>
									<br>
									<br>
									<p class="about-signature">Sincerely, your humble crunchers</p>
									<br>
									<br>
									<br>

									<header class="about-header">
										<hr id="line-across">
									</header>
								</p>
							</div>
							<div id="canvas">
								<h1 id="word_anim">Request</h1>
							</div>
						</div>

					</div>

					<nav class="main-nav">
						<ul>
							<li class="sessions">
								<div class="ul-menu">
								</div>
								<div class="icon fa fa-calendar fa-3x">
								</div>
								<br><span>Sessions</span>
							</li>
							<li class="gallery">
								<div id="gallery-tab" class="ul-menu">
								</div>
								<div class="icon fa fa-photo fa-3x">
								</div>
								<br><span>Gallery</span>
							</li>
							<li class="ask">
								<div class="ul-menu">
								</div>
								<div class="icon fa fa-question-circle fa-3x">
								</div>
								<br><span>Ask</span>
							</li>
							<li class="about">
								<div class="ul-menu">
								</div>
								<div class="icon fa fa-university fa-3x">
								</div>
								<br><span>About</span>
							</li>
						</ul>
					</nav>
				</div>
			</body>
		</div>

		<script src="js/index.js"></script>
		<script type="text/javascript" src="//use.typekit.net/xyq0bjg.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
		<script src='http://cdn.jsdelivr.net/jquery.velocity/0.2.1/jquery.velocity.min.js'></script>
		<script src="//cdn.jsdelivr.net/jquery.velocity/0.5.0/jquery.velocity.min.js"></script>
		<?
		require_once('./includes/footer.php');
		?>
		</html>

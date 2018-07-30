<!DOCTYPE html>
<! Template taken from W3 schools: https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_temp_webpage&stacked=h >
<html lang="en">
<head>
  <title>Modules | CE301 Final Year Project - Adam Hewitt</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="essexIcon.ico" rel="icon" type="image/x-icon" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
	body {font-family: Arial, Helvetica, sans-serif;}
  
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: white;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
	
	<!========================== Taken from https://www.w3schools.com/howto/howto_css_signup_form.asp ==========================>

		/* Full-width input fields */
	input[type=text], input[type=password] {
		width: 100%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		box-sizing: border-box;
	}

	/* Set a style for all buttons */
	button {
		background-color: #4CAF50;
		color: white;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		cursor: pointer;
		width: 50%;
	}

	button:hover {
		opacity: 0.8;
	}

	/* Extra styles for the cancel button */
	.cancelbtn {
		width: auto;
		padding: 10px 18px;
		background-color: #f44336;
	}

	/* Center the image and position the close button */
	.imgcontainer {
		text-align: center;
		margin: 24px 0 12px 0;
		position: relative;
	}

	.container {
		width: 50%;
		padding: 16px;
	}
	
	.loginLabel {
		width: 50%;
	}

	span.psw {
		float: right;
		padding-top: 16px;
	}

	/* The Modal (background) */
	.modal {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		padding-top: 60px;
	}

	@media screen and (max-width: 300px) {
	/* Modal Content/Box */
	.modal-content {
		background-color: #fefefe;
		margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
		border: 1px solid #888;
		width: 50%; /* Could be more or less, depending on screen size */
	}
	}
	/* The Close Button (x) */
	.close {
		position: absolute;
		right: 25px;
		top: 0;
		color: #000;
		font-size: 35px;
		font-weight: bold;
	}

	.close:hover,
	.close:focus {
		color: red;
		cursor: pointer;
	}

	/* Add Zoom Animation */
	.animate {
		-webkit-animation: animatezoom 0.6s;
		animation: animatezoom 0.6s
	}

	@-webkit-keyframes animatezoom {
		from {-webkit-transform: scale(0)} 
		to {-webkit-transform: scale(1)}
	}
		
	@keyframes animatezoom {
		from {transform: scale(0)} 
		to {transform: scale(1)}
	}

	/* Change styles for span and cancel button on extra small screens */
	@media screen and (max-width: 300px) {
		span.psw {
		   display: block;
		   float: none;
		}
		.cancelbtn {
		   width: 100%;
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	.slidecontainer {
		width: 25%;
	}

	.slider {
		-webkit-appearance: none;
		width: 50%;
		height: 15px;
		background: #d3d3d3;
		outline: none;
		opacity: 0.7;
		-webkit-transition: .2s;
		transition: opacity .2s;
	}

	.slider:hover {
		opacity: 1;
	}

	.slider::-webkit-slider-thumb {
		-webkit-appearance: none;
		appearance: none;
		width: 15px;
		height: 15px;
		background: #4CAF50;
		cursor: pointer;
	}

	.slider::-moz-range-thumb {
		width: 15px;
		height: 15px;
		background: #4CAF50;
		cursor: pointer;
	}
	
  </style>
</head>

<?php

	session_start();

	require 'conn.php';
	$id = $_SESSION["sID"];
	$year = $_SESSION["sYear"];
	$checkStmnt = "SELECT * FROM StudentsModules WHERE Student_id = '$id'";

	$resultCheck = $conn->query($checkStmnt);
	

	if ($resultCheck->num_rows < 1) {
		
		if ($year == 3)
			echo "<script type='text/javascript'>  window.location='modulesYear3.php'; </script>";
		
		if ($year == 2)
			echo "<script type='text/javascript'>  window.location='modulesYear2.php'; </script>";
		
		if ($year == 1)
			echo "<script type='text/javascript'>  window.location='modulesYear1.php'; </script>";
		
	} else {
		
	}

?>



<body>

	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>                        
		  </button>
		  <a href="/index.php"><img border="0" alt="Essex Logo" width="150" height="50" src="/images/essex_logo.gif"></a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
		  <ul class="nav navbar-nav">
			<li><a href="overview.php">Overview</a></li>
			<li class="active"><a href="modules.php">Modules</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="accountDetails.php">Account</a></li>
			<li><a href="contact.php">Contact</a></li>
		  </ul>
		  
		  <ul class="nav navbar-nav navbar-right">
		  
			<?php if (isset($_SESSION["sUsername"])) { ?>
					<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li> 
			<?php	} else { ?>
					<li><a onclick="document.getElementById('id01').style.display='block'"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			<?php } ?>
			
			<! ======================================= Login Modal ==================================================== >
			<!================== Taken from https://www.w3schools.com/howto/howto_css_signup_form.asp ==================>
			
			<div id="id01" class="modal">
  
			  <form class="modal-content animate" action="/authAccount.php" method="post">
			  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
			  <div class="container">
				<div class="imgcontainer">
				  <img src="/images/essex_logo" alt="Essex Logo">
				</div>

				
				  <label for="uname"><b>Username (Essex Username or Email Address):</b></label><br>
				  <input type="text" class="loginLabel" placeholder="Enter Username" name="username" id="username" maxlength="255" required><br><br>

				  <label for="psw"><b>Password:</b></label><br>
				  <input type="password" class="loginLabel" placeholder="Enter Password" name="pw" id="pw" maxlength="20" required><br><br>
					
				  <button type="submit" class="button">Login</button><br>
				  <label>
					<a href="signup.php"> Sign Up </a>
				  </label>
				</div>

				<div class="container" style="background-color:#f1f1f1">
				  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
				  <span class="psw"><a href="forgotpw.php">Forgot Password?</a></span>
				</div>
			  </form>
			</div>	
			
			
			<script>
				// Get the modal
				var modal = document.getElementById('id01');

				// When the user clicks anywhere outside of the modal, close it
				window.onclick = function(event) {
					if (event.target == modal) {
						modal.style.display = "none";
					}
				}
			</script>
			
		  </ul>
		</div>
	  </div>
	</nav>
	  
	<div class="container-fluid text-center">    
	  <div class="row content">
		<div class="col-sm-2 sidenav">
		
		</div>
		<div class="col-sm-8 text-left"> 
		  <h1 align="center">Modules</h1><p align="right"><a href="/marks.php">Edit Marks</a></p>
		  <hr>
		   
	
		  <!---------------Check User is Logged In----------------------------->
		  <?php if (isset($_SESSION["sUsername"])) { ?>
		  <?php 
			
			$year = $_SESSION["sYear"];
			$sID = $_SESSION["sID"];
			$modules = array();
			$grades = array();
			
			$sql1 = "SELECT * FROM StudentsModules WHERE Student_id = '$sID'";
			$result1 = $conn->query($sql1);
			
			if ($result1->num_rows > 0) {
				while($row1 = $result1->fetch_assoc()) {
					array_push($modules, $row1["ModuleCode"]); 
					array_push($grades, $row1["Grade"]);
				}
			}
				
	
			
		  ?>
			
			<!----------------------Display Modules----------------------------->
			
			
			<table style="width:80%" align="center">
				<tr>
					<td>
						<!------------------------------------------------1st Module--------------------------------------------------------->
			
							<?php
							
								$sql2 = "SELECT * FROM ModuleComponents WHERE ModuleCode = '$modules[0]'";
								$result2 = $conn->query($sql2);
								
								
								$sql3 = "SELECT * FROM ModuleComponents WHERE ModuleCode = '$modules[1]'";
								$result3 = $conn->query($sql3);
								
								
								$sql4 = "SELECT * FROM ModuleComponents WHERE ModuleCode = '$modules[2]'";
								$result4 = $conn->query($sql4);
								
								
								$sql5 = "SELECT * FROM ModuleComponents WHERE ModuleCode = '$modules[3]'";
								$result5 = $conn->query($sql5);
								
								
								$sql6 = "SELECT * FROM ModuleComponents WHERE ModuleCode = '$modules[4]'";
								$result6 = $conn->query($sql6);
								
								
								$sql7 = "SELECT * FROM ModuleComponents WHERE ModuleCode = '$modules[5]'";
								$result7 = $conn->query($sql7);
								
								
								$sql8 = "SELECT * FROM ModuleComponents WHERE ModuleCode = '$modules[6]'";
								$result8 = $conn->query($sql8);
								
								
								$sql9 = "SELECT * FROM ModuleComponents WHERE ModuleCode = '$modules[7]'";
								$result9 = $conn->query($sql9);
							
							?>
							
							
							<!-- Trigger/Open The Modal -->
							<button id="Btn">
								<div align="center">
									<?php echo "<h3>". $modules[0]. "<br>Grade: " . $grades[0]. "%</h3>"; ?>
								</div>
							</button>

							<!-- The Modal -->
							<div id="myModal" class="modal">

							  <!-- Modal content -->
							  <div class="modal-content">
								<span class="close"></span>
								
								
								<div align="left">
									<script>
										$(function () {

										var chart = new CanvasJS.Chart("chartContainer", {
											animationEnabled: true,
											title:{
												text: <?php echo '"' . $modules[0] . '"'?>,
												horizontalAlign: "left"
											},
											data: [{
												type: "doughnut",
												startAngle: 50,
												indexLabelFontSize: 12,
												indexLabel: "{label} - #percent%",
												toolTipContent: "<b>{label}:</b> {y} (#percent%)",
												dataPoints: [
													
													<?php 
														while($row2 = $result2->fetch_assoc()) {
															echo '{ y: ' . $row2["Weighting"] . ', label: "' . $row2["Component_name"] . '" },';
														}
													?>
												]
											}]
										});
										chart.render();

										
										
										
										
										var chart2 = new CanvasJS.Chart("chartContainer2", {
											animationEnabled: true,
											title:{
												text: <?php echo '"' . $modules[1] . '"'?>,
												horizontalAlign: "left"
											},
											data: [{
												type: "doughnut",
												startAngle: 50,
												indexLabelFontSize: 12,
												indexLabel: "{label} - #percent%",
												toolTipContent: "<b>{label}:</b> {y} (#percent%)",
												dataPoints: [
													
													<?php 
														while($row3 = $result3->fetch_assoc()) {
															echo '{ y: ' . $row3["Weighting"] . ', label: "' . $row3["Component_name"] . '" },';
														}
													?>
												]
											}]
										});
										chart2.render();
										
										
										
										
										
										
										var chart3 = new CanvasJS.Chart("chartContainer3", {
											animationEnabled: true,
											title:{
												text: <?php echo '"' . $modules[2] . '"'?>,
												horizontalAlign: "left"
											},
											data: [{
												type: "doughnut",
												startAngle: 50,
												indexLabelFontSize: 12,
												indexLabel: "{label} - #percent%",
												toolTipContent: "<b>{label}:</b> {y} (#percent%)",
												dataPoints: [
													
													<?php 
														while($row4 = $result4->fetch_assoc()) {
															echo '{ y: ' . $row4["Weighting"] . ', label: "' . $row4["Component_name"] . '" },';
														}
													?>
												]
											}]
										});
										chart3.render();
										
										
										
										
										
										
										var chart4 = new CanvasJS.Chart("chartContainer4", {
											animationEnabled: true,
											title:{
												text: <?php echo '"' . $modules[3] . '"'?>,
												horizontalAlign: "left"
											},
											data: [{
												type: "doughnut",
												startAngle: 50,
												indexLabelFontSize: 12,
												indexLabel: "{label} - #percent%",
												toolTipContent: "<b>{label}:</b> {y} (#percent%)",
												dataPoints: [
													
													<?php 
														while($row5 = $result5->fetch_assoc()) {
															echo '{ y: ' . $row5["Weighting"] . ', label: "' . $row5["Component_name"] . '" },';
														}
													?>
												]
											}]
										});
										chart4.render();
										
										
										
										
										
										
										
										
										var chart5 = new CanvasJS.Chart("chartContainer5", {
											animationEnabled: true,
											title:{
												text: <?php echo '"' . $modules[4] . '"'?>,
												horizontalAlign: "left"
											},
											data: [{
												type: "doughnut",
												startAngle: 50,
												indexLabelFontSize: 12,
												indexLabel: "{label} - #percent%",
												toolTipContent: "<b>{label}:</b> {y} (#percent%)",
												dataPoints: [
													
													<?php 
														while($row6 = $result6->fetch_assoc()) {
															echo '{ y: ' . $row6["Weighting"] . ', label: "' . $row6["Component_name"] . '" },';
														}
													?>
												]
											}]
										});
										chart5.render();
										
										
										
										
										
										
										
										
										var chart6 = new CanvasJS.Chart("chartContainer6", {
											animationEnabled: true,
											title:{
												text: <?php echo '"' . $modules[4] . '"'?>,
												horizontalAlign: "left"
											},
											data: [{
												type: "doughnut",
												startAngle: 50,
												indexLabelFontSize: 12,
												indexLabel: "{label} - #percent%",
												toolTipContent: "<b>{label}:</b> {y} (#percent%)",
												dataPoints: [
													
													<?php 
														while($row7 = $result7->fetch_assoc()) {
															echo '{ y: ' . $row7["Weighting"] . ', label: "' . $row7["Component_name"] . '" },';
														}
													?>
												]
											}]
										});
										chart6.render();
										
										
										
										
										
										
										
										
										
										
										
										var chart7 = new CanvasJS.Chart("chartContainer7", {
											animationEnabled: true,
											title:{
												text: <?php echo '"' . $modules[4] . '"'?>,
												horizontalAlign: "left"
											},
											data: [{
												type: "doughnut",
												startAngle: 50,
												indexLabelFontSize: 12,
												indexLabel: "{label} - #percent%",
												toolTipContent: "<b>{label}:</b> {y} (#percent%)",
												dataPoints: [
													
													<?php 
														while($row8 = $result8->fetch_assoc()) {
															echo '{ y: ' . $row8["Weighting"] . ', label: "' . $row8["Component_name"] . '" },';
														}
													?>
												]
											}]
										});
										chart7.render();
										
										

										});
									</script>
									
									
									
									<div id="chartContainer" style="height: 100%; width: 100%;"></div>
									<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
								</div>
								
								
								
								
								
								
								
								<div align="center">
									
									
									<?php
					
										$sql2 = "SELECT * FROM ModuleComponents WHERE ModuleCode = '$modules[0]'";
										$sql3 = "SELECT * FROM Marks WHERE ModuleCode='$modules[0]' AND Student_id='$sID'";
										$result2 = $conn->query($sql2);
										$result3 = $conn->query($sql3);
										
										$assignments1 = array();
										$marks1 = array();
										
										if ($result2->num_rows > 0) {
											
											while($row2 = $result2->fetch_assoc()) {
												array_push($assignments1, $row2["Component_name"]);
											}
											
											while($row3 = $result3->fetch_assoc()) {
												array_push($marks1, $row3["Mark"]);
											}
											
										}
										
									?>


									
									<h2><?php echo $modules[0]; ?></h2>
									<br>
									
									<?php 
									
										for($i1 = 0; $i1 < count($assignments1); $i1++) {
											
											echo '<p>' . $assignments1[$i1] . '</p>';
											echo '<div class="slidecontainer">';
											echo '<input type="range" min="0" max="100" value="' . $marks1[$i1] . '" class="slider" id="myRange' . '$i1" disabled>';
											//echo '<p>Value: <span id="demo"></span></p>';
											echo '</div><br><br>';
										}
									
									?>

								</div>
								
								
								
								
								
								
								
								<div align="right">
									<h2>Current Grade: <?php echo $grades[0] ?></h2>
								</div>
								
								
								<br><br><br>
								
								
							  </div>

							</div>
							
							<!-------------------------------------------------------------------------------------------------------------------->
					</td>
					
					
					
					
						
					<td>
						<!------------------------------------------------2nd Module--------------------------------------------------------->
			
						
							
							<!-- Trigger/Open The Modal -->
							<button id="Btn2">
								<div align="center">
									<?php echo "<h3>". $modules[1]. "<br>Grade: " . $grades[1]. "%</h3>"; ?>
								</div>
							</button>

							<!-- The Modal -->
							<div id="myModal2" class="modal">

							  <!-- Modal content -->
							  <div class="modal-content">
								<span class="close"></span>
								
								
								<div align="left">
									<div id="chartContainer2" style="height: 100%; width: 100%;"></div>
									
								</div>
								
								
								
								
								
								
								
								<div align="center">
									
									
									<?php
					
										$rsql = "SELECT * FROM ModuleComponents WHERE ModuleCode = '$modules[1]'";
										$rsql1 = "SELECT * FROM Marks WHERE ModuleCode='$modules[1]' AND Student_id='$sID'";
										$rresult = $conn->query($rsql);
										$rresult1 = $conn->query($rsql1);
										
										$assignments2 = array();
										$marks2 = array();
										
										if ($rresult->num_rows > 0) {
											
											while($rrow = $rresult->fetch_assoc()) {
												array_push($assignments2, $rrow["Component_name"]);
											}
											
											while($rrow1 = $rresult1->fetch_assoc()) {
												array_push($marks2, $rrow1["Mark"]);
											}
											
										}
										
									?>


									
									<h2><?php echo $modules[1]; ?></h2>
									<br>
									
									<?php 
									
										for($i2 = 0; $i2 < count($assignments2); $i2++) {
											
											echo '<p>' . $assignments2[$i2] . '</p>';
											echo '<div class="slidecontainer">';
											echo '<input type="range" min="0" max="100" value="' . $marks2[$i2] . '" class="slider" id="myRange' . '$i2" disabled>';
											//echo '<p>Value: <span id="demo"></span></p>';
											echo '</div><br><br>';
										}
									
									?>

								</div>
								
								
								
								
								
								
								
								<div align="right">
									<h2>Current Grade: <?php echo $grades[1] ?></h2>
								</div>
								
								
								<br><br><br>
								
								
							  </div>

							</div>
							
							<!-------------------------------------------------------------------------------------------------------------------->
					</td>
					
					
					
					
					
					
					
					
					
					
					
					
					
					<td>
						<!------------------------------------------------3rd Module--------------------------------------------------------->
			
						
							
							<!-- Trigger/Open The Modal -->
							<button id="Btn3">
								<div align="center">
									<?php echo "<h3>". $modules[2]. "<br>Grade: " . $grades[2]. "%</h3>"; ?>
								</div>
							</button>

							<!-- The Modal -->
							<div id="myModal3" class="modal">

							  <!-- Modal content -->
							  <div class="modal-content">
								<span class="close"></span>
								
								
								<div align="left">
									<div id="chartContainer3" style="height: 100%; width: 100%;"></div>
									
								</div>
								
								
								
								
								
								
								
								<div align="center">
									
									
									<?php
					
										$rsql2 = "SELECT * FROM ModuleComponents WHERE ModuleCode = '$modules[2]'";
										$rsql3 = "SELECT * FROM Marks WHERE ModuleCode='$modules[2]' AND Student_id='$sID'";
										$rresult2 = $conn->query($rsql2);
										$rresult3 = $conn->query($rsql3);
										
										$assignments3 = array();
										$marks3 = array();
										
										if ($rresult2->num_rows > 0) {
											
											while($rrow2 = $rresult2->fetch_assoc()) {
												array_push($assignments3, $rrow2["Component_name"]);
											}
											
											while($rrow3 = $rresult3->fetch_assoc()) {
												array_push($marks3, $rrow3["Mark"]);
											}
											
										}
										
									?>


									
									<h2><?php echo $modules[2]; ?></h2>
									<br>
									
									<?php 
									
										for($i3 = 0; $i3 < count($assignments3); $i3++) {
											
											echo '<p>' . $assignments3[$i3] . '</p>';
											echo '<div class="slidecontainer">';
											echo '<input type="range" min="0" max="100" value="' . $marks3[$i3] . '" class="slider" id="myRange' . '$i3" disabled>';
											//echo '<p>Value: <span id="demo"></span></p>';
											echo '</div><br><br>';
										}
									
									?>

								</div>
								
								
								
								
								
								
								
								<div align="right">
									<h2>Current Grade: <?php echo $grades[2] ?></h2>
								</div>
								
								
								<br><br><br>
								
								
							  </div>

							</div>
							
							<!-------------------------------------------------------------------------------------------------------------------->
					</td>
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					<?php if ($year == 2 | $year == 1) {?>
						<td>
							<!------------------------------------------------7th Module--------------------------------------------------------->
			
						
							
							<!-- Trigger/Open The Modal -->
							<button id="Btn7">
								<div align="center">
									<?php echo "<h3>". $modules[6]. "<br>Grade: " . $grades[6]. "%</h3>"; ?>
								</div>
							</button>

							<!-- The Modal -->
							<div id="myModal7" class="modal">

							  <!-- Modal content -->
							  <div class="modal-content">
								<span class="close"></span>
								
								
								<div align="left">
									<div id="chartContainer7" style="height: 100%; width: 100%;"></div>
									
								</div>
								
								
								
								
								
								
								
								<div align="center">
									
									
									<?php
					
										$rsql10 = "SELECT * FROM ModuleComponents WHERE ModuleCode = '$modules[6]'";
										$rsql11 = "SELECT * FROM Marks WHERE ModuleCode='$modules[6]' AND Student_id='$sID'";
										$rresult8 = $conn->query($rsql8);
										$rresult9 = $conn->query($rsql9);
										
										$assignments7 = array();
										$marks7 = array();
										
										if ($rresult10->num_rows > 0) {
											
											while($rrow10 = $rresult10->fetch_assoc()) {
												array_push($assignments7, $rrow10["Component_name"]);
											}
											
											while($rrow11 = $rresult11->fetch_assoc()) {
												array_push($marks7, $rrow11["Mark"]);
											}
											
										}
										
									?>


									
									<h2><?php echo $modules[6]; ?></h2>
									<br>
									
									<?php 
									
										for($i7 = 0; $i7 < count($assignments7); $i7++) {
											
											echo '<p>' . $assignments7[$i7] . '</p>';
											echo '<div class="slidecontainer">';
											echo '<input type="range" min="0" max="100" value="' . $marks7[$i7] . '" class="slider" id="myRange' . '$i7" disabled>';
											//echo '<p>Value: <span id="demo"></span></p>';
											echo '</div><br><br>';
										}
									
									?>

								</div>
								
								
								
								
								<div align="right">
									<h2>Current Grade: <?php echo $grades[6] ?></h2>
								</div>
								
								
								<br><br><br>
								
								
							  </div>

							</div>
							
							<!-------------------------------------------------------------------------------------------------------------------->
						</td>
					<?php } ?>	
					
					
					
					
					
					
					
					
					
					
					
					
					
				</tr>
				

				<tr>
					<td>
						<!------------------------------------------------4th Module--------------------------------------------------------->
			
						
							
							<!-- Trigger/Open The Modal -->
							<button id="Btn4">
								<div align="center">
									<?php echo "<h3>". $modules[3]. "<br>Grade: " . $grades[3]. "%</h3>"; ?>
								</div>
							</button>

							<!-- The Modal -->
							<div id="myModal4" class="modal">

							  <!-- Modal content -->
							  <div class="modal-content">
								<span class="close"></span>
								
								
								<div align="left">
									<div id="chartContainer4" style="height: 100%; width: 100%;"></div>
									
								</div>
								
								
								
								
								
								
								
								<div align="center">
									
									
									<?php
					
										$rsql4 = "SELECT * FROM ModuleComponents WHERE ModuleCode = '$modules[3]'";
										$rsql5 = "SELECT * FROM Marks WHERE ModuleCode='$modules[3]' AND Student_id='$sID'";
										$rresult4 = $conn->query($rsql4);
										$rresult5 = $conn->query($rsql5);
										
										$assignments4 = array();
										$marks4 = array();
										
										if ($rresult4->num_rows > 0) {
											
											while($rrow4 = $rresult4->fetch_assoc()) {
												array_push($assignments4, $rrow4["Component_name"]);
											}
											
											while($rrow5 = $rresult5->fetch_assoc()) {
												array_push($marks4, $rrow5["Mark"]);
											}
											
										}
										
									?>


									
									<h2><?php echo $modules[3]; ?></h2>
									<br>
									
									<?php 
									
										for($i4 = 0; $i4 < count($assignments4); $i4++) {
											
											echo '<p>' . $assignments4[$i4] . '</p>';
											echo '<div class="slidecontainer">';
											echo '<input type="range" min="0" max="100" value="' . $marks4[$i4] . '" class="slider" id="myRange' . '$i4" disabled>';
											//echo '<p>Value: <span id="demo"></span></p>';
											echo '</div><br><br>';
										}
									
									?>

								</div>
								
								
								
								
								<div align="right">
									<h2>Current Grade: <?php echo $grades[3] ?></h2>
								</div>
								
								
								<br><br><br>
								
								
							  </div>

							</div>
							
							<!-------------------------------------------------------------------------------------------------------------------->
							
					</td>
					
					
					
					
					
					
					
					
					
					
					<td>
						<!------------------------------------------------5th Module--------------------------------------------------------->
			
						
							
							<!-- Trigger/Open The Modal -->
							<button id="Btn5">
								<div align="center">
									<?php echo "<h3>". $modules[4]. "<br>Grade: " . $grades[4]. "%</h3>"; ?>
								</div>
							</button>

							<!-- The Modal -->
							<div id="myModal5" class="modal">

							  <!-- Modal content -->
							  <div class="modal-content">
								<span class="close"></span>
								
								
								<div align="left">
									<div id="chartContainer5" style="height: 100%; width: 100%;"></div>
									
								</div>
								
								
								
								
								
								
								
								<div align="center">
									
									
									<?php
					
										$rsql6 = "SELECT * FROM ModuleComponents WHERE ModuleCode = '$modules[4]'";
										$rsql7 = "SELECT * FROM Marks WHERE ModuleCode='$modules[4]' AND Student_id='$sID'";
										$rresult6 = $conn->query($rsql6);
										$rresult7 = $conn->query($rsql7);
										
										$assignments5 = array();
										$marks5 = array();
										
										if ($rresult6->num_rows > 0) {
											
											while($rrow6 = $rresult6->fetch_assoc()) {
												array_push($assignments5, $rrow6["Component_name"]);
											}
											
											while($rrow7 = $rresult7->fetch_assoc()) {
												array_push($marks5, $rrow7["Mark"]);
											}
											
										}
										
									?>


									
									<h2><?php echo $modules[4]; ?></h2>
									<br>
									
									<?php 
									
										for($i5 = 0; $i5 < count($assignments5); $i5++) {
											
											echo '<p>' . $assignments5[$i5] . '</p>';
											echo '<div class="slidecontainer">';
											echo '<input type="range" min="0" max="100" value="' . $marks5[$i5] . '" class="slider" id="myRange' . '$i5" disabled>';
											//echo '<p>Value: <span id="demo"></span></p>';
											echo '</div><br><br>';
										}
									
									?>

								</div>
								
								
								
								
								<div align="right">
									<h2>Current Grade: <?php echo $grades[4] ?></h2>
								</div>
								
								
								<br><br><br>
								
								
							  </div>

							</div>
							
							<!--------------------------------------------------------------------------------------------------------------------> 
					</td>
					
					
					
					
					
					
					
					
					
					
					
					<td>
						<!------------------------------------------------6th Module--------------------------------------------------------->
			
						
							
							<!-- Trigger/Open The Modal -->
							<button id="Btn6">
								<div align="center">
									<?php echo "<h3>". $modules[5]. "<br>Grade: " . $grades[5]. "%</h3>"; ?>
								</div>
							</button>

							<!-- The Modal -->
							<div id="myModal6" class="modal">

							  <!-- Modal content -->
							  <div class="modal-content">
								<span class="close"></span>
								
								
								<div align="left">
									<div id="chartContainer6" style="height: 100%; width: 100%;"></div>
									
								</div>
								
								
								
								
								
								
								
								<div align="center">
									
									
									<?php
					
										$rsql8 = "SELECT * FROM ModuleComponents WHERE ModuleCode = '$modules[5]'";
										$rsql9 = "SELECT * FROM Marks WHERE ModuleCode='$modules[5]' AND Student_id='$sID'";
										$rresult8 = $conn->query($rsql8);
										$rresult9 = $conn->query($rsql9);
										
										$assignments6 = array();
										$marks6 = array();
										
										if ($rresult8->num_rows > 0) {
											
											while($rrow8 = $rresult8->fetch_assoc()) {
												array_push($assignments6, $rrow8["Component_name"]);
											}
											
											while($rrow9 = $rresult9->fetch_assoc()) {
												array_push($marks6, $rrow9["Mark"]);
											}
											
										}
										
									?>


									
									<h2><?php echo $modules[5]; ?></h2>
									<br>
									
									<?php 
									
										for($i6 = 0; $i6 < count($assignments6); $i6++) {
											
											echo '<p>' . $assignments6[$i6] . '</p>';
											echo '<div class="slidecontainer">';
											echo '<input type="range" min="0" max="100" value="' . $marks6[$i6] . '" class="slider" id="myRange' . '$i6" disabled>';
											//echo '<p>Value: <span id="demo"></span></p>';
											echo '</div><br><br>';
										}
									
									?>

								</div>
								
								
								
								
								<div align="right">
									<h2>Current Grade: <?php echo $grades[5] ?></h2>
								</div>
								
								
								<br><br><br>
								
								
							  </div>

							</div>
							
							<!-------------------------------------------------------------------------------------------------------------------->  
					</td>
					
					
					
					
					
					
					
					
					
					
					
					<?php if ($year == 2 | $year == 1) { ?>
						<td>
							<!------------------------------------------------8th Module--------------------------------------------------------->
			
						
							
							<!-- Trigger/Open The Modal -->
							<button id="Btn8">
								<div align="center">
									<?php echo "<h3>". $modules[7]. "<br>Grade: " . $grades[7]. "%</h3>"; ?>
								</div>
							</button>

							<!-- The Modal -->
							<div id="myModal8" class="modal">

							  <!-- Modal content -->
							  <div class="modal-content">
								<span class="close"></span>
								
								
								<div align="left">
									<div id="chartContainer8" style="height: 100%; width: 100%;"></div>
									
								</div>
								
								
								
								
								
								
								
								<div align="center">
									
									
									<?php
					
										$rsql12 = "SELECT * FROM ModuleComponents WHERE ModuleCode = '$modules[7]'";
										$rsql13 = "SELECT * FROM Marks WHERE ModuleCode='$modules[7]' AND Student_id='$sID'";
										$rresult12 = $conn->query($rsql12);
										$rresult13 = $conn->query($rsql13);
										
										$assignments8 = array();
										$marks8 = array();
										
										if ($rresult12->num_rows > 0) {
											
											while($rrow12 = $rresult12->fetch_assoc()) {
												array_push($assignments8, $rrow12["Component_name"]);
											}
											
											while($rrow13 = $rresult13->fetch_assoc()) {
												array_push($marks8, $rrow13["Mark"]);
											}
											
										}
										
									?>


									
									<h2><?php echo $modules[7]; ?></h2>
									<br>
									
									<?php 
									
										for($i8 = 0; $i8 < count($assignments8); $i8++) {
											
											echo '<p>' . $assignments8[$i8] . '</p>';
											echo '<div class="slidecontainer">';
											echo '<input type="range" min="0" max="100" value="' . $marks8[$i8] . '" class="slider" id="myRange' . '$i8" disabled>';
											//echo '<p>Value: <span id="demo"></span></p>';
											echo '</div><br><br>';
										}
									
									?>

								</div>
								
								
								
								
								<div align="right">
									<h2>Current Grade: <?php echo $grades[7] ?></h2>
								</div>
								
								
								<br><br><br>
								
								
							  </div>

							</div>
							
							<!-------------------------------------------------------------------------------------------------------------------->
						</td>
					<?php } ?>
					
					
					
					
					
					
					
					
					
					
					
				</tr>
			
			</table>
			<!-------------------------------------------------------------------------------------------------------------------->  

		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  <!------------------Scripts from: https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_modal ----------------->
			<script>
				// Get the modal
				var modal = document.getElementById('myModal');
				var modal2 = document.getElementById('myModal2');
				var modal3 = document.getElementById('myModal3');
				var modal4 = document.getElementById('myModal4');
				var modal5 = document.getElementById('myModal5');
				var modal6 = document.getElementById('myModal6');
				var modal7 = document.getElementById('myModal7');
				var modal7 = document.getElementById('myModal8');

				
				
				// Get the button that opens the modal
				var btn = document.getElementById("Btn");
				var btn2 = document.getElementById("Btn2");
				var btn3 = document.getElementById("Btn3");
				var btn4 = document.getElementById("Btn4");
				var btn5 = document.getElementById("Btn5");
				var btn6 = document.getElementById("Btn6");
				var btn7 = document.getElementById("Btn7");
				var btn7 = document.getElementById("Btn8");

				
				
				// Get the <span> element that closes the modal
				var span = document.getElementsByClassName("close")[0];

				
				
				// When the user clicks the button, open the modal 
				btn.onclick = function() {
					modal.style.display = "block";
				}
				
				btn2.onclick = function() {
					modal2.style.display = "block";
				}
				
				btn3.onclick = function() {
					modal3.style.display = "block";
				}
				
				btn4.onclick = function() {
					modal4.style.display = "block";
				}
				
				btn5.onclick = function() {
					modal5.style.display = "block";
				}
				
				btn6.onclick = function() {
					modal6.style.display = "block";
				}
				
				btn7.onclick = function() {
					modal7.style.display = "block";
				}
				
				btn8.onclick = function() {
					modal8.style.display = "block";
				}
				


				// When the user clicks on <span> (x), close the modal
				span.onclick = function() {
					modal.style.display = "none";
					modal2.style.display = "none";
					modal3.style.display = "none";
					modal4.style.display = "none";
					modal5.style.display = "none";
					modal6.style.display = "none";
					modal7.style.display = "none";
					modal8.style.display = "none";
				}

				// When the user clicks anywhere outside of the modal, close it
				window.onclick = function(event) {
					if (event.target == modal | event.target == modal2 | event.target == modal3 | event.target == modal4 | event.target == modal5 | event.target == modal6 | event.target == modal7) {
						modal.style.display = "none";
						modal2.style.display = "none";
						modal3.style.display = "none";
						modal4.style.display = "none";
						modal5.style.display = "none";
						modal6.style.display = "none";
						modal7.style.display = "none";
						modal8.style.display = "none";
					}
				}
			</script>
			
			
			
			
			<!-------------------------------------------------------------------------------------------------------------------->
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  <!----------------If user isn't logged in, display message----------->
		  <?php } else { ?>

			<p>Please Login to view/edit your modules</p>	
			
			
		  <?php } ?>
		  
		  
		  <hr>
		  
		  <p><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></p>
		</div>
		<div class="col-sm-2 sidenav">
		
		</div>
	  </div>
	</div>

	<footer class="container-fluid text-center">
	  <p>University of Essex | CE301 Final Year Project | Adam Hewitt</p>
	</footer>

</body>
</html>

<!DOCTYPE html>
<! Template taken from W3 schools: https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_temp_webpage&stacked=h >
<html lang="en">
<head>
  <title>Overview | CE301 Final Year Project - Adam Hewitt</title>
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
	
  </style>
</head>
<body>
	<?php session_start(); ?>

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
			<li class="active"><a href="overview.php">Overview</a></li>
			<li><a href="modules.php">Modules</a></li>
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
		  <h1>Overview</h1><p align="right"><a href="/marks.php">Edit Marks</a></p>
		  <hr>
		  
		  
		  <?php 
		  
			session_start();

			require 'conn.php';
			$year = $_SESSION["sYear"];
			$sID = $_SESSION["sID"];
			$modules = array();
			$grades = array();
			
			$sql = "SELECT * FROM StudentsModules WHERE Student_id = '$sID'";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					array_push($modules, $row["ModuleCode"]); 
					array_push($grades, $row["Grade"]);
				}
			}
			
		  
		  ?>
		  
		  <!---------------Check User is Logged In----------------------------->
		  <?php if (isset($_SESSION["sUsername"])) { ?>
			
			<!----------------------Display Modules----------------------------->
			  
			<h2>Modules</h2>
			
			<?php $modTotals = array(); ?>
			
			
			
			
			
			<table style="width:80%" align="left">
			
			<tr>
					<td>
						<!----------------------Module 0------------------------------------->
						<h3><?php echo $modules[0]; ?></h3>
						<?php 
						
							$sql0 = "SELECT Component_name, Weighting, Mark FROM Marks m, ModuleComponents c WHERE Student_id='$sID' AND c.Component_id= m.Component_id AND m.ModuleCode='$modules[0]'";
							$result0 = $conn->query($sql0);
							
							
							$module0Weights = array();
							$module0Marks = array();
							$totalM0 = 0;
							
							if($result0->num_rows > 0) {
								while($row0 = $result0->fetch_assoc()) {
									array_push($module0Weights, $row0["Weighting"]);
									array_push($module0Marks, $row0["Mark"]);
									$totalM0 += $row0["Mark"] * ($row0["Weighting"] / 100);
								}
								
								array_push($modTotals, $totalM0);
							}
						
						?>
						<p><?php echo "Aggregate Mark: " . $totalM0; ?></p>
						
					</td>
					
			
			
					<td>
						<!----------------------Module 1------------------------------------->
						<h3><?php echo $modules[1]; ?></h3>
						<?php 
						
							$sql1 = "SELECT Component_name, Weighting, Mark FROM Marks m, ModuleComponents c WHERE Student_id='$sID' AND c.Component_id= m.Component_id AND m.ModuleCode='$modules[1]'";
							$result1 = $conn->query($sql1);
							
							
							$module1Weights = array();
							$module1Marks = array();
							$totalM1 = 0;
							
							if($result1->num_rows > 0) {
								while($row1 = $result1->fetch_assoc()) {
									array_push($module1Weights, $row1["Weighting"]);
									array_push($module1Marks, $row1["Mark"]);
									$totalM1 += $row1["Mark"] * ($row1["Weighting"] / 100);
								}
								
								array_push($modTotals, $totalM1);
							}
						
						?>
						<p><?php echo "Aggregate Mark: " . $totalM1; ?></p>
					</td>
					
					
					
					
					
					<td>
						<!----------------------Module 2------------------------------------->
						<h3><?php echo $modules[2]; ?></h3>
						<?php 
						
							$sql2 = "SELECT Component_name, Weighting, Mark FROM Marks m, ModuleComponents c WHERE Student_id='$sID' AND c.Component_id= m.Component_id AND m.ModuleCode='$modules[2]'";
							$result2 = $conn->query($sql2);
							
							
							$module2Weights = array();
							$module2Marks = array();
							$totalM2 = 0;
							
							if($result2->num_rows > 0) {
								while($row2 = $result2->fetch_assoc()) {
									array_push($module2Weights, $row2["Weighting"]);
									array_push($module2Marks, $row2["Mark"]);
									$totalM2 += $row2["Mark"] * ($row2["Weighting"] / 100);
								}
								
								array_push($modTotals, $totalM2);
							}
						
						?>
						<p><?php echo "Aggregate Mark: " . $totalM2; ?></p>
					</td>
					
					
					
					
					
					
					<?php if ($year == 2 | $year == 1) {?>
						<td>
							<!----------------------Module 6------------------------------------->
							<h3><?php echo $modules[6]; ?></h3>
							<?php 
							
								$sql6 = "SELECT Component_name, Weighting, Mark FROM Marks m, ModuleComponents c WHERE Student_id='$sID' AND c.Component_id= m.Component_id AND m.ModuleCode='$modules[6]'";
								$result6 = $conn->query($sql6);
								
								
								$module6Weights = array();
								$module6Marks = array();
								$totalM6 = 0;
								
								if($result6->num_rows > 0) {
									while($row6 = $result6->fetch_assoc()) {
										array_push($module6Weights, $row6["Weighting"]);
										array_push($module6Marks, $row6["Mark"]);
										$totalM6 += $row6["Mark"] * ($row6["Weighting"] / 100);
									}
									
									array_push($modTotals, $totalM6);
								}
							
							?>
							<p><?php echo "Aggregate Mark: " . $totalM6; ?></p>
						</td>
					<?php } ?>	
					
					
					
					
				</tr>
					
				<tr>
				
				
				
				
					<td>
						<!----------------------Module 3------------------------------------->
							<h3><?php echo $modules[3]; ?></h3>
							<?php 
							
								$sql3 = "SELECT Component_name, Weighting, Mark FROM Marks m, ModuleComponents c WHERE Student_id='$sID' AND c.Component_id= m.Component_id AND m.ModuleCode='$modules[3]'";
								$result3 = $conn->query($sql3);
								
								
								$module3Weights = array();
								$module3Marks = array();
								$totalM3 = 0;
								
								if($result3->num_rows > 0) {
									while($row3 = $result3->fetch_assoc()) {
										array_push($module3Weights, $row3["Weighting"]);
										array_push($module3Marks, $row3["Mark"]);
										$totalM3 += $row3["Mark"] * ($row3["Weighting"] / 100);
									}
									
									array_push($modTotals, $totalM3);
								}
							
							?>
							<p><?php echo "Aggregate Mark: " . $totalM3; ?></p>
					</td>
					
					
					
					
					
					<td>
						<!----------------------Module 4------------------------------------->
						<h3><?php echo $modules[4]; ?></h3>
						<?php 
						
							$sql4 = "SELECT Component_name, Weighting, Mark FROM Marks m, ModuleComponents c WHERE Student_id='$sID' AND c.Component_id= m.Component_id AND m.ModuleCode='$modules[4]'";
							$result4 = $conn->query($sql4);
							
							
							$module4Weights = array();
							$module4Marks = array();
							$totalM4 = 0;
							
							if($result4->num_rows > 0) {
								while($row4 = $result4->fetch_assoc()) {
									array_push($module4Weights, $row4["Weighting"]);
									array_push($module4Marks, $row4["Mark"]);
									$totalM4 += $row4["Mark"] * ($row4["Weighting"] / 100);
								}
								
								array_push($modTotals, $totalM4);
							}
						
						?>
						<p><?php echo "Aggregate Mark: " . $totalM4; ?></p>
					</td>
					
					
					
					
					
					
					
					<td>
						<!----------------------Module 5------------------------------------->
						<h3><?php echo $modules[5]; ?></h3>
						<?php 
						
							$sql5 = "SELECT Component_name, Weighting, Mark FROM Marks m, ModuleComponents c WHERE Student_id='$sID' AND c.Component_id= m.Component_id AND m.ModuleCode='$modules[5]'";
							$result5 = $conn->query($sql5);
							
							
							$module5Weights = array();
							$module5Marks = array();
							$totalM5 = 0;
							
							if($result5->num_rows > 0) {
								while($row5 = $result5->fetch_assoc()) {
									array_push($module5Weights, $row5["Weighting"]);
									array_push($module5Marks, $row5["Mark"]);
									$totalM5 += $row5["Mark"] * ($row5["Weighting"] / 100);
								}
								
								array_push($modTotals, $totalM5);
							}
						
						?>
						<p><?php echo "Aggregate Mark: " . $totalM5; ?></p>
					</td>
					
					
					
					
					
					<?php if ($year == 2 | $year == 1) { ?>
						<td>
							<!----------------------Module 7------------------------------------->
							<h3><?php echo $modules[7]; ?></h3>
							<?php 
							
								$sql7 = "SELECT Component_name, Weighting, Mark FROM Marks m, ModuleComponents c WHERE Student_id='$sID' AND c.Component_id= m.Component_id AND m.ModuleCode='$modules[7]'";
								$result7 = $conn->query($sql7);
								
								
								$module7Weights = array();
								$module7Marks = array();
								$totalM7 = 0;
								
								if($result7->num_rows > 0) {
									while($row7 = $result7->fetch_assoc()) {
										array_push($module7Weights, $row7["Weighting"]);
										array_push($module7Marks, $row7["Mark"]);
										$totalM7 += $row7["Mark"] * ($row7["Weighting"] / 100);
									}
									
									array_push($modTotals, $totalM7);
								}
							
							?>
							<p><?php echo "Aggregate Mark: " . $totalM7; ?></p>
						</td>
					<?php } ?>
					
					
					
					
				</tr>
			</table>
			
			
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			
			
			
			<?php
			
 
			
			
			if($year == 1 | $year == 2) {
				
				$dataPoints = array(
					array("label"=> $modules[0], "y"=> $totalM0),
					array("label"=> $modules[1], "y"=> $totalM1),
					array("label"=> $modules[2], "y"=> $totalM2),
					array("label"=> $modules[3], "y"=> $totalM3),
					array("label"=> $modules[4], "y"=> $totalM4),
					array("label"=> $modules[5], "y"=> $totalM5),
					array("label"=> $modules[6], "y"=> $totalM6),
					array("label"=> $modules[7], "y"=> $totalM7)
				);
				
			} else {
				$dataPoints = array(
					array("label"=> $modules[0], "y"=> $totalM0),
					array("label"=> $modules[1], "y"=> $totalM1),
					array("label"=> $modules[2], "y"=> $totalM2),
					array("label"=> $modules[3], "y"=> $totalM3),
					array("label"=> $modules[4], "y"=> $totalM4),
					array("label"=> $modules[5], "y"=> $totalM5)
				);
				
			}
				
			?>
			
			
			<script>
				window.onload = function () {
				 
				var chart = new CanvasJS.Chart("chartContainer", {
					animationEnabled: true,
					theme: "light2", // "light1", "light2", "dark1", "dark2"
					title: {
						text: "Module Overview"
					},
					axisY: {
						title: "Percentage",
						includeZero: true
					},
					data: [{
						type: "column",
						dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
					}]
				});
				chart.render();
				 
				}
				</script>
				
				<div id="chartContainer" style="height: 370px; width: 100%;"></div>
				<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
			
			
			<hr>
			<br><br><br><br><br>
			
			
			
			
			
			
			
			<br><br><br><br><br>
			
			<?php 
			
				$totalYear = 0;
				
				if ($year == 2) {
					for($i = 0; $i < count($modTotals); $i++) 
						$totalYear += $modTotals[$i] * 0.12;				
				}
			
				if ($year == 3)
					$totalYear += $modTotals[0] * 0.375;
				
					for($i = 1; $i < count($modTotals); $i++) {
						
						$totalYear += $modTotals[$i] * 0.12;
						
					}
				
				$totalYear = number_format((float)$totalYear, 2, '.', '');
				echo "<h2>Overall Year Grade = " . $totalYear . "%</h2>";
				echo "<h4>";
				echo "<br>Percentage Needed For 1st = " . (69.5-$totalYear) . "%";
				echo "<br><br>Percentage Needed For 2:1 = " . (60-$totalYear) . "%";
				echo "<br><br>Percentage Needed For 2:2 = " . (50-$totalYear) . "%";
				echo "<br><br>Percentage Needed For 3rd = " . (40-$totalYear) . "%";
				echo "</h4>";
			
			
			?>
			
			
			<br><br><br><br>
			
			<form action="/updateOverallGrades.php" method="post">
			
				<input type="hidden" name="m1" value="<?php echo $totalM0; ?>">
				<input type="hidden" name="m2" value="<?php echo $totalM1; ?>">
				<input type="hidden" name="m3" value="<?php echo $totalM2; ?>">
				<input type="hidden" name="m4" value="<?php echo $totalM3; ?>">
				<input type="hidden" name="m5" value="<?php echo $totalM4; ?>">
				<input type="hidden" name="m6" value="<?php echo $totalM5; ?>">
				
				<?php if($year == 1 | $year == 2) { ?>
					<input type="hidden" name="m7" value="<?php echo $totalM6; ?>">
					<input type="hidden" name="m8" value="<?php echo $totalM7; ?>">
				<?php } ?>
			
				<div width="20%">
					<div class="clearfix">
						<button type="submit" id="submit" class="submitBtn">Update Marks</button>
					</div>
				</div>
			</form>
			
			
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			
			
			

		  
		  <!----------------If user isn't logged in, display message----------->
		  <?php } else { ?>

			<p>Please Login to view/edit your modules</p>
			
			
		  <?php } ?>
		  
		  
		  
		  
		  
		  
		  

		</div>
		<div class="col-sm-2 sidenav">
		  
		</div>
	  </div>
	</div>

	<footer class="container-fluid text-center">
	  <p>Footer Text</p>
	</footer>

</body>
</html>>
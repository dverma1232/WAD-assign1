<!DOCTYPE html>
<html lang="en">

<head>
	<?php include('./includes/header.inc');
  $page = "enquiry"?>
</head>
<!-- Body begin -->

<body>
	<!-- Navigation -->
	<header id="nav-bar">
		<?php include('./includes/nav.inc') ?>
	</header>
	<!-- Breadcrumbs -->
	<section id="breadcrumb-section">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				<li class="breadcrumb-item"><a href="jobpostform.php">Post a Job</a></li>
				<li class="breadcrumb-item active" aria-current="true">Post Job Process</li>
			</ol>
		</nav>
	</section>
	<?php
// Sanitise data
	function sanitise_input($data) {
   		$data = trim($data);
   		$data = stripslashes($data);
   		$data = htmlspecialchars($data);
   		return $data;
	}

	//  Check if it is submitted by payment form submission
	if (!isset($_POST["postButton"])) {		//blocks direct URL access
		header("location:jobpostform.php");
		exit();
	}

	/***** Form Validation *****/
	$err_msg="";	//error message variable
	 $filename = "../../data/jobposts/jobs.txt";
	 $dir = "../../data/jobposts";
//	$filename = "./data/jobs.txt";
//	$dir = "./data";

	//Position ID
	if (!isset($_POST["position-id"])) {

	}
	else{
		$positionID=$_POST["position-id"];
		$positionID=sanitise_input($positionID);
		if ($positionID=="") {
			$err_msg .= "<p>Please enter the position ID.</p>";
		}
		else if (!preg_match("/[P]{1}\d{4}/",$positionID)) {
			$err_msg .= "<p>Position ID must start with capital P followed by 4 numbers.</p>";
		}
		else if (file_exists($dir) && is_readable($filename)) {
            $handle = fopen($filename, "r");
			$contents = file_get_contents($filename);
			//escape special characters
			$pattern = preg_quote($positionID, '/');
			//match whole line
			$pattern = "/^.*$pattern.*\$/m";
            if(preg_match_all($pattern, $contents)){
				$err_msg .= "<p>Position ID is not unique.</p>";
			}
            fclose($handle);
        }
	}

	//Title
	if (!isset($_POST["title"])) {

	}
	else{
		$title=$_POST["title"];
		$title=sanitise_input($title);
		if ($title=="") {
			$err_msg .= "<p>Please enter the job title.</p>";
		}
		else if (!preg_match("/^[a-zA-Z0-9,.! ]{1,20}$/",$title)) {
			$err_msg .= "<p>Title can only contain max 20 alphanumeric characters including spaces, comma, period (full stop), and exclamation
			point. Other characters or symbols are not allowed.</p>";
		}
	}

	//Description
	if (!isset($_POST["description"])) {

	}
	else{
		$description=$_POST["description"];
		$description=sanitise_input($description);
		if ($description=="") {
			$err_msg .= "<p>Please enter a description.</p>";
		}
		else if (strlen($description) > 260) {
			$err_msg .= "<p>Description must be less than 260 characters in length.</p>";
		}
	}

	//Closing Date
	if (!isset($_POST["date"])) {

	}
	else{
		$date=$_POST["date"];
		if ($date=="") {
			$err_msg .= "<p>Please choose a closing date.</p>";
		}
		//Date format validation is already done through input type="date"
	}

	// Position
	if (!isset($_POST["position"])) {
		$err_msg .= "<p>Please choose a position.</p>";
	}
	else {
		$position=$_POST["position"];  // array
		if ($position=="") {
			$err_msg .= "<p>Please choose a position.</p>";
		}
	}

	// Contract
	if (!isset($_POST["contract"])) {
		$err_msg .= "<p>Please choose a contract option.</p>";
	}
	else {
		$contract=$_POST["contract"];
		if ($contract=="") {
			$err_msg .= "<p>Please choose a contract option.</p>";
		}
	}

	//Application
	if (!isset($_POST["application"])) {
		$applicationString="";
		$err_msg .= "<p>Please choose an application option.</p>";
	}
	else {
		$application=$_POST["application"];  // array
		$applicationString=implode(",",$application); //make the array a comma-separated string
		$applicationString=sanitise_input($applicationString);
	}

	//Location
	if (!isset($_POST["location"])) {
		$err_msg .= "<p>Please choose a location</p>";
	}
	else{
		$location=$_POST["location"];
		if ($location==" -- select -- ") {
			$err_msg .= "<p>Please select your location.</p>";
		}
  }

  //Error message
	if ($err_msg!=""){
    echo "<div class='alert alert-danger' role='alert'>";
    echo $err_msg;
    echo "</div>";
  	} else {
		umask(0007);
		if (!file_exists($dir)) {
			mkdir($dir, 02770);
		}
		$handle = fopen($filename, "a");
		if (is_writable($filename)) {   //check if writable
		$positionID = addslashes($positionID);
		$title = addslashes($title);
		$description = addslashes($description);
		$date = addslashes($date);
		$position = addslashes($position);
		$contract = addslashes($contract);
		$applicationString = addslashes($applicationString);
		$location = addslashes($location);
		$savedata = $positionID . "\t" . $title . "\t" . $description . "\t" . $date . "\t" . $position . "\t" . $contract . "\t" . $applicationString . "\t" . $location . "\r\n";
		if (fwrite($handle, $savedata) === false) { //checks if write failed
			echo"<p class='alert alert-danger'>Your job could not be posted. File not writable.</p>";
		} else { //if write was successful
			echo"<p class='alert alert-success'>Thank you for posting your job.</p>";
			fclose($handle); // close the text file
		}
		} else {
			echo"<p class='alert alert-danger'>Your job could not be posted. File not writable.</p>";
			fclose($handle); // close the text file
		}
	}

?>

	<section id="success">
		<div class="container text-center">
			<a href="index.php" class="btn btn-primary">Return to homepage</a>
			<a href="jobpostform.php" class="btn btn-primary">Return to Post Job Vacancy Page</a>
		</div>
	</section>
	<!-- Footer -->
	<footer>
		<?php include('./includes/footer.inc') ?>
	</footer>
</body>

</html>

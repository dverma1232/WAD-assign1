<!DOCTYPE html>
<html lang="en">

<head>
	<?php include('./includes/header.inc');
  $page = "search"?>
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
				<li class="breadcrumb-item"><a href="searchjobform.php">Search</a></li>
				<li class="breadcrumb-item active" aria-current="true">Search Form Process</li>
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

	//  Check if it is submitted by search form
	if (!isset($_GET["searchButton"])) {		//blocks direct URL access
		header("location:searchjobform.php");
		exit();
	}
	$err_msg = "";
	$filename = "../../data/jobposts/jobs.txt";

	if (isset($_GET["title"])) {
		$title=$_GET["title"];
		$contract="";
		$position="";
		$applicationString="";
		$location="";

		// Contract
		if (isset($_GET["contract"])) {
			$contract=$_GET["contract"];
		}

		//Application
		if (isset($_GET["application"])) {
			$application=$_GET["application"];  // array
			$applicationString=implode(",",$application);
		}

		//Application
		if (isset($_GET["position"])) {
			$position=$_GET["position"];
		}

		//Location
		if (isset($_GET["location"])) {
			$location=$_GET["location"];
		}
		if ($location==" -- select -- ") {
			$location .= "";
		}
		if (is_readable($filename)) {
			$alldata = array();
			$handle = fopen($filename, "r");
			while ( !feof($handle) ) {
				$onedata = fgets($handle);
				if ($onedata != "") {
					$data = explode('	', $onedata);
					$alldata[] = $data;
				}

			}
			fclose($handle);
        } else {
			$err_msg = "<p>File does not exist or is not readable.</p>";
		}
	}
	else{
		$err_msg = "<p>Title is empty.</p>";
	}

 	//Error message
	if ($err_msg!=""){
    echo "<div class='alert alert-danger' role='alert'>";
    echo $err_msg;
    echo "</div>";
	} else { ?>
	<section id="success">
		<div class="container">
			<div class="row search-results">
				<h2 style="flex: 1;">Search Results</h2>

				<?php
				$matches = 0;
				for($resultsnumber = 0; $resultsnumber < sizeof($alldata); $resultsnumber++) {
					if (!empty($title)) {
						if (strpos(trim(strtolower($alldata[$resultsnumber][1])), trim(strtolower($title))) === false) {
							continue;
						}
					}

					if (!empty($position)) {
						if (trim(strtolower($alldata[$resultsnumber][4])) != trim(strtolower($position))) {
							continue;
						}
					}

					if (!empty($contract)) {
						if (trim(strtolower($alldata[$resultsnumber][5])) != trim(strtolower($contract))) {
							continue;
						}
					}

					if (!empty($applicationString)) {
						if (trim(strtolower($alldata[$resultsnumber][6])) != trim(strtolower($applicationString))) {
							continue;
						}
					}

					if (!empty($location)) {
						if (trim(strtolower($alldata[$resultsnumber][7])) != trim(strtolower($location))) {
							continue;
						}
					}
					$date = new DateTime($alldata[$resultsnumber][3]);
					$now = new DateTime();
					if($date < $now) {

					}
					else {
						echo '
						<div id="results-card-col" class="pricing-col">
						<div id="result-card-head" class="pricing-head">
						<p>Job Title:</p>
					   	<h3>'.$alldata[$resultsnumber][1].'</h3>
						</div>
						<div class="pricing-content">
					   	<p><b>Position ID:</b> '.$alldata[$resultsnumber][0].'</p>
					  	<p><b>Description:</b> '.$alldata[$resultsnumber][2].'</p>
					   	<p><b>Closing Date:</b> '.date("d/m/Y", strtotime($alldata[$resultsnumber][3])).'</p>
					   	<p><b>Position</b> '.$alldata[$resultsnumber][4].'</p>
					   	<p><b>Contract:</b> '.$alldata[$resultsnumber][5].'</p>
					   	<p><b>Application By:</b> '.$alldata[$resultsnumber][6].'</p>
					   	<p><b>Location:</b> '.$alldata[$resultsnumber][7].'</p>
						</div>
						</div>';
						$matches++;
					}
					
				}
				?>

			</div>
			<?php
			if ($matches < 1) {
				echo "<div class='alert alert-danger' role='alert'>";
				echo "<p>No matched found.</p>";
				echo "</div>";
			}
			?>
		</div>

		<div class="container text-center">
			<a href="index.php" class="btn btn-primary">Return to homepage</a>
			<a href="searchjobform.php" class="btn btn-primary">Search again</a>
		</div>
	</section>

	<?php } ?>

	<!-- Footer -->
	<footer>
		<?php include('./includes/footer.inc') ?>
	</footer>
</body>

</html>
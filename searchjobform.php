<!DOCTYPE html>
<html lang="en">

<head>
	<?php include('./includes/header.inc'); $page="search"; ?>
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
				<li class="breadcrumb-item active" aria-current="true">Search</li>
			</ol>
		</nav>
	</section>
	<section id="contact">
		<div class="table-responsive">
			<h2>Search</h2>
			<?php
	
			?>
		</div>
	</section>
	<section id="searchForm">
		<div class="container">
			<form action="searchjobprocess.php" method="GET">
				<div class="form-group">
					<label for="title">Job Title:</label>
					<input class="form-control" type="text" name="title" id="title" size="25" required="required" />
				</div>
				<div class="form-group">
					<label for="full-time">Position:</label><br />

					<input type="radio" value="Full Time" name="position" id="full-time" />
					<label for="full-time">Full Time</label>

					<input type="radio" value="Part Time" name="position" id="part-time" />
					<label for="part-time">Part Time</label>
				</div>
				<div class="form-group">
					<label for="ongoing">Contract:</label><br />

					<input type="radio" value="Ongoing" name="contract" id="ongoing" />
					<label for="ongoing">Ongoing</label>

					<input type="radio" value="Fixed Term" name="contract" id="fixed-term" />
					<label for="fixed-term">Fixed Term</label>
				</div>
				<div class="form-group">
					<label for="post">Application Type:</label><br />

					<input type="checkbox" value="Post" name="application[]" id="post" />
					<label for="post">Post</label>

					<input type="checkbox" value="Email" name="application[]" id="mail" />
					<label for="mail">Email</label>
				</div>
				<div class="form-group">
					<label for="location">Location:</label>
					<select class="form-control" id="location" name="location">
						<option disabled selected value> -- select -- </option>
						<option value="VIC">VIC</option>
						<option value="NSW">NSW</option>
						<option value="QLD">QLD</option>
						<option value="NT">NT</option>
						<option value="WA">WA</option>
						<option value="SA">SA</option>
						<option value="TAS">TAS</option>
						<option value="ACT">ACT</option>
					</select>
				</div>
				<button type="submit" name="searchButton" class="btn btn-primary">Search</button>
				<a href="index.php" class="btn btn-primary">Return To Home</a>
			</form>
		</div>
	</section>

	<!-- Footer -->
	<footer>
		<?php include('./includes/footer.inc') ?>
	</footer>
</body>

</html>
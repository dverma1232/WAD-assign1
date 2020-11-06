<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('./includes/header.inc');
  $page = "about"; ?>
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
           <li class="breadcrumb-item active" aria-current="true">About</li>
         </ol>
       </nav>
   </section>
  <?php 
    $phpversion = phpversion(); 
    if ($phpversion < 6) {
      $comment = "Very outdated!";
    }
    else {
      $comment = "Yaay, you're up to date!";
    }
  ?>
   <!-- About Details -->
   <section id="enhancements">
   <div class="container">
        <h2>PHP Version</h2>
        <p>The PHP version installed on this server is: <?php echo $phpversion;?></p>
        <p><?php echo $comment; ?></p> 
    </div>
    <div class="container">
        <h2>What tasks you have not attempted or not completed?</h2>
        <p>I have attempted and completed all tasks.</p>
    </div>
    <div class="container">
        <h2>Feature 1: Bootstrap</h2>
        <p>One of the enhancements I have used in my assignment is Bootstrap. Bootstrap is a front-end framework which allows developers to easily and quickly create responsive websites. I have used bootstrap throughout all my pages to create a fluid layout using bootstrap’s grid system and also have used some of Bootstrap’s components such as <a href="#nav-bar">nav bar</a> to make the user experience better and also allow me to create these elements quicker than creating these myself.</p>
    </div>
    <div class="container">
        <h2>Feature 2: Animations</h2>
        <p>I have added a fade in transition to all pages, I have done this through CSS using opacity and keyframes. I feel this is important as this provides a better user experience and nearly every big website has some sort of animation so as to not make the user experience jarring.</p>
        <p><strong>Preview:</strong></p>
        <img class="col-md-6" src="https://i.imgur.com/12Vbi1l.gif" alt="Transitions Preview" title="Transitions Preview">
    </div>
    <div class="container">
        <h2>What discussion points did you participated on in the unit’s discussion board for
Assignment 1? If you did not participate, state your reason.</h2>
        <p>I didn't participate on the discussions because there was no really big issues I ran into that I needed more help with. Furthermore, I prefer to solve the problem on my own using resources such as Stackoverflow and similar websites.</p>
        <a href="index.php" class="btn btn-primary">Return to homepage</a>
      </div>
    
   </section>
   <!-- Footer -->
	<footer>
    <?php include('./includes/footer.inc') ?>
	</footer>
</body>
</html>
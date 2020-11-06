<!DOCTYPE html>
<html lang="en">

<head>
   <?php 
      include('./includes/header.inc');
      $page = "home";
   ?>
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
         </ol>
      </nav>
   </section>

   <section id="about">
      <div class="about-left container">
         <div class="row">
            <h2 style="flex: 1;">Job Vacancy Posting System</h2>
            <div class="about-content">
               <p>Name: Divanshu Verma</p>
               <p>Student ID: 103063941</p>
               <p>Email: <a href="mailto:103063941@student.swin.edu.au">103063941@student.swin.edu.au</a></p>
               <p>I declare that this assignment is my individual work. I have not worked collaboratively nor have I
                  copied from any other student's work or from any other source.</p>
            </div>
            <div class="row"></div>
            <a href="about.php" class="btn btn-primary">About This Assignment</a>
            <a href="jobpostform.php" class="btn btn-primary">Post A Job Vacancy</a>
            <a href="searchjobform.php" class="btn btn-primary">Search For A Job Vacancy</a>
         </div>
      </div>
   </section>
   <!-- Pricing Plans -->
   <section id="pricing">
      <div class="container">
         <h2>Pricing</h2>
         <div class="row">
            <!-- Left Column -->
            <div class="col-md-4">
               <div class="pricing-col">
                  <div class="pricing-head">
                     <h3>Basic</h3>
                     <p>$1<span> /per month</span></p>
                  </div>
                  <div class="pricing-content">
                     <ul>
                        <li>Basic Support</li>
                        <li>5 Job Listings (per month)</li>
                     </ul>
                  </div>
                  <div class="pricing-btn">
                     <a class="contact-btn" href="jobpostform.php">Post A Job</a>
                  </div>
               </div>
            </div>
            <!-- Center Column -->
            <div class="col-md-4">
               <div class="pricing-col">
                  <div class="pricing-head">
                     <h3>Pro</h3>
                     <p>$19.99<span> /per month</span></p>
                  </div>
                  <div class="pricing-content">
                     <ul>
                        <li>Email Support</li>
                        <li>50 Job Listings (per month)</li>
                        <li>1 Featured Job Listing (per month)</li>
                     </ul>
                  </div>
                  <div class="pricing-btn">
                     <a class="contact-btn" href="jobpostform.php">Post A Job</a>
                  </div>
               </div>
            </div>
            <!-- Right Column -->
            <div class="col-md-4">
               <div class="pricing-col">
                  <div class="pricing-head">
                     <h3>Company</h3>
                     <p>$29.99 /per month</p>
                  </div>
                  <div class="pricing-content">
                     <ul>
                        <li>24/7 Phone Support</li>
                        <li>100 Job Listings (per month)</li>
                        <li>5 Featured Job Listing (per month)</li>
                     </ul>
                  </div>
                  <div class="pricing-btn">
                     <a class="contact-btn" href="jobpostform.php">Post A Job</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Footer -->
   <footer>
      <?php include('./includes/footer.inc') ?>
   </footer>
</body>

</html>
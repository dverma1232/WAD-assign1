<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./includes/header.inc'); 
        $page = "enquiry";
        $date = date('Y-m-d');
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
                <li class="breadcrumb-item active" aria-current="true">Enquiry</li>
            </ol>
        </nav>
    </section>

    <!-- Contact Form -->
    <section id="contact">
        <div class="container">
            <h2>Job Vacancy Posting System</h2>
            <form class="contact-form" id="enquireForm" method="post" action="postjobprocess.php" novalidate>
                <div class="form-group">
                    <label for="position-id">Position ID:</label>
                    <input class="form-control" type="text" name="position-id" id="position-id" pattern="[A-Za-z]+"
                        maxlength="5" size="25" required="required" />
                </div>
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input class="form-control" type="text" name="title" id="title" pattern="[A-Za-z]+" maxlength="25"
                        size="25" required="required" />
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4" class="form-control"
                        placeholder="Your description here..."></textarea>
                </div>
                <div class="form-group">
                    <label for="date">Closing Date:</label>
                    <input id="date" name="date" type="date" value="<?php echo $date ?>" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label for="full-time">Position:</label><br />

                    <input type="radio" value="Full Time" name="position" id="full-time" required="required" />
                    <label for="full-time">Full Time</label>

                    <input type="radio" value="Part Time" name="position" id="part-time" required="required" />
                    <label for="part-time">Part Time</label>
                </div>
                <div class="form-group">
                    <label for="ongoing">Contract:</label><br />

                    <input type="radio" value="Ongoing" name="contract" id="ongoing" required="required" />
                    <label for="ongoing">Ongoing</label>

                    <input type="radio" value="Fixed Term" name="contract" id="fixed-term" required="required" />
                    <label for="fixed-term">Fixed Term</label>
                </div>
                <div class="form-group">
                    <label for="post">Application By:</label><br />

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
                <button type="submit" name="postButton" class="btn btn-primary">Post</button>
                <button type="reset" class="btn btn-primary">Reset</button>
                <a href="index.php" class="btn btn-primary">Return to homepage</a>
            </form>
        </div>
    </section>
    <!-- Footer -->
    <footer>
        <?php include('./includes/footer.inc') ?>
    </footer>
</body>

</html>
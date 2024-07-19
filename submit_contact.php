<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burhan Ahmad | Front-End Web Development Portfolio - Contact</title>

    <!-- Adding Meta Description -->
    <meta name="description"
        content="website Development, website developer, Front-End Web developer, HTML, CSS, HTML/CSS">

    <!-- Adding Favicon To This Website -->
    <link rel="shortcut icon" href="favicon/favicon.png" type="image/x-icon">

    <!-- Linking CSS StyleSheet To This HTML Web-page -->
    <link rel="stylesheet" href="../My-Portfolio-Website/css/contactStyle.css">

    <meta name="p:domain_verify" content="c286770d5df99111ef0549609b64fd55"/>
    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-CM4RDXCXVC"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-CM4RDXCXVC');
    </script>
</head>

<body>
    <div class="container">
        <nav class="nav-bar">
            <div class="navLogo">
                <h2>Portfolio</h2>
            </div>
            <ul class="nav-btns">
                <li><a href="home.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="CV/Burhan-Ahmad-Resume.pdf" download>Downlaod CV</a></li>
            </ul>
            <ul class="social-icons">
                <li><a href="https://www.facebook.com/share/7NTDPm5E4XVqir71/?mibextid=qi2Omg" target="_blank"><img src="icons/fb-icon.svg" alt=""></a></li>
                <li><a href="https://www.instagram.com/" target="_blank"><img src="icons/insta-icon.svg" alt=""></a></li>
                <li><a href="https://www.linkedin.com/in/burhan-ahmad-642350248" target="_blank"><img src="icons/lkdin-icon.svg" alt=""></a></li>
            </ul>
        </nav>

        <div class="contactForm">
            <h3>Contact Information</h3>
            <form action="../My-Portfolio-Website/submit_contact.php" method="post">
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" name="fname" class="form-control" id="firstName" placeholder="Enter Your First Name">
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" name="lname" class="form-control" id="lastName" placeholder="Enter Your Last Name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea class="form-control" name="cmnt" id="comment" rows="3" placeholder="Write Here"></textarea>
                </div>
                <button type="submit" class="btn">Submit</button>
            </form>
        </div>
    </div>

    <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $firstName = $_POST['fname'];
            $lastName = $_POST['lname'];
            $email = $_POST['email'];
            $comment = $_POST['cmnt'];

            $severName = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'portfolio_contact_form';

            $conn = mysqli_connect($severName, $username, $password, $dbname);
            if (!$conn) {
                die("Unable to build connection with the database" . mysqli_connect_error());
            }
            echo "<br>" . "Successfully build the connection";

            $sql = "INSERT INTO `user_record` (`user_first_name`, `user_last_name`, `user_email`, `user_comment`, `user_submission_dt`) VALUES ('$firstName', '$lastName', '$email', '$comment', current_timestamp())";

            $result = mysqli_query($conn, $sql);

            // echo "<br>" . "<br>" . "<br>" . "<br>" . $result;
            if ($result) {
                echo "<br>" . "<div id="success-message" class="notification success-notification">
        <span id="success-icon" class="notification-icon">&#10004;</span>
        Data successfully submitted
    </div>";
            }
            else{
                echo "<br>" . "unable to submit to the database." . mysqli_error($conn);
            }
        }

    ?>
</body>

</html>
<?php

    // include("adopter_db_connect.php");

    $db_server = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "adopter_db";
    $conn = "";

    try{
    $conn = mysqli_connect($db_server,$db_user,$db_password,$db_name);
    }
    catch(mysqli_sql_exception){
        echo "Hello Adopter, we are sorry the server didn't respond";
    }
    if($conn){
        // echo "Welcome user";
    }
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Tales</title>
    <link rel="stylesheet" href="happy_tales.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sansation:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_back" />
</head>
<body>

<div id="banner">
        <h3 id="title">
            Pet Adoption Finder<img src="ADOPTION PAGE/images/logo_banner.png"></h3>
        <navbar>
            <a href="mainhomepage.php" target="_blank">
                <div class="headernavbar">
                    Home Page
                </div>
            </a>

            <a href="ADOPTION PAGE/adoptionpage.php" target="_blank">
                <div class="headernavbar">
                    Adopt
                </div>
            </a>

            <a href="ADOPTION PAGE/adoptionpage.php" target="_blank">
                <div class="headernavbar">
                    Foster
                </div>
            </a>

            <a href="#site-footer">
                <div class="headernavbar">
                    About
                </div>
            </a>
        </navbar>
    </div>

    <br><br><br><br><br>

    <div class="titles">
    <h1>Happy Tales of parents we connected</h1>
    <h3>Here's what people think about us...</h3>
    </div>
    <div class="scrollcontrols" id="scroll-controls">
        <button id="left-btn" onclick="scroll_left()"><</button>
    <div class="main_box" id="main_box">
        
    <?php
        $sql2 = "SELECT * FROM happy_tales ";

        $db_obj = mysqli_query($conn, $sql2);
    
        if(mysqli_num_rows($db_obj)>0){
            while($row = mysqli_fetch_assoc($db_obj)){
                echo '<div class="main_section">
            <div class="owner_image"><img src="person.png"></div>
            <div class="happy-tale"><div class="decoration">"</div>
            <p>'. $row['tale'] .'</p>
            <div class="owner-name">'. $row['name'] .'</div>
            <div class="owner-location">'. $row['location'] .'</div>
            </div>
        </div>';
        }
    }
    else{
        echo 'NO pet exist in database';
    }
    ?>
    
        <div class="main_section">
            <div class="owner_image"><img src="person.png"></div>
            <div class="happy-tale"><div class="decoration">"</div>
            <p>Adopting through this site changed our lives! We found Max, and he’s been a ball of joy ever since. Couldn’t have asked for a smoother experience.</p>
            <div class="owner-name">Owner-name</div>
            <div class="owner-location">Loc</div>
            </div>
        </div>

        <div class="main_section">
            <div class="owner_image"><img src="person.png"></div>
            <div class="happy-tale"><div class="decoration">"</div>
            <p>Adopting through this site changed our lives! We found Max, and he’s been a ball of joy ever since. Couldn’t have asked for a smoother experience.</p>
            <div class="owner-name">Owner-name</div>
            <div class="owner-location">Loc</div>
            </div>
        </div>
    </div>
    <button id="right-btn" onclick="scroll_right()">></button>
</div>
    <br><br><br>

    <form action="happy_tales.php" method="post">
    <div class="post-tale">
        <div class="post-query">Want to tell your happy tale ?</div>
        <div class="input"><textarea type="textbox" rows="5" columns="50" placeholder="Write your story here..." name="tale"></textarea>
        <br><br><br><br>
                        <div class="extra_details">
                           <input type="text" name="name" required placeholder="Full Name">
                           <input type="text" name="location" required placeholder="Location">
                        </div>
        <br><br>
        </div>
    </div>
    <button id="post" type="submit" name="submit">Post</button>
</form>

<?php    
if(isset($_POST['submit'])){
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $fullname = $_POST['name'];
    $location = $_POST['location'];
    $tale = $_POST['tale'];
}

    $sql = "INSERT INTO happy_tales
            (name, location, tale)
            VALUES 
            ('$fullname','$location', '$tale')";

    try{
        mysqli_query($conn,$sql);
        header("Location: happy_tales.php");
    }
    catch(mysqli_sql_exception){
        echo "You weren't registered";
    }
}
    ?>

<script>
    const scrollContainer = document.getElementById('main_box');
const scrollLeftBtn = document.getElementById('left-btn');
const scrollRightBtn = document.getElementById('right-btn');

// Scroll amount per click (you can adjust)
const scrollAmount = 2100;

function scroll_left(){
    scrollContainer.scrollBy({
        left: -scrollAmount,
        behavior: 'smooth'
    });
};

function scroll_right() {
    scrollContainer.scrollBy({
        left: scrollAmount,
        behavior: 'smooth'
    });
};
</script>

<footer class="site-footer" id="site-footer">
    <div class="footer-container">
        <div class="footer-section about">
            <h3>About Us</h3>
            <p>We connect loving homes with pets in need. Our mission is to make pet adoption simple, enjoyable, and accessible to everyone.</p>
            <div class="social-icons">
                <a href="#" class="social-icon"><i class="fa fa-facebook"></i></a>
                <a href="#" class="social-icon"><i class="fa fa-twitter"></i></a>
                <a href="#" class="social-icon"><i class="fa fa-instagram"></i></a>
                <a href="#" class="social-icon"><i class="fa fa-youtube"></i></a>
            </div>
        </div>
        
        <div class="footer-section links">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="mainhomepage.php">Home</a></li>
                <li><a href="#">Available Pets</a></li>
                <li><a href="ADOPTION PAGE/adoptionpage.php" target="blank">Adopt a Pet</a></li>
                <li><a href="owner_pet_info.php">List Your Pet</a></li>
                <li><a href="#">Success Stories</a></li>
            </ul>
        </div>
        
        <div class="footer-section contact">
            <h3>Contact Us</h3>
            <p><i class="fa fa-map-marker"></i> IIIT Nagpur, Nagpur</p>
            <p><i class="fa fa-phone"></i> (123) 456-7890</p>
            <p><i class="fa fa-envelope"></i> info@Adoptopet.com</p>
        </div>
    </div>
    
    <div class="footer-bottom">
        <p>&copy; 2025 Pet Adoption Services. All rights reserved.</p>
        <div class="footer-bottom-links">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Service</a>
            <a href="#">FAQ</a>
        </div>
    </div>
</footer>


</body>
</html>
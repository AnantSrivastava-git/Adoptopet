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
    <title>AdoptoPet-Adoption-Page</title>
    <link rel="stylesheet" href="adoption-page.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="adoption-page.js"></script>
</head>

<body>
    <div id="banner">
        <h3 id="title">
            Pet Adoption Finder<img src="images/logo_banner.png"></h3>
        <navbar>
            <a href="mainhomepage.php" target="_blank">
                <div class="headernavbar">
                    Home Page
                </div>
            </a>

            <a href="ADOPTION PAGE/adoptionpage.php">
                <div class="headernavbar">
                    Foster
                </div>
            </a>

            <a href="happy_tales.php" target="_blank">
                <div class="headernavbar">
                    Happy Tales
                </div>
            </a>

            <a href="#site-footer">
                <div class="headernavbar">
                    About
                </div>
            </a>
        </navbar>
    </div>
    
    <main><button id="sidebar-act" onclick="call()" >></button></main>

    <div class="sidebar" id="sidebar">

        <div class="sidebar_logo"><img src="images/logo_website.png"></div>

        <br>
        <br>

        <form action="adoptionpage.php" method="post">
        <div class="sidebar_filters">
            <label for="age">Age:</label>

            <select name="age" id="age">
            <option value="">Any Age</option>
                <option>1 year</option>
                <option>2 years</option>
                <option>3 years</option>
                <option>4 years</option>
                <option>5 years</option>
            </select>
<br><br>
        </div>
 
        <div class="sidebar_filters">
            <label for="Size">Size:</label>

            <select name="size" id="size">
            <option value="">Any Size</option>
                <option>Small</option>
                <option>Medium</option>
                <option>Large</option>
            </select>
        </div>
        <br><br>
        <div class="sidebar_filters">
            <label for="Gender">Gender:</label>
            <select name="gender" id="gender">
            <option value="">Any Gender</option>
                <option>Male</option>
                <option>Female</option>
                <option>Neutered</option>
            </select>
        </div>
        <br><br>
        <div class="sidebar_filters">
            <label for="type">Type:</label> 
            <select name="type" id="type">
                <option value="">Any Type</option>
                <option>Dog</option>
                <option>Cat</option>
                <option>Rabbit</option>
                <option>Bird</option>
            </select>
        </div>

        <button type="submit" id="Apply_filters">Apply Filters</button>
    </form>
    </div>    
<style>
    /* main{
        border: 3px solid black;
        position: relative;
        left: 30px;
        transition: left 0.05s ease-in-out;
    } */

    .sidebar{
        /* border: 3px solid black; */
        background-color:white;
        width:250px;
        height: 100vh;
        padding: 15px;
        position: absolute;
        top:0;
        left: -300px;
        transition: left 0.05s ease-in-out;
        z-index: 2;
    }

    .sidebar_filters
    label{
        font-size:x-large;
    }

    .filter-input{
        width: 50px;
        border-radius: 8px;
        height: 10px;
    }
</style>

<script>
    const sidebar = document.getElementById("sidebar");
    const btn = document.getElementById("sidebar-act");
    let isOpen = false;
    function call(){
        if(isOpen == false){
        sidebar.style.left = '0px';
        sidebar.style.boxShadow = '2px 0 8px rgba(0, 0, 0, 0.1)';
        btn.textContent = "<";
        btn.style.left = '300px';
        isOpen = true;
    }
    else{
        sidebar.style.left = '-300px';
        sidebar.style.boxShadow = '2px 0 8px rgba(0, 0, 0, 0.5)';
        btn.textContent = ">";
        btn.style.left = '30px';
        isOpen = false;
    }
}
</script>


<main>
    <div class="hero">
        <div id="herotxt1">Meet Your New Best Friend Here</div>
        <div id="herotxt2">Browse from the given options and give them a forever home.
        </div>
    </div>
    <!-- <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 390" xmlns="http://www.w3.org/2000/svg" class="transition duration-300 ease-in-out delay-150"><defs><linearGradient id="gradient" x1="0%" y1="49%" x2="100%" y2="51%"><stop offset="5%" stop-color="#edc0c6"></stop><stop offset="95%" stop-color="#ff8091"></stop></linearGradient></defs><path d="M 0,400 L 0,150 C 177.59999999999997,140.93333333333334 355.19999999999993,131.86666666666665 505,151 C 654.8000000000001,170.13333333333335 776.8,217.4666666666667 928,222 C 1079.2,226.5333333333333 1259.6,188.26666666666665 1440,150 L 1440,400 L 0,400 Z" stroke="none" stroke-width="0" fill="url(#gradient)" fill-opacity="1" class="transition-all duration-300 ease-in-out delay-150 path-0" transform="rotate(-180 720 200)"></path></svg> -->

    <div class="adopt-title">
        <h2>Available pets</h2>
    </div>

    <div class="adoption">
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    $age = isset($_POST['age']) ? $_POST['age'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $size = isset($_POST['size']) ? $_POST['size'] : '';
    $type = isset($_POST['type']) ? $_POST['type'] : '';

    $conditions = [];
    if (!empty($age)) {
        $conditions[] = "petage = '$age'";
    }
    if (!empty($gender)) {
        $conditions[] = "gender = '$gender'";
    }
    if (!empty($size)) {
        $conditions[] = "size = '$size'";
    }
    if (!empty($type)) {
        $conditions[] = "type = '$type'";
    }
    
    $sql2 = "SELECT * FROM owner_petinfo";
    if (!empty($conditions)) {
        $sql2 .= " WHERE " . implode(" AND ", $conditions);
    }
    

        $db_obj = mysqli_query($conn, $sql2);
    
        if(mysqli_num_rows($db_obj)>0){
            while($row = mysqli_fetch_assoc($db_obj)){
            echo '
        <div class="pet-card" data-name="'.$row['petname'].'" data-age="'.$row['petage'].'" data-gender="'.$row['gender'].'" >
        <a class="adoption-anchor" href="/KAAM KAAJ/adopterform.php?id='.$row['id'].';">
        <div class="pet-img"><img src="https://i.pinimg.com/736x/39/fe/b5/39feb5799eae5eaf3ed5999431187136.jpg"></div>
        <div class="pet-name">'.
        $row['petname'].
        '</div>
        <div class="pet-desc">Cheeku is a dog who wins hearts.</div>
        <div class="pet-age">'
        .$row['petage'].
        ' years • </div>
        <div class="pet-gender">' .$row['gender'].'</div></a>
       </div> ' ;
        }
    }
    }
    else{
    $sql2 = "SELECT * FROM owner_petinfo ";

    $db_obj = mysqli_query($conn, $sql2);

    if(mysqli_num_rows($db_obj)>0){
        while($row = mysqli_fetch_assoc($db_obj)){
        echo '
    <div class="pet-card" data-name="'.$row['petname'].'" data-age="'.$row['petage'].'" data-gender="'.$row['gender'].'" >
    <a class="adoption-anchor" href="/KAAM KAAJ/adopterform.php?id='.$row['id'].';">
    <div class="pet-img"><img src="https://i.pinimg.com/736x/39/fe/b5/39feb5799eae5eaf3ed5999431187136.jpg"></div>
    <div class="pet-name">'.
    $row['petname'].
    '</div>
    <div class="pet-desc">Cheeku is a dog who wins hearts.</div>
    <div class="pet-age">'
    .$row['petage'].
    ' years • </div>
    <div class="pet-gender">' .$row['gender'].'</div></a>
   </div> ' ;
    }
}
    }
    ?>

</div>
<!-- 
<div class="quote1">
        <p>Saving one animal won’t change the world, <br>but for that <i>one</i> animal, <br>the world will change forever.</p>
    </div> -->

    <div class="donate-card">
        <div class="donate">
            <div class="donate-content">
                <pre>Every paw deserves a safe home and a loving family.
Your donation helps us rescue stray animals, support
fosters, and reunite lost pets with their owners.
Whether big or small, your contribution goes directly 
toward food, shelter, medical care, and spreading 
awareness. Click here to donate — because even the
smallest act of kindness can change a life.</pre>
                <p>Donate for a better cause.</p>
                <div><button id="donate-btn"> Donate </button></div>
            </div>

            <img src="https://i.pinimg.com/736x/1c/a3/1e/1ca31e01441126bccce91d082b7fbc3d.jpg">

        </div>
    </div>
    </main>

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

    <br><br><br><br><br><br>
</body>

</html>
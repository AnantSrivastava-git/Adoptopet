<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdoptoPet</title>
    <link rel="stylesheet" href="mainhomepage.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>


<body>
    <div id="banner">
    <h3 id="title">
    Pet Adoption Finder<img src="ADOPTION PAGE/images/logo_banner.png"></h3>
        <navbar>
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


    <div id="header">
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
        echo "Welcome user";
    }
    ?>
        <div id="hero">
            <img id="heroimg" src="https://i.pinimg.com/736x/80/40/3f/80403f58f8b5c54b83872748847ed2b4.jpg">
            <div id="herotxt1">Find Your New Best Friend</div>
            <div id="herotxt2">Search for pets available for adoption near you and <br> give loving home to an animal in
                need.
            </div>
        </div>

    </div>
    <div class="cards">
        <div class="navigating-card"><a href="ADOPTION PAGE/adoptionpage.php" target="_blank">
                <div>
                    <h3>Adopt a Pet</h3>
                    <p class="location">Many Pets from various varieties available for adoption, give them a new home
                    </p>
                    <p>
                </div>
                <div class="arrow">
                    >
                </div>
            </a>
        </div>

        <div class="navigating-card"><a href="ADOPTION PAGE/adoptionpage.php" target="_blank">
                <div>
                    <h3>Foster Temporarily</h3>
                    <p class="location">Don't know whether or not to keep a pet? Then try fostering it for some time.
                    </p>
                    <p>
                </div>
                <div class="arrow">
                    >
                </div>
            </a>
        </div>
    </div>

    <div class="big-navigating-card">
            
                <h3>Happy Tales</h3><div id="happytale">
                <div class="txtcontent">
                    <div class="nested-card">
                        <a href="happy_tales.php" target="_blank">
                            <div >
                                <img class="owner-img" src="person.png">
                                <p class="big-navigating-card-content">Adopting through this site changed our lives! We found Max, and he’s been a ball of joy ever since. Couldn’t have asked for a smoother experience.</p>
                                <div class="owner">
                                    <p>Owner name</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    

                    <div class="nested-card">
                        <a href="happy_tales.php" target="_blank">
                            <div>
                                <img class="owner-img" src="person.png">
                                <p class="big-navigating-card-content">I was nervous about adopting at first, but this platform made it feel safe and personal. Luna’s the best thing that’s happened to me this year.</p>
                                <div class="owner">
                                    <p>Owner name</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="nested-card">
                        <a href="happy_tales.php" target="_blank">
                            <div>
                                <img class="owner-img" src="person.png">
                                <p class="big-navigating-card-content">From browsing to bringing my kitten home, everything was seamless. Love how thoughtful and genuine the process felt.</p>
                                <div class="owner">
                                    <p>Owner name</p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
       
    </div>

    <br><br>

    <div class="quote1">
        <p>These pets are in your area and <br>ready for adoption.  Swipe to find <br><i>The One.</i></p>
    </div>

    <br><br>
    <br><br>

    <div class="adoption">
<?php
    $sql2 = "SELECT * FROM owner_petinfo ";

    $db_obj = mysqli_query($conn, $sql2);

    if(mysqli_num_rows($db_obj)>0){
        while($row = mysqli_fetch_assoc($db_obj)){
        echo '
    <div class="pet-card"><a class="adoption-anchor" href="ADOPTION PAGE/adoptionpage.php" target="_blank">
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
else{
    echo 'NO pet exist in database';
}
    ?>
</div>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#edc0c4" fill-opacity="1" d="M0,128L60,138.7C120,149,240,171,360,160C480,149,600,107,720,96C840,85,960,107,1080,122.7C1200,139,1320,149,1380,154.7L1440,160L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>


<div class="lost-and-found">
    <img src="https://i.pinimg.com/736x/1c/a3/1e/1ca31e01441126bccce91d082b7fbc3d.jpg" >
    <div class="lost-and-found-content">
<pre>If you're in a position where you can no longer care
for your furry friend, know that you're not alone—and 
there’s a compassionate way forward.By listing your 
pet here, you’re giving them the chance to find a new,
loving home where they’ll be cherished just as much.</pre>
        <p>Register your Pet here.</p><div><a href="owner_pet_info.html"><button id="lost-and-found-btn" > Register </button></a></div></div>
    
</div>

    <br><br><br><br><br><br>
    <br><br><br>

<div class="donate">
    <div class="donate-content">
<pre>Every paw deserves a safe home and a loving family.
Your donation helps us rescue stray animals, support
fosters, and reunite lost pets with their owners.
Whether big or small, your contribution goes directly 
toward food, shelter, medical care, and spreading 
awareness. Click here to donate — because even the
smallest act of kindness can change a life.</pre>
        <p>Donate for a better cause.</p><div><button id="donate-btn" > Donate </button></div></div>

        <img src="https://i.pinimg.com/736x/1c/a3/1e/1ca31e01441126bccce91d082b7fbc3d.jpg" >
    
</div>


<br><br><br><br><br><br>

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
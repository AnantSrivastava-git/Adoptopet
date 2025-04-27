<?php

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
    }

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $ownername = $_POST['ownername'];
    $email = $_POST['email'];
    $petname = $_POST['petname'];
    $species = $_POST['species'];
    $breed = $_POST['breed'];
    $petage = $_POST['petage'];
    $gender = $_POST['gender'];
    $size = $_POST['size'];
    $Vaccination = $_POST['Vaccination'];
    $neutered = $_POST['neutered'];
    $phone = $_POST['phone'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    if (isset($_FILES['Id']) && $_FILES['Id']['error'] == 0) {
        $upload_dir = "uploads/";
        $upload_file = $upload_dir . basename($_FILES["Id"]["name"]);
        move_uploaded_file($_FILES["Id"]["tmp_name"], $upload_file);
    }
    $sql = "INSERT INTO owner_petinfo
            ( ownername, email, petname, type, breed, petage, gender,
             size, vaccination_status, spayed_neutered, phone, state, city)
            VALUES 
            ( '$ownername' ,'$email', '$petname', '$species', '$breed',
             '$petage', '$gender', '$size', '$Vaccination', 
             '$neutered', '$phone', '$state', '$city')";

    try{
        mysqli_query($conn,$sql);
        // echo "\nYou are successfully registered";
        header("Location: mainhomepage.php");
    }
    catch(mysqli_sql_exception){
        echo "\nYou weren't registered";
    }
}
    ?>
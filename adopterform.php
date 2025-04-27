
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

?>

<!DOCTYPE html>
<head>
    <title>Form Example</title>
    <link rel="stylesheet" href="adopterform.css">
</head>
<body>

    <h1 id="title">Adopter Details</h1>

    <div class="form-container">
        <form id="Adopter" action="adopterform.php" method="post">
            <div class="main-container">
              <div class="left-section">
                <h2>Personal Information</h2>
          
                <input type="text" name="fullname" placeholder="Full Name" required>
          
                <input type="password" name="password" placeholder="Password" required>
          
                <input type="text" name="age" placeholder="Age" required>
          
                <input type="text" name="occupation" placeholder="Occupation" required>
          
                <h3>Contact Info</h3>
          
                <input type="text" name="phonenumber" placeholder="Phone Number" required>
          
                <input type="email" name="email" placeholder="Email" required>
          
                <textarea rows="5" name="address" placeholder="Address"></textarea>
          
                <hr>
          
                <h2>Pet Ownership History</h2>
          
                <p>Do you currently have other pets?</p>
                <input type="radio" id="yes-pet" name="other pet" value="yes">
                <label for="yes-pet">Yes</label>
                <input type="radio" id="no-pet" name="other pet" value="no">
                <label for="no-pet">No</label>
          
                <p>Have you owned pets before?</p>
                <input type="radio" id="yes-owned" name="owned pet" value="yes">
                <label for="yes-owned">Yes</label>
                <input type="radio" id="no-owned" name="owned pet" value="no">
                <label for="no-owned">No</label>
          
                <h2>Behavior Preferences</h2>
                <textarea rows="5" name="behavior" placeholder="Any specific behavior preference?"></textarea>
          
                <h2>Final Notes</h2>
                <textarea rows="5" name="reason" placeholder="Why do you want to adopt/foster a pet?"></textarea>
          
                <button type="submit" name="submit">Submit</button>
              </div>
          
              <div class="right-section">
                <div class="overlay"></div>
                
              </div>
            </div>
          </form>            
          <div class="pet-description">
            <?php 
                $id = $_GET['id'];
                $sql = "SELECT * FROM owner_petinfo WHERE id = $id";
                $db_obj = mysqli_query($conn, $sql);
                if(mysqli_num_rows($db_obj)>0){
                            $row = mysqli_fetch_assoc($db_obj);
                            echo "Hey, I'm <strong><i>" .$row['petname']. "!</i></strong><br> I love playing with kids, snuggling in blankets, and stealing socks when no one's watching!";
                            echo "<br>My current parent is <strong><i>" .$row['ownername']. "</i></strong> and  I live in " .$row['city']. ", " .$row['state'];
                        }
                else{
                            echo "No such Pet exists";
                    }

            ?>
            </div>

            <h3 id="Credits_banner">
            <br><img src="ADOPTION PAGE/images/logo_website.png"></h3>
    </div>

</body>
</html>

<?php    
if(isset($_POST['submit'])){
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];
    $hash = password_hash($password,PASSWORD_DEFAULT);
    $age = $_POST['age'];
    $occupation = $_POST['occupation'];
    $phone = $_POST['phonenumber'];
    $email = $_POST['email'];
    $address = $_POST['address'];
}

    $sql = "INSERT INTO adopter_details_2
            (username, Password, Age, Occupation, phone, Email, Address)
            VALUES 
            ('$fullname', '$hash', '$age', '$occupation', '$phone', '$email', '$address')";

    try{
        mysqli_query($conn,$sql);
        echo "You are successfully registered";
        header("Location: adoption_confirmation.html");
    }
    catch(mysqli_sql_exception){
        echo "You weren't registered";
    }
}
    ?>

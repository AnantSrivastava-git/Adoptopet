<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $fullname = $_POST['fullname'];
    $age = $_POST['age'];
    $occupation = $_POST['occupation'];
    $phone = $_POST['phonenumber'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $behavior = $_POST['behavior'];
    $reason = $_POST['reason'];
}
    // Optional: handle file upload
    if (isset($_FILES['Id']) && $_FILES['Id']['error'] == 0) {
        $upload_dir = "uploads/";
        $upload_file = $upload_dir . basename($_FILES["Id"]["name"]);
        move_uploaded_file($_FILES["Id"]["tmp_name"], $upload_file);
    }

    // For now, just display the data (you can save to database later)
    echo "<h2>Form Submitted Successfully!</h2>";
    echo "Name: $fullname <br>";
    echo "Age: $age <br>";
    echo "Occupation: $occupation <br>";
    echo "Phone: $phone <br>";
    echo "Email: $email <br>";
    echo "Address: $address <br>";
    ?>
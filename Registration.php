<?php
    $fname = $lname = $email = $pnumber = $dob = $gender = $department = $city = "";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $email = strtolower($_POST['email']);
        $pnumber = $_POST['pnumber'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $department = $_POST['department'];
        $city = $_POST['city'];
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "student admission";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO `student registration`(`First name`, `Last name`, `Email`, `DOB`, `Gender`, `Phone number`, `Department`, `City`) VALUES ('$fname','$lname','$email','$dob','$gender','$pnumber','$department','$city')";

    if ($conn->query($sql) === TRUE) {
        header("Location: https://github.com/Naitik-Soni/Student-Admission/Registration.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

$conn->close();
?>

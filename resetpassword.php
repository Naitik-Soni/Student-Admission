<?php
    session_start();
    $email = $_SESSION['email'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "student admission";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $newpassword = $_POST['newpassword'];
    }

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE `login` SET `Password`='$newpassword' WHERE Email='$email'";

    if ($conn->query($sql) === TRUE) {
        header("Location: http://localhost/studentproject/login.html");  
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    session_unset();
?>
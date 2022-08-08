<?php
    $email = "";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $email = $_POST['email'];
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "student admission";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $find="SELECT Email FROM `login` WHERE Email='$email'";
    $result = $conn->query($find);
    $em=NULL;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $em = $row["Email"];
        }
    }

    if($em == ""){
        echo "<script>
        alert('No email found');
        setTimeout(function(){
            location.replace('http://localhost/studentproject/login.html');
        }, 3000);
        </script>";
    }else{
        session_start();
        $_SESSION['email'] = $email;
        header("location:http://localhost/studentproject/resetpassword.html ");
    }
?>
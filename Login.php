<?php
    $Username = $newpassword = "";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $Username = $_POST['username'];
        $newpassword = $_POST['password'];
        $Username = strtolower($Username);
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "student admission";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $find="SELECT Password FROM `login` WHERE Username = '$Username'";
    $pass=NULL;
    $result = $conn->query($find);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $pass = $row["Password"];
        }
        if($pass == $newpassword){
            session_start();
            $_SESSION['loginSession'] = $Username;
            header("location: https://github.com/Naitik-Soni/Student-Admission/uploaddocuments.html");
        }
        else{
            echo "<script>alert('Wrong Password!')</script>";
            echo "<script>function reDirect() { location.replace('https://github.com/Naitik-Soni/Student-Admission/login.html')};
                    reDirect();
                </script>";
        } 
    } 
    else {
        echo "<script>alert('Wrong Password!')</script>";
        echo "<script>function reDirect() { location.replace('https://github.com/Naitik-Soni/Student-Admission/login.html')};
                    reDirect(); 
                </script>";
    }

    $conn->close();
?>

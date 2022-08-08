<?php
    $Username = $email = $newpassword = "";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $Username = $_POST['username'];
        $email = $_POST['email'];
        $newpassword = $_POST['newpassword'];

        $Username = strtolower($Username);
        $email = strtolower($email);
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "student admission";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $find="SELECT ID FROM `student registration` WHERE Email='$email'";
    //  $id=NULL;

    $result = $conn->query($find);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row["ID"]    ;
        }
    } 
    else {
        echo "<script>alert('Sorry No record found!')</script>";
        echo "<script>function reDirect() { location.replace('http://localhost/studentproject/signup.html')};
                    reDirect();
                </script>";
    }

    if($id <= 0){
        echo "<script>alert('Sorry No record found!')</script>";
        echo "<script>function reDirect() { location.replace('http://localhost/studentproject/signup.html')};
                    reDirect();
                </script>"; 
    }else{
        $sql = "INSERT INTO `login` VALUES ('$id','$Username','$email','$newpassword')";
    
        if ($conn->query($sql) === TRUE) {
            header("Location: http://localhost/studentproject/login.html");
            echo $id;   
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
?>
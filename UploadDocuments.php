<?php
    session_start();
    $Username = $_SESSION['loginSession'];
    $photo = $adharcard = "" ;

    if($Username == true){
    }
    else{
        header("location:http://localhost/studentproject/registration.html");
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $photo = $_FILES['photo']['name'];
        $adharcard = $_FILES['adharcard']['name'];

        $file_tmp1 = $_FILES['photo']['tmp_name'];
        $file_tmp2 = $_FILES['adharcard']['tmp_name'];
        move_uploaded_file($file_tmp1,"./Userdata/".$photo);
        move_uploaded_file($file_tmp2,"./Userdata/".$adharcard);
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "student admission";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $findid="SELECT ID FROM `login` WHERE Username = '$Username'";
    $findemail="SELECT Email FROM `login` WHERE Username = '$Username'";

    $id=NULL;
    $result1 = $conn->query($findid);

    if ($result1->num_rows > 0) {
        while($row = $result1->fetch_assoc()) {
            $id = $row["ID"];
        }
    }

    $email=NULL;
    $result = $conn->query($findemail);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $email = $row['Email'];
        }
    }

    $sql = "INSERT INTO `student document` VALUES ('$id','$email','$photo','$adharcard')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: http://localhost/studentproject/login.html");  
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    session_unset();

?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student admission";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$select = "SELECT `Adhar card` FROM `student document`";

$result = $conn->query($select);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $pdf = $row['adharcard'];
            $path = "./Userdata/";
        }
    }
echo '<strong>File Name : </strong>'.$pdf;
?>
<br/><br/>
<iframe src="<?php echo $path.$pdf; ?>" target="_blank" width="100%" height="500px">
</iframe>
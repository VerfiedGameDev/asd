<?php
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
if (!empty($username)) {
if (!empty($password)) {
$host = "127.0.0.1";
$dbusername = "root";
$dbpassword = "";
$dbname = "youtube";

// create connection

$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
    $sql = "INSERT INTO account (username, password)
    values ('$username','$password')";
    if ($conn->query($sql)){
        echo "New record is inserted Successfully";
    }
    else{
        echo "Error: ". $sql ."<br>". $conn->error;
    }
    $conn->close();
}
} 
else{
    echo "Number Should not be Empty";
    die();
}
}
else{
    echo "Username Should not be empty";
    die();
}







?>

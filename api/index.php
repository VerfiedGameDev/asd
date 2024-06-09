<?php
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

if (!empty($username)) {
    if (!empty($password)) {
        $host = "127.0.0.1";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "youtube";

        // Create connection
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

        if ($conn->connect_error) {
            die('Connect Error: ' . $conn->connect_error);
        } else {
            $sql = "INSERT INTO account (username, password) VALUES ('".$conn->real_escape_string($username)."', '".$conn->real_escape_string($password)."')";
            
            if ($conn->query($sql)) {
                echo "New record is inserted successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
            $conn->close();
        }
    } else {
        echo "Password should not be empty";
        die();
    }
} else {
    echo "Username should not be empty";
    die();
}
?>

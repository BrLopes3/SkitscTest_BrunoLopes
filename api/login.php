<?php

$email = $_POST['email'];
$password = $_POST['password'];

//database connection

$conn = new mysqli('127.0.0.1', 'root', '', 'dbuser');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    $sqlStmt = $conn->prepare("SELECT * FROM users WHERE Email = ?");
    $sqlStmt->bind_param("s", $email);

    $sqlStmt->execute();
    $result = $sqlStmt->get_result();

    if($result->num_rows > 0){
    $data = $result->fetch_assoc();
       if($data['Password']===$password){
        
            echo"<h2>Login Successful</h2>";
       }else{
        echo "<h2>Invalid Email or Password</h2>";
       }
    }else{
        echo"<h2>Invalid Email or Password</h2>";
    }
}

?>


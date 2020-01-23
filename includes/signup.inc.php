<?php
if (isset($_POST['submit'])) {

    include 'koneksi.php';

    $fullname = $mysqli->real_escape_string($_POST['fullname']);
    $username = $mysqli->real_escape_string($_POST['username']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $mysqli->real_escape_string($_POST['password']);
    $phonenumber = $mysqli->real_escape_string($_POST['phonenumber']);
    $gender = $mysqli->real_escape_string($_POST['gender']);

    //Error handlers
    //Check for empty fields
    if(empty($fullname) || empty($username) || empty($email) || empty($password) || empty($phonenumber) || empty($gender) ){
        header("Location: ../register.php?register=empty");
        exit();
    }else {
        //Check if input characters are valid
        if (!preg_match("/^[a-zA-Z ]*$/",$fullname)) {
            header("Location: ../register.php?register=invalid");
            exit();
        }else {
            //Check if email is valid
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header("Location: ../register.php?register=email");
                exit();
            }else{
                $sql = "SELECT * FROM tb_user WHERE username='$username'";
                $result = $mysqli->query($sql);
                $resultCheck = $result->num_rows;
                if ($resultCheck>0) {
                    header("Location: ../register.php?register=usertaken");
                    exit();
                }else {
                    //hasing the password
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    //insert the user into the database
                    $sql = "INSERT INTO tb_user (username, fullname, email, phone, password) VALUES ('$username', '$fullname', '$email', $phonenumber, '$hashedPassword')";
                    $mysqli->query($sql);                   
                    header("Location: ../login.php?register=success");
                    exit();
                }
            }
        }
    }
    
}else {
    header("Location: ../register.php");
    exit();
}
?>
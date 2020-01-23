<?php

session_start();

include "koneksi.php";
if (isset($_POST['submit'])) {
    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $mysqli->real_escape_string($_POST['password']);

    //Error handlers
    //Check if inputs are empty
    if (empty($username) || empty($password)) {
        header("Location: ../login.php?login=empty");
        exit();
    }else{
        $sql = "SELECT * FROM tb_user WHERE username='$username' OR email='$username'";
        $result = $mysqli->query($sql);
        $resultCheck = $result->num_rows;
        if ($resultCheck < 1) {
            header("Location: ../login.php?login=error");
            exit();
        }else{
            if ($row = $result->fetch_assoc()) {
                //De-Hashing the password
                $hashedPwdCheck = password_verify($password,$row['password']);

                if ($hashedPwdCheck == false) {
                    header("Location: ../login.php?login=error");
                    exit();
                }else if($hashedPwdCheck == true){
                    //Log in the user here
                    $_SESSION['id_user'] = $row['id_user'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['fullname'] = $row['fullname'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['phone'] = $row['phone'];
                    header("Location: ../index.php?login=success");
                    exit();
                }
            }
        }
    }
}else{
    header("Location: ../index.php?login=error");
    exit();
}
?>
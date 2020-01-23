<?php
include "koneksi.php";

if(isset($_POST["e_mail"])){
    $email = $mysqli->real_escape_string($_POST['e_mail']);   
    $query = "SELECT * FROM tb_user WHERE email = '".$email."'";
    $result = $mysqli->query($query);
    echo $result->num_rows;
}
?>
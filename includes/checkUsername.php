<?php
include "koneksi.php";

if(isset($_POST["user_name"])){
    $username = $mysqli->real_escape_string($_POST['user_name']);   
    $query = "SELECT * FROM tb_user WHERE username = '".$username."'";
    $result = $mysqli->query($query);
    echo $result->num_rows;
}
?>
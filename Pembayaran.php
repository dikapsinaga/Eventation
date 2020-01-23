<?php
include "includes/koneksi.php";
session_start();

if(isset($_POST['submit'])){
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $phone = $_POST['phonenumber'];
  $id_user = $_SESSION['id_user'];

  $sql = "INSERT INTO tb_ticket(id_user, fullname, email, phone) 
    VALUES ('$id_user','$fullname','$email','$phone')";
  $mysqli->query($sql);
  
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Eventation : Payment</title>
    <link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master/semantic.css">
    <style>
    </style>
  </head>
  <body>
    <div class="ui grid container">
    <div class="sixteen wide column">
      <center>
      <a href="index.php">
        <img class="ui medium image" src="logo.png" style="padding-left: 10px; padding-top: 15px; width: 400;">
        </a>
      </center>
    </div>
    <div class="sixteen wide column">
          <div class="ui segment">
            <center>
                <div class="ui ordered steps">
                    <div class="completed step">
                        <div class="content">
                            <div class="title">Details</div>
                            <div class="description"></div>
                        </div>
                    </div>
                    <div class="active step">
                        <div class="content">
                            <div class="title">Payment</div>
                            <div class="description"></div>
                        </div>
                    </div>
                    <div class="incompleted step">
                        <div class="content">
                            <div class="title">Done</div>
                            <div class="description"></div>
                        </div>
                    </div>
                </div>
                <br>
            </center>
        

        <div class="sixteen wide column">
        <div class="ui segment">
          <h2 style="text-align: left">Choose your payment method</h2>
          <div class="ui items">
  <div class="item">
    <div class="image">
      <img class="ui middle aligned small image" src="images/bni.png">
    </div>
    <div class="content">
      <a href="done.php?submit=true" class="header">BANK BNI</a>
      <div class="meta">
        <span>Atas Nama : Eventation</span>
      </div>
      <div class="description">
        <p></p>
      </div>
      <div class="extra">
        8888-9999-000
      </div>
    </div>
  </div>
<h4 class="ui horizontal divider header"></h4>
  <div class="item">
    <div class="image">
      <img class="ui middle aligned small image" src="images/mandiri.png" style="margin-top:-10px">
    </div>
    <div class="content">
      <a href="done.php?submit=true" class="header">BANK MANDIRI</a>
      <div class="meta">
        <span>Atas Nama : Eventation</span>
      </div>
      <div class="description">
        <p></p>
      </div>
      <div class="extra">
        9999-8888-777
      </div>
    </div>
  </div>
  <h4 class="ui horizontal divider header"></h4>
  <div class="item">
    <div class="image">
      <img src="images/bca.png">
    </div>
    <div class="content">
      <a href="done.php?submit=true" class="header">BANK BCA</a>
      <div class="meta">
        <span>Atas Nama : Eventation</span>
      </div>
      <div class="description">
        <p></p>
      </div>
      <div class="extra">
        4444-5555-222
      </div>
    </div>
  </div>
  
</div>
        </div>
      </div>
    </div>
        </div>

      
    </div>
  </body>
  <script>
  $(window).bind('beforeunload', function(){
  return 'Are you sure you want to leave?';
});
  </script>
</html>

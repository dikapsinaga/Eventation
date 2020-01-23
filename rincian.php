<?php
include "includes/koneksi.php";
session_start();

// if(isset($_GET['submit'])){
    $jenis = $_GET['jenis'];
    $jumlah = $_GET['jumlah'];
    $id_content= $_GET['id_content'];
    $id_user = $_SESSION['id_user'];

    $sql = "SELECT * FROM tb_content WHERE id_content ='$id_content'";
    $data = $mysqli->query($sql);
    $rowData = $data->fetch_object();
    
    $sql2 = "SELECT * FROM tb_harga WHERE id_content ='$id_content'";
    $harga = $mysqli->query($sql2);
    $rowHarga = $harga->fetch_object();

    $sql3 = "INSERT INTO tb_chart(id_user, id_content, id_harga, jumlah, status) 
    VALUES ('$id_user','$id_content','$rowHarga->id_harga','$jumlah','chart')";

    $sisa = ($rowData->kuota) - $jumlah;

    $sql4 = "UPDATE tb_content SET kuota='$sisa' WHERE id_content='$id_content'";

    $mysqli->query($sql3);
    $mysqli->query($sql4);
    
// }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Eventation : Details</title>
    <link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master/semantic.css">

    <style>
        
    </style>
</head>

<body>
    <script src="jquery-3.3.1.min.js"></script>
    <script src="Semantic-UI-CSS-master/semantic.min.js"></script>
    <div class="ui grid container">
      <div class="ui mini modal left inverted" >
        <i class="close icon"></i>
        <div class="header">
            Hi there!
        </div>
        <div class="ui segment">
        <div class="content">
            <p> Are you sure want to leave this page? Changes will not be saved.</p>
        </div>
        </div>
    <div class="actions">
        <div class="ui green cancel button">Stay</div>
        <div class="ui red approve button">Leave</div>
    </div>
    </div>
        <div class="sixteen wide column">
            <center>
                <a href="index.php">
                    <img class="ui medium image" src="logo.png" style="padding-left: 10px; padding-top: 15px; width: 400;">
                </center>
                </a>
        </div>
        <div class="sixteen wide column">
          <div class="ui segment">
            <center>
                <div class="ui ordered steps">
                    <div class="active step">
                        <div class="content">
                            <div class="title">Details</div>
                            <div class="description"></div>
                        </div>
                    </div>
                    <div class="incompleted step">
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
          <h2 style="text-align: left">Please confirm your identity once again</h2>
            <form class="ui form" method="post" action="Pembayaran.php" id="form">
              <div class="two wide fields">
                <div class="field">
                <div class="field">
                    <label for="fullname"> Full name </label>
                    <input type="text" name="fullname" placeholder="Fullname">
                </div>
                <br>
                <div class="field">
                    <label for="email"> Email Address </label>
                    <input type="text" name="email" placeholder="Email Address">
                </div>
                <br>
                <div class="field">
                    <label for="phonenumber"> Phone Number </label>
                    <input type="text" name="phonenumber" placeholder="Phone Number" value="">
                </div>
                <br>
                <div class="field">
                  <div class="inline field">
                    <div class="ui checkbox">
                        <input type="checkbox" name="checkbox">
                        <label>I agree to the Terms and Conditions</label>
                      </div>
                      </div>
                      <br>
                    <button class="ui blue button" name="submit" type="submit">Forward to payment</button>
                </div>
                </div>
                
                <div class="ui error message"></div>
                <div class="field" style="padding-top: 60px; padding-left: 100px; padding-right: 100px">
                  <div class="eight wide container">
                    <div class="ui primary green segment" style="font-">
                      <h3 style="">Your order goes here</h3>
                      <h2 style="color: green; text-align: center;" >Type : <?php echo $rowHarga->kategori ?></h2>
                      <h4 style="color: green;"><?php echo $jumlah?> ticket(s)</h4>
                      <h1 style>Total :Rp <?php $total= (($rowHarga->harga)*$jumlah); echo $total;?></h1>
                      
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </form>
        </div>
      </div>
    </div>
        </div>

        <script>
            $('.ui.form')
            .transition('fade in')
                .form({
                    on: 'blur',
                    inline: true,
                    fields: {
                        fullname: {
                            identifier: 'fullname',
                            rules: [{
                                type: 'empty',
                                prompt: 'Please enter your Fullname'
                            }, ]
                        },
                        email: {
                            identifier: 'email',
                            rules: [{
                                type: 'empty',
                            }, {
                                type: 'contains[@]',
                                prompt: 'Please enter a valid email address'
                            }]
                        },
                        nomorhp: {
                            identifier: 'phonenumber',
                            rules: [{
                                type: 'number',
                                prompt: ''
                            }, {
                                type: 'minLength[11]',
                                prompt: 'Your phone number must be at least 11 characters'
                            }]
                        },
                        checkbox: {
                            identifier: 'checkbox',
                            rules: [{
                                type: 'checked',
                                prompt: 'You have not agree to our Terms And Condition'
                            }]
                        }
                    }
                });
        </script>
<script>
$(window).bind('beforeunload', function(){
  return 'Are you sure you want to leave?';
});

</script>
</body>

</html>
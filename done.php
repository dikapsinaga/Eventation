<?php
include "includes/koneksi.php";
session_start();

if(isset($_GET['submit'])){
    $id_user = $_SESSION['id_user'];

    // $sql = "INSERT INTO tb_ticket(id_user, fullname, email, phone) 
    // VALUES ('$id_user','$fullname','$email','$phone')";
    // $mysqli->query($sql);

    //get Fullname from table ticket
    $sql = "SELECT * FROM tb_ticket WHERE id_user ='$id_user'";
    $data = $mysqli->query($sql);
    $rowTicket = $data->fetch_object();

    //get jumlah from table chart
    $sql = "SELECT * FROM tb_chart WHERE id_user ='$id_user'";
    $data = $mysqli->query($sql);
    $rowChart = $data->fetch_object();

    //get Name Event and date from table content
    $sql = "SELECT * FROM tb_content WHERE id_content ='$rowChart->id_content'";
    $data = $mysqli->query($sql);
    $rowContent = $data->fetch_object();

    // get harga from table harga
    $sql = "SELECT * FROM tb_harga WHERE id_harga ='$rowChart->id_harga'";
    $data = $mysqli->query($sql);
    $rowHarga = $data->fetch_object();
  

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
                            <div class="completed step">
                                <div class="content">
                                    <div class="title">Payment</div>
                                    <div class="description"></div>
                                </div>
                            </div>
                            <div class="active step">
                                <div class="content">
                                    <div class="title">Done</div>
                                    <div class="description"></div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h2>Here's your ticket</h2>
                    </center>
                    <div class="ui grid">
                        <div class="eight wide centered column">
                            <center>

                                <table class="ui green table">
                                    <tbody>
                                        <tr>
                                            <td class="two wide">Name</td>
                                            <td class="six wide"><?php echo $rowTicket->fullname ;?></td>
                                        </tr>
                                        <tr>
                                            <td>Event</td>
                                            <td><?php echo $rowContent->title ;?></td>
                                        </tr>
                                        <tr>
                                            <td>Date</td>
                                            <td><?php echo $rowContent->date ;?></td>
                                        </tr>
                                        <tr>
                                            <td>Category</td>
                                            <td><?php echo $rowHarga->kategori ;?></td>
                                        </tr>
                                        <tr>
                                            <td>Quantity</td>
                                            <td><?php echo $rowChart->jumlah ;?></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Status</th>
                                            <th>Pending (Not Confirmed)</th>
                                        </tr>
                                    </tfoot>
                                </table>

                        </div>

                        </center>
                    </div>
                    <h2 style="text-align:center">Please make your payment immediately</h2>
                    <center>
                        <button onclick="location.href='index.php'" class="ui green button">Done</button>
                    </center>
                </div>

            </div>


        </div>
    <?php }?>
    </body>
    <script>
    </script>

    </html>
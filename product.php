<?php
session_start();
include "includes/koneksi.php";
$id_content = $_GET['id_content'];

$sql = "SELECT * FROM tb_content WHERE id_content ='$id_content'";
$data = $mysqli->query($sql);
$rowData = $data->fetch_object();

$sql2 = "SELECT * FROM tb_harga WHERE id_content ='$id_content'";
$harga = $mysqli->query($sql2);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv= "X-UA-Compatible" content="IE=edge">
    <title>Eventation : Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master/semantic.min.css" />
    <link rel="shortcut icon" href="favicon-16x16.png">

</head>

<body>
    <script src="jquery-3.3.1.min.js"></script>
    <script src="Semantic-UI-CSS-master/semantic.min.js"></script>
    <div class="ui right aligned grid">
        <div class="center aligned sixteen wide column">
        <div class="ui menu">
                <a class="ui item" href="index.php">
                    <img class="ui medium rounded image" src="logo.png" style="<width:25></width:25>0px;">
                </a>
                <div class="right menu">
                    <div class="item">
                    <form action="search.php" method="GET">
                        <div class="ui icon input">
                            <input name="search" type="text"  placeholder="Search...">
                            <button class="ui blue button" type="submit" name="submit">Search</button>
                            
                        </div>
                    </form>
                    </div>

                    <?php
                    if(isset($_SESSION['username'])){
                        $usename = $_SESSION['username'];
                        $fullname = $_SESSION['fullname'];
                        $email = $_SESSION['email'];
                        
                        echo <<< SESSION
                        <button style="margin-top: 11px;margin-bottom:11px; margin-right:10px;" class="ui grey small labeled icon button">
                        <i class="user icon"></i>
                        $usename
                    </button>
                        <div class="ui special popup">
                            <div class="ui stackable one column grid">
                                    <div class="column"><img src="images/userava.png" class="left floated ui avatar image">
                                    $fullname<br><p style="padding-left: 35px">$email</p></div>
                    
                                    <div class="column"><div class="ui link list"><a href="includes/logout.inc.php?logout=true" class="item" style="color:red">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
SESSION;
                    }else{
                        echo <<< NOTLOGIN
                        <a href="register.php" class="ui item">
                           <div class="ui active blue button">Sign Up</div> 
                        </a>
                        <a href="login.php" class="ui item">
                        <div class="ui active button">Sign In</div>
                        </a>
NOTLOGIN;
                        
                    }
                    
                    ?>
                </div>
            </div>
            <div class="center aligned sixteen wide centered column">

            </div>
            <div class="ui ten wide container">

            </div>
        </div>
        <div class="sixteen wide centered column" style="text-align: left; font-size: 35px ">
            <?php echo $rowData->title;?>
        </div>
        
        <div class="four wide column" style="padding-left: 50px">
            <div class="ui raised segment">
            <?php echo "<img class='ui medium image' src='images/$rowData->path_img'>";?>
            </div>
        </div>

        <div class="eight wide column">
            <div class="ui green raised segment">
                    <h2 style="text-align: center">Event's Detail</h2>
                    <div class="ui divided selection list">
                                    <a class="item">
                                        <div class="ui big left floated horizontal label" style="text-align: center">Date</div>
                                        <p style="text-align: right; font-size: 25px"><?php echo $rowData->date?></p>
                                    </a>

                                    <a class="item">
                                        <div class="ui big left floated horizontal label" style="text-align: center">Location</div>
                                        <p style="text-align: right; font-size: 25px"><?php echo $rowData->location?></p>
                                    </a>

                                    <a class="item">
                                            <div class="ui big left floated horizontal label" style="text-align: center">Time</div>
                                            <p style="text-align: right; font-size: 25px"><?php echo $rowData->time?></p>
                                    </a>

                                    <a class="item">
                                            <div class="ui big left floated horizontal label" style="text-align: center">Quota</div>
                                            <p style="text-align: right; font-size: 25px"><?php echo $rowData->kuota?> left</p>
                                    </a>
                                
                    </div>
                <h2 style="text-align: justify"><?php echo "$rowData->content";?></h2>
            </div>
        </div>

        <div class=" four wide column" style="text-align: left; padding-right: 50px">
            <div class="ui blue raised segment">
                    <h2>Ticket Info</h2>
                    <!-- <h3>$rowHarga->kategori</h3> -->
                    <form class="ui form" action="<?php echo isset($_SESSION['username'])?"rincian.php":"login.php" ?>" method="GET">
                        <div class="ui form">
                            <div class="one fields">
                                <div class="field">
                                    <label>Ticket Class</label>
                                    <input type="hidden" name="id_content" value="<?php echo $id_content?>">
                                    <select id="jenis" onchange="getPrice()" name='jenis' class="ui dropdown">
                                    <option value="">Type</option>
                                        <?php
                                        while($rowHarga = $harga->fetch_object()){
                                            echo <<< CONTENT
                                            <option value="$rowHarga->harga">$rowHarga->kategori</option>
CONTENT;
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="field">
                                <h2 id="demo"></h2>
                            </div>

                            <div class="one fields">
                                <div class="field">
                                    <label>Amount</label>
                                    <select id="jumlah" name='jumlah' class="ui fluid dropdown">
                                        <option value="">...pcs</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </div>
                            <div class="ui error message" ></div>
                            <input class="ui blue button" type="submit" value="Buy Ticket!">
                            </form>
                        </div>
                    </div>
                    
            </div>
        </div>
        <div class="ui ten wide container">

        </div>
        <div class="center aligned fifteen wide centered column">
        </div>

        <script>
            function getPrice(){
                var x = document.getElementById("jenis").value;
                document.getElementById("demo").innerHTML = "Rp "+x+"/pcs";
            }
        </script>

        <script>
            $('select.dropdown')
                .dropdown();
        </script>
        
        <script>
        $('.ui.form')
        .transition('fade in')
            .form({
            on: 'blur',
            fields: {
            jenis: {
                identifier  : 'jenis',
                rules: [
                {
                    type   : 'empty',
                    prompt : 'Select type of your ticket'
                }
                ]
            },
            jumlah: {
                jumlah  : 'jumlah',
                rules: [
                {
                    type   : 'empty',
                    prompt : 'Choose amount of your ticket'
                }
                ]   
            }
            }
        })
        ;
        </script>
       <script>
    $('.icon.button')
    .popup({
    inline     : true,
    hoverable  : true,
    position   : 'bottom left',
    delay: {
      show: 300,
      hide: 800
    }
  })
;
  </script>
</body>

</html>
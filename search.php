<?php
session_start();
include "includes/koneksi.php";


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
    <style>
        * {box-sizing: border-box;}
        .mySlides {display: none;}
        img {vertical-align: middle;}
        /* Slideshow container */
        .slideshow-container {
          max-height: 300;
          position: relative;
          margin: auto;
        }
        .active {
          background-color: #717171;
        }
        /* Fading animation */
        .fade {
          -webkit-animation-name: fade;
          -webkit-animation-duration: 2s;
          animation-name: fade;
          animation-duration: 2s;
        }
        @-webkit-keyframes fade {
          from {opacity: .7} 
          to {opacity: 1}
        }
        @keyframes fade {
          from {opacity: .7} 
          to {opacity: 1}
        }
        </style>
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

        <div class="center aligned fifteen wide centered column" style="padding-left: 50px">
            <h2 style="text-align:left">Results for : 
            <?php 
            if(isset($_GET['submit'])){
                if(isset($_GET['search'])){
                    $search = $mysqli->real_escape_string($_GET['search']);
                    echo $search;
                }else{
                    $searchByKategori = $mysqli->real_escape_string($_GET['searchByKategori']);
                    $sql = "SELECT * FROM tb_category WHERE id_category = '$searchByKategori'";
                    $result = $mysqli->query($sql);
                    $row = $result->fetch_object();
                    echo $row->category;
                }
            }
            ?></h2>
                <div class="ui link cards">
                    <?php
                    if(isset($_GET['submit'])){
                        if(isset($_GET['search'])){
                            $search = $mysqli->real_escape_string($_GET['search']);
                            $sql = "SELECT * FROM tb_content WHERE title LIKE '%$search%' OR date LIKE '%$search%'
                            OR content LIKE '%$search%' OR location LIKE '%$search%'";
                        }else{
                            $searchByKategori = $mysqli->real_escape_string($_GET['searchByKategori']);
                            $sql = "SELECT * FROM tb_content WHERE id_category = '$searchByKategori'";
                        }

                        $result = $mysqli->query($sql);
                        $queryResult = $result->num_rows;
                    
                        if($queryResult > 0){
                            while($row = $result->fetch_object()){
                                echo <<< CONTENT
                                <div class="ui card">
                                    <div class="image">
                                        <img src="images/$row->path_img">
                                    </div>
                                    <div class="content">
                                    <a href="product.php?id_content=$row->id_content" class="header">$row->title</a>
                                        <div class="meta">
                                            <a>$row->location</a>
                                        </div>
                                    </div>
                                    <div class="extra content">
                                        <span class="right floated">
                                    <i class="calendar icon"></i>
                                    $row->date
                                    </span>
                                        <span class="left floated">
                                    <i class="user icon"></i>
                                    Kuota: $row->kuota
                                    </span>
                                    </div>
                                </div>         
CONTENT;
                            }

                    }else{
                        echo "There are no results matching your search";
                    }
                }
                    ?>
                </div>            
        </div>

        
</body>

</html>
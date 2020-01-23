<?php
session_start();

include "includes/koneksi.php";
$sql = 'SELECT * FROM tb_content';
$query = $mysqli->query($sql);

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
          position: relative;
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
                    </div>

                    <div>
                        
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
            
            
            <div class="sixteen wide column" style="margin-top:-15px">
                <div class="slideshow-container" style="z-index: -1;text-align: center; max-height: 200px; max-width: 1366px;">  
                
                    <div class="mySlides fade" >
                        <img class="ui fluid image" src="banner/event-1.png" >
                    </div>
                    
                    <div class="mySlides fade">
                        <img class="ui fluid image" src="banner/event-3.png"; >
                    </div>
                    
                    <div class="mySlides fade" >
                        <img class="ui fluid image" src="banner/event-2.png" >
                    </div>
                    
                    <br>
                    
                    <div style="text-align:center">
                        <span class="dot"></span> 
                        <span class="dot"></span> 
                        <span class="dot"></span> 
                    </div>

                </div>
            </div>
           
    <h2 style="z-index:4; font-size:50px; color:white; font-family: Arial, Helvetica, sans-serif">
    Bring Events Closer to You</h2>
      <div style="margin-top: -200px; text-align: center; z-index:1" class="ui four wide container" >
        <div class="" style="">
          <h2 style=";font-family: Arial, Helvetica, sans-serif; color: white;font-size: 46px; padding-top: 180px">
            </h2>
          <div class="ui raised segment" style="margin-left: 170px; margin-right: 170px; margin-top: 20px;">
              <div class="ui grid">
                  <div class="row">
                    <div class="three wide column">
                      <div class="field">
                        <form action="search.php" method="GET">
                          <select name="searchByKategori" class="ui dropdown">
                              <option value="">Category</option>
                              <option value="1">Seminar</option>
                              <option value="2">Entertaiment</option>
                              <option value="3">Sosial</option>
                              <option value="4">Festival</option>
                              <option value="5">Live Show</option>
                              <option value="6">Lomba</option>
                            </select>
                          </div>
                    </div>
                    <div class="five wide column">
                      <button class="ui blue button" name="submit" type="submit">Search</button>
                      </form>
                    </div>
                    <div class="eight wide column">
                     <form action="search.php" method="GET">
                        <div style=" border: black" class="ui fluid transparent icon input">
                          <input type="text" name="search" placeholder="Search your event">
                          <button class="ui blue button" name="submit" type="submit">Search</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                

            </div>
          </div>
        </div>

        </div>
        <div class="center aligned fifteen wide centered column" style="padding-left: 50px;">
        <h2 style="text-align:left; font-size:30px; padding-top:10px"> Some events you can check </h2>
            <div class>
                <div class="ui link cards">
                    <?php
                    while($row = $query->fetch_object()){
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
                    ?>
                </div>
            </div>
        </div>
        <script>
  $('select.dropdown')
      .dropdown();
</script>
<script>
        var slideIndex = 0;
        showSlides();
        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
               slides[i].style.display = "none";  
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}    
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";  
            dots[slideIndex-1].className += " active";
            setTimeout(showSlides, 6000); //time(sec)
        }
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
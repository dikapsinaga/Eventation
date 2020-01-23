<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Eventation : Sign Up</title>
    <link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master/semantic.css">
    <link rel="shortcut icon" href="favicon-16x16.png   ">
    <style>
    </style>
  </head>
    <body>
    <script src="jquery-3.3.1.min.js"></script>
    <script src="Semantic-UI-CSS-master/semantic.min.js"></script>
    <div class="ui grid container">
        <div class="sixteen wide column">
            <center>
                <a href="index.php">
                    <img class="ui medium image" src="logo.png" style="padding-left: 10px; padding-top: 15px; width: 400;"></center>
                </a>
        
                </div>
    </div>

    <div class="ui two column centered grid" style="margin-top: 50px">
            <div class="column">
                <div class="ui segment" style="">
                <h3 style="text-align: center">Hi, tell us a bit of your self!</h3>
                <div style="margin-left: 40px; margin-right: 40px; padding-top: 10px;">
                        <form class="ui form" method="post" action="includes/signup.inc.php" id="form">
                                <div class="field">
                                    <label for="fullname"> Full Name </label>
                                    <input type="text" name="fullname" placeholder="Full Name">
                                </div>
                                <div class="field">
                                    <label for="username"> Username </label>
                                    <input type="text" id="username" name="username" placeholder="Username">
                                    <span id="availabilityUsername"></span>
                                </div>
                                <div class="field">
                                    <label for="email"> Email Address </label>
                                    <input type="text" id="email" name="email" placeholder="Email Address">
                                    <span id="availabilityEmail"></span>
                                </div>
                                <div class="two fields">
                                    <div class="field">
                                        <label for="password"> Password </label>
                                        <input type="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="field">
                                        <label for="confirmpassword"> Confirm Password </label>
                                        <input type="password" name="confirmpassword" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="two fields">
                                    <div class="field">
                                        <label for="nomorhp"> Phone Number </label>
                                        <input type="text" name="phonenumber" placeholder="Phone Number">
                                    </div>
                                    <div class="field">
                                        <label> Gender </label>
                                        <select name="gender" class="ui search dropdown">
                                            <option value="null"></option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="inline field">
                                    
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="checkbox">
                                        <label>I agree to the Terms and Conditions</label>
                                    </div>
                                    
                                </div>
                                <br>
                                <center>
                                    <button class="ui blue button" name="submit" type="submit">Sign Me Up!</button>
                        </form>
                                <br>
                                <div class="ui error message"></div>                  
                                <p><br> Have an account? Sign in<a href="login.php"> here</a></p>
                                </center>
                
        </div>
    </div>

    <script>
    $('select.dropdown')
        .dropdown();
    </script>
  
    <script>$('.ui.form')
            .form({
              on: 'blur',
              inline : true,
              fields: {
                fullname: {
                  identifier  : 'fullname',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'You forgot to type your name!'
                    },
                    {
                      type   : 'regExp[/^[a-zA-Z ]*$/]',
                      prompt : 'Do not use number and special symbols at all!'
                    }
                  ]
                },
                username: {
                  identifier  : 'username',
                  rules: [
                    {
                      type   : 'minLength[6]',
                      prompt : 'Your username must be at least 6 characters'
                    }
                  ]
                },
                email: {
                    identifier  : 'email',
                    rules: [
                    {
                        type   : 'email',
                        prompt : 'Please enter a valid email address'
                    }
                    ]
                },
                password: {
                  identifier  : 'password',
                  rules: [
                    {
                      type   : 'minLength[8]',
                      prompt : 'Your password must be at least 8 characters'
                    },
                ]
              },
              confirmpassword: {
                  identifier  : 'confirmpassword',
                  rules: [
                    {
                      type   : 'match[password]',
                      prompt : "Your password doesn't match"
                    },
                ]
              },
            phonenumber: {
                identifier  : 'phonenumber',
                rules: [
                {
                    type   : 'number',
                    prompt : ''
                },
                {
                    type   : 'minLength[11]',
                    prompt : "Your phone number can't be that short!"
                }
                    ]
            },
              checkbox: {
                identifier  : 'checkbox',
                rules: [
                {
                    type   : 'checked',
                    prompt : 'You have not agree to our Terms And Condition'
                }
                ]
            }
          }
      }
    );
</script>
  </body>
</html>

<script>  
 $(document).ready(function(){
    $('#username').blur(function(){
    var username = $(this).val();

    $.ajax({
        url:'includes/checkUsername.php',
        method:"POST",
        data:{user_name:username},
        success:function(data){
            if(data >0){
                $('#availabilityUsername').html('<span class="">Username Not Available</span>');
            }else{
                $('#availabilityUsername').html('<span class="" >Username Available</span>');
            }
        }
    })

    });
});  
</script>

<script>  
 $(document).ready(function(){
    $('#email').blur(function(){
    var email = $(this).val();

    $.ajax({
        url:'includes/checkEmail.php',
        method:"POST",
        data:{e_mail:email},
        success:function(data){
            if(data >0){
                $('#availabilityEmail').html('<span>Email Not Available</span>');
            }else{
                $('#availabilityEmail').html('<span>Email Available</span>');
            }
        }
    })

    });
});  
</script>

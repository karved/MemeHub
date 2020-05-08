<?php
    require_once("./utils.php");
    $isValid = TRUE;
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $rows = runQuery("SELECT * FROM users WHERE username='{$_POST["username"]}' AND password='{$_POST["password"]}'");
        $isValid = count($rows) === 1;
	if($isValid){
        session_start();
        $_SESSION["userId"] = $rows[0]["id"];
        header("Location:meme.php");
	}
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
            <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MemeHub</title>

            <link rel = "icon" href =  "icon.jpeg"  type = "image/x-icon"> 
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            
</head>
    <body>
    <div class="header1">
              
              <div class="ui borderless inverted menu ">
  
                      <a class="item" href="meme.html">
                        <img class="ui small image" src="pics/mh.png" >
                      </a>
              </div>
      </div>
      <div class="ui placeholder segment">
                    <div class="ui two column stackable center aligned grid">
                      <div class="ui vertical divider">Or</div>
                      <div class="middle aligned row">
                        <div class="column">
                                <div class="ui big form">
                                <form method="POST">
                                          <div class="field">
                                            <label>UserName</label>
                                            <input type="text" name="username" placeholder="UserName" required>
                                          </div>
                                         
                                          <div class="field">
                                            <label>Password</label>
                                            <input type="password" name="password" placeholder="Password" required>
                                          </div>

                                        
                                        <button class="ui large submit button">Log In</button>
                                      </div>
                                      <?php if (!$isValid) { ?>
                                                       <p class="i"> Incorrect Entry </p>
                                                            <?php } ?>
                                          
                                    </form>
                                        
                        </div>
                        <div class="column">
                          <div class="ui large icon header">
                            <i class="user plus icon"></i>
                           
                          </div>
                          <button class="ui large blue button">
                            Create Account 
                                      </button>
                        </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="ui basic modal">                       
                  <iframe src="sign-up.php" width="500" height="500"></iframe>
                  </div>
  
       
       
       
       
     

    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"> 
            </script>

                  <script> $(document).ready(function(){
                            $('.ui.large.blue.button').click(function(){
                            $('.ui.basic.modal')
                              .modal('show');
                              });
                          });
                            </script>
    </body>
</html>
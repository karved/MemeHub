<?php
    require_once("./utils.php");
    $isValid = TRUE;
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $id = uniqid();
        runQuery("INSERT INTO users(id, username, password) VALUES ('{$id}', '{$_POST["username"]}', '{$_POST["password"]}')");
        session_start();
        $_SESSION["userId"] = $id;
       
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
            <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <title>Sign Up</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<div class="ui massive form">
<form method="POST">
                                          <div class="field">
                                            <label> UserName</label>
                                            <input type="text" name="username" placeholder="UserName" required minlength="3" maxlength="15">
                                          </div>
                                         
                                          <div class="field">
                                            <label>Password</label>
                                            <input type="password" name="password" placeholder="Password" required minlength="6" maxlength="15">
                                          </div>
                                          <div class="field">
                                            <label>Re-type Password</label>
                                            <input type="password" name="retypePassword" placeholder="Password" required>
                                          </div>

                                        
                                        <button class="ui large submit button">Log In</button>
                                      </div>
                                      <?php if (!$isValid) { ?>
                                                       <p class="i"> Incorrect Entry </p>
                                                            <?php } ?>
                                          
                                    </form>
                                      </div>
    <script>
    document.addEventListener("DOMContentLoaded", () => {
        let form = document.forms[0];
        form.addEventListener("submit", event => {
            if (form.password.value !== form.retypePassword.value) {
                event.preventDefault();
                alert("Retype  incorrect password");
            }
        })
    })
    </script>

<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"> 
                </script>
</body>
</html>
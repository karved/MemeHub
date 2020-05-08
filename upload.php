<?php
    require("./utils.php");
    session_start(); 
    if (!isset($_SESSION["userId"])) {
        return;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $id = uniqid();
        $file = $_FILES["image"];
        $fileExt = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
        move_uploaded_file($file["tmp_name"], "memes/" . $id . "." . $fileExt);
        runQuery("INSERT INTO memes(id, category, user_id, image_file_ext) VALUES ('{$id}', {$_POST["category"]}, '{$_SESSION["userId"]}', '{$fileExt}')");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
            <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            
    <title>Upload meme</title>
</head>
<body>
<div class = "u">
    <form method="POST" enctype="multipart/form-data">
        
        <input type="file" name="image" required>
        <br>
        <br>
        <select name="category" class="ui dropdown"id="select">
            <option value="0">Funny</option>
            <option value="1">Lame</option>
            <option value="2">Anime</option>
            <option value="3">Food</option>
            <option value="4">Sports</option>
            <option value="5">GIF</option>
            <option value="6">Superhero</option>
            <option value="7">Music</option>
            <option value="8">Pokemon</option>
            <option value="9">NSFW</option>
            <option value="10">Science</option>
            <option value="11">Tv</option>
            <option value="12">Dark</option>
        </select>
        <br>
        <br>
        <button class="ui button">Upload</button>
        
    </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"> 
            </script>
        <script> $(document).ready(function(){
                           $('#select')
                            .dropdown()
                                ;
                          });
                            </script>

</body>
</html>
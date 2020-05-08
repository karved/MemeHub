<?php
require("./utils.php");

runQuery("UPDATE memes SET dislikes = dislikes + 1 WHERE id='{$_GET["meme_id"]}'");

?>
<?php
require("./utils.php");

runQuery("UPDATE memes SET likes = likes + 1 WHERE id='{$_GET["meme_id"]}'");

?>
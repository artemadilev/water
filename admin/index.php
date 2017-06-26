<?php
    require_once("database.php");
    require_once("articles.php");

    $link = db_connect();

    $articles = articles_all($link);

    include("articles_admin.php");

?>
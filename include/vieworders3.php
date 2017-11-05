<?php
    require_once("database.php");
    require_once("functions.php");

    $link = db_connect();
    $orders = all($link);

    require_once("index_admin.php");
                    
?>
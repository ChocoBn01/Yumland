<?php
    if(!isset($_COOKIE["client"])){
        header("Location: index.php");
    }
    setcookie("client", json_encode($data[$mail]), time()-3600);  
    header("Location: index.php");
    exit;
?>

<?php
session_start();
if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
    $_SESSION = array();
    session_destroy();
    header('Location:../Controller/index.php');
}
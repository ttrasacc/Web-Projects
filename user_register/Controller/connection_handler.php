<?php
session_start();
//Redirection to the data_handler to verify datas if cookies are set. Otherwise, redirect to the connection page.
if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    header('Location:cookie_handler.php');
} else if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header('Location:../View/connection_page.php');
} else {
    $page = "connection";
    $content = "<h1>Vous êtes déjà connecté.</h1>";
    require('../View/Base.php');
}

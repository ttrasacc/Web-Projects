<?php
session_start();
if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
    require('../Model/inscription.php');
    require('../View/inscription_page.php');
} else {
    header('Location:../Controller/index.php');
}


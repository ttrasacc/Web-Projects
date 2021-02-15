<?php
session_start();
if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
    try {
            $bdd = new PDO('mysql:host=localhost;dbname=user_register;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch(Exception $e) {
            echo $e;
    }
    $req = $bdd->prepare('SELECT lastname, firstname, username, email FROM members WHERE username = ?');
    $req->execute(array($_SESSION["username"]));
    $data = $req->fetch();

    require("../View/profile.php");
}
else {
    header('Location:../Controller/index.php');
}
?>
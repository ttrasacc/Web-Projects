<?php
session_start();
require('../Model/connection.php');


if (isset($_POST['username']) && isset($_POST['password'])) {
    $_SESSION['verified'] = connection($_POST['username'], $_POST['password'], $_POST['remember_me']);
}
else {
    $_SESSION['verified'] = false;
}
header(($_SESSION['verified'] ? 'Location:../View/profile.php' : 'Location:../View/connection_page.php?error=true'));















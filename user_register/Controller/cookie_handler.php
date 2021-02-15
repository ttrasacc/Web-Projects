<?php

require('../Model/connection.php');
if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    $_SESSION['verified'] = connectionCookie($_COOKIE['username'], $_COOKIE['password']);
    header(($_SESSION['verified'] ? 'Location:../View/profile.php' : 'Location:../View/connection_page.php?error=true'));
}
else {
    header('Location:data_handler.php');
}
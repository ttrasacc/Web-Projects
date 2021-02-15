<?php

function connection($username, $password, $remember_me) {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=user_register;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch(Exception $e) {
        echo $e;
    }
    $req = $bdd->prepare('SELECT username, `password` FROM members WHERE username = ?');
    $req->execute(array($username));
    $data = $req->fetch();
    $hashed = $data['password'];
    
    if (password_verify($password, $hashed)) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $hashed;
        if ($remember_me == true) {
            setcookie('username', $_SESSION['username'], time() + 365*24*3600, null, null, false, true);
            setcookie('password', $_SESSION['password'], time() + 365*24*3600, null, null, false, true);
        }
        return true;
    }
    return false;
}

function connectionCookie($username, $password) {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=user_register;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch(Exception $e) {
        echo $e;
    }
    $req = $bdd->prepare('SELECT username, `password` FROM members WHERE username = ?');
    $req->execute(array($username));
    $data = $req->fetch();
    $hashed = $data['password'];
    if ($password == $hashed) {
            return true;
    }
    return false;
}


















function verifyFormPassword($username, $password, $hashed) {
    $req = $bdd->prepare('SELECT username, `password` FROM members WHERE username = ?');
    $req->execute(array($username));
    $data = $req->fetch();
    if (isset($data)) {
        if (password_verify($password, $hashed)) {
            return true;
        }
    }
    //header('Location:../value.php?value='. $data["verified"] . '&hashed=' . $password);    
    if ($data['verified'] == 1) {
        return $data;
    }
    else {
        return $data;
    }
}


function verifyCookiePassword($username, $password) {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=user_register;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch(Exception $e) {
        echo $e;
    }
    $req = $bdd->prepare('SELECT COUNT(*) AS verified FROM members WHERE username = ? AND `password` = ?');
    $req->execute(array($username, $password));
    $data = $req->fetch();
    //header('Location:../value.php?value='. $data["verified"] . '&hashed=' . $password);    
    if ($data['verified'] == 1) {
        return true;
    }
    else {
        return false;
    }
}

/*

$request = $bdd->prepare("SELECT COUNT(*) AS nb_comments FROM comments WHERE id_billet=?");
                $request->execute(array($id_billet));
                $data = $request->fetch();
                */
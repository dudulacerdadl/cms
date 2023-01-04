<?php

unset($_SESSION['id'], $_SESSION['email'], $_SESSION['name'], $_SESSION['password']);
$_SESSION['msg'] = "Deslogado com sucesso!";
header("Location: signin.php");

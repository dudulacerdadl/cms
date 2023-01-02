<?php

session_start();
unset($_SESSION['id'], $_SESSION['email'], $_SESSION['name']);

$_SESSION['msg'] = "Deslogado com sucesso!";
header("Location: signin.php");

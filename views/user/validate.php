<?php

require_once '../../db/connection.php';

session_start();

$btnLogin = filter_input(INPUT_POST, 'btnLogin');

if (!$btnLogin) {
    $_SESSION['msg'] = 'Página não encontrada';
    header("Location: signin.php");
}

$user     = filter_input(INPUT_POST, 'user');
$password = filter_input(INPUT_POST, 'pass');

if (empty($user)) {
    $_SESSION['msg'] = 'Usuário não encontrado';
    header("Location: signin.php");
}

if (empty($password)) {
    $_SESSION['msg'] = 'Senha não encontrada';
    header("Location: signin.php");
}

$result = $conn->prepare("SELECT `id`, `email`, `name`, `password` FROM `users` WHERE email = '$user'");
$result->execute();
$results = $result->fetch();

if ($results['password'] != $password) {
    $_SESSION['msg'] = 'Senha incorreta';
    header("Location: signin.php");
}

$_SESSION['id'] = $results['id'];
$_SESSION['email'] = $results['email'];
$_SESSION['name'] = $results['name'];
header("Location: home.php");

echo "Usuário: $user || Senha: $password";


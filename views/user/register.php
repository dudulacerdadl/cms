<?php

require_once '../../db/connection.php';

session_start();

$btnRegister = filter_input(INPUT_POST, 'btnRegister');

if (!$btnRegister) {
    $_SESSION['msg'] = 'Página não encontrada';
    header("Location: signup.php");
}

$user     = filter_input(INPUT_POST, 'user');
$password = filter_input(INPUT_POST, 'pass');
$name     = filter_input(INPUT_POST, 'name');

if (empty($user)) {
    $_SESSION['msg'] = 'Usuário não encontrado';
    header("Location: signup.php");
}

if (empty($password)) {
    $_SESSION['msg'] = 'Senha não encontrada';
    header("Location: signup.php");
}

if (empty($name)) {
    $_SESSION['msg'] = 'Nome não encontrado';
    header("Location: signup.php");
}

$query = $conn->prepare(
    "INSERT INTO `users` (`name`, `email`, `password`, `created_at`, `updated_at`) "
    . "VALUES ('$name', '$user', '$password', now(), now());"
);
$query->execute();

$result = $conn->prepare("SELECT `id`, `email`, `name`, `password` FROM `users` WHERE email = '$user'");
$result->execute();
$results = $result->fetch();

$_SESSION['id']    = $results['id'];
$_SESSION['email'] = $results['email'];
$_SESSION['name']  = $results['name'];
$_SESSION['password']  = $results['password'];
header("Location: home.php");

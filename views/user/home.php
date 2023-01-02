<?php

session_start();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/notices.css">
    <link rel="stylesheet" href="../../style/login.css">
    <link rel="stylesheet" href="../../style/header.css">
    <link rel="stylesheet" href="../../style/footer.css">
    <link rel="shortcut icon" href="../../imgs/logo.png" type="image/x-icon"/>
    <title>Login</title>
</head>
<body>
    <? require_once '../../template/header.php'; ?>

    <main>
        <a class="back-img" href="javascript:history.back()">
            <img src="../../imgs/icons/back.png" width="50px" alt="voltar">
        </a>
        <p>Olá <? echo $_SESSION['name'] ?>, Bem-Vindo!</p>
        <a href="./signout.php">Sair</a>
    </main>

    <? require_once '../../template/footer.php'; ?>
</body>
</html>
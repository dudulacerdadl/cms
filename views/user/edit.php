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
    <link rel="shortcut icon" href="../imgs/logo.png" type="image/x-icon"/>
    <title>Editar</title>
</head>
<body>
    <? require_once '../../template/header.php'; ?>

    <main>
        <a class="back-img" href="javascript:history.back()">
            <img src="../../imgs/icons/back.png" width="50px" alt="voltar">
        </a>
        <div class="login-card">
            <div class="login-content">
                <img class="user-img" src="../../imgs/icons/profile-user.png" alt="user">
                <?
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
                <form class="login-form" action="./register.php" method="POST">
                    <input type="text" placeholder="Nome" name="name" id="name" value="<? echo $_SESSION['name'] ?>">
                    <input type="email" placeholder="E-mail" name="user" id="access-email" value="<? echo $_SESSION['email'] ?>">
                    <input type="password" placeholder="Password" name="pass" id="access-password">
                    <input class="access-action" type="submit" name="btnRegister" value="Registrar">
                </form>
            </div>
        </div>
    </main>

    <? require_once '../../template/footer.php'; ?>
</body>
</html>
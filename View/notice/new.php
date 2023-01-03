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
    <title>Registrar Notícia</title>
</head>
<body>
    <?require_once '../../template/header.php';?>

    <main>
        <a class="back-img" href="javascript:history.back()">
            <img src="../../imgs/icons/back.png" width="50px" alt="voltar">
        </a>
        <div class="login-card">
            <div class="login-content">
                <?
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
                <form class="notice-form" action="../../Model/Notice.php" method="POST">
                    <input type="text" placeholder="Título" name="title" id="title">
                    <input type="text" placeholder="Autor" name="author" id="author">
                    <textarea name="content" id="content" placeholder="Conteúdo" cols="30" rows="10"></textarea>

                    <input class="access-action" type="submit" name="actionButton" value="Cadastrar">
                </form>
            </div>
        </div>
    </main>

    <?require_once '../../template/footer.php';?>
</body>
</html>
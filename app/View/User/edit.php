<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?ROOT?>/style/notices.css">
    <link rel="stylesheet" href="<?ROOT?>/style/login.css">
    <link rel="stylesheet" href="<?ROOT?>/style/header.css">
    <link rel="stylesheet" href="<?ROOT?>/style/footer.css">
    <link rel="shortcut icon" href="../Resource/imgs/logo.png" type="image/x-icon"/>
    <title>Editar</title>
</head>
<body>
    <main>
        <a class="back-img" href="javascript:history.back()">
            <img src="<?ROOT?>/Resource/imgs/icons/back.png" width="50px" alt="voltar">
        </a>
        <div class="login-card">
            <div class="login-content">
                <img class="user-img" src="<?ROOT?>/Resource/imgs/icons/profile-user.png" alt="user">
                <?
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
                <form class="login-form" action="/admin/sign/exec" method="POST">
                    <input type="text" placeholder="Nome" name="name" id="name" value="<?echo $_SESSION['name'] ?>">
                    <input type="email" placeholder="E-mail" name="user" id="access-email" value="<?echo $_SESSION['email'] ?>">
                    <input type="password" placeholder="Password" name="pass" id="access-password">
                    <input class="access-action" type="submit" name="actionButton" value="Editar">
                    <input class="access-action-delete" type="submit" name="actionButton" value="Deletar">
                </form>
            </div>
        </div>
    </main>
</body>
</html>
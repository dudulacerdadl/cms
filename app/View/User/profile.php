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
    <link rel="shortcut icon" href="<?ROOT?>/Resource/imgs/logo.png" type="image/x-icon"/>
    <title>Home</title>
</head>
<body>
    <main>
        <a class="back-img" href="javascript:history.back()">
            <img src="<?ROOT?>/Resource/imgs/icons/back.png" width="50px" alt="voltar">
        </a>
        <p>Olá <?echo $_SESSION['name'] ?>, Bem-Vindo!</p>
        <a href="/admin/edit">Editar</a>
        <a href="../notice/new.php">Cadastrar Notícia</a>
        <a href="/admin/signout">Sair</a>
    </main>
</body>
</html>
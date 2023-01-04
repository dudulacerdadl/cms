<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?ROOT?>/style/notice-register.css">
    <link rel="stylesheet" href="<?ROOT?>/style/header.css">
    <link rel="stylesheet" href="<?ROOT?>/style/footer.css">
    <link rel="shortcut icon" href="../Resource/imgs/logo.png" type="image/x-icon"/>
    <title>Registrar Notícia</title>
</head>
<body>
    <main>
        <a class="back-img" href="javascript:history.back()">
            <img src="<?ROOT?>/Resource/imgs/icons/back.png" width="50px" alt="voltar">
        </a>
        <div class="notice-card">
            <div class="notice-content">
                <?
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
                <form class="notice-form" action="/notice/edit/exec" method="POST">
                    <input type="text" placeholder="Título" name="title" id="title">
                    <input type="text" placeholder="Autor" name="author" id="author">
                    <textarea name="content" id="content" placeholder="Conteúdo" cols="30" rows="10"></textarea>

                    <input class="access-action" type="submit" name="actionButton" value="Cadastrar">
                </form>
            </div>
        </div>
    </main>
</body>
</html>
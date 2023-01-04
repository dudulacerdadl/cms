<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?ROOT?>/style/header.css">
    <link rel="stylesheet" href="<?ROOT?>/style/notices.css">
    <link rel="stylesheet" href="<?ROOT?>/style/footer.css">
    <link rel="shortcut icon" href="./Resource/imgs/logo.png" type="image/x-icon"/>
    <title>Notícia - <?echo $title?></title>
</head>
<body>
    <main>
        <a class="back-img" href="javascript:history.back()">
            <img src="<?ROOT?>/Resource/imgs/icons/back.png" width="50px" alt="voltar">
        </a>
        <div class="notices">
            <h1 class="notice-title"><?echo $title?></h1>
            <h3 class="notice-author"><?echo $author?></h3>
            <h3 class="notice-date"><?echo $date?></h3>
            <h3 class="notice-category">Categoria</h3>
            <h3 class="notice-tags">Tags</h3>
            <div class="notice-text">
                <p><?echo $content?></p>
            </div>
        </div>
    </main>
</body>
</html>
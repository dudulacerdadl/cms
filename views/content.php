<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/header.css">
    <link rel="stylesheet" href="../style/notices.css">
    <link rel="stylesheet" href="../style/footer.css">
    <link rel="shortcut icon" href="./imgs/logo.png" type="image/x-icon"/>
    <title>Conteúdo</title>
</head>
<body>
    <? require_once '../template/header.php'; ?>

    <main>
        <a class="back-img" href="javascript:history.back()">
            <img src="../imgs/icons/back.png" width="50px" alt="voltar">
        </a>
        <div class="notices">
            <h1 class="notice-title">Título</h1>
            <h3 class="notice-author">Autor</h3>
            <h3 class="notice-date">Data de publicação</h3>
            <h3 class="notice-category">Categoria</h3>
            <h3 class="notice-tags">Tags</h3>
            <div class="notice-text">
                <p>Isso é uma representação de onde ficará a notícia. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita ex dolores nesciunt cupiditate dolorum, veritatis in nostrum harum repellendus esse alias aperiam sed voluptates mollitia porro. Voluptas optio error porro! Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad sed nulla perspiciatis, provident facilis autem quod minus quis neque magni accusamus dolore voluptates, corporis officiis vel fuga id ab omnis! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cumque quos voluptate ipsam ex est, ipsum vero dolorum maiores labore esse corrupti nemo temporibus? Exercitationem aspernatur quae, ipsam labore beatae reiciendis.</p>
            </div>
        </div>
    </main>

    <? require_once '../template/footer.php'; ?>
</body>
</html>
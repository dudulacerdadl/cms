<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/header.css">
    <link rel="stylesheet" href="./style/cards.css">
    <link rel="stylesheet" href="./style/footer.css">
    <link rel="shortcut icon" href="./imgs/logo.png" type="image/x-icon"/>
    <title>Início</title>
</head>
<body>
    <main>
        <? foreach ($this->getNotices() as $row): ?>
        <form action="./views/content.php" method="post">
        <button class="card-link" type="submit">
            <div class="card-notice">
                <img class="cart-img" src="./imgs/notices/img-1.png" alt="pinguins">
                <div class="card-texts">
                    <h1 class="cart-title"><? echo $row['title'] ?></h1>
                    <h3 class="cart-author"><? echo $row['author'] ?></h3>
                    <p class="cart-category">Categorias</p>
                    <p class="cart-tags">#tags</p>
                </div>
            </div>
        </button>
        </form>
        <? endforeach ?>
    </main>
</body>
</html>

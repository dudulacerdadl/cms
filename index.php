<?php

require_once './db/connection.php';

if (!defined('ROOT')) {
    define('ROOT', dirname(__DIR__));
}

session_start();
$data = $conn->query('SELECT * FROM `notices`');

/**
 * TODO
 *
 * [ ] Implementar sistema de Rotas (https: //alexandrebbarbosa.wordpress.com/2019/04/17/phpconstruir-um-sistema-de-rotas-para-mvc-primeira-parte/);
 * [ ] Implementar cadastro de notícias;
 * [ ] Implementar comentários por usuários;
 * [ ] Aprimorar o sistema de templates usando rotas;
 * [ ] Implementar renderização do conteúdo de cada página de notícia;
 */

?>

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
    <? require_once './template/header.php'; ?>

    <main>
        <? foreach ($data as $row): ?>
        <a class="card-link" href="./views/content.php" rel="noopener noreferrer">
            <div class="card-notice">
                <img class="cart-img" src="./imgs/notices/img-1.png" alt="pinguins">
                <div class="card-texts">
                    <h1 class="cart-title"><? echo $row['title'] ?></h1>
                    <h3 class="cart-author"><? echo $row['author'] ?></h3>
                    <p class="cart-category">Categorias</p>
                    <p class="cart-tags">#tags</p>
                </div>
            </div>
        </a>
        <? endforeach ?>
    </main>

    <? require_once './template/footer.php'; ?>
</body>
</html>

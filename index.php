<?php

$host     = "mysql";
$dbname   = "cms";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $data = $conn->query('SELECT * FROM `notices`');
} catch (PDOException $pe) {
    die("Não foi possível se conectar ao banco de dados $dbname :" . $pe->getMessage());
}

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
    <header>
        <img src="./imgs/logo.png" alt="cms" class="logo-header">

        <h1 class="page-title">CMS - Sistema de Gerenciamento de Conteúdo</h1>

        <section class="login-section">
            
        </section>
    </header>

    <main>
        <? foreach ($data as $row): ?>
        <a class="card-link" href="./content.php" rel="noopener noreferrer">
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

    <footer>
        <p>Contato: (4x) 9 xxxx-xxxx</p>
        <p>E-mail: xxxx@gmail.com</p>
        <p>Desenvolvido por: Dudu Lacerda</p>
    </footer>
</body>
</html>

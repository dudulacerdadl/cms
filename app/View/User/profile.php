<body>
    <main>
        <a class="back-img" href="javascript:history.back()">
            <img src="<?ROOT?>/Resource/imgs/icons/back.png" width="50px" alt="voltar">
        </a>
        <p>Olá <?echo $_SESSION['name'] ?>, Bem-Vindo!</p>
        <a href="/admin/edit">Editar</a>
        <a href="/news/new">Cadastrar Notícia</a>
        <a href="/admin/signout">Sair</a>

        <ul>
            <h2>Notícias para Edição</h2>
            <?foreach ($params['notices'] as $row): ?>
            <li>
                <form action="/news/edit" class="cart-form" method="post">
                <input type="hidden" name="id" value="<?echo $row['id'] ?>">
                <input type="hidden" name="title" value="<?echo $row['title'] ?>">
                <input type="hidden" name="author" value="<?echo $row['author'] ?>">
                <input type="hidden" name="content" value="<?echo $row['content'] ?>">
                <button class="card-link" type="submit">
                    <?echo $row['title'] ?>
                </button>
                </form>
            </li>
            <?endforeach?>
        </ul>
    </main>
</body>
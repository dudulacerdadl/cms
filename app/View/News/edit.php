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
                <form class="notice-form" action="/news/edit/exec" method="POST">
                    <input type="hidden" name="id" value="<?echo $params['id'] ?>">
                    <input type="text" placeholder="Título" name="title" id="title" value="<?echo $params['title'] ?>">
                    <input type="text" placeholder="Autor" name="author" id="author" value="<?echo $params['author'] ?>">
                    <textarea name="content" id="content" placeholder="Conteúdo" cols="30" rows="10"><?echo $params['content'] ?></textarea>

                    <input class="access-action" type="submit" name="actionButton" value="Editar">
                    <input class="access-action-delete" type="submit" name="actionButton" value="Deletar">
                </form>
            </div>
        </div>
    </main>
</body>
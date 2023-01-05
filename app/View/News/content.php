<body>
    <main>
        <a class="back-img" href="javascript:history.back()">
            <img src="<?ROOT?>/Resource/imgs/icons/back.png" width="50px" alt="voltar">
        </a>
        <div class="notices">
            <h1 class="notice-title"><?echo $params['title']?></h1>
            <h3 class="notice-author"><?echo $params['author']?></h3>
            <h3 class="notice-date"><?echo $params['date']?></h3>
            <h3 class="notice-category">Categoria</h3>
            <h3 class="notice-tags">Tags</h3>
            <div class="notice-text">
                <p><?echo $params['content']?></p>
            </div>
        </div>
    </main>
</body>
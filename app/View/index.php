<body>
    <main>
        <?foreach ($this->getNotices() as $row): ?>
        <form action="/news" class="cart-form" method="post">
        <input type="hidden" name="title" value="<?echo $row['title'] ?>">
        <input type="hidden" name="author" value="<?echo $row['author'] ?>">
        <input type="hidden" name="content" value="<?echo $row['content'] ?>">
        <input type="hidden" name="date" value="<?echo $row['created_at'] ?>">
        <button class="card-link" type="submit">
            <div class="card-notice">
                <img class="cart-img" src="./Resource/imgs/news/img-1.png" alt="pinguins">
                <div class="card-texts">
                    <h1 class="cart-title"><?echo $row['title'] ?></h1>
                    <h3 class="cart-author"><?echo $row['author'] ?></h3>
                    <p class="cart-category">Categorias</p>
                    <p class="cart-tags">#tags</p>
                </div>
            </div>
        </button>
        </form>
        <?endforeach?>
    </main>
</body>
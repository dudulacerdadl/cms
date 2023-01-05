<body>
    <main>
        <a class="back-img" href="javascript:history.back()">
            <img src="<?ROOT?>/Resource/imgs/icons/back.png" width="50px" alt="voltar">
        </a>
        <div class="login-card">
            <div class="login-content">
                <img class="user-img" src="<?ROOT?>/Resource/imgs/icons/profile-user.png" alt="user">
                <?
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
                <form class="login-form" action="/admin/sign/exec" method="POST">
                    <input type="email" placeholder="E-mail" name="user" id="access-email">
                    <input type="password" placeholder="Password" name="pass" id="access-password">
                    <input class="access-action" type="submit" name="actionButton" value="Entrar">

                    <a href="/admin/signup">Registre-se</a>
                </form>
            </div>
        </div>
    </main>
</body>
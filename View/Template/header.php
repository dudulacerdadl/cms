<header>
    <section class="login-section">
    <img src="<? ROOT ?>/imgs/logo.png" alt="cms" class="logo-header">
    </section>
    <h1 class="page-title">CMS - Sistema de Gerenciamento de Conteúdo</h1>

    <?php if (empty($_SESSION['id'])): ?>

    <section class="login-section">
        <a href="/admin/signin">
            <img class="login-img" src="<? ROOT ?>/imgs/icons/profile.png" alt="Login">
        </a>
    </section>

    <?php else: ?>

    <section class="login-section">
        <a href="/admin/home">
            <img class="login-img" src="<? ROOT ?>/imgs/icons/profile.png" alt="Login">
        </a>
    </section>

    <?php endif;?>
</header>
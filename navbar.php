<nav
    class="navbar navbar-expand-lg bg-body-tertiary mt-3 z-3 shadow p-3 mb-5 bg-body-tertiary rounded-pill sticky-lg-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="<?php echo $base_url; ?>">Poetry Time</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page"
                        href="<?php echo $base_url; ?>/index.php">Anasayfa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $base_url; ?>/categories/category.php">Kategoriler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $base_url; ?>/categories/writer.php">Yazarlarımız</a>
                </li>
            </ul>
            <div class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <?php if($_SESSION['auth'] == 1 && $_SESSION["user"]) { ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $base_url; ?>/contentforms/writerform.php">Yazar Ol !</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $base_url; ?>/contentforms/index.php">Haydi Yaz...</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $base_url; ?>/users/logout.php">Çıkış Yap</a>
                    </li>

                    <?php } else { ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $base_url; ?>/users/login.php">Giriş Yap</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $base_url; ?>/users/sign-up.php">Kayıt Ol</a>
                    </li>

                    <?php }?>

                </ul>
            </div>
        </div>
    </div>
</nav>
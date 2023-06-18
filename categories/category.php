<?php include "../header.php"; ?>



<div class="container text-center">
    <h1 class="mb-5">Kategoriler</h1>
    <div class="row justify-content-center">
        <div class="col-12 card-group">

            <div class="card me-5" style="width: 18rem;">
                <img src="categories/makale.jpg" class="card-img-top" alt="şiir">
                <div class="card-body">
                    <h5 class="card-title">Şiirler</h5>
                    <p class="card-text">Şiir insan topluluğunun duygularının detaylı bir şekilde kafiyeler ile birleşip
                        dışa vurumudur.</p>
                    <a href="<?php echo $base_url; ?>/categories/poetries.php" class="btn btn-primary">Şiirlere Git</a>
                </div>
            </div>

            <div class="card me-5" style="width: 18rem;">
                <img src="categories/denemeresim.jpg" class="card-img-top" alt="deneme">
                <div class="card-body">
                    <h5 class="card-title">Denemeler</h5>
                    <p class="card-text">Günümüz insanlarının yaşanmış ve tecrübe edilmiş hikayeleri derlediği bir dizi
                        yazıdır.</p>
                    <a href="<?php echo $base_url; ?>/categories/essays.php" class="btn btn-primary">Denemelere Git</a>
                </div>
            </div>

            <div class="card me-5" style="width: 18rem;">
                <img src="categories/makale.jpg" class="card-img-top" alt="makale">
                <div class="card-body">
                    <h5 class="card-title">Makaleler</h5>
                    <p class="card-text">Hayat ve bilimin insan beyninde yer alan imgelerle okuyucuya yansıtılması ve
                        bilgi aktarımıdır.</p>
                    <a href="<?php echo $base_url; ?>/categories/articles.php" class="btn btn-primary">Makalelere Git</a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include "../footer.php"; ?>
<?php include "../header.php"; ?>

<?php

$writers = $dbh->query(
            "SELECT * FROM writers"
        )->fetchAll(PDO::FETCH_ASSOC);

?>        

<div class="container">
    <h1 class="mb-5">Yazarlarımız</h1>
    <div class="row justify-content-center">
        <div class="col-12 d-flex">

<?php foreach($writers as $writer){ ?>   
            <div class="card me-5" style="width: 18rem;">
                <img src="<?php echo $writer["image"] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $writer["writer_name"] ?></h5>
                    <p class="card-text"><?php echo $writer["content"] ?>.</p>
                    <a href="#" class="btn btn-primary">Yazılarını Gör</a>
                </div>
            </div>
<?php } ?>            


        </div>
    </div>
</div>

<?php include "../footer.php"; ?>
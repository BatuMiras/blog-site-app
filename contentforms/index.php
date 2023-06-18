<?php include "../header.php"; ?>

<?php
  if($_SESSION["auth"] == 1 && $_SESSION["user"]){
  }else{
    header("Location: $base_url/index.php");
  }
?>



<div class="container">
    <h1 class="mb-5">Yazı Form Sayfası
        <a href="<?php echo $base_url; ?>/contentforms/add.php" class="btn btn-sm btn-primary ">Ekle</a>
    </h1>

    <div class="row justify-content-center">
        <div class="col-12">

            <?php

if(!empty($_GET["action"]) && $_GET["action"] == "delete"){
    $id = $_GET["id"];
}

$action = $dbh->prepare("DELETE FROM posts WHERE id = :id");
$action->bindParam(':id', $id);

if($action->execute()){
    $message = "Yazınız Silindi";
} else {
    $message = "Silerken Hata Oluştu";
}




        $posts = $dbh->query(
            "SELECT * FROM posts"
        )->fetchAll(PDO::FETCH_ASSOC);

        $categories = $dbh->query(
            "SELECT * FROM categories"
        )->fetchAll(PDO::FETCH_ASSOC);

        ?>

            <table class="table table-bordered">
                <tr>
                    <td>No.</td>
                    <td>Resim</td>
                    <td>Yazı Başlığı</td>
                    <td>Yazı Alanı</td>
                    <td>Kategori</td>
                    <td>Aktif / Pasif</td>
                    <td>Sil / Düzenle</td>
                </tr>

                <?php foreach($posts as $item){ ?>
                <tr>
                    <td><?php echo $item["id"] ?></td>
                    <td><?php echo $item["image"] ?></td>
                    <td><?php echo $item["name"] ?></td>
                    <td><?php echo $item["content"] ?></td>
                    <td><?php echo $item["category_id"] ?></td>
                    <td>
                        <?php if($item["status"] == 1){ ?>
                        Aktif
                        <?php } else { ?>
                        Pasif
                        <?php } ?>


                    </td>
                    <td class="d-flex">
                        <a href="<?php echo $base_url; ?>/contentforms/index.php?id=<?php echo $item["id"] ?>&action=delete"
                            class="btn btn-danger btn-sm me-3">Sil</a>
                        <a href="<?php echo $base_url; ?>/contentforms/edit.php?id=<?php echo $item["id"] ?>&action=update"
                            class="btn btn-primary btn-sm me-3">Düzenle</a>
                        <a href="#"
                            class="btn btn btn-info btn-sm me-3">Gör</a>    
                    </td>
                </tr>
                <?php  } ?>



            </table>

        </div>
    </div>
</div>







<?php include "../footer.php"; ?>
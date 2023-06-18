<?php include "../header.php"; ?>

<?php

    if(isset($_POST["action"])){

        $writer_name = $_POST["writer_name"];
        $content = $_POST["content"];
        $image = $_POST["image"];

        $action = $dbh->prepare(
            "INSERT INTO writers ( writer_name, content, image) VALUES (:writer_name, :content, :image)"
        );

        if(!$writer_name || !$content){
            $message = "Lütfen formu kontrol edin!";
        }else{
            $action->bindParam(':writer_name', $writer_name);
            $action->bindParam(':content', $content);
            $action->bindParam(':image', $image);

            if($action->execute()){
                $message = "Artık Yazarsınız...";
            }else{
                $message = "Oluşturulurken Bir Hata Oluştu.";
            }

            header("refresh:1; url=$base_url/contentforms/add.php");
        }


    }

?>


<div class="container">
    <h1 class="mb-5">Yazar Ol !</h1>
    <div class="row justify-content-center">
        <div class="col-12">

            <form class="shadow-lg p-3 mb-5 bg-body-tertiary rounded border border-primary-subtle" method="post">

                <?php include "../message.php"; ?>

                <div class="mb-3">
                    <label class="form-label">Yazar Adı</label>
                    <input name="writer_name" type="text" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Özet</label>
                    <input name="content" type="text" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Resim Seç</label>
                    <input name="image" class="form-control" type="file" id="formFile">
                </div>

                <button type="submit" name="action" class="btn btn-primary">Yazar Ol</button>

            </form>

        </div>
    </div>
</div>

<?php include "../footer.php"; ?>
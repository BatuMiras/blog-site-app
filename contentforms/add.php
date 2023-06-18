<?php include "../header.php"; ?>




<div class="container">
    <h1 class="mb-5">Ekle Sayfası</h1>
    <div class="row justify-content-center">
        <div class="col-12">

        <?php

            if(isset($_POST["action"])){

                    $image = $_POST["image"];
                    $name = $_POST["name"];
                    $content = $_POST["content"];
                    $category_id = $_POST["category_id"];
                    $status = $_POST["status"];

                    
                $action = $dbh->prepare(
                    "INSERT INTO posts (image, name, content, category_id, status) VALUES (:image, :name, :content, :category_id, :status)");

                    if(!$name || !$content || !$category_id){
                        $message = "Lütfen formu kontrol edin!";
                      }else{
                        $action->bindParam(':image', $image);
                        $action->bindParam(':name', $name);
                        $action->bindParam(':content', $content);
                        $action->bindParam(':category_id', $category_id);
                        $action->bindParam(':status', $status);
          
                        if($action->execute()){
                          $message = "Paylaşımınız Yüklenmiştir.";
                        }else{
                          $message = "Yüklenirken Bir Hata Oluştu.";
                        }
          
                        // header("Location: $base_url/todos/index.php");
                        header("refresh:1; url=$base_url/contentforms/index.php");
                      }    


            }
        
        
        ?>



            <form method="post">
                <?php include '../message.php'; ?>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Resim Seç</label>
                    <input name="image" class="form-control" type="file" id="formFile">
                </div>

                <div class="mb-3">
                    <label class="form-label">Başlık</label>
                    <input name="name" type="text" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Yazı Alanı</label>
                    <textarea name="content" class="form-control" cols="30" rows="10"></textarea>
                </div>

                <?php 
                
                    $categories = $dbh->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);

                ?>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="category_id" class="form-control">

                       <?php foreach($categories as $category){ ?> 
                          <option value="<?php echo $category["id"]; ?>"><?php echo $category["category_name"]; ?></option>
                       <?php } ?> 

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Durumu</label>
                    <select name="status" class="form-control">
                        <option value="0">Pasif</option>
                        <option value="1">Aktif</option>
                    </select>
                </div>

                <button type="submit" name="action" class="btn btn-primary">Paylaş</button>
            </form>







        </div>
    </div>
</div>




<?php include "../footer.php"; ?>
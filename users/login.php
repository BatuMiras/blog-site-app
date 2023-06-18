<?php include "../header.php"; ?>



<div class="container">
    <h1 class="mb-5">Giriş Yap</h1>
    <br/>
    <div class="row justify-content-center">
        <div class="col-12">

        <?php
                    
                    if(isset($_POST["action"])){
                      $email = $_POST["email"];
                      $password = $_POST["password"];
          
                      $response = $dbh->query(
                        "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'"
                      )->fetch(PDO::FETCH_ASSOC);
          
                      if(!$response){
                        $message = "Hatalı Şifre veya E-Posta !";
                      } else {
                        // Oturumu burada açalım
                        $message = "Giriş Başarılı";
          
                        $_SESSION["auth"] = true;
                        $_SESSION["user"] = [
                          "id" => $response["id"],
                          "username" => $response["username"],
                          "email" => $response["email"],
                        ];
          
                        header("refresh:1; url=$base_url/index.php");
                      }
                    } 
                  
                  ?>

            <form class="shadow-lg p-3 mb-5 bg-body-tertiary rounded border border-primary-subtle" method="post">

            <?php include "../message.php"; ?>

                <div class="mb-3">
                    <label class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control">
                    <div class="form-text">E-postanızı asla başka biriyle paylaşmayacağız.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Şifre</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <button type="submit" name="action" class="btn btn-primary">Giriş Yap</button>
            </form>
        </div>
    </div>
</div>
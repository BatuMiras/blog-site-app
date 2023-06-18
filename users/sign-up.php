<?php include "../header.php"; ?>

<div class="container">
    <h1 class="mb-5">Kayıt Ol</h1>
    <br />
    <div class="row justify-content-center">
        <div class="col-12">

            <?php

                if(isset($_POST['action'])){

                    $username = $_POST["username"];
                    $email = $_POST["email"];
                    $password = $_POST["password"];

                    $action = $dbh->prepare(
                        "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");

                    if(!$username || !$email || !$password){
                        $message = "Formda Boş Alan Bırakamazsınız... Lütfen Tamamını Doldurunuz...";
                    } else {
                        $action->bindParam(':username', $username);
                        $action->bindParam(':email', $email);
                        $action->bindParam(':password', $password);

                        if($action->execute()){
                            $message = "Kaydınız Başarı ile Oluşturulmuştur.";
                        } else {
                            $message = "Kayıt Oluşturulurken Bir Hata Oluştu. Lütfen Tekrar Deneyiniz...";
                        }

                        header("refresh:1; url= $base_url/users/login.php");

                    }
                }


            ?>


            <form class="shadow-lg p-3 mb-5 bg-body-tertiary rounded border border-primary-subtle" method="post">

                    <?php include "../message.php"; ?>

                <div class="mb-3">
                    <label class="form-label">Kullanıcı Adı</label>
                    <input name="username" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">E-mail</label>
                    <input name="email" type="email" class="form-control">
                    <div class="form-text">E-postanızı asla başka biriyle paylaşmayacağız.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Şifre</label>
                    <input name="password" type="password" class="form-control">
                </div>
                <button type="submit" name="action" class="btn btn-primary">Kayıt Ol</button>
            </form>
        </div>
    </div>
</div>
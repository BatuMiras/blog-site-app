<?php include "../config.php"; ?>


<?php
  $_SESSION["auth"] = false;
  unset($_SESSION["user"]);

  header("refresh:1; url=$base_url/index.php");
?>
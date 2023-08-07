<?php require "header.php" ?>
<?php require "menu.php" ?>

<?php 
  unset($_SESSION["customer"]);
  unset($_SESSION["product"]);
  echo '<script>alert("成功登出");</script>';

  $url = "product.php";
  echo "<script type='text/javascript'>";
  echo "window.location.href='$url'";
  echo "</script>"; 
?>

<?php require "footer.php" ?>
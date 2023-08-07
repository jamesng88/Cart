<?php require "header.php" ?>
<?php require "menu.php" ?>

<?php
  $pdo=new PDO('mysql:host=localhost:3307;dbname=shop;charset=utf8','staff','password');
  $sql = $pdo->prepare("DELETE FROM favorite WHERE customer_id = ? AND product_id = ?");
  $sql->execute([$_SESSION['customer']['id'], $_REQUEST['id']]);

  $message = "商品已被移除";
  echo "<script>alert('$message');</script>"; 
  $url = "favorite.php";
  echo "<script type='text/javascript'>";
  echo "window.location.href='$url'";
  echo "</script>"; 
?>

<?php require "footer.php" ?>
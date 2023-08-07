<?php require "header.php" ?>
<?php require "menu.php" ?>

<?php
  $pdo=new PDO('mysql:host=localhost:3307;dbname=shop;charset=utf8','staff','password');
  foreach( $pdo->query("SELECT MAX(id) FROM purchase") as $row)
  {
    $purchaseId = $row["MAX(id)"] +1 ;
  }

  $sql = $pdo->prepare("INSERT INTO purchase VALUES (?,?)");
  if($sql->execute([$purchaseId, $_SESSION["customer"]["id"]]))
  {
    $sql = $pdo->prepare("INSERT INTO purchase_detail VALUES (?,?,?)");
    foreach($_SESSION["product"] as $product_id=>$product)
    {            
      $sql->execute([$purchaseId, $product_id, $product["count"]]);
      unset($_SESSION["product"][$product_id]);
    }   
  }
  echo '<script>alert("購買完成");</script>';
  $url = "record.php";
  echo "<script type='text/javascript'>";
  echo "window.location.href='$url'";
  echo "</script>"; 
?>

<?php require "footer.php" ?>
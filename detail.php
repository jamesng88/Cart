<?php require "header.php" ?>
<?php require "menu.php" ?>

<?php
  $pdo=new PDO('mysql:host=localhost:3307;dbname=shop;charset=utf8','staff','password');

  $sql = $pdo->prepare("SELECT * FROM product WHERE id = ? ");
$sql->execute([$_REQUEST["id"]]);
  foreach($sql->fetchAll() as $row)
  {
    echo '<p><img src="image/'.$row["id"].'.jpg"></p>';
    echo '<p>商品名稱： '.$row["name"].'</p>';
    echo '<p>價格：'.$row["price"].'</p>';
    echo '<form action="cart.php" method="post">';
    echo '<p>購買數量：<select name="count">';
    for($i=1; $i<=10; $i++)
      echo '<option value="'.$i.'">'.$i."</option>";
    echo '</select></p>';
    echo '<input type="hidden" name="name" value="'.$row["name"].'">';   
    echo '<input type="hidden" name="price" value="'.$row["price"].'">';   
    echo '<input type="hidden" name="id" value="'.$row["id"].'">';    
    echo '<a href="favorite.php?id='.$row["id"].'">加入我的最愛</a>';
    echo '&nbsp;&nbsp;';
    echo '<input type="submit" value="加入購物車">';
    echo '</form>';
  }
?>

<?php require "footer.php" ?>
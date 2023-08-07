<?php require "menu.php" ?>
<?php require "header.php" ?>


<?php
  if(isset($_SESSION['customer']))
  {
    $pdo=new PDO('mysql:host=localhost:3307;dbname=shop;charset=utf8','staff','password');

    if(isset($_REQUEST['id']))
    {
      $sql = $pdo->prepare("SELECT * FROM favorite WHERE customer_id=? AND product_id=?");
      $sql->execute([$_SESSION['customer']['id'], $_REQUEST['id']]);
      if(empty($sql->fetchAll()))
      {
        $sql = $pdo->prepare("INSERT INTO favorite VALUES (?,?)");
        $sql->execute([$_SESSION['customer']['id'], $_REQUEST['id']]);
      }
    }
  $sql = $pdo->prepare("SELECT * FROM favorite, product WHERE customer_id = ? AND product.id=favorite.product_id");
  $sql->execute([$_SESSION['customer']['id']]);

  echo '<table>
    <tr>
    <th>商品名稱</th>
    <th>價格</th>
    <th></th>
  </tr>';
  foreach($sql->fetchAll() as $row)
  {
    echo '<tr>';
    echo '<td><a class="productA" href="detail.php?id='.$row["id"].'" /a>'.$row['name'].'</td>';
    echo '<td>'.$row['price'].'</td>';
    echo '<td><a class="productA" href="delete.php?id='.$row["id"].'" /a>刪除</td>';
    echo '</tr>';
  }
  echo '</table>';
}
else
{
    echo '<script>alert("請先登入賬戶");</script>';
    $url = "login.php";
    echo "<script type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>"; 
}
?>

<?php require "footer.php" ?>
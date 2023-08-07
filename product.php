<?php require "header.php" ?>
<?php require "menu.php" ?>

<div>
  <form action="product.php" method="post">
      搜尋關鍵字:&nbsp;&nbsp;<input type="text" name="keyword"> 
      <input type="submit" value="提交" >
  </form>
</div>
<?php
$pdo=new PDO('mysql:host=localhost:3307;dbname=shop;charset=utf8','staff','password');

if(isset($_REQUEST['keyword']))
{
    $sql = $pdo->prepare("SELECT * FROM product WHERE name LIKE ? ");
    $sql->execute(['%'.$_REQUEST["keyword"].'%']);
}
else
{
    $sql = $pdo->prepare("SELECT * FROM product");
    $sql->execute([]);
}
echo '<table>
  <tr>
    <th>商品名稱</th>
    <th>價格</th>
  </tr>';

foreach($sql->fetchAll() as $row)
{
    echo '<tr>';
    echo '<td><a class="productA" href="detail.php?id='.$row["id"].'" /a>'.$row["name"].'</td>';
    echo '<td>'.$row["price"].'</td>';
    echo '</tr>';
}

?>


<?php require 'footer.php'?>
<?php require "header.php" ?>
<?php require "menu.php" ?>

<?php
  if(isset($_SESSION['customer']))
  {
    $pdo=new PDO('mysql:host=localhost:3307;dbname=shop;charset=utf8','staff','password');
    $sql = $pdo->prepare("SELECT * FROM purchase WHERE customer_id = ?");
    $sql->execute([$_SESSION["customer"]["id"]]);
    $total = 0;
    foreach($sql->fetchAll() as $row)
    {
      echo '<p>訂單編碼:&nbsp;'.$row['id'].'</p>';
      echo '<table>
        <tr>
        <th>商品名稱</th>
        <th>價格</th>
        <th>數量</th>
        <th>總計</th>
        </tr>';
      $sql = $pdo->prepare("SELECT * FROM purchase_detail, product WHERE purchase_id = ? AND purchase_detail.product_id = product.id");
      $sql->execute([$row["id"]]);
      foreach($sql->fetchAll() as $row)
      {
        echo '<tr>';   
        echo '<td><a class="productA" href="detail.php?id='.$row["id"].'" /a>'.$row['name'].'</td>';
        echo '<td>'.$row['price'].'</td>';
        echo '<td>'.$row['count'].'</td>';
        echo '<td>'.$row['price']*$row['count'].'</td>';
        echo '</tr>';
        $total += $row['price']*$row['count'];
      }
      echo '</table>'; 
      echo '<p style="margin:0px 10px;"> 總額:&nbsp;'.$total.'</p> <hr>';
    }    
  }
  else
  {
    echo '<alert>"請先登入賬戶"';
    $url = "login.php";
    echo "<script type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>"; 
  }
?>

<?php require "footer.php" ?>
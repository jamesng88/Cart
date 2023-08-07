<?php require "header.php" ?>
<?php require "menu.php" ?>

<?php
  if(isset($_SESSION['customer']))
  {
    if(!isset($_SESSION["product"]))
    {
      $_SESSION["product"] = [];
    }
  
  if(isset($_REQUEST['id']))
  {        
    $count = 0;
    $id = $_REQUEST['id'];
    if(isset($_SESSION['product'][$id]))
      $count = $_SESSION["product"][$id]["count"];
      $_SESSION['product'][$id]=[
        'name'=>$_REQUEST['name'], 
        'price'=>$_REQUEST['price'], 
        'count'=>$count+$_REQUEST['count']
        ];      
    }

    if(!empty($_SESSION["product"]))
    {
      $total = 0;
      echo '<table>
        <tr>
        <th>商品名稱</th>
        <th>價格</th>
        <th>購買數量</th>
        <th>小計</th>
        <th>商品鏈接</th>
        <th>刪除鏈接</th>
        </tr>';    
      foreach($_SESSION["product"] as $id=>$product)
      {
        echo '<tr>';
        echo '<td>'.$product['name'].'</td>';
        echo '<td>'.$product['price'].'</td>';
        echo '<td>'.$product['count'].'</td>';
        echo '<td>'.$product['price']*$product['count'].'</td>';
        echo '<td><a class="productA" href="detail.php?id='.$id.'" /a>詳情</td>';
        echo '<td><a class="productA" href="cart_delete.php?id='.$id.'" /a>刪除</td>';
        echo '</tr>';
        $total += $product['price']*$product['count'];
      }

      echo '</table>';
      echo '<p>總計:&nbsp;&nbsp;',$total;
      echo '<a href=purchase.php />結賬';
    }
    else
    {
      echo '<p>購物車空無一物</p>';
    }
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
<?php require "header.php" ?>
<?php require "menu.php" ?>

<?php 
  unset($_SESSION["customer"]);
  $pdo=new PDO('mysql:host=localhost:3307;dbname=shop;charset=utf8','staff','password');
  $sql = $pdo->prepare("SELECT * FROM customer WHERE login = ? AND password = ?");
  $sql->execute([$_REQUEST["username"], $_REQUEST["password"]]);
  foreach($sql->fetchAll() as $row)
  {    
    $_SESSION["customer"] = ['id'=>$row["id"], 'username'=>$row["login"], 
    'address'=>$row["address"], 'name'=>$row["name"]];
  }
  if(isset($_SESSION["customer"]))
  {
    $message = "歡迎". $_SESSION["customer"]["name"] ."登入";
    echo "<script>alert('$message');</script>"; 
  }
  else
  {
    echo '<script>alert("賬號或密碼錯誤，請重新嘗試");</script>';
  }

  $url = "product.php";
  echo "<script type='text/javascript'>";
  echo "window.location.href='$url'";
  echo "</script>"; 
?>

<?php require "footer.php" ?>
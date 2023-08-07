<?php require "header.php" ?>
<?php require "menu.php" ?>

<?php 
  $pdo=new PDO('mysql:host=localhost:3307;dbname=shop;charset=utf8','staff','password');
  $sql=$pdo->prepare('SELECT * FROM customer WHERE login=?');
  $sql->execute([$_REQUEST["username"]]);

  if(empty($sql->fetchAll()))
  {
    $sql=$pdo->prepare('INSERT INTO customer VALUES(null,?,?,?,?)');
    $sql->execute([$_REQUEST["name"],$_REQUEST["address"], 
    $_REQUEST["username"], $_REQUEST["password"]]);
    echo '<script>alert("注冊完成");</script>';
  }
  else
  {
    echo '<script>alert("已被注冊");</script>';
  }
?>
<?php require "footer.php" ?>
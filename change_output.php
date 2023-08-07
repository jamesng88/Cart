<?php require "header.php" ?>
<?php require "menu.php" ?>

<?php
$pdo=new PDO('mysql:host=localhost:3307;dbname=shop;charset=utf8','staff','password');
$sql = $pdo->prepare("SELECT * FROM customer WHERE login=? AND password=?");
$sql->execute([$_REQUEST['username'], $_REQUEST['oldP']]);
if(!empty($sql->fetchAll()))
{
  $sql = $pdo->prepare("UPDATE customer SET name=?, address=?, login=?, password=? WHERE id=?");
  $sql->execute([$_REQUEST['name'], $_REQUEST['address'], $_REQUEST['username'], $_REQUEST['newP'], $_REQUEST['id']]);
  $_SESSION["customer"]['username'] = $_REQUEST['username'];
  $_SESSION["customer"]['address'] = $_REQUEST['address'];
  $_SESSION["customer"]['name'] = $_REQUEST['name'];
  echo '<script>alert("修改成功")</script>';
}
else
{
  echo '<script>alert("密碼錯誤，請重新嘗試")</script>';
}
$url = 'change.php';
echo '<script>window.location.href="'.$url.'"</script>';
?>
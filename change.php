<?php require "header.php" ?>
<?php require "menu.php" ?>

<?php
  echo '<form action="change_output.php" method="post" style>
    <div width=20px display:inline-block;>ID:&nbsp;&nbsp;</div><input type=text name=id value="'.$_SESSION["customer"]["id"].'" readonly><br>
    <div width=20px display:inline;>姓名:&nbsp;</div><input type=text name=name value="'.$_SESSION["customer"]["name"].'"><br>
    <div width=20px display:inline;>賬號:&nbsp;</div><input type=text name=username value="'.$_SESSION["customer"]["username"].'"><br>
    <div width=20px display:inline;>地址:&nbsp;</div><input type=text name=address value="'.$_SESSION["customer"]["address"].'"><br>
    <div width=20px display:inline;>舊密碼:&nbsp;</div><input type=text name=oldP value=><br>
    <div width=20px display:inline;>新密碼:&nbsp;</div><input type=text name=newP value=><br>
    <input type=submit value="送出">
    </form>
  ';
/*
$_SESSION["customer"] = ['id'=>$row["id"], 'username'=>$row["login"], 
'address'=>$row["address"], 'name'=>$row["name"]];
*/

?>
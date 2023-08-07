<?php require "header.php" ?>
<?php require "menu.php" ?>

<form action="register_output.php" method="post">
賬號 <input type="text" name="username" value=""><br>
密碼 <input type="password" name="password" value=""><br>
地址 <input type="text" name="address" value=""><br>
姓名 <input type="text" name="name" value=""><br>
<input type="submit" value="提交">
</form>

<?php require "footer.php" ?>
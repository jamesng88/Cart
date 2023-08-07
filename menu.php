
<a class="menu" href="product.php">商品</a>
<a class="menu" href="cart.php">購物車</a>
<a class="menu" href="favorite.php">我的最愛</a>
<a class="menu" href="record.php">購買記錄</a>
<?php
  if(isset($_SESSION['customer'])) {?>
<a class="menu" href="change.php">修改密碼</a>
<a class="menu" href="logout.php">登出</a>
<?php } else  { ?>
<a class="menu" href="register.php">注冊</a>
<a class="menu" href="login.php">登入</a>
<?php } ?>
<?php require "header.php" ?>
<?php require "menu.php" ?>

<?php
    unset($_SESSION["product"][$_REQUEST["id"]]);
    $message = "商品已被移除";
    echo "<script>alert('$message');</script>"; 
    $url = "cart.php";
    echo "<script type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>"; 
?>

<?php require "footer.php" ?>
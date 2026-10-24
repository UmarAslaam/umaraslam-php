<?php
require_once("../config/connection.php");
session_start();


if (!isset($_SESSION['role']) || $_SESSION['role']!="user") {
  echo "<script>location.href='../userPanel/login.php'</script>";
}
if (isset($_POST['addtocart'])) {
    $qty = $_POST['qty'];
    $product_id = $_POST['product_id'];
    $price = $_POST['price'];
    $user_id = $_SESSION['user_id'];
    $total = $price * $qty;
    }
    $checkProduct = "SELECT * FROM cart where product_id = $product_id and user_id = $user_id";
    $checkProductResult = mysqli_query($connection,$checkProduct);
    if (mysqli_num_rows($checkProductResult) > 0) {
        $cartdata = mysqli_fetch_assoc($checkProductResult);
        $newQty = $qty + $cartdata['qty'];
        $newTotal = $price * $newQty;

        // Update
        $updateCart = "UPDATE `cart` SET `qty`=$newQty,`total`=$newTotal WHERE product_id = $product_id and user_id = $user_id";
        $result = mysqli_query($connection,$updateCart);
         if ($result) {
            echo "<script>alert('Product added to cart!')
            location.href='./index.php'</script>";
        }
        else{
            echo "<script>alert('Failed to add to cart!')
            location.href='./index.php'</script>";
        }
    } else {
        $addtocart = "INSERT INTO `cart`(`user_id`, `product_id`, `qty`, `total`) VALUES ('$user_id','$product_id','$qty','$total')";
        $result = mysqli_query($connection,$addtocart);
        if ($result) {
            echo "<script>alert('Product added to cart!')
            location.href='./index.php'</script>";
        }
        else{
            echo "<script>alert('Failed to add to cart!')
            location.href='./index.php'</script>";
        }
        }   
?>
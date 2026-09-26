<?php
require_once("../config/connection.php");

// Check ki ID aayi hai ya nah
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  // echo $id;
  
    // Image ka naam database se nikalo
    $getImage = mysqli_query($connection, "SELECT image FROM products WHERE product_id = $id");
    $productImage = mysqli_fetch_assoc($getImage);

     // Product delete karo
    $deleteProduct = "DELETE FROM products WHERE product_id = $id";
    $result = mysqli_query($connection, $deleteProduct);
 
  if ($result) {

    // Uploads folder se image delete karo
        if (!empty($productImage['image'])) {
          // unlink() file ko folder se delete kar deta hai
            unlink("./uploads/" . $productImage['image']);
        }
      echo "<script>alert('Product deleted successfully')
          location.href='./products.php';
        </script>";
  }
  else{
      echo "<script>alert('Failed to delete product')
          location.href='./products.php';
        </script>";
  }
}
else{
  echo "<script>alert('No id Found')
          location.href='./products.php';
        </script>";
}
 ?>
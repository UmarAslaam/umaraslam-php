<?php 
include_once("./components/header.php");
include_once("../config/connection.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $edit = "SELECT * FROM `products` where product_id = $id";
    $result = mysqli_query($connection,$edit);
    $row = mysqli_fetch_assoc($result);

?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Edit Products
            </h3>
          </div>
          <div class="row grid-margin">
               <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Product Detail</h4>
                 
                  <form class="forms-sample" action="" method="post">
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" required name="title" id="title" placeholder="Enter product title" value="<?= $row['title'] ?>">
                    </div>

                    <div class="form-group">
                      <label for="price">Price</label>
                      <input type="text" class="form-control" required name="price" id="price" placeholder="Enter product price" value="<?= $row['price'] ?>">
                    </div>

                    <div class="form-group">
                      <label for="stock">Stock</label>
                      <input type="text" class="form-control" required name="stock" id="stock" placeholder="Enter product stock" value="<?= $row['stock'] ?>">
                    </div>

                    <div class="form-group">
                      <label for="image">Image</label>
                      <input type="text" class="form-control" required name="image" id="image" placeholder="Upload product image" value="<?= $row['image'] ?>">
                    </div>
                
                    <div class="form-group">
                      <label for="cat_id">Category</label>
                        <select class="form-control" required name="cat_id" id="cat_id" placeholder="Enter category">
                            <option selected disabled>Select Category</option>
                            <?php
                            $getCategories = "SELECT * FROM `categories`";
                            $getCategoriesresult = mysqli_query($connection,$getCategories);
                            if(mysqli_num_rows($getCategoriesresult)> 0){
                              while($row1= mysqli_fetch_assoc($getCategoriesresult)){
                                ?>
                                <!-- <option value="<?= $row1['cat_id'] ?>"><?= $row1['cat_name'] ?></option> -->
                                 <option value="<?= $row1['cat_id'] ?>" <?= ($row1['cat_id'] == $row['cat_id']) ? 'selected' : '' ?> > <?= $row1['cat_name'] ?> </option>
                                <?php
                              }
                            } 
                            ?>
                        </select>
                    </div>
                    
                    <!-- <div class="form-group">
                      <label>File upload</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div> -->
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea class="form-control" required name="description" id="description" rows="4"  placeholder="Enter Product description"><?= $row['description'] ?></textarea>
                    </div>
                    <button type="submit" name="updateProduct" class="btn btn-primary mr-2">Update</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="far fa-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
   <?php
   include_once("./components/footer.php");

   if(isset($_POST['updateProduct'])){
    $title = $_POST['title'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $image = $_POST['image'];
    $cat_id = $_POST['cat_id'];
    $description = $_POST['description'];

    $update = "UPDATE `products` SET `title`='$title',`description`='$description',`price`='$price',`stock`='$stock',`image`='$image',`cat_id`='$cat_id' WHERE product_id=$id";

    $result = mysqli_query($connection,$update);
    if($result){
        echo"<script>alert('Product Updated successfully')
         window.location.href='./products.php'
        </script>";
    }
    else{
          echo"<script>alert('Failed to Update product')
        </script>";

    }

   }

   }
else{
        echo"<script>alert('No id found')
location.href='./products.php';
</script>
";
}
?>

   
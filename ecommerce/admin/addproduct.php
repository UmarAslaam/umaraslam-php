<?php 
include_once("./components/header.php");
include_once("../config/connection.php");
?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Add Products
            </h3>
          </div>
          <div class="row grid-margin">
               <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Enter Product Detail</h4>
                 
                  <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" required name="title" id="title" placeholder="Enter product title">
                    </div>

                    <div class="form-group">
                      <label for="price">Price</label>
                      <input type="text" class="form-control" required name="price" id="price" placeholder="Enter product price">
                    </div>

                    <div class="form-group">
                      <label for="stock">Stock</label>
                      <input type="text" class="form-control" required name="stock" id="stock" placeholder="Enter product stock">
                    </div>

                    <!-- <div class="form-group">
                      <label for="image">Image</label>
                      <input type="text" class="form-control" required name="image" id="image" placeholder="Upload product image">
                    </div> -->
                
                    <div class="form-group">
                      <label for="cat_id">Category</label>
                        <select class="form-control" required name="cat_id" id="cat_id" placeholder="Enter category">
                            <option selected disabled>Select Category</option>
                            <?php
                            $getCategories = "SELECT * FROM `categories`";
                            $getCategoriesresult = mysqli_query($connection,$getCategories);
                            if(mysqli_num_rows($getCategoriesresult)> 0){
                              while($row= mysqli_fetch_assoc($getCategoriesresult)){
                                ?>
                                <option value="<?= $row['cat_id'] ?>"><?= $row['cat_name'] ?></option>
                                <?php
                              }
                            } 
                            ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                      <label>File upload</label>
                      <input type="file" name="img" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea class="form-control" required name="description" id="description" rows="4"  placeholder="Enter Product description"></textarea>
                    </div>
                    <button type="submit" name="addProduct" class="btn btn-primary mr-2">Submit</button>
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

   if(isset($_POST['addProduct'])){
    $title = $_POST['title'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    // $image = $_POST['image'];
    $cat_id = $_POST['cat_id'];
    $description = $_POST['description'];
    $allowedTypes = ['image/png','image/jpg','image/jpeg','image/web','image/gif','image/jfif'];
    
    echo "<pre>";
     print_r($_FILES['img']);
     echo "</pre>";
    
    //  Image is present or not
     if ($_FILES['img']['error']==4) {
      echo"<script>alert('Plz select image first')</script>";
     }

    //  Image is valid or not
    else if ($_FILES['img']['size']==2000000) {
      echo"<script>alert('File is too large plz upload file is less then 2 MB')</script>";
     }
     //  Image type check
    else if (!in_array($_FILES['img']['type'],$allowedTypes)){
      echo"<script>alert('File type is not supported plz slect file type png,jpg,jpeg,jif,web')</script>";
     }
     else {
        //  echo"<script>alert('ab thk hy')</script>";
        $imageName = uniqid() . '_' . $_FILES['img']['name'];
        
        $add = "INSERT INTO `products`(`title`, `description`, `price`, `stock`, `image`, `cat_id`) VALUES ('$title','$description','$price','$stock','$imageName','$cat_id')";

        $result = mysqli_query($connection,$add);
        if($result){
          move_uploaded_file($_FILES['img']['tmp_name'],"uploads/".$imageName); 
          
            echo"<script>alert('Product add successfully')
            window.location.href='./products.php'
            </script>";
        }
        else{
              echo"<script>alert('Failed to add product')
            </script>";

        }
        }



   }
   ?>
<!-- File uplaod scripts start -->
<script src="./js/file-upload.js"></script>
<!-- File uplaod scripts end -->

   
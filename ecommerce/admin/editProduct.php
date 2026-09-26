<?php 
 include_once("./components/header.php");
 include_once("../config/connection.php");

 if (isset($_GET['id'])) {
  $id = $_GET['id'];
  // echo $id;
  $edit = "SELECT * FROM `products` WHERE product_id = $id;";
  $editresult = mysqli_query($connection,$edit);
  $row = mysqli_fetch_assoc($editresult);
 ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
            Edit Prdouct
            </h3>
          </div>
          <div class="row grid-margin">
               <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Product Detail</h4>
                 
                  <form class="forms-sample" action="" method="post"  enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" required class="form-control" name ="title" id="title" placeholder="Enter Product Title" value="<?= $row['title']?>">
                    </div>

                    <div class="form-group">
                      <label for="price">Price</label>
                      <input type="number" required class="form-control" name ="price" id="price" placeholder="Enter Product Price" value="<?= $row['price']?>">
                    </div>

                     <div class="form-group">
                      <label for="stock">Stock</label>
                      <input type="number" required class="form-control" name ="stock" id="stock" placeholder="Enter Product stock" value="<?= $row['stock']?>">
                    </div>

                    <div class="form-group">
                      <label for="cat_id">Gender</label>
                        <select class="form-control" required name="cat_id" id="cat_id">
                          <option selected disabled>Select Category</option>
                          <?php
                          $showCategories = "SELECT * FROM `categories` ";
                          $categoriesResult = mysqli_query($connection,$showCategories);
                            while ($categoryRow= mysqli_fetch_assoc($categoriesResult)) {
                          ?>
                          <option value="<?= $categoryRow['cat_id'] ?>" <?=$categoryRow['cat_id']== $row['cat_id'] ? 'selected' : '' ?> ><?= $categoryRow['cat_name'] ?></option>
                              <?php
                          }
                          ?>
                        </select>
                      </div>

                  <div class="form-group"> 
                    <label>File upload</label>
                    <input type="file" name="image" class="file-upload-default" id="imageInput" accept="image/*">
                    <div class="input-group col-xs-12"> 
                      <!-- Yahan purani image ka naam show hoga -->
                      <input type="text" class="form-control file-upload-info" value="<?= $row['image'] ?>" disabled placeholder="Upload Image">
                      <span class="input-group-append"> 
                        <button class="file-upload-browse btn btn-primary" type="button">
                          Upload
                        </button> 
                      </span> 
                    </div> 
                      <!-- Purani Image Preview -->
                    <div class=" mt-3">
                      <img id="imagePreview" src="./uploads/<?= $row['image'] ?>" width="80" height="80" style="object-fit: cover;">
                    </div>
                  </div>               

                    <!-- <div class="form-group">
                      <label>File upload</label>
                      <input type="file" name="image" class="file-upload-default" value="<?= $row['image']?>"> 
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                     </div> -->
                    
                  
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea class="form-control" required name="description" id="description" rows="4"  placeholder="Enter Product description"><?= $row['description']?></textarea>
                    </div>

                    <button type="submit" name="updateProduct" class="btn btn-primary mr-2">Update</button>
                    <a href="./products.php" class="btn btn-light">Cancel</a>
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
 if (isset($_POST['updateProduct'])) {

  $title = $_POST['title'];
  $price = $_POST['price'];
  $stock = $_POST['stock'];
  $cat_id = $_POST['cat_id'];
  $description = $_POST['description'];

  // Image handling
  $image = $row['image'];

  if (!empty($_FILES['image']['name'])) {

      // old image delete
      if (file_exists("./uploads/" . $row['image'])) {
      unlink("./uploads/" . $row['image']);
      }

      // new image name
      $image = uniqid() . '_' . $_FILES['image']['name'];

      // new image upload
      move_uploaded_file($_FILES['image']['tmp_name'],"./uploads/" . $image);
  }


  $updateProduct = "UPDATE `products` SET `title`='$title',`price`='$price',`stock`='$stock',`image`='$image',`cat_id`='$cat_id',`description`='$description' WHERE product_id=$id;";

  $updateProductResult = mysqli_query($connection,$updateProduct);
  if ($updateProductResult) {
    echo "<script>
            alert('Product Updated successfully')
            window.location.href='./products.php'
          </script>";
  }
  else{
    "<script>
      alert('Failed to Update product')
    </script>";
  }
 }

}
else{
  echo "<script>alert('No id Found')
          location.href='./products.php';
        </script>";
}
  ?>
  <!-- New image show script start -->
   <script>
  document.getElementById('imageInput').addEventListener('change', (e)=> {

      let image = document.getElementById('imagePreview');

      if(e.target.files[0]) {
          image.src = URL.createObjectURL(e.target.files[0]);
      }

  });
  </script>
  <!-- New image show script end -->
   
  <!-- File uplaod scripts start -->
  <script src="./js/file-upload.js"></script>
  <!-- File uplaod scripts end -->
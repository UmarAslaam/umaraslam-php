```php
<?php

// Header include
include_once("./components/header.php");

// Database connection
include_once("../config/connection.php");


// ------------------------------------
// STEP 1: Product ID URL se lena
// ------------------------------------

if (isset($_GET['id'])) {

    $product_id = $_GET['id'];

} else {

    // Agar ID nahi mili
    echo "Product ID not found!";
    exit;
}


// ------------------------------------
// STEP 2: Database se product lena
// ------------------------------------

$getProduct = "SELECT * FROM products AS p
               INNER JOIN categories AS c
               ON p.cat_id = c.cat_id
               WHERE p.product_id = $product_id";

$result = mysqli_query($connection, $getProduct);


// ------------------------------------
// STEP 3: Check product mila ya nahi
// ------------------------------------

if (mysqli_num_rows($result) > 0) {

    // Product ka data lena
    $row = mysqli_fetch_assoc($result);

} else {

    echo "Product not found!";
    exit;
}

?>

<!-- Main Panel -->
<div class="main-panel">

    <!-- Content Wrapper -->
    <div class="content-wrapper">

        <!-- Page Header -->
        <div class="page-header">

            <h3 class="page-title">
                Product Details
            </h3>

        </div>


        <!-- Product Card -->
        <div class="row">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-body">

                        <h4 class="card-title">
                            Product Details
                        </h4>


                        <!-- Product Image -->
                        <div class="text-center mb-4">

                            <img src="./uploads/<?= $row['image'] ?>" alt="Product Image" height="200" width="200" class="rounded">

                        </div>


                        <!-- Product ID -->
                        <h5>
                            Product ID:
                            <span class="text-primary">
                                <?= $row['product_id'] ?>
                            </span>
                        </h5>

                        <hr>


                        <!-- Title -->
                        <h5>
                            Title:
                            <span>
                                <?= $row['title'] ?>
                            </span>
                        </h5>

                        <hr>


                        <!-- Description -->
                        <h5>
                            Description:
                        </h5>

                        <p>
                            <?= $row['description'] ?>
                        </p>

                        <hr>


                        <!-- Price -->
                        <h5>
                            Price:
                            <span class="text-success">
                                Rs. <?= $row['price'] ?>
                            </span>
                        </h5>

                        <hr>


                        <!-- Stock -->
                        <h5>
                            Stock:
                            <span class="text-info">
                                <?= $row['stock'] ?>
                            </span>
                        </h5>

                        <hr>


                        <!-- Category -->
                        <h5>
                            Category:
                            <span class="badge badge-primary">
                                <?= $row['cat_name'] ?>
                            </span>
                        </h5>

                        <hr>


                        <!-- Created At -->
                        <h5>
                            Created At:
                            <span class="text-muted">
                                <?= $row['created_at'] ?>
                            </span>
                        </h5>

                        <br>


                        <!-- Back Button -->
                        <a
                            href="./products.php"
                            class="btn btn-primary"
                        >
                            Back to Products
                        </a>


                        <!-- Edit Button -->
                        <a
                            href="./editProduct.php?id=<?= $row['product_id'] ?>"
                            class="btn btn-warning"
                        >
                            Edit Product
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<?php

// Footer include
include_once("./components/footer.php");

?>
```

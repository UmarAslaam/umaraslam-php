<?php
include("./components/header.php")
?>

<main>
<h1 class="text-center">This is a Home Page</h1>
<!-- Main Hero Section -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center min-vh-75">

      <!-- Left Content -->
      <div class="col-lg-6 text-center text-lg-start">
        <span class="badge bg-primary mb-3">Welcome</span>

        <h1 class="display-4 fw-bold mb-3">
          Build Something <span class="text-primary">Amazing</span>
        </h1>

        <p class="lead text-secondary mb-4">
          Create modern, responsive and beautiful websites using Bootstrap.
          Fast, simple and mobile-friendly.
        </p>

        <div class="d-flex gap-3 justify-content-center justify-content-lg-start">
          <a href="#" class="btn btn-primary btn-lg px-4">
            Get Started
          </a>

          <a href="#" class="btn btn-outline-dark btn-lg px-4">
            Learn More
          </a>
        </div>
      </div>

      <!-- Right Image -->
      <div class="col-lg-6 mt-5 mt-lg-0 text-center">
        <img
          src="https://via.placeholder.com/600x450"
          alt="Hero Image"
          class="img-fluid rounded-4 shadow"
        >
      </div>

    </div>
  </div>
</section>

</main>


<?php
include("./components/footer.php")
?>


<!doctype html>
<html lang="en">

<head>
    <title>University project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="css/main.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100" style="background-color: #fff;">
    <!-- start every .php file with this -->
    <?php
    session_start();

    ?>

    <!-- Header -->
    <?php
    include("php/generators/header.php");
    headerPrint();

    ?>

    <!-- Navigation -->
    <?php
    include("php/generators/navigation.php");
    navPrint();

    ?>
    <!-- PAGE CODE GOES UNDER HERE -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/banner1.jpg" class="d-block w-100 img-fluid carimg" alt="kazah">
      </div>
      <div class="carousel-item">
        <img src="img/banner2.jpg" class="d-block w-100 img-fluid carimg" alt="raiden">
      </div>
      <div class="carousel-item">
        <img src="img/banner3.jpg" class="d-block w-100 img-fluid carimg" alt="yoma">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  
  <!----------------------------------------------------------------------->
  <!--BODY----------------------------------------------------------------->
  <!----BEST BUILDS------------------------------------------------------------------->
  <div class="conteiner-fluid">
    <h1 class="text-center mb-1">Check our pre-builds</h1>
    <hr class="w-75 mx-auto">
    <div class="row g-0">
      <div class="col mx-auto">
        <div class="card mx-auto mb-4" style="width: 18rem;">
          <img src="img/intel_amd.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">$build_name</h5>
            <p class="card-text">$cpu_name<br>$gpu_name<br>$ram
            </p>
            <a href="#" class="btn btn-outline-dark">Check build</a>
          </div>
        </div>
      </div>
      <div class="col mx-auto">
        <div class="card mx-auto mb-4" style="width: 18rem;">
          <img src="img/intel_amd.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">$build_name</h5>
            <p class="card-text">$cpu_name<br>$gpu_name<br>$ram
            </p>
            <a href="#" class="btn btn-outline-dark">Check build</a>
          </div>
        </div>
      </div>
      <div class="col mx-auto">
        <div class="card mx-auto mb-4" style="width: 18rem;">
          <img src="img/intel_amd.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">$build_name</h5>
            <p class="card-text">$cpu_name<br>$gpu_name<br>$ram
            </p>
            <a href="#" class="btn btn-outline-dark">Check build</a>
          </div>
        </div>
      </div>
      <div class="col mx-auto">
        <div class="card mx-auto mb-4" style="width: 18rem;">
          <img src="img/intel_amd.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">$build_name</h5>
            <p class="card-text">$cpu_name<br>$gpu_name<br>$ram
            </p>
            <a href="#" class="btn btn-outline-dark">Check build</a>
          </div>
        </div>
      </div>
    </div>
  </div>
    
    <!-- Footer -->
    <?php
    include("php/generators/footer.php");
    footerPrint();
    ?>

    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
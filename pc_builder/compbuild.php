<!doctype html>
<html lang="en">

<head>
    <title>Completed builds</title>
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
    <div class="conteiner-fluid">
        <div class="conteiner">
            <h1 class="text-center my-3">Completed build from our users</h1>
            <hr class="w-75 mx-auto">
            <div class="row gx-0">
                <div class="col">
                    <div class="card mx-auto mb-4" style="width: 18rem;">
                        <img src="img/intel_nvidia.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">$build_name</h5>
                            <p class="card-text">$cpu_name<br>$gpu_name<br>$ram
                            </p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mx-auto mb-4" style="width: 18rem;">
                        <img src="img/intel_amd.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">$build_name</h5>
                            <p class="card-text">$cpu_name<br>$gpu_name<br>$ram
                            </p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mx-auto mb-4" style="width: 18rem;">
                        <img src="img/amd_nvidia.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">$build_name</h5>
                            <p class="card-text">$cpu_name<br>$gpu_name<br>$ram
                            </p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mx-auto mb-4" style="width: 18rem;">
                        <img src="img/amd_amd.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">$build_name</h5>
                            <p class="card-text">$cpu_name<br>$gpu_name<br>$ram
                            </p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
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
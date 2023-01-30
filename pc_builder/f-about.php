<!doctype html>
<html lang="en">

<head>
    <title>About us</title>
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
    <div class="container-fluid">
        <div class="container my-5">
            <img class="img-thumbnail float-sm-start me-2 mb-2" src="img/capy.png">
            <p>Welcome to our website, where you'll find all the information you need to build your dream desktop PC. We
            understand that building a custom PC can be a daunting task, especially for those who are new to the
            process. That's why we've created this website to make the process as easy and straightforward as possible.</p>
            
        <p>Our website features a comprehensive list of components for building a desktop PC, including CPUs, GPUs,
            motherboards, RAM, storage, and power supplies. Each component is accompanied by detailed specifications and
            reviews from experts in the field. Our website also features a PC building guide, which takes you through
            the process step-by-step and helps you choose the best components for your budget and performance needs.</p>
            
        <p>In addition, our website also offers a unique feature that allows you to compare and contrast different
            components side by side, so you can make an informed decision before making a purchase.</p>
            
        <p> We also understand the importance of staying up-to-date with the latest technology, that's why we regularly
            update our website with the newest components and technologies on the market.</p>
            
        <p>Our goal is to provide you with all the information and tools you need to build a high-performance and
            reliable desktop PC. We hope you find our website useful and informative. Happy building!
            Please keep in mind that this is a sample text and would need to be customized to your specific business and
            website.</p>
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
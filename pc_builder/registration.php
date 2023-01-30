<!doctype html>
<html lang="en">

<head>
    <title>Registration</title>
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

    <!-- Main content -->

    <div class="container col-md-4 mt-5">

        <h1 class="text-center">Registration</h1>

        <form action="php/scripts/sc_create_user.php" method="POST">

            <!-- Nickname input -->
            <div class="form-group offset-md-1 col-md-10 mb-4 mt-4">
                <p><label for="nickname">Nickname</label><input type="text" name="nickname" id="nickname" class="form-control mt-1" placeholder="Nickname" required></p>
            </div>

            <!-- Name input -->
            <div class="form-group offset-md-1 col-md-10 mb-4 mt-4">
                <p><label for="name">Name</label><input type="text" name="name" id="name" class="form-control mt-1" placeholder="name" required></p>
            </div>

            <!-- Email input -->
            <div class="form-group offset-md-1 col-md-10 mb-4 mt-4">
                <p><label for="login">Email</label><input type="email" name="email" id="email" class="form-control mt-1" placeholder="Email" required></p>
            </div>

            <!-- Password input -->
            <div class="form-group offset-md-1 col-md-10 mb-4 mt-4">
                <p><label for="haslo">Password</label><input type="password" name="haslo" id="haslo" class="form-control mt-1" placeholder="Password" required></p>
            </div>

            <!-- Submit button -->
            <p><input type="submit" class="btn btn-primary offset-md-3 col-md-6 mb-4 mt-4 py-2" value="Register"></p>

            <!-- Login button -->
            <div class="text-center">
                <p class="pl-1">Already have an account? <a href="login.php">Sign in</a></p>
            </div>

        </form>

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
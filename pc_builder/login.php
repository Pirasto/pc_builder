<!doctype html>
<html lang="en">

<head>
    <title>Log In</title>
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
        <h1 class="text-center">Log in</h1>

        <?php
        if (isset($_SESSION['LogError'])) {
            if ($_SESSION['LogError']) {
                echo "<p class=\"blink_false text-center p-1 mx-auto\">Error while logging in</p>";
                $_SESSION['LogError'] = false;
            }
        }

        if (isset($_SESSION['Register'])) {
            if ($_SESSION['Register']) {
                echo "<p class=\"blink_true text-center p-1 mx-auto\">Registration successfull</p>";
                $_SESSION['Register'] = false;
            }
        } else {
            $_SESSION['Register'] = false;
        }
        ?>
    
        <form action="php/scripts/sc_login.php" method="POST">

            <!-- Email input -->
            <div class="offset-md-1 col-md-10 form-outline mb-4 mt-4">
                <label class="form-label">Email</label>
                <input type="email" name="emailuser" id="emailuser" class="form-control" required />
            </div>

            <!-- Password input -->
            <div class="offset-md-1 col-md-10 form-outline mb-4">
                <label class="form-label">Password</label>
                <input type="password" name="passworduser" id="passworduser" class="form-control" required />
            </div>
            
            <!-- Submit button -->
            <p><input type="submit" class="btn btn-primary offset-md-3 col-md-6 mb-4 mt-4 py-2" value="Log in"></p>

            <!-- Register button -->
            <div class="text-center">
                <p class="pr-5">Don't have account yet? <a href="registration.php">Sign up</a></p>
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
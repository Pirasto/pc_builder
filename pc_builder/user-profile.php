<!doctype html>
<html lang="en">

<title>My Profile</title>
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
    if(!$_SESSION['Logged']){
        header("Location: login.php");
    }

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
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-9">
                <h1 class="text-center mt-3">My builds</h1>
                <hr class="w-75 mx-auto">
                <div class="row">
                    <?php
                    include("php/scripts/sc_dbconnect.php");

                    $user_id = $_SESSION['Logged_user_id'];

                    $mysqli = dbconnect();

                    $result=$mysqli->query("SELECT COUNT(*) as amount FROM build where user_id_user =".$user_id);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $b_amount = $row['amount'];
                        }
                    }

                    $i = $b_amount;
                    if($b_amount<3){

                    $result=$mysqli->query("SELECT
                    b.id_build, b.build_name
                    FROM
                    `build` b
                    WHERE
                    b.user_id_user= ".$user_id);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class=\"col\">
                                    <div class=\"card mb-4 mx-auto\" style=\"width: 18rem;\">
                                        <img src=\"img/empty_build.png\" class=\"card-img-top\" alt=\"...\">
                                        <div class=\"card-body\">
                                            <h5 class=\"card-title\">".$row['build_name']."</h5>
                                            <form action=\"php/scripts/sc_select_build_to_edit.php\" method=\"POST\">
                                            <input type=\"hidden\" id=\"build_id\" name=\"build_id\" value=\"".$row['id_build']."\">
                                            <button type=\"submit\" class=\"btn btn-primary btn-sm\">Edit Build</button>
                                            <form>
                                        </div>
                                    </div>
                                </div> 
                            ";
                        }
                    }

                        for($i; $i<3; $i++){
                            echo "<div class=\"col\">
                                    <div class=\"card mb-4 mx-auto\" style=\"width: 18rem;\">
                                        <img src=\"img/empty_build.png\" class=\"card-img-top\" alt=\"...\">
                                        <div class=\"card-body\">
                                            <h5 class=\"card-title\">Create new build</h5>
                                            </p>
                                            <a href=\"php/scripts/sc_create_blank_build.php\" class=\"btn btn-primary\">Create build</a>
                                        </div>
                                    </div>
                                </div> 
                            ";
                        };
                    }else{
                    $result=$mysqli->query("SELECT
                    b.id_build, b.build_name
                    FROM
                    `build` b
                    WHERE
                    b.user_id_user= ".$user_id);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class=\"col\">
                                    <div class=\"card mb-4 mx-auto\" style=\"width: 18rem;\">
                                        <img src=\"img/empty_build.png\" class=\"card-img-top\" alt=\"...\">
                                        <div class=\"card-body\">
                                            <h5 class=\"card-title\">".$row['build_name']."</h5>
                                            <form action=\"php/scripts/sc_select_build_to_edit.php\" method=\"POST\">
                                            <input type=\"hidden\" id=\"build_id\" name=\"build_id\" value=\"".$row['id_build']."\">
                                            <button type=\"submit\" class=\"btn btn-primary btn-sm\">Edit Build</button>
                                            </form>
                                        </div>
                                    </div>
                                </div> 
                            ";
                        }
                        echo "<div class=\"col\">
                                    <div class=\"card mb-4 mx-auto\" style=\"width: 18rem;\">
                                        <img src=\"img/empty_build.png\" class=\"card-img-top\" alt=\"...\">
                                        <div class=\"card-body\">
                                            <h5 class=\"card-title\">Create new build</h5>
                                            </p>
                                            <a href=\"php/scripts/sc_create_blank_build.php\" class=\"btn btn-primary\">Create build</a>
                                        </div>
                                    </div>
                                </div> 
                            ";
                    }
                    }

                    ?>
                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 order-first order-sm-last">
                <div class="card mx-auto my-5" style="width: 18rem;">
                    <img src="img/profile.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">My info</h5>
                        <hr>
                        <?php

                        $mysqli = dbconnect();
                        
                        $user_id = $_SESSION['Logged_user_id'];

                        $result=$mysqli->query("
                        SELECT user_name, login, email
                        FROM `user` 
                        WHERE id_user = ".$user_id.";");

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $name = $row['user_name'];
                                $nname = $row['login'];
                                $email = $row['email'];
                            }
                        }
                        

                        echo "<p class=\"card-text\"><b>$name</b><br>$nname<br>$email</p>";
                        ?>
                        
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
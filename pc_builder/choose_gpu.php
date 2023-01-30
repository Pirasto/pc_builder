<!doctype html>
<html lang="en">

<head>
    <title>Choose GPU</title>
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
        <div class="row">
            <div class="col-2 mt-3">
                <form action="" class="px-2">
                    <h5>Filters</h5>
                    <hr>
                    <h6>Sort by</h6>
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option selected>Default sorting</option>
                        <option value="1">By price from low to high</option>
                        <option value="2">By price from high to low</option>
                        <option value="3">By alphabet A-Z</option>
                        <option value="4">By alphabet Z-A</option>
                    </select>
                    <h6 class="mt-2">Price range</h6>
                    <label for="customRange3" class="form-label">Example range</label>
                    <input type="range" class="form-range" min="1" max="999" step="1" id="customRange3">
                    <h6 class="mt-2">Checkbox</h6>
                    <div class="checkbox">
                        <label><input type="checkbox" value=""> Value 1</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value=""> Value 2</label>
                    </div>
                    <div class="checkbox disabled">
                        <label><input type="checkbox" value="" disabled> Value 3</label>
                    </div>
                    <h6 class="mt-2">Radio</h6>
                    <div class="radio">
                        <label><input type="radio" name="optradio" checked> Value 1</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="optradio"> Value 2</label>
                    </div>
                    <div class="radio disabled">
                        <label><input type="radio" name="optradio" disabled> Value 3</label>
                    </div>
                    <button class="btn btn-primary btn-sm mt-4" type="submit">Apply filters</button>
                </form>

            </div>

            <!-- ELEMENT LIST -->
            <div class="col-10 mt-3">
                <table class="table table-hover mb-0" style="background-color: #fff">
                    <thead id="tableborder1">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Parameters</th>
                            <th scope="col">Price</th>
                            <th scope="col">Add</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("php/scripts/sc_dbconnect.php");
                        $mysqli = dbconnect();

                        $result = $mysqli->query("
                        SELECT 
                        `gpu`.`id_gpu`, CONCAT(GROUP_CONCAT(`manufacturer`.manufacturer_name SEPARATOR ' '), ' ', `gpu`.`gpu_name`) as nazwa, CONCAT(gpu.gpu_memory_amount, 'G') as memory, gm.gpu_mem_type_name as mem_type, CONCAT(gpu.gpu_tdp_wattage, 'W') as tdp, CONCAT('$',gpu.gpu_price) as price
                        FROM 
                        `gpu` JOIN `gpu_manufacturer` on `gpu`.`id_gpu`=`gpu_manufacturer`.`gpu_id_gpu` JOIN `manufacturer` on `gpu_manufacturer`.`manufacturer_id_manufacturer`=`manufacturer`.`id_manufacturer`, `gpu_mem_type` gm
                        WHERE gpu.gpu_mem_type_id_gpu_mem_type = gm.id_gpu_mem_type
                        group by `gpu`.`id_gpu`;
                        ");

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <th class=\"w-50\">" . $row['nazwa'] . "</th>
                                <td class=\"w-75\">" . $row['memory'] . " " . $row['mem_type'] . ", " . $row['tdp'] . "</td>
                                <td>" . $row['price'] . "</td>
                                <form action=\"php/scripts/sc_add_gpu_build.php\" method=\"POST\">
                                <input type=\"hidden\" id=\"gpu_id\" name=\"gpu_id\" value=\"" . $row['id_gpu'] . "\">
                                <td><button type=\"submit\" class=\"btn btn-primary btn-sm\">Add</button></td>
                                </form>
                            </tr>";
                            }
                        }

                        ?>
                    </tbody>
                </table>
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
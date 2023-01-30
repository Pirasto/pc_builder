<!doctype html>
<html lang="en">

<head>
    <title>Choose RAM</title>
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
                            <th scope="col">Quantity</th>
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
                        ram.id_ram, CONCAT(m.manufacturer_name, ' ', ram.ram_name) as nazwa, ram.ram_capacity as gb, ddr.ddr_type, ram.ram_clock_speed as speed, ram.ram_price as price
                        FROM
                        `ram`, `manufacturer` m, `ddr`
                        WHERE 
                        ram.manufacturer_id_manufacturer=m.id_manufacturer AND ram.ddr_id_ddr=ddr.id_ddr;
                        ");

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <th class=\"w-50\">" . $row['nazwa'] . "</th>
                                <td class=\"w-75\">" . $row['gb'] . "GB, " . $row['ddr_type'] . ", " . $row['speed'] . "MHz</td>
                                <form action=\"php/scripts/sc_add_ram_build.php\" method=\"POST\">
                                <td>
                                    <select id=\"inputState\" name=\"inputState\" class=\"form-control\">
                                    <option selected>2</option>
                                    <option>4</option>
                                    </select>
                                </td>
                                <td>" . $row['price'] . "</td>
                                <input type=\"hidden\" id=\"ram_id\" name=\"ram_id\" value=\"" . $row['id_ram'] . "\">
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
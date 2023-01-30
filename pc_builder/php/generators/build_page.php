<?php
include("php/scripts/sc_dbconnect.php");

function createBlankBuild()
{
  $mysqli = dbconnect();

  $build_name = "New " . $_SESSION['Logged_user'] . " build";
  $user_id = $_SESSION['Logged_user_id'];

  $mysqli->query("INSERT INTO build VALUES(NULL, '" . $build_name . "', '" . $user_id . "', NULL, NULL, NULL, NULL)");

  $result = $mysqli->query("SELECT id_build FROM build WHERE build_name = '" . $build_name . "'");

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $_SESSION['Current_build'] = $row["id_build"];
    }
  } else {
    echo "Database connection error";
  }

  $id_build = $_SESSION['Current_build'];

  $mysqli->query("INSERT INTO `build_gpu` VALUES(NULL, NULL, NULL, ".$id_build.")");
  $mysqli->query("INSERT INTO `build_ram` VALUES(NULL, NULL, NULL, ".$id_build.")");

  $mysqli->close();
}

function buildPrintStart()
{
  $mysqli = dbconnect();

  $build_id = $_SESSION['Current_build'];

  $result = $mysqli->query("SELECT * FROM build WHERE id_build = '" . $build_id . "'");

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $current_build_name = $row['build_name'];
    }
  } else {
    echo "Database connection error";
  }

  //Build Header
  echo "
        <nav class=\"navbar\" style=\"background-color: #bcf3f5;\">
          <div class=\"container-fluid\">
            <a class=\"navbar-brand align-text-bottom\">
              <div class=\"input-group\">
              <div class=\"input-group-prepend\">
                <span class=\"input-group-text me-2\" id=\"basic-addon1\">Build name</span>
              </div>
              <form action=\"php/scripts/sc_rename_build.php\" method=\"POST\">
              <input type=\"text\" class=\"form-control\" value=\"".$current_build_name."\" id=\"build_name\" name=\"build_name\">
            </div>
            </a>
            <div class=\"d-inline-block\">
              <button type=\"submit\" class=\"btn btn-dark\">Rename&nbsp<i class=\"bi bi-pencil\"></i></button>
              </form>
              <button type=\"button\" class=\"btn btn-dark\">Share<i class=\"bi bi-share ms-1\"></i></button>
            </div>
          </div>
        </nav>";

  //Build table
  echo "
        <table class=\"table table-hover mb-0\" style=\"background-color: #fff;\">
        <thead id=\"tableborder1\">
          <tr>
            <th scope=\"col\">Component</th>
            <th scope=\"col\">Name</th>
            <th scope=\"col\">Quantity</th>
            <th scope=\"col\">Price</th>
          </tr>
        </thead>
        <tbody>";
  $mysqli->close();
}

function buildCPU()
{
  //CPU
  $mysqli = dbconnect();

  $build_id = $_SESSION['Current_build'];

  $result = $mysqli->query("SELECT cpu_id_cpu FROM `build` WHERE id_build = " . $build_id . "");

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      if (is_null($row['cpu_id_cpu'])) {
        echo "
            <tr>
              <th><i class=\"bi bi-cpu-fill me-1 fs-5\"></i>CPU</th>
              <td class=\"w-75\"><a href=\"choose_cpu.php\"><button type=\"button\" class=\"btn btn-primary btn-sm\">Select</button></a></td>
              <td></td>
              <td></td>
            </tr>
          ";
      } else {
        $result = $mysqli->query("SELECT 
        CONCAT(m.manufacturer_name, ' ', cpu.cpu_name) AS nazwa, s.socket_name,cpu.cpu_clock_speed as mhz, CONCAT(cpu.cpu_core_count,'-core') AS core, CONCAT(cpu.cpu_tdp_wattage,' W') as tdp, concat('$',cpu.cpu_price) as price 
        FROM 
        `cpu`, `manufacturer` m, `socket` s, `build` b
        WHERE 
        m.`id_manufacturer`=`cpu`.`manufacturer_id_manufacturer` AND s.`id_socket`=`cpu`.`socket_id_socket` AND b.cpu_id_cpu=cpu.id_cpu AND b.id_build = ".$build_id.";");
        while ($row = $result->fetch_assoc()) {
          echo "
            <tr>
              <th><i class=\"bi bi-cpu-fill me-1 fs-5\"></i>CPU</th>
              <td class=\"w-75\">
              <a href=\"php/scripts/sc_remove_current_cpu.php\"><button type=\"button\" class=\"btn btn-danger btn-sm\">Remove&nbsp<i class=\"bi bi-trash\"></i></button></a>
              <a href=\"choose_cpu.php\"><button type=\"button\" class=\"btn btn-primary btn-sm\">Edit&nbsp<i class=\"bi bi-pencil\"></i></button></a>
              &nbsp; <b>".$row['nazwa']."</b> ".$row['socket_name'].", ".$row['mhz']/1000 ."GHz, ".$row['core'].", ".$row['tdp']."</td>
              <td>1</td>
              <td>".$row['price']."</td>
            </tr>
          ";
        }
      }
    }
  }
  $mysqli->close();
}

function buildGPU()
{
  //GPU
  $mysqli = dbconnect();

  $build_id = $_SESSION['Current_build'];

  $result = $mysqli->query("SELECT gpu_id_gpu FROM `build_gpu` WHERE build_id_build = " . $build_id . "");

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      if (is_null($row['gpu_id_gpu'])) {
        echo "
            <tr>
              <th><i class=\"bi bi-gpu-card me-1 fs-5\"></i>GPU</th>
              <td class=\"w-75\"><a href=\"choose_gpu.php\"><button type=\"button\" class=\"btn btn-primary btn-sm\">Select</button></a></td>
              <td></td>
              <td></td>
            </tr>
          ";
      } else {
        $result = $mysqli->query("
        SELECT 
        CONCAT(GROUP_CONCAT(`manufacturer`.manufacturer_name SEPARATOR ' '), ' ', `gpu`.`gpu_name`) as nazwa, CONCAT(gpu.gpu_memory_amount, 'G') as memory, gm.gpu_mem_type_name as mem_type, CONCAT(gpu.gpu_tdp_wattage, 'W') as tdp, CONCAT('$',gpu.gpu_price) as price
        FROM 
        `gpu` JOIN `gpu_manufacturer` on `gpu`.`id_gpu`=`gpu_manufacturer`.`gpu_id_gpu` JOIN `manufacturer` on `gpu_manufacturer`.`manufacturer_id_manufacturer`=`manufacturer`.`id_manufacturer`, `gpu_mem_type` gm, `build` b, `build_gpu` bg
        WHERE gpu.gpu_mem_type_id_gpu_mem_type = gm.id_gpu_mem_type AND b.id_build=bg.build_id_build AND gpu.id_gpu=bg.gpu_id_gpu AND b.id_build = ".$build_id."
        group by `gpu`.`id_gpu`;
        ");
        while ($row = $result->fetch_assoc()) {
          echo "
            <tr>
              <th><i class=\"bi bi-gpu-card me-1 fs-5\"></i>GPU</th>
              <td class=\"w-75\">
              <a href=\"php/scripts/sc_remove_current_gpu.php\"><button type=\"button\" class=\"btn btn-danger btn-sm\">Remove&nbsp<i class=\"bi bi-trash\"></i></button></a>
              <a href=\"choose_gpu.php\"><button type=\"button\" class=\"btn btn-primary btn-sm\">Edit&nbsp<i class=\"bi bi-pencil\"></i></button></a>
              &nbsp; <b>".$row['nazwa']."</b> ".$row['memory']." ".$row['mem_type'].", ".$row['tdp']."</td>
              <td>1</td>
              <td>".$row['price']."</td>
            </tr>
          ";
        }
      }
    }
  }
  $mysqli->close();
}

function buildMotherboard()
{
  //Motherboard
  $mysqli = dbconnect();

  $build_id = $_SESSION['Current_build'];

  $result = $mysqli->query("SELECT motherboard_id_motherboard FROM `build` WHERE id_build = " . $build_id . "");

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      if (is_null($row['motherboard_id_motherboard'])) {
        echo "
            <tr>
              <th><i class=\"bi bi-motherboard-fill me-1 fs-5\"></i>Motherboard</th>
              <td class=\"w-75\"><a href=\"choose_mb.php\"><button type=\"button\" class=\"btn btn-primary btn-sm\">Select</button></a></td>
              <td></td>
              <td></td>
            </tr>
          ";
      } else {
        $result = $mysqli->query("
        SELECT 
        CONCAT(m.manufacturer_name, ' ', mb.motherboard_name) as nazwa, s.socket_name as socket, ddr.ddr_type, mb.motherboard_chipset as chipset, mb.motherboard_price as price
        FROM 
        `motherboard` mb, `manufacturer` m, `ddr`, `socket` s, `build` b
        WHERE 
        mb.manufacturer_id_manufacturer = m.id_manufacturer AND ddr.id_ddr=mb.ddr_id_ddr AND mb.socket_id_socket=s.id_socket AND b.motherboard_id_motherboard = mb.id_motherboard AND b.id_build = ".$build_id.";
        ");
        while ($row = $result->fetch_assoc()) {
          echo "
            <tr>
              <th><i class=\"bi bi-motherboard-fill me-1 fs-5\"></i>Motherboard</th>
              <td class=\"w-75\">
              <a href=\"php/scripts/sc_remove_current_mb.php\"><button type=\"button\" class=\"btn btn-danger btn-sm\">Remove&nbsp<i class=\"bi bi-trash\"></i></button></a>
              <a href=\"choose_mb.php\"><button type=\"button\" class=\"btn btn-primary btn-sm\">Edit&nbsp<i class=\"bi bi-pencil\"></i></button></a>
              &nbsp; <b>".$row['nazwa']."</b> ".$row['socket'].", ".$row['ddr_type'].", ".$row['chipset']."</td>
              <td>1</td>
              <td>$".$row['price']."</td>
            </tr>
          ";
        }
      }
    }
  }
  $mysqli->close();
}

function buildRAM()
{
  //RAM
  $mysqli = dbconnect();

  $build_id = $_SESSION['Current_build'];

  $result = $mysqli->query("SELECT ram_id_ram FROM `build_ram` WHERE build_id_build = " . $build_id . "");

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      if (is_null($row['ram_id_ram'])) {
        echo "
            <tr>
              <th><i class=\"bi bi-memory me-1 fs-5\"></i>RAM</th>
              <td class=\"w-75\"><a href=\"choose_ram.php\"><button type=\"button\" class=\"btn btn-primary btn-sm\">Select</button></a></td>
              <td></td>
              <td></td>
            </tr>
          ";
      } else {
        $result = $mysqli->query("SELECT 
        CONCAT(m.manufacturer_name, ' ', ram.ram_name) as nazwa, ram.ram_capacity as gb, ddr.ddr_type, ram.ram_clock_speed as speed, ram.ram_price as price, br.amount as quantity
        FROM
        `ram`, `manufacturer` m, `ddr`, `build_ram` br, `build` b
        WHERE 
        ram.manufacturer_id_manufacturer=m.id_manufacturer AND ram.ddr_id_ddr=ddr.id_ddr AND ram.id_ram=br.ram_id_ram AND b.id_build=br.build_id_build AND b.id_build = ".$build_id.";");
        while ($row = $result->fetch_assoc()) {
          echo "
            <tr>
              <th><i class=\"bi bi-memory me-1 fs-5\"></i>RAM</th>
              <td class=\"w-75\">
              <a href=\"php/scripts/sc_remove_current_ram.php\"><button type=\"button\" class=\"btn btn-danger btn-sm\">Remove&nbsp<i class=\"bi bi-trash\"></i></button></a>
              <a href=\"choose_ram.php\"><button type=\"button\" class=\"btn btn-primary btn-sm\">Edit&nbsp<i class=\"bi bi-pencil\"></i></button></a>
              &nbsp; <b>".$row['nazwa']."</b> ".$row['quantity']."x".$row['gb']."GB, ".$row['ddr_type'] .", ".$row['speed']."MHz</td>
              <td>".$row['quantity']."</td>
              <td>$".$row['price']*$row['quantity']."</td>
            </tr>
          ";
        }
      }
    }
  }
  $mysqli->close();
}

function buildStorage()
{
  //Storage
  $mysqli = dbconnect();

  $build_id = $_SESSION['Current_build'];

  $result = $mysqli->query("SELECT COUNT(*) as amount FROM `build_storage` WHERE build_id_build = " . $build_id . "");

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $storage_amount = $row['amount'];
    }
  }

  if($storage_amount>0){
    echo "<tr>
    <th rowspan=\"".$storage_amount+1 ."\" style=\"vertical-align: middle;\"><i class=\"bi bi-device-hdd-fill me-1 fs-5\"></i>Storage</th>";
    $result = $mysqli->query("
      SELECT
      s.id_storage, CONCAT(m.manufacturer_name,' ',s.storage_name) as nazwa, s.storage_capacity as capacity, sff.storage_form_factor_name as form, st.storage_type_name as type, s.storage_price as price, bs.amount as amount
      FROM 
      `storage` s, `manufacturer` m, `storage_type` st, `storage_form_factor` sff, `build_storage` bs, `build` b
      WHERE 
      s.manufacturer_id_manufacturer=m.id_manufacturer AND s.storage_type_id_storage_type=st.id_storage_type AND s.storage_form_factor_id_storage_form_factor=sff.id_storage_form_factor AND bs.build_id_build=b.id_build and bs.storage_id_storage=s.id_storage AND b.id_build =".$build_id.";
    ");
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<td class=\"w-75\">
        <form action=\"php/scripts/sc_remove_current_storage.php\" method=\"POST\">
        <input type=\"hidden\" id=\"storage_id\" name=\"storage_id\" value=\"".$row['id_storage']."\">
        <button type=\"submit\" class=\"btn btn-danger btn-sm\">Remove&nbsp<i class=\"bi bi-trash\"></i></button>
        <b>".$row['nazwa']."</b> ";
        if($row['capacity']/1024 >= 1){
          echo $row['capacity']/1024 ."TB, ";
        }else{
            echo $row['capacity'] ."GB, ";
        }
        echo $row['form']." ".$row['type']."
        </td>
        <td>".$row['amount']."</td>
        <td>$".$row['price']*$row['amount']."</td></tr>
        </form>";
      }
      echo "
        <tr>
          <td class=\"w-75\"><a href=\"choose_storage.php\"><button type=\"button\" class=\"btn btn-primary btn-sm\">Add</button></a></td>
          <td></td>
          <td></td>
        </tr>
      ";
    }
  }else{
    echo "
      <tr>
        <th><i class=\"bi bi-device-hdd-fill me-1 fs-5\"></i>Storage</th>
        <td class=\"w-75\"><a href=\"choose_storage.php\"><button type=\"button\" class=\"btn btn-primary btn-sm\">Select</button></a></td>
        <td></td>
        <td></td>
      </tr>
    ";
  }
  $mysqli->close();
  
}

function buildPSU()
{
  //PSU
  $mysqli = dbconnect();

  $build_id = $_SESSION['Current_build'];

  $result = $mysqli->query("SELECT psu_id_psu FROM `build` WHERE id_build = " . $build_id . "");

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      if (is_null($row['psu_id_psu'])) {
        echo "
            <tr>
              <th><i <i class=\"bi bi-plug-fill me-1 fs-5\"></i>Power Supply</th>
              <td class=\"w-75\"><a href=\"choose_psu.php\"><button type=\"button\" class=\"btn btn-primary btn-sm\">Select</button></a></td>
              <td></td>
              <td></td>
            </tr>
          ";
      } else {
        $result = $mysqli->query("SELECT 
        CONCAT(m.manufacturer_name, ' ', psu.psu_name) as nazwa, CONCAT(psu.psu_wattage,'W') as tdp, pr.psu_rating_name as rating, psu.psu_price as price
        FROM
        `psu`, `manufacturer` m, `psu_rating` pr, `build` b
        WHERE
        psu.manufacturer_id_manufacturer = m.id_manufacturer AND psu.psu_rating_id_psu_rating=pr.id_psu_rating AND b.psu_id_psu=psu.id_psu AND b.id_build = ".$build_id.";");
        while ($row = $result->fetch_assoc()) {
          echo "
            <tr>
              <th><i <i class=\"bi bi-plug-fill me-1 fs-5\"></i>Power Supply</th>
              <td class=\"w-75\">
              <a href=\"php/scripts/sc_remove_current_psu.php\"><button type=\"button\" class=\"btn btn-danger btn-sm\">Remove&nbsp<i class=\"bi bi-trash\"></i></button></a>
              <a href=\"choose_psu.php\"><button type=\"button\" class=\"btn btn-primary btn-sm\">Edit&nbsp<i class=\"bi bi-pencil\"></i></button></a>
              &nbsp; <b>".$row['nazwa']."</b> ".$row['tdp'].", ".$row['rating']."</td>
              <td>1</td>
              <td>$".$row['price']."</td>
            </tr>
          ";
        }
      }
    }
  }
  $mysqli->close();
}

function buildExtensionCards()
{
  //Extension cards
  $mysqli = dbconnect();

  $build_id = $_SESSION['Current_build'];

  $result = $mysqli->query("SELECT COUNT(*) as amount FROM `build_expansion_card` WHERE build_id_build = " . $build_id . "");

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $ec_amount = $row['amount'];
    }
  }

  if($ec_amount>0){
    echo "<tr>
    <th rowspan=\"".$ec_amount+1 ."\" style=\"vertical-align: middle;\"><i class=\"bi bi-pci-card me-1 fs-5\"></i>Extension card</th>";
    $result = $mysqli->query("
      SELECT 
      ec.id_expansion_card as id_ec, CONCAT(m.manufacturer_name,' ',ec.expansion_card_name) as nazwa, pci.pci_line_name as pcin, ect.expansion_card_type_name as type, bec.amount as amount, ec.expansion_card_price as price
      FROM 
      `expansion_card` ec, `build` b, `build_expansion_card` bec, `expansion_card_type` ect, `manufacturer` m, `pci_line` as pci
      WHERE 
      ec.manufacturer_id_manufacturer=m.id_manufacturer AND ec.id_expansion_card=bec.expansion_card_id_expansion_card AND b.id_build=bec.build_id_build AND ec.expansion_card_type_id_expansion_card_type=ect.id_expansion_card_type AND pci.id_pci_line=ec.pci_line_id_pci_line AND b.id_build=".$build_id.";
    ");
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<td class=\"w-75\">
        <form action=\"php/scripts/sc_remove_current_ec.php\" method=\"POST\">
        <input type=\"hidden\" id=\"ec_id\" name=\"ec_id\" value=\"".$row['id_ec']."\">
        <button type=\"submit\" class=\"btn btn-danger btn-sm\">Remove&nbsp<i class=\"bi bi-trash\"></i></button>
        <b>".$row['nazwa']."</b> ".$row['pcin']." ".$row['type']."
        </td>
        <td>".$row['amount']."</td>
        <td>$".$row['price']*$row['amount']."</td></tr>
        </form>";
      }
      echo "
        <tr>
          <td class=\"w-75\"><a href=\"choose_extension_card.php\"><button type=\"button\" class=\"btn btn-primary btn-sm\">Add</button></a></td>
          <td></td>
          <td></td>
        </tr>
      ";
    }
  }else{
    echo "
      <tr>
        <th><i class=\"bi bi-pci-card me-1 fs-5\"></i>Extension card</th>
        <td class=\"w-75\"><a href=\"choose_extension_card.php\"><button type=\"button\" class=\"btn btn-primary btn-sm\">Select</button></a></td>
        <td></td>
        <td></td>
      </tr>
    ";
  }
  $mysqli->close();
}

function buildSummaryPrice()
{
  //Summary price
  $mysqli = dbconnect();

  $summary_price = 0;
  
  $build_id = $_SESSION['Current_build'];

  //CPU
  $result = $mysqli->query("SELECT cpu.cpu_price as price from `cpu`, `build` b WHERE b.cpu_id_cpu=cpu.id_cpu AND b.id_build = '" . $build_id . "'");
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $summary_price += $row["price"];
    }
  }

  //Motherboard
  $result = $mysqli->query("select
  mb.motherboard_price as price
  FROM
  `motherboard` mb, `build` b
  WHERE
  b.motherboard_id_motherboard=mb.id_motherboard AND b.id_build = '" . $build_id . "'");
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $summary_price += $row["price"];
    }
  }

  //GPU
  $result = $mysqli->query("SELECT
  gpu.gpu_price * bg.amount as price
  FROM
  `gpu`, `build` b, `build_gpu` bg
  WHERE
  bg.build_id_build=b.id_build AND bg.gpu_id_gpu = gpu.id_gpu AND b.id_build = '" . $build_id . "'");
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $summary_price += $row["price"];
    }
  }

  //RAM
  $result = $mysqli->query("select
  ram.ram_price * br.amount as price
  FROM
  `build` b, `build_ram` br, `ram`
  WHERE
  b.id_build = br.build_id_build AND `ram`.`id_ram` = br.ram_id_ram AND b.id_build = '" . $build_id . "'");
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $summary_price += $row["price"];
    }
  }

  //Storage
  $result = $mysqli->query("select
  s.storage_price * bs.amount as price
  FROM
  `build` b, `build_storage` bs, `storage` s
  WHERE
  b.id_build = bs.build_id_build AND s.id_storage = bs.storage_id_storage AND b.id_build = '" . $build_id . "'");
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $summary_price += $row["price"];
    }
  }

  //PSU
  $result = $mysqli->query("select
  psu.psu_price as price
  FROM
  `build` b, `psu` 
  WHERE
  b.psu_id_psu=psu.id_psu AND b.id_build = '" . $build_id . "'");
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $summary_price += $row["price"];
    }
  }

  //Expansion cards
  $result = $mysqli->query("select
  ec.expansion_card_price*bec.amount as price
  FROM
  `build` b, `build_expansion_card` bec, `expansion_card` ec
  WHERE
  b.id_build = bec.build_id_build AND ec.id_expansion_card=bec.expansion_card_id_expansion_card AND b.id_build = '" . $build_id . "'");
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $summary_price += $row["price"];
    }
  }


  echo "
      <thead id=\"tableborder2\">
        <tr>
          <th>TOTAL: </th>
          <td></td>
          <td></td>
          <th>$".$summary_price."</th>
        </tr>
      </thead>
    </tbody>
  </table>
  ";
$mysqli->close();
}



function notLogged()
{
  echo "
  <h1 class=\"notlogged\">LOG IN TO CREATE BUILD</h1>
  <table class=\"table tablicatest mb-0\" style=\"background-color: #f1faee;\">
  <thead id=\"tableborder1\">
    <tr>
      <th scope=\"col\">Component</th>
      <th scope=\"col\">Name</th>
      <th scope=\"col\">Quantity</th>
      <th scope=\"col\">Pricy</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th><i class=\"bi bi-cpu-fill me-1 fs-5\"></i>CPU</th>
      <td class=\"w-75\">Select</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th><i class=\"bi bi-gpu-card me-1 fs-5\"></i>GPU</th>
      <td>Select</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th><i class=\"bi bi-motherboard-fill me-1 fs-5\"></i>Motherboard</th>
      <td>Select</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th><i class=\"bi bi-memory me-1 fs-5\"></i>RAM</th>
      <td>Select</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th><i class=\"bi bi-device-hdd-fill me-1 fs-5\"></i>Storage</th>
      <td>Select</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th><i class=\"bi bi-plug-fill me-1 fs-5\"></i>Power Supply</th>
      <td>Select</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th><i class=\"bi bi-pci-card me-1 fs-5\"></i>Extension card</th>
      <td>Select</td>
      <td></td>
      <td></td>
    </tr>

    <thead id=\"tableborder2\">
      <tr>
        <th>TOTAL: </th>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </thead>
  </tbody>
</table>

  ";
}

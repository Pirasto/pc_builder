<?php

//includes
include("php\scripts\sc_login_check.php");

function headerPrint(){
    //Print out start
    echo "<nav class=\"navbar navbar-dark\" style=\"background-color: #1d3557;\">
    <div class=\"container-fluid\">
    <a href=\"index.php\" class=\"navbar-brand mb-0 h1\"><img src=\"icons/pclogo.svg\" class=\"me-2\">University
    Project</a>";
    if(isLogged()){
        //if logged
        $username = $_SESSION['Logged_user'];
        echo "<div class=\"dropdown dropstart\">
        <button class=\"btn btn-dark dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
          ".$username."
        </button>
        <ul class=\"dropdown-menu\">
          <li><a class=\"dropdown-item\" href=\"user-profile.php\">Profile</a></li>
          <li>
            <hr class=\"dropdown-divider\">
          </li>
          <li><a class=\"dropdown-item text-danger\" href=\"php/scripts/sc_logout.php\">Log out</a></li>
        </ul>
      </div>";
    }else{
        //if isn't logged
        echo "<a href=\"login.php\" class=\"btn btn-dark justify-content-end p-1 px-2\">Login</a>";
    }
    echo "</div></nav>";
}
?>
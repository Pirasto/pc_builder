<?php
function isLogged(){
    if (isset($_SESSION['Logged'])) {
        if ($_SESSION['Logged']) {
            return true;
        } else {
            return false;
        }
    } else {
        $_SESSION['Logged'] = false;
        return false;
    }
}
?>
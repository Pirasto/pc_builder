<?php
    function footerPrint(){
        echo "
        <footer class=\"container-fluid mt-auto\" style=\"background-color: #e63946;\">
          <div class=\"container-fluid mx-auto text-center mt-1 mb-1\">
            <a href=\"https://www.facebook.com/\" target=\"_blank\"><i class=\"bi bi-facebook footico px-2\"></i></a>
            <a href=\"https://www.github.com/\" target=\"_blank\"><i class=\"bi bi-github footico px-2\"></i></a>
            <a href=\"https://www.youtube.com/\" target=\"_blank\"><i class=\"bi bi-youtube footico px-2\"></i></a>
            <a href=\"https://www.twitter.com/\" target=\"_blank\"><i class=\"bi bi-twitter footico px-2\"></i></a>
            <a href=\"https://www.instagram.com/\" target=\"_blank\"><i class=\"bi bi-instagram footico px-2\"></i></a>
          </div>
          <div class=\"row text-center\">
            <div class=\"col-xs-6 col-sm-12 col-md-4\">
              <ul class=\"list-unstyled text-small\">
                <li class=\"bi bi-pc-display imgbi\"></li></a></li>
                <li><a class=\"text-light pe-none\">PICK.</a></li>
                <li><a class=\"text-light pe-none\">COMPARE.</a></li>
                <li><a class=\"text-light pe-none\">SHARE.</a></li>
              </ul>
            </div>
            <div class=\"col-xs-6 col-sm-6 col-md-4\">
              <h4 class=\"text-white pt-1\">Categories</h4>
              <ul class=\"list-unstyled text-small\">
                <li><a class=\"text-light foothover\" href=\"index.php\">Home</a></li>
                <li><a class=\"text-light foothover\" href=\"pcbuild.php\">PC Builder</a></li>
                <li><a class=\"text-light foothover\" href=\"compbuild.php\">Completed Builds</a></li>
              </ul>
            </div>
            <div class=\"col-xs-6 col-sm-6 col-md-4\">
              <h4 class=\"text-white pt-1\">Company</h4>
              <ul class=\"list-unstyled text-small\">
                <li><a class=\"text-light foothover\" href=\"f-about.php\" target=\"_blank\">About</a></li>
                <li><a class=\"text-light foothover\" href=\"f-tos.php\" target=\"_blank\">Tearms of Service</a></li>
                <li><a class=\"text-light foothover\" href=\"f-privacy.php\" target=\"_blank\">Privacy Policy</a></li>
              </ul>
            </div>
          </div>
          <div>
            <hr class=\"rights mx-auto text-white my-0\">
            <p class=\"text-light text-center\">© 2022 Danylo&Viktor, Inc. All rights reserved.</p>
          </div>
        </footer>
        ";
    }
?>
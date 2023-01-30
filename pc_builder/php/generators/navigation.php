<?php
function navPrint(){
    echo "<nav class=\"navbar navbar-expand-lg navbar-dark\" style=\"background-color: #457b9d\">
    <div class=\"container-fluid\">
      <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
      </button>
      <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
        <ul class=\"navbar-nav me-auto mb-2 mb-lg-0\">
          <li class=\"nav-item\">
            <a class=\"nav-link\" aria-current=\"page\" href=\"index.php\">Home</a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"pcbuild.php\">PC Builder</a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"compbuild.php\">Completed builds</a>
          </li>
        </ul>
        <div class=\"searchdiv left-addon\">
          <form action=\"search.php\" role=\"search\">
            <i class=\"searchicon bi bi-search\" type=\"submit\"></i>
            <input type=\"text\" class=\"form-control\" placeholder=\"Search\" />
          </form>
        </div>
      </div>
    </div>
  </nav>";
}
?>
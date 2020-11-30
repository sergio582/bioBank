<?php
include_once 'src/controller/bddController.php';
session_start();

function headView($title)
{
?>
  <!DOCTYPE html>
  <html lang="fr">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="public/bootstrap-4.5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/fontawesome-free-5.15.1/css/all.css">
    <link rel="stylesheet" href="public/jquery/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="public/chartjs/Chart.min.css">
  </head>

  <body>


  <?php
}

function footView()
{
  ?>
    <script src="public/jquery/jquery-3.5.1.min.js"></script>
    <script src="public/jquery/popper.min.js"></script>
    <script src="public/jquery/jquery.dataTables.min.js"></script>
    <script src="public/bootstrap-4.5.3/js/bootstrap.min.js"></script>
    <script src="public/jquery/dataTables.bootstrap4.min.js"></script>
    <script src="public/chartjs/Chart.min.js"></script>
    <script src="public/fontawesome-free-5.15.1/js/all.js"></script>
  </body>

  </html>
<?php
}

function navigation($page)
{
?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="accueil"><i class="fas fa-dna"></i> Bio Bank</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?php echo $page == 'accueil' ? "active" : "" ?>">
          <a class="nav-link" href="accueil">Accueil </a>
        </li>
        <li class="nav-item <?php echo $page == 'correlations' ? "active" : "" ?>">
          <a class="nav-link" href="correlations">Corrélations </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
<?php
}
?>
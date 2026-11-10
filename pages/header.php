<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php
    if (isset($title)) {
      echo $title;
    } else {
      echo "page sans titre";
    }
    ?>
  </title>
  <link rel="icon" href="../images/logo.png" type="image/png">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/slick.css">
  <link rel="stylesheet" href="../css/slick-theme.css">
  <!-- styles de la datatable -->
   <link rel="stylesheet" href="../css/datatable.css" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
  <header>
    <nav class="navbar bg-dark border-bottom border-body navbar-expand-lg" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand motif" href="../index.php">Gestion de commandes</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>" aria-current="page" href="../index.php">Acceuil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo ($current_page == 'article.php') ? 'active' : ''; ?>" href="../pages/article.php">Articles</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo ($current_page == 'clients.php') ? 'active' : ''; ?>" href="../pages/clients.php">Clients</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo ($current_page == 'commandes.php') ? 'active' : ''; ?>" href="../pages/commandes.php">Commandes</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
  </header>
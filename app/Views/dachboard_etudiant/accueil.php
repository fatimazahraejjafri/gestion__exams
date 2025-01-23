<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Informations sur la Faculté</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }
    .navbar {
      background-color: #e3a70f;
    }
    .navbar-brand, .navbar-nav a {
      color: white !important;
    }
    .navbar-nav a:hover {
      background-color: #495057;
      color: white !important;
    }
    .content {
      padding: 40px;
    }
    .carousel-item img {
      width: 100%;
      height: 400px;
      object-fit: cover;
    }
    .carousel-caption {
      background-color: rgba(0, 0, 0, 0.6);
      padding: 15px;
      border-radius: 8px;
    }
    .carousel-caption h5, .carousel-caption p {
      color: white;
    }
    .section {
      margin-top: 40px;
    }
    .card-img-top {
      height: 200px;
      object-fit: cover;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Université</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="voire.html">Informations sur la Faculté</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="etudiant.html">Mes Notes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Réclamations</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container">
    <div class="content">
      <h1>Informations sur la Faculté</h1>

      <!-- Carrousel d'images avec légendes -->
      <div id="facultyCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <!-- Premier slide -->
          <div class="carousel-item active">
            <img src="13.jpg" class="d-block w-100" alt="Faculté 1">
            <div class="carousel-caption">
              <h5>+DE 30 ANS D'EXPÉRIENCE</h5>
              <p>Depuis son ouverture en octobre 1984, l'Université Ibn Zohr a accumulé une longue expérience en formation et en recherche scientifique.</p>
            </div>
          </div>
          <!-- Deuxième slide -->
          <div class="carousel-item">
            <img src="15.jpg" class="d-block w-100" alt="Faculté 2">
            <div class="carousel-caption">
              <h5>FORMATIONS MODERNES</h5>
              <p>Notre université offre des formations modernes adaptées aux besoins du marché du travail.</p>
            </div>
          </div>
          <!-- Troisième slide -->
          
        </div>

        <!-- Contrôles du carrousel -->
        <button class="carousel-control-prev" type="button" data-bs-target="#facultyCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Précédent</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#facultyCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Suivant</span>
        </button>
      </div>

      <div class="section">
        <h3>Présentation de la Faculté</h3>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Notre Université</h5>
            <p class="card-text">Notre université offre une formation de qualité dans de nombreux domaines scientifiques et humains. Nous visons à former des étudiants compétents, responsables et bien préparés pour le monde du travail.</p>
          </div>
        </div>
      </div>

      <div class="section">
        <h3>Nos Facultés</h3>
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <img src="1.jpg" class="card-img-top" alt="Faculté des Sciences">
              <div class="card-body">
                <h5 class="card-title">Faculté des Sciences</h5>
                <p class="card-text">La faculté des sciences propose des formations en biologie, physique, chimie et bien d'autres domaines scientifiques.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <img src="2.jpg" class="card-img-top" alt="Faculté de Droit">
              <div class="card-body">
                <h5 class="card-title">Faculté de Droit</h5>
                <p class="card-text">La faculté de droit forme des étudiants aux carrières juridiques et aux sciences sociales, offrant un enseignement complet en droit public et privé.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <img src="3.png" class="card-img-top" alt="Faculté de Lettres">
              <div class="card-body">
                <h5 class="card-title">Faculté de Lettres</h5>
                <p class="card-text">La faculté de lettres propose des formations en littérature, langues et sciences humaines, pour des carrières dans l'éducation et les arts.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



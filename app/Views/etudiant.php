<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tableau de bord - Notes de l'Étudiant</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f8f9fa;
    }
    .navbar {
      background-color: #e3a70f;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .navbar-brand, .navbar-nav a {
      color: white;
    }
    .navbar-nav a:hover {
      background-color: #d6930f;
    }
    .content {
      margin-top: 80px; /* Push the content below the navbar */
      max-width: 800px;
      width: 100%;
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
      padding: 30px;
    }
    .content h1 {
      font-size: 2.5rem;
      color: #343a40;
      text-align: center;
      margin-bottom: 20px;
    }
    .card {
      border: none;
      background-color: #f8f9fa;
    }
    .card-body {
      padding: 20px;
    }
    .table {
      margin-top: 20px;
    }
    .table th {
      background-color: #e3a70f;
      color: white;
      border: none;
    }
    .table tbody tr:nth-child(odd) {
      background-color: #f8f9fa;
    }
    .table tbody tr:hover {
      background-color: #f1f1f1;
    }
    .footer {
      text-align: center;
      font-size: 0.9rem;
      color: #6c757d;
      margin-top: 20px;
    }
    .nav-item{
      margin-right: 5px;
    }
  
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light fixed-top ">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="<?= base_url('images/image1.png'); ?>" alt="student" style="width: 50px; height: 50px; display: block; margin: auto;" />

      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item bg-dark text-light rounded-3">
            <a class="nav-link" href="/accueil">Informations sur la Faculté</a>
          </li>
          <li class="nav-item bg-dark text-light rounded-3">
            <a class="nav-link" href="/notes">Mes Notes</a>
          </li>
          <li class="nav-item bg-dark text-light rounded-3">
            <a class="nav-link" href="reclamation">Réclamations</a>
          </li>
          <li class="nav-item bg-dark text-light rounded-3">
            <a class="nav-link" href="/historique">Historiques Réclamations</a>
          </li>
          <li class="nav-item bg-dark text-light rounded-3">
          <a class="nav-link" href="/login/logout">Déconnexion</a>
          </li>
          </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container content">
    <h1>Mes Notes</h1>
    <div class="card">
      <div class="card-body text-center">
        <h5 class="card-title">
          <strong><?= esc($student['first_name']); ?></strong> <strong><?= esc($student['last_name']); ?></strong>
        </h5>
        <p>Voici vos notes pour les matières suivies :</p>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Module</th>
              <th>Note</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($grades as $grade): ?>
              <tr>
                <td><?= esc($grade['module_name']); ?></td>
                <td><?= esc($grade['grade']); ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="footer">
      &copy; <?= date('Y'); ?> Université - Tous droits réservés.
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

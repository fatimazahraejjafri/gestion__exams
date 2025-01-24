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
      font-family: 'Roboto', Arial, sans-serif;
      background-color: #f8f9fa;
    }

    .sidebar {
      height: 100vh;
      background-color: #212d31;
      color: white;
      padding: 20px;
      position: sticky;
      top: 0;
    }

    .sidebar a {
      color: white;
      text-decoration: none;
      display: block;
      margin: 15px 0;
      padding: 12px 15px;
      border-radius: 5px;
      font-weight: bold;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .sidebar a:hover {
      background-color: #343a40;
      transform: translateX(5px);
    }
        
    a.active {
      background-color: #34495e;
    }

    .content {
      margin: 20px auto;
      max-width: 800px;
      background-color: white;
      box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      padding: 20px;
    }

    .table th {
      background-color: #e3a70f;
      color: white;
    }

    .table tr:hover {
      background-color: #f1f1f1;
    }

    .footer {
      text-align: center;
      font-size: 0.9rem;
      color: #6c757d;
      margin-top: 20px;
    }
  </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-2 sidebar">
            <img src="<?= base_url('images/Image1.png'); ?>" alt="Student" style="width: 50%; height: auto; display: block; margin: auto;" />
            <a href="accueil">Informations sur la Faculté</a>
            <a href="/notes" class="active">Mes Notes</a>
            <a href="reclamation">Réclamations</a>
            <a href="/historique">Historiques Réclamations</a>
            <a href="/login/logout">Déconnexion</a>
        </nav>

        <!-- Main Content -->
        <main class="col-md-10">
          <div class="content">
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
        <?php if (!empty($gradesAndModules)): ?>
            <?php foreach ($gradesAndModules as $item): ?>
                <tr>
                    <td><?= esc($item['module_name']); ?></td>
                    <td><?= esc($item['grade'] ?? 'En attente'); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="2">Aucune note ou module trouvé.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
              </div>
            </div>
          </div>
          <div class="footer">
            &copy; <?= date('Y'); ?> Université - Tous droits réservés.
          </div>
        </main>
    </div>
</div>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

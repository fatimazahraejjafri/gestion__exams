<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Historique des Réclamations</title>
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
      max-width: 1200px;
      background-color: white;
      box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      padding: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      background-color: #ffffff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      overflow: hidden;
    }

    table th,
    table td {
      padding: 12px 15px;
      text-align: left;
      font-size: 14px;
    }

    table th {
      background-color: #f4f4f4;
      color: #333333;
      text-transform: uppercase;
      font-weight: 600;
      border-bottom: 2px solid #eaeaea;
    }

    table td {
      border-bottom: 1px solid #eaeaea;
      color: #555555;
    }

    table tbody tr:nth-child(odd) {
      background-color: #f9f9f9;
    }

    table tbody tr:hover {
      background-color: #f1f1f1;
      transition: background-color 0.2s ease-in-out;
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
        <a href="/notes">Mes Notes</a>
        <a href="reclamation">Réclamations</a>
        <a href="/historique" class="active">Historiques Réclamations</a>
        <a href="/login/logout">Déconnexion</a>
    </nav>

    <!-- Main Content -->
    <main class="col-md-10">
      <div class="content">
        <h1>Historique des Réclamations</h1>

        <table>
          <thead>
            <tr>
              <th>Module</th>
              <th>Description</th>
              <th>Pièce Jointe</th>
              <th>Statut</th>
              <th>Date de Soumission</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($reclamations)): ?>
              <?php foreach ($reclamations as $reclamation): ?>
                <tr>
                  <td><?= esc($reclamation['module_name']) ?></td>
                  <td><?= esc($reclamation['description']) ?></td>
                  <td>
                    <?php if (!empty($reclamation['attachment'])): ?>
                      <a href="<?= base_url('uploads/reclamations/' . $reclamation['attachment']) ?>" target="_blank">Voir la pièce jointe</a>
                    <?php else: ?>
                      Aucun fichier
                    <?php endif; ?>
                  </td>
                  <td><?= esc($reclamation['status']) ?></td>
                  <td><?= esc($reclamation['created_at']) ?></td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="5">Aucune réclamation trouvée.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

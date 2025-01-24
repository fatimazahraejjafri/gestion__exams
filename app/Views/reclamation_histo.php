<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Historique des Réclamations</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
/* Table styles */
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

table tbody tr:last-child td {
  border-bottom: none;
}

/* Sticky column for action buttons */
table tbody tr td:last-child {
  position: sticky;
  right: 0;
  background-color: #ffffff;
}

/* Action buttons in the last column */
.action-select {
  padding: 6px 10px;
  font-size: 14px;
  border: 1px solid #ddd;
  border-radius: 4px;
  background-color: #ffffff;
  color: #555555;
  cursor: pointer;
}

.action-select:focus {
  border-color: #007bff;
  outline: none;
}

.action-select option {
  font-size: 14px;
}
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
            <a class="nav-link" href="/accueil">Informations sur la Faculté</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/notes">Mes Notes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reclamation">Ajouter réclamations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reclamation/historique">Historiques Réclamations</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>
  <div class="container content">
    <div class="card my-4">
      <div class=" card-body text-center">
      <h1>Mes Réclamations</h1>

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
</body>
</html>

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
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }
    .navbar {
      background-color: #e3a70f;
    }
    .navbar-brand, .navbar-nav a {
      color: white;
    }
    .navbar-nav a:hover {
      background-color: #495057;
    }
    .content {
      padding: 40px;
    }
    .table th, .table td {
      text-align: center;
    }
    .card-body {
      padding: 20px;
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
      <h1>Mes Notes</h1>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Bienvenue, <strong>IDBABA Asma</strong></h5>
          <p>Voici vos notes pour les matières suivies :</p>
          <table class="table table-bordered" id="notesTable">
            <thead>
              <tr>
                <th>Module</th>
                <th>Note</th>
              </tr>
            </thead>
            <tbody>
              <!-- Lignes ajoutées dynamiquement via JavaScript -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Exemple de données de notes
    const notesData = [
      { module: 'Mathématiques', note: 85 },
      { module: 'Physique', note: 90 },
      { module: 'Chimie', note: 78 }
    ];

    // Fonction pour afficher les notes
    function afficherNotes() {
      const tableBody = document.querySelector("#notesTable tbody");
      tableBody.innerHTML = '';
      notesData.forEach(note => {
        const row = document.createElement('tr');
        row.innerHTML = `<td>${note.module}</td><td>${note.note}</td>`;
        tableBody.appendChild(row);
      });
    }

    window.onload = afficherNotes;
  </script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Professeur</title>
<style>
    /* Global styles */
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
    }
    .dashboard {
      display: flex;
      min-height: 100vh;
    }
    /* Sidebar styles */
    .sidebar {
      width: 250px;
      background-color: #2c3e50;
      color: white;
      padding: 20px;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }
    .sidebar h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    .sidebar ul {
      list-style: none;
      padding: 0;
    }
    .sidebar ul li {
      margin: 10px 0;
    }
    .sidebar ul li a {
      color: white;
      text-decoration: none;
      padding: 10px;
      display: block;
      border-radius: 5px;
      transition: background-color 0.3s;
    }
    .sidebar ul li a:hover,
    .sidebar ul li a.active {
      background-color: #34495e;
    }
    /* Main content styles */
    .main-content {
      flex: 1;
      padding: 20px;
    }
    header {
      background-color: #e3a70f;
      color: white;
      padding: 20px;
      border-radius: 5px;
      margin-bottom: 20px;
    }
    header h1 {
      margin: 0;
    }
    header p {
      margin: 5px 0 0;
    }
    /* Form and table styles */
    form {
      margin-bottom: 20px;
    }
    form label {
      display: block;
      margin: 10px 0 5px;
    }
    form select,
    form button {
      padding: 10px;
      font-size: 16px;
      margin-bottom: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }
    form button {
      background-color: #007bff;
      color: white;
      border: none;
      cursor: pointer;
    }
    form button:disabled {
      background-color: #ccc;
      cursor: not-allowed;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    table th,
    table td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: left;
    }
    table th {
      background-color: #f4f4f4;
    }
    .hidden {
      display: none;
    }
    #studentsContainer button{
      margin-top: 30px;
    }


  .action-btn {
    padding: 5px 10px;
    font-size: 14px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
  }
  .action-btn.en-cours {
    background-color: #f39c12;
    color: white;
  }
  .action-btn.accepter {
    background-color: #27ae60;
    color: white;
  }
  .action-btn.refuser {
    background-color: #e74c3c;
    color: white;
  }
  .action-btn:hover {
    opacity: 0.9;
  }
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

</style>
</head>
<body>
  <div class="dashboard">
    <!-- Sidebar -->
    <aside class="sidebar">
      <img src="<?= base_url('images/homme.png'); ?>" alt="Maroc Image" style="width: 50%; height: auto; display: block; margin: auto;" />
      <ul>
        <li><a href="dashbord">Saisir des Notes</a></li>
        <li><a href="reclamation_prof" class="active">Reclamation</a></li>
        <li><a href="/login/logout">Déconnexion</a></li>
      </ul>
    </aside>
    <!-- Main Content -->
    <main class="main-content">
      <header>
          <h1>RECLAMATION DES ETUDIANT</h1>
        
      </header>
    
      <div class="relative font-inter antialiased">

<main class="relative min-h-screen flex flex-col justify-center bg-slate-50 overflow-hidden">
    <div class="w-full max-w-6xl mx-auto px-4 md:px-5 py-24">
        <div class="flex justify-center">

            <div class="w-full max-w-2xl bg-white shadow-xl rounded-2xl">
              
                <div class="p-3">

                    <!-- Table -->
                    <div class="overflow-x-auto">
    <h2>Réclamations</h2>
    <table>
        <thead>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>CNE</th>
                <th>Filière</th>
                <th>Module</th>
                <th>Description</th>
                <th>Pièce Jointe</th>
                <th>Status</th>
                <th>Date de Soumission</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($reclamations)): ?>
    <?php foreach ($reclamations as $reclamation): ?>
        <tr>
            <td><?= esc($reclamation['first_name']) ?></td>
            <td><?= esc($reclamation['last_name']) ?></td>
            <td><?= esc($reclamation['email']) ?></td>
            <td><?= esc($reclamation['cne']) ?></td>
            <td><?= esc($reclamation['filiere_name']) ?></td>
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
            <td>
                <form method="post" action="<?= base_url('reclamation/update/' . $reclamation['id_reclamation']) ?>">
                    <select name="status" required>
                        <option value="pending" <?= $reclamation['status'] === 'pending' ? 'selected' : '' ?>>En Attente</option>
                        <option value="resolved" <?= $reclamation['status'] === 'resolved' ? 'selected' : '' ?>>Résolu</option>
                        <option value="rejected" <?= $reclamation['status'] === 'rejected' ? 'selected' : '' ?>>Rejeté</option>
                    </select>
                    <button type="submit">Mettre à jour</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="11">Aucune réclamation trouvée.</td>
    </tr>
<?php endif; ?>
        </tbody>
    </table>
</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>


    
    </div>
</div>

</div>

    </main>
  </div>

 
</body>
</html>

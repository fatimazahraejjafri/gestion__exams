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

        .sidebar {
            height: 100vh;
            background-color: #e3a70f;
            color: white;
            padding: 20px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .content {
            padding: 20px;
        }

        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 sidebar">
                 <a href="#">Vue d'ensemble</a>
                <a href="/notes">Mes Notes</a>
                <a href="#">Réclamations</a>
                <a href="#">Calendrier</a>
                <a href="#">Ressources</a>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 content">
                <h1>Mes Notes</h1>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bienvenue, <strong>Jean Dupont</strong></h5>
                        <p>Voici vos notes pour les matières suivies :</p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Matière</th>
                                    <th>Note</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Mathématiques</td>
                                    <td>85</td>
                                </tr>
                                <tr>
                                    <td>Physique</td>
                                    <td>90</td>
                                </tr>
                                <tr>
                                    <td>Chimie</td>
                                    <td>78</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Calendrier</h5>
                        <p>Consultez votre emploi du temps et les dates importantes :</p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Événement</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>10/10/2024</td>
                                    <td>Examen de Mathématiques</td>
                                </tr>
                                <tr>
                                    <td>15/10/2024</td>
                                    <td>Projet Physique à remettre</td>
                                </tr>
                                <tr>
                                    <td>20/10/2024</td>
                                    <td>Laboratoire Chimie</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ressources</h5>
                        <p>Accédez à des documents et supports utiles pour vos cours :</p>
                        <ul>
                            <li><a href="#" target="_blank">Cours de Mathématiques (PDF)</a></li>
                            <li><a href="#" target="_blank">Guide du Projet Physique</a></li>
                            <li><a href="#" target="_blank">Fiches pratiques de Chimie</a></li>
                        </ul>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

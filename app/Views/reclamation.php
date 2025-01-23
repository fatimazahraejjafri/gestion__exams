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

        .contain {
            margin: 20px auto;
            background-color: #ffffff;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
        }

        .form h4, .form-headline {
            color: #212d31;
        }

        .form-headline {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            position: relative;
        }

        .form-headline::after {
            content: "";
            width: 60px;
            height: 3px;
            background-color: #ec1c24;
            position: absolute;
            bottom: -5px;
            left: 0;
        }

        .form-input {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-input:focus {
            border-color: #ec1c24;
            outline: none;
        }

        .submit-btn {
            padding: 10px 20px;
            border-radius: 5px;
            border: 1px solid #ec1c24;
            background-color: #ec1c24;
            color: #ffffff;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #ffffff;
            color: #ec1c24;
        }

        @media (max-width: 992px) {
            .sidebar {
                height: auto;
                margin-bottom: 20px;
            }
        }

        .success-message, .error-message {
           margin-bottom: 20px;
        }

        .form {
          margin-top: 20px;
        }

    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-2 sidebar">
            <a href="accueil">Informations sur la Faculté</a>
            <a href="/notes">Mes Notes</a>
            <a href="reclamation" class="active">Réclamations</a>
            <a href="/login/logout">Déconnexion</a>
        </nav>

        <!-- Main Content -->
        <main class="col-md-10">
            <!-- Success/Error Messages -->
            <?php if (session()->getFlashdata('success')): ?>
                <div style="
                    color: green; 
                    margin: 20px auto; 
                    text-align: center; 
                    border: 1px solid green; 
                    background-color: #d4edda; 
                    padding: 10px; 
                    border-radius: 5px; 
                    width: 50%;">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div style="
                    color: red; 
                    margin: 20px auto; 
                    text-align: center; 
                    border: 1px solid red; 
                    background-color: #f8d7da; 
                    padding: 10px; 
                    border-radius: 5px; 
                    width: 50%;">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <!-- Rest of the Content -->
            <div class="contain">
    <div class="form">
        <h4>Réclamation</h4>
        <h2 class="form-headline">Réclamation sur les notes</h2>
        <form id="submit-form" action="<?= base_url('reclamation/submit') ?>" method="post" enctype="multipart/form-data">
            <!-- Pre-filled Form Inputs -->
            <p>
                <input id="name" class="form-input" type="text" name="name" placeholder="Votre prénom*" value="<?= esc($student['first_name']) ?>" readonly required>
            </p>
            <p>
                <input id="last_name" class="form-input" type="text" name="last_name" placeholder="Votre nom*" value="<?= esc($student['last_name']) ?>" readonly required>
            </p>
            <p>
                <input id="email" class="form-input" type="email" name="email" placeholder="Votre email*" value="<?= esc($student['email']) ?>" readonly required>
            </p>
            <p>
                <input id="cne" class="form-input" type="text" name="CNE" placeholder="Votre CNE*" required>
            </p>
            <p>
                <input id="Filiere_name" class="form-input" type="text" name="Filiere_name" placeholder="Nom de la filière*" value="<?= esc($student['filiere_name'] ?? '') ?>" readonly required>
            </p>
            <p>
                <select id="Module_name" class="form-input" name="Module_name" required>
                    <option value="" disabled selected>Choisissez un module</option>
                </select>
            </p>
            <p>
                <label for="attachment" style="font-weight: bold;">Joindre une pièce (PDF, Image) :</label>
                <input id="attachment" class="form-input" type="file" name="attachment" accept=".pdf,.png,.jpg,.jpeg">
            </p>
            <p>
                <textarea id="reclamation" class="form-input" name="reclamation" placeholder="Votre réclamation*" rows="4" required></textarea>
            </p>
            <p class="text-end">
                <input type="submit" class="submit-btn" value="Soumettre">
            </p>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', async () => {
        const moduleSelect = document.getElementById('Module_name');

        try {
            const response = await fetch('<?= base_url("module/getModulesByFiliere") ?>');
            if (!response.ok) {
                console.error('Failed to fetch modules:', response.statusText);
                return;
            }

            const modules = await response.json();
            if (modules.error) {
                console.error(modules.error);
                return;
            }

            modules.forEach(module => {
                const option = document.createElement('option');
                option.value = module.name;
                option.textContent = module.name;
                moduleSelect.appendChild(option);
            });
        } catch (error) {
            console.error('Error fetching modules:', error);
        }
    });
</script>


        </main>
    </div>
</div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

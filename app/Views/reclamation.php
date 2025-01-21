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
        margin: 0;
        padding: 0;
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

    .contain {
        max-width: 1170px;
        margin: auto;
        background-color: #ffffff;
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
        padding: 20px;
    }

    .form {
        background-color: #f8f9fa;
        padding: 20px 30px;
        border-radius: 8px;
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
    }

    .form h4 {
        color: #495057;
        margin-bottom: 10px;
    }

    .form-headline {
        font-size: 24px;
        font-weight: bold;
        color: #212d31;
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
        transition: border-color 0.3s ease;
    }

    .form-input:focus {
        border-color: #ec1c24;
        outline: none;
    }

    .submit-btn,
    .reset-btn {
        padding: 10px 20px;
        border-radius: 5px;
        border: 1px solid #ec1c24;
        background-color: transparent;
        color: #ec1c24;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .submit-btn:hover,
    .reset-btn:hover {
        background-color: #ec1c24;
        color: #ffffff;
    }

    .contacts {
        background-color: #212d31;
        color: white;
        padding: 20px 30px;
        border-radius: 8px;
    }

    .contacts ul {
        list-style: none;
        padding: 0;
    }

    .contacts li {
        margin-bottom: 10px;
        font-size: 16px;
    }

    .contacts .highlight-text {
        color: #ec1c24;
        font-weight: bold;
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .wrapper {
            display: flex;
            flex-direction: column;
        }

        form {
            grid-template-columns: 1fr;
        }

        .full-width {
            grid-column: 1 / 1;
        }
    }
</style>

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 sidebar">
                 <a href="#">Vue d'ensemble</a>
                <a href="#">Mes Notes</a>
                <a href="reclamation.php">Réclamations</a>
                <a href="#">Calendrier</a>
                <a href="#">Ressources</a>
            </nav>

            <div class="contain">

<div class="wrapper">

  <div class="form">
    <h4>Réclamation</h4>
    <h2 class="form-headline">Réclamation sur les notes</h2>
    <form id="submit-form" action="" enctype="multipart/form-data">
      <p>
        <input id="name" class="form-input" type="text" name="name" placeholder="Votre prénom*">
        <small class="name-error"></small>
      </p>
      <p>
        <input id="last_name" class="form-input" type="text" name="last_name" placeholder="Votre nom*">
        <small class="name-error"></small>
      </p>
      <p>
        <input id="email" class="form-input" type="email" name="email" placeholder="Votre email*">
        <small class="name-error"></small>
      </p>
      <p>
        <input id="cne" class="form-input" type="text" name="CNE" placeholder="Votre CNE*">
        <small class="name-error"></small>
      </p>
      <p>
        <input id="Filiere_name" class="form-input" type="text" name="Filiere_name" placeholder="Nom de la filière*">
        <small class="name-error"></small>
      </p>
      <p>
        <input id="Module_name" class="form-input" type="text" name="Module_name" placeholder="Nom du module*">
        <small class="name-error"></small>
      </p>
      <p>
      <label for="attachment" style="font-weight: bold;">Joindre une pièce (PDF, Image) :</label>
      <input id="attachment" class="form-input" type="file" name="attachment" accept=".pdf,.png,.jpg,.jpeg">
    </p>
      <p>
        <textarea id="reclamation" class="form-input" name="reclamation" placeholder="Votre réclamation*" rows="4" required></textarea>
      </p>
      <p class="full-width">
        <input type="submit" class="submit-btn" value="Soumettre" onclick="checkValidations()">
      </p>
    </form>
  </div>
</div>
</div>
        

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

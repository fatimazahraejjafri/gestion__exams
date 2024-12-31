<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #ffbf00;
            --background-color: #f9f9f9;
            --text-color: #333;
            --border-radius: 8px;
            --transition-duration: 0.3s;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            font-family: "Roboto", sans-serif;
            background: linear-gradient(135deg, #ffbf00 30%, #ff9b00);
            color: var(--text-color);
        }

        .registration {
            background-color: #fff;
            padding: 40px 30px;
            width: 100%;
            max-width: 400px;
            border-radius: var(--border-radius);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .registration h1 {
            margin-bottom: 20px;
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .registration label {
            display: block;
            text-align: left;
            font-weight: 500;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .registration input {
            width: 100%;
            padding: 10px 15px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            outline: none;
            margin-bottom: 20px;
            transition: border-color var(--transition-duration);
        }

        .registration input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 5px rgba(255, 191, 0, 0.5);
        }

        .registration button {
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            font-weight: 600;
            color: #fff;
            background-color: var(--primary-color);
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: background-color var(--transition-duration);
        }

        .registration button:hover {
            background-color: #e0a800;
        }

        .alert {
            text-align: left;
            font-size: 0.9rem;
            margin-bottom: 20px;
        }

        .registration .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            padding: 10px;
            border-radius: var(--border-radius);
        }

        .registration .alert-success {
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: var(--border-radius);
        }

        @media (max-width: 576px) {
            .registration {
                padding: 30px 20px;
            }

            .registration h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <form class="registration" action="<?= base_url('register') ?>" method="POST">
        <?= csrf_field() ?>

        <h1>👋 Inscription</h1>

        <!-- Affichage des messages d'erreur ou de succès -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <label for="email">Adresse Email</label>
        <!-- Affichage de l'erreur près de l'input si elle existe -->
        <?php if (isset($validation) && $validation->getError('email')): ?>
            <div class="alert alert-danger"><?= $validation->getError('email') ?></div>
        <?php endif; ?>
        <input type="email" id="email" name="email" required value="<?= old('email') ?>">

        <label for="password">Mot de passe</label>
        <!-- Affichage de l'erreur près de l'input si elle existe -->
        <?php if (isset($validation) && $validation->getError('password')): ?>
            <div class="alert alert-danger"><?= $validation->getError('password') ?></div>
        <?php endif; ?>
        <input type="password" id="password" name="password" required>

        <button type="submit">Inscription</button>
    </form>
    
</body>
</html>

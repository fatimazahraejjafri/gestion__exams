<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
.container{
border-radius:10px;
width:fit-content;
padding: 24px;
}
</style>
<body class="bg-warning ">
    <div class="container mt-5 bg-white">

        <!-- Display error message as red div -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <div class="d-flex justify-content-center align-items-center gap-3 ">

            <div class>
            <img src="<?= base_url('images/image.png'); ?>" alt="Login Image" style="width: 500px; height: auto;" />

            </div>
            <div>
            <form method="post" action="<?= base_url('login') ?>">
            <h1 class="text-center mb-5">login</h1>
                <?= csrf_field() ?>

                <!-- Email Field -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input 
                        type="email" 
                        class="form-control <?= session()->getFlashdata('email_error') ? 'is-invalid' : '' ?>" 
                        id="email" 
                        name="email" 
                        value="<?= old('email') ?>" 
                        required>
                    <!-- Error Message -->
                    <?php if (session()->getFlashdata('email_error')): ?>
                        <div class="invalid-feedback">
                            <?= session()->getFlashdata('email_error') ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Password Field -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input 
                        type="password" 
                        class="form-control <?= session()->getFlashdata('password_error') ? 'is-invalid' : '' ?>" 
                        id="password" 
                        name="password" 
                        required>
                    <!-- Error Message -->
                    <?php if (session()->getFlashdata('password_error')): ?>
                        <div class="invalid-feedback">
                            <?= session()->getFlashdata('password_error') ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-dark text-white w-100">Login</button>
            </form>
            <p class="mt-3">
                Vous n'avez pas déjà un compte ? <a href="<?= base_url('register') ?>">inscrivez-vous</a>
            </p>
            </div>
       
        </div>

    </div>
</body>

</html>

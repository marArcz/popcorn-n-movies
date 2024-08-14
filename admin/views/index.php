<?php
session_start();
require_once '../app/login.php';

?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/bootstrap/dist/css/bootstrap.min.css">
    <title>Popcorn and Movies</title>
</head>

<body>
    <section class="">
        <div class="container  w-100 d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-4 mx-auto">
                <div class="text-center">
                    <h4>Admin Sign in</h4>
                </div>
                <div class="card mt-3 bg-body-tertiary">
                    <div class="card-body">
                        <form action="" method="post">
                            <?php if (isset($error)): ?>
                                <p class="text-danger"><?= $error ?></p>
                            <?php endif ?>
                            <div class="mb-3">
                                <label for="" class="form-label">Email:</label>
                                <input value="<?= isset($_POST['email']) ? ($_POST['email']) : '' ?>" type="email" required name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password:</label>
                                <input value="<?= isset($_POST['password']) ? ($_POST['password']) : '' ?>" type="password" required name="password" class="form-control">
                            </div>
                            <button name="login" class="btn btn-danger col-12" type="submit">LOG IN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
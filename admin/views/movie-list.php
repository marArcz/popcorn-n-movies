<?php
session_start();

require_once '../../conn/conn.php';
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
    <?php include_once '../includes/navbar.php' ?>
    <section class="py-3">

        <div class="container">
            <h3>Movie List</h3>
            <?php
            $index = 1;
            $query = $pdo->query("SELECT * FROM visits WHERE DATE(created_at) = CURDATE() ORDER BY created_at DESC, id DESC LIMIT 20");
            ?>
            <div class="table-responsive-sm mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>TMDB ID</th>
                            <th>Agent</th>
                            <th>Page</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $query->fetch()): ?>
                            <tr>
                                <td><?= $index++ ?></td>
                                <td><?= $row['ip_address'] ?></td>
                                <td><?= $row['agent'] ?></td>
                                <td><?= $row['page'] ?></td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>

</html>
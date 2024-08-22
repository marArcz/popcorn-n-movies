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
            <h3>Dashboard</h3>

            <div class="mt-4">
                <?php
                $query = $pdo->query("SELECT COUNT(id) FROM visits WHERE DATE(created_at) = CURDATE()");
                $visits = $query->fetch()[0];

                $query = $pdo->query("SELECT COUNT(id) FROM watches WHERE DATE(created_at) = CURDATE()");
                $watch = $query->fetch()[0];
                ?>
                <p>Total visits today: <?= $visits ?></p>
                <p>Total watch today: <?= $watch ?></p>
            </div>

            <div class="row mt-3">
                <div class="col-md">
                    <div class="">
                        <h4>Top 20 Visits today</h4>
                        <?php
                        $index = 1;
                        $query = $pdo->query("SELECT * FROM visits WHERE DATE(created_at) = CURDATE() ORDER BY created_at DESC, id DESC LIMIT 20");
                        ?>
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>IP Address</th>
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
                <div class="col-md">
                    <div class="">
                        <h4>Top 20 Watches today</h4>
                        <?php
                        $index = 1;
                        $query = $pdo->query("SELECT * FROM watches WHERE DATE(created_at) = CURDATE() ORDER BY created_at DESC, id DESC LIMIT 20");
                        ?>
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>IP Address</th>
                                    <th>Agent</th>
                                    <th>Movie</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $query->fetch()): ?>
                                    <tr>
                                        <td><?= $index++ ?></td>
                                        <td><?= $row['ip_address'] ?></td>
                                        <td><?= $row['agent'] ?></td>
                                        <td><?= $row['movie'] ?></td>
                                    </tr>
                                <?php endwhile ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
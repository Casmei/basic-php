<?php require "../bootstrap.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Casmei - Contato</title>
</head>
<body>
    <div class="container mt-4">
        <?php
            try {
                require load();
            } catch(Exception $e) {
                echo $e->getMessage();
            }
        ?>
    </div>
</body>
</html>
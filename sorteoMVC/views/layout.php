<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteo </title>
    <link rel="stylesheet" href="/build/css/app.css">

    <meta name="app-base" content="<?php echo $assetBase; ?>">
</head>
<body>

    
    <?= $contenido ?>
    <?php include_once __DIR__ . '/templates/tabla.php'; ?>
    <?php include_once __DIR__ . '/templates/footer.php'; ?>


    <script src="/build/js/main.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</body>
</html>
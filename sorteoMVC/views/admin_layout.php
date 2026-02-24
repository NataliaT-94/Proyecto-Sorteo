<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteo/ Admin </title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body class="dashboard">
    <?php 
        include_once __DIR__ .'/templates/admin-header.php';
    ?>
    <div class="dashboard__grid">
        <?php
            include_once __DIR__ .'/templates/admin-sidebar.php';  
        ?>

        <main class="dashboard__contenido">
            <?php 
                echo $contenido; 
            ?> 
        </main>
    </div>


    <script src="/build/js/main.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</body>
</html>
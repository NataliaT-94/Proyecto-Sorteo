<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteo - <?php echo $titulo; ?></title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <header class="header">
        <div class="contenedor contenido-header">
            <div class="logo">
                <i class="fa-solid fa-calendar-days"></i>
                <div class="titulo">Sorteo Inicio de Ciclo Escolar!!!</div>
            </div>
            <div class="producto">
                <img src="" alt="Foto Producto">
                <p class="producto-descripcion">Descripcion del producto, condiciones del sorteo, fecha y hora</p>
            </div>
        </div>
    </header>
    <main>
        <section>
            <table >
                <tbody>

                </tbody>
            </table>
        </section>
    </main>
    <?php 
        echo $contenido;
        include_once __DIR__ .'/templates/footer.php'; 
    ?>


    <script src="/build/js/main.min.js" defer></script>
</body>
</html>
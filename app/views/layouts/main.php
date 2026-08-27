<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($titulo ?? 'Jersx Programing') ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/jersx-web/public/css/style.css">
</head>
<body>

    <header class="site-header">
        <div class="container">
            <a href="/jersx-web/public/" class="logo">Jersx<span>Programing</span></a>
            <nav>
                <a href="/jersx-web/public/">Inicio</a>
                <a href="/jersx-web/public/servicios">Servicios</a>
                <a href="/jersx-web/public/portafolio">Portafolio</a>
                <a href="/jersx-web/public/cotizar">Cotizar</a>
                <a href="/jersx-web/public/contacto">Contacto</a>
            </nav>
        </div>
    </header>

    <main>
        <?= $content ?>
    </main>

    <footer class="site-footer">
        <div class="container">
            <p>&copy; <?= date('Y') ?> Jersx Programing. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>
</html>
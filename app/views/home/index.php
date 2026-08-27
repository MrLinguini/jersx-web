<section class="hero">
    <div class="container">
        <h1>Construimos el software que tu negocio necesita.</h1>
        <p class="hero-subtitulo">
            Desarrollo web a medida, sistemas de gestión y automatización de procesos — con código limpio y soporte real.
        </p>
        <div class="hero-botones">
            <a href="/jersx-web/public/cotizar" class="btn-primary">Cotiza tu proyecto</a>
            <a href="/jersx-web/public/portafolio" class="btn-secondary">Ver portafolio</a>
        </div>
    </div>
</section>

<section class="destacados">
    <div class="container">
        <h2>Lo que hacemos</h2>
        <div class="grid">
            <?php foreach ($destacados as $item): ?>
                <div class="servicio-card">
                    <span class="servicio-icono"><?= $item['icono'] ?></span>
                    <h3><?= htmlspecialchars($item['titulo']) ?></h3>
                    <p><?= htmlspecialchars($item['descripcion']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="destacados-footer">
            <a href="/jersx-web/public/servicios">Ver todos los servicios →</a>
        </div>
    </div>
</section>
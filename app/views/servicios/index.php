<section class="servicios-hero">
    <div class="container">
        <h1>Nuestros Servicios</h1>
        <p>Soluciones de software diseñadas para resolver problemas reales.</p>
    </div>
</section>

<section class="servicios-grid">
    <div class="container grid">
        <?php foreach ($servicios as $servicio): ?>
            <div class="servicio-card">
                <span class="servicio-icono"><?= $servicio['icono'] ?></span>
                <h3><?= htmlspecialchars($servicio['titulo']) ?></h3>
                <p><?= htmlspecialchars($servicio['descripcion']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>
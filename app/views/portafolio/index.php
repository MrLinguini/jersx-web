<section class="servicios-hero">
    <div class="container">
        <h1>Portafolio</h1>
        <p>Proyectos que demuestran nuestra forma de resolver problemas.</p>
    </div>
</section>

<section class="portafolio-grid">
    <div class="container grid">
        <?php foreach ($proyectos as $proyecto): ?>
            <div class="proyecto-card">
                <div class="proyecto-imagen-placeholder">
                    <span>🖼️</span>
                </div>
                <h3><?= htmlspecialchars($proyecto['nombre']) ?></h3>
                <p><?= htmlspecialchars($proyecto['descripcion']) ?></p>
                <div class="proyecto-tags">
                    <?php foreach ($proyecto['tecnologias'] as $tech): ?>
                        <span class="tag"><?= htmlspecialchars($tech) ?></span>
                    <?php endforeach; ?>
                </div>
                <div class="proyecto-links">
                    <a href="<?= htmlspecialchars($proyecto['github']) ?>" target="_blank">GitHub</a>
                    <a href="<?= htmlspecialchars($proyecto['demo']) ?>" target="_blank">Demo</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
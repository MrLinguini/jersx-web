<section class="admin-panel">
    <div class="container">
        <div class="admin-header">
            <h1>Cotizaciones recibidas</h1>
            <a href="/jersx-web/public/admin/logout" class="btn-logout">Cerrar sesión</a>
        </div>

        <?php if (empty($cotizaciones)): ?>
            <p>Todavía no hay cotizaciones registradas.</p>
        <?php else: ?>
            <div class="tabla-wrapper">
                <table class="tabla-cotizaciones">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Nombre</th>
                            <th>Contacto</th>
                            <th>Tipo</th>
                            <th>Páginas</th>
                            <th>Features</th>
                            <th>Precio</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cotizaciones as $c): ?>
                            <tr data-id="<?= $c['id'] ?>">
                                <td><?= date('d/m/Y H:i', strtotime($c['created_at'])) ?></td>
                                <td><?= htmlspecialchars($c['nombre']) ?></td>
                                <td>
                                    <?= htmlspecialchars($c['email']) ?><br>
                                    <small><?= htmlspecialchars($c['telefono'] ?: '-') ?></small>
                                </td>
                                <td><?= htmlspecialchars(ucfirst($c['tipo_proyecto'])) ?></td>
                                <td><?= (int) $c['paginas_estimadas'] ?></td>
                                <td>
                                    <?php if ($c['features']): ?>
                                        <?php foreach (explode(',', $c['features']) as $f): ?>
                                            <span class="tag-feature"><?= htmlspecialchars(str_replace('_', ' ', $f)) ?></span>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <span>-</span>
                                    <?php endif; ?>
                                </td>
                                <td class="precio-cell">Q<?= number_format($c['precio_estimado'], 2) ?></td>
                                <td>
                                    <select class="select-estado" data-id="<?= $c['id'] ?>">
                                        <option value="nuevo" <?= $c['estado'] === 'nuevo' ? 'selected' : '' ?>>Nuevo</option>
                                        <option value="contactado" <?= $c['estado'] === 'contactado' ? 'selected' : '' ?>>Contactado</option>
                                        <option value="cerrado" <?= $c['estado'] === 'cerrado' ? 'selected' : '' ?>>Cerrado</option>
                                    </select>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</section>

<script src="/jersx-web/public/js/admin.js"></script>
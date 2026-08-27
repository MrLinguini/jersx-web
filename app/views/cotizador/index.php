<section class="servicios-hero">
    <div class="container">
        <h1>Cotiza tu Proyecto</h1>
        <p>Selecciona las opciones y obtén un estimado al instante.</p>
    </div>
</section>

<section class="cotizador">
    <div class="container">
        <form id="form-cotizador">

            <div class="campo">
                <label for="tipo_proyecto">Tipo de proyecto</label>
                <select id="tipo_proyecto" name="tipo_proyecto" required>
                    <option value="">Selecciona una opción</option>
                    <option value="landing" data-precio="<?= $preciosBase['landing'] ?>" data-incluidas="1">
                        Landing page — Q<?= number_format($preciosBase['landing']) ?>
                    </option>
                    <option value="backend" data-precio="<?= $preciosBase['backend'] ?>" data-incluidas="5">
                        Sitio con backend + BD — Q<?= number_format($preciosBase['backend']) ?>
                    </option>
                    <option value="sistema" data-precio="<?= $preciosBase['sistema'] ?>" data-incluidas="5">
                        Sistema/panel de gestión — Q<?= number_format($preciosBase['sistema']) ?>
                    </option>
                </select>
            </div>

            <div class="campo">
                <label for="paginas">Número de páginas estimadas</label>
                <input type="number" id="paginas" name="paginas" min="1" value="1" required>
                <small id="info-paginas"></small>
            </div>

            <div class="campo">
                <label>Funcionalidades adicionales</label>
                <div class="features-grid">
                    <?php foreach ($preciosFeatures as $key => $precio): ?>
                        <label class="feature-check">
                            <input type="checkbox" name="features[]" value="<?= $key ?>" data-precio="<?= $precio ?>">
                            <?= ucwords(str_replace('_', ' ', $key)) ?> (+Q<?= number_format($precio) ?>)
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="precio-total">
                <span>Precio estimado</span>
                <strong id="precio-final">Q0</strong>
            </div>

            <hr class="separador">

            <div class="campo">
                <label for="nombre">Nombre completo</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            <div class="campo">
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="campo">
                <label for="telefono">Teléfono (opcional)</label>
                <input type="tel" id="telefono" name="telefono">
            </div>

            <button type="submit" class="btn-enviar">Enviar cotización</button>

            <div id="mensaje-resultado"></div>

        </form>
    </div>
</section>

<script src="/jersx-web/public/js/cotizador.js"></script>
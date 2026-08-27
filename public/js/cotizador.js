document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('form-cotizador');
    const tipoSelect = document.getElementById('tipo_proyecto');
    const paginasInput = document.getElementById('paginas');
    const infoPaginas = document.getElementById('info-paginas');
    const precioFinalEl = document.getElementById('precio-final');
    const featureChecks = document.querySelectorAll('input[name="features[]"]');
    const PRECIO_POR_PAGINA = 350;

    function calcularPrecio() {
        const opcionSeleccionada = tipoSelect.options[tipoSelect.selectedIndex];

        if (!tipoSelect.value) {
            precioFinalEl.textContent = 'Q0';
            infoPaginas.textContent = '';
            return;
        }

        const precioBase = parseFloat(opcionSeleccionada.dataset.precio);
        const paginasIncluidas = parseInt(opcionSeleccionada.dataset.incluidas);
        const paginas = parseInt(paginasInput.value) || 1;

        const paginasExtra = Math.max(0, paginas - paginasIncluidas);
        infoPaginas.textContent = `Incluye ${paginasIncluidas} página(s). Páginas extra: ${paginasExtra} (+Q${paginasExtra * PRECIO_POR_PAGINA})`;

        let total = precioBase + (paginasExtra * PRECIO_POR_PAGINA);

        featureChecks.forEach(function (check) {
            if (check.checked) {
                total += parseFloat(check.dataset.precio);
            }
        });

        precioFinalEl.textContent = 'Q' + total.toLocaleString('es-GT');
    }

    tipoSelect.addEventListener('change', calcularPrecio);
    paginasInput.addEventListener('input', calcularPrecio);
    featureChecks.forEach(function (check) {
        check.addEventListener('change', calcularPrecio);
    });

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const resultadoEl = document.getElementById('mensaje-resultado');
        resultadoEl.textContent = 'Enviando...';
        resultadoEl.className = '';

        const formData = new FormData(form);

        fetch('/jersx-web/public/cotizar', {
            method: 'POST',
            body: formData,
        })
            .then(function (res) { return res.json(); })
            .then(function (data) {
                if (data.success) {
                    resultadoEl.textContent = `✅ ¡Cotización enviada! Precio final: Q${data.precio_final.toLocaleString('es-GT')}. Te contactaremos pronto.`;
                    resultadoEl.className = 'mensaje-exito';
                    form.reset();
                    calcularPrecio();
                } else {
                    resultadoEl.textContent = '❌ ' + (data.error || 'Ocurrió un error.');
                    resultadoEl.className = 'mensaje-error';
                }
            })
            .catch(function () {
                resultadoEl.textContent = '❌ Error de conexión. Intenta de nuevo.';
                resultadoEl.className = 'mensaje-error';
            });
    });
});
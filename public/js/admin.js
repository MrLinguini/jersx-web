document.addEventListener('DOMContentLoaded', function() {
    const selects = document.querySelectorAll('.select-estado');

    selects.forEach(function (select){
        select.addEventListener('change', function(){
            const id = this.dataset.id;
            const estado = this.value;

            fetch('/jersx-web/public/admin/cotizaciones/estado', {
                method: 'POST',
                headers: { 'Content-type': 'application/x-www-form-urlencoded' },
                body: `id=${id}&estado=${estado}`,
            })

            .then(function (res) { return res.json(); })
            .then(function (data) {
                if (!data.success) {
                    alert('No se pudo actualizar el estado.');
                }
            })
            .catch(function (){
                alert('Error de conexión al actualizar el estado.');
            });
        });
    });
});
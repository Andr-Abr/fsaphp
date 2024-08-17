document.addEventListener('DOMContentLoaded', function () {
    const searchForm = document.getElementById('searchForm');
    const advancedSearchForm = document.querySelector('form[action="/vehicles/resultados"]');

    if (searchForm) {
        searchForm.addEventListener('submit', function (e) {
            e.preventDefault();
            buscarVehiculos();
        });
    }

    if (advancedSearchForm) {
        advancedSearchForm.addEventListener('submit', function (e) {
            e.preventDefault();
            buscarVehiculos(1, this);
        });
    }

    function buscarVehiculos(page = 1, form = searchForm) {
        const formData = new FormData(form);
        formData.append('page', page);

        const url = '/vehicles/resultados?' + new URLSearchParams(formData);
        window.location.href = url;
    }

    document.getElementById('marca').addEventListener('change', function () {
        const marca = this.value;
        fetch(`/vehicles/modelos?marca=${marca}`)
            .then(response => response.json())
            .then(data => {
                const modeloSelect = document.getElementById('modelo');
                modeloSelect.innerHTML = '<option value="">Todos los modelos</option>';
                data.forEach(modelo => {
                    modeloSelect.innerHTML += `<option value="${modelo}">${modelo}</option>`;
                });
            });

        fetch(`/vehicles/anios?marca=${marca}`)
            .then(response => response.json())
            .then(data => {
                const anioSelect = document.getElementById('anio');
                anioSelect.innerHTML = '<option value="">Todos los años</option>';
                data.forEach(anio => {
                    anioSelect.innerHTML += `<option value="${anio}">${anio}</option>`;
                });
            });
    });
});

// Funcionalidad para el slider de consumo
document.addEventListener('DOMContentLoaded', function () {
    const consumoRange = document.getElementById('consumo_km_l');
    const consumoValue = document.getElementById('consumo_km_l_value');
    if (consumoRange && consumoValue) {
        consumoRange.addEventListener('input', function () {
            consumoValue.textContent = parseFloat(this.value).toFixed(3);
        });
    }
});

// Funcionalidad de autocompletado para la comparación de vehículos
document.addEventListener('DOMContentLoaded', function () {
    const searchInputs = document.querySelectorAll('.vehiculo-search');
    searchInputs.forEach(input => {
        input.addEventListener('input', function () {
            const query = this.value;
            const resultsDiv = this.nextElementSibling;
            if (query.length > 2) {
                fetch(`/vehicles/buscar-sugerencias?query=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        resultsDiv.innerHTML = '';
                        data.forEach(vehicle => {
                            const div = document.createElement('div');
                            div.textContent = `${vehicle.marca} ${vehicle.modelo} ${vehicle.anio} ${vehicle.motor}`;
                            div.addEventListener('click', () => selectVehicle(vehicle, input.closest('.compare-column')));
                            resultsDiv.appendChild(div);
                        });
                        resultsDiv.style.display = 'block';
                    });
            } else {
                resultsDiv.style.display = 'none';
            }
        });
    });

    function selectVehicle(vehicle, column) {
        fetch(`/vehicles/${vehicle.idVehiculos}`)
            .then(response => response.json())
            .then(data => {
                column.querySelector('.marca').textContent = data.marca;
                column.querySelector('.modelo').textContent = data.modelo;
                column.querySelector('.anio').textContent = data.anio;
                column.querySelector('.generacion').textContent = data.generacion;
                column.querySelector('.motor').textContent = data.motor;
                column.querySelector('.tipo_combustible').textContent = data.tipo_combustible;
                column.querySelector('.consumo_km_l').textContent = data.consumo_km_l;
                column.querySelector('.tipo_traccion').textContent = data.tipo_traccion;
                column.querySelector('.tipo_carroceria').textContent = data.tipo_carroceria;
                column.querySelector('.numero_plazas').textContent = data.numero_plazas;
                column.querySelector('.card-img-top').src = data.ruta_imagen;
                column.querySelector('.search-results').style.display = 'none';
            });
    }
});

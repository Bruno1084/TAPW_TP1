<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/baja.css">
    <title>Mi Veterinaria</title>
</head>

<body>
    <h1>View Baja</h1>
    <main>
        <h3>Opciones de Baja</h3>

        <section style="display: flex; gap: 1rem; margin-bottom: 2rem;">
            <div>
                <a href="/baja/mascota">Mascotas</a>
            </div>
            <div>
                <a href="/baja/amo">Amos</a>
            </div>
            <div>
                <a href="/baja/veterinario">Veterinarios</a>
            </div>
        </section>

        <section>
            <h4>Dar de baja adopción (Amo - Mascota)</h4>

            <?php

            use App\Models\AmoModel;
            use App\Models\MascotaModel;

            $amoModel = new AmoModel();
            $mascotaModel = new MascotaModel();

            $amos = $amoModel->findAll();
            $mascotas = $mascotaModel->findAll();
            ?>

            <form method="post" action="/baja/amo_mascota">
                <!-- Datos del Amo -->
                <div class="card">
                    <h5>Datos del Amo</h5>
                    <div>
                        <select id="selectAmo">
                            <option value="">-- Selecciona un amo --</option>
                            <?php foreach ($amos as $amo): ?>
                                <option value="<?= $amo['id'] ?>">
                                    <?= $amo['nombre'] . ' ' . $amo['apellido'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label for="nombreAmo">Nombre:</label>
                        <input type="text" name="nombreAmo" id="nombreAmo">
                    </div>
                    <div>
                        <label for="apellidoAmo">Apellido:</label>
                        <input type="text" name="apellidoAmo" id="apellidoAmo">
                    </div>
                    <div>
                        <label for="direccion">Dirección:</label>
                        <input type="text" name="direccion" id="direccion">
                    </div>
                    <div>
                        <label for="telefono">Teléfono:</label>
                        <input type="text" name="telefono" id="telefono">
                    </div>
                    <div>
                        <label for="fechaAltaAmo">Fecha de Alta:</label>
                        <input type="date" name="fechaAltaAmo" id="fechaAltaAmo">
                    </div>
                </div>

                <!-- Datos de la Mascota -->
                <div class="card">
                    <h5>Datos de la Mascota</h5>
                    <div>
                        <select id="selectMascota">
                            <option value="">-- Selecciona una Mascota --</option>
                            <?php foreach ($mascotas as $mascota): ?>
                                <option value="<?= $mascota['nroRegistro'] ?>">
                                    <?= $mascota['nombre'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label for="nombreMascota">Nombre:</label>
                        <input type="text" name="nombreMascota" id="nombreMascota">
                    </div>
                    <div>
                        <label for="especie">Especie:</label>
                        <input type="text" name="especie" id="especie">
                    </div>
                    <div>
                        <label for="raza">Raza:</label>
                        <input type="text" name="raza" id="raza">
                    </div>
                    <div>
                        <label for="edad">Edad:</label>
                        <input type="number" name="edad" id="edad">
                    </div>
                    <div>
                        <label for="fechaAltaMascota">Fecha de Alta:</label>
                        <input type="date" name="fechaAltaMascota" id="fechaAltaMascota">
                    </div>
                </div>

                <button type="submit" class="btn">Registrar Baja</button>
            </form>
        </section>
    </main>

    <script>
        // Rellena los demás campos una vez seleccionado un Amo
        document.getElementById('selectAmo').addEventListener('change', (event) => {
            const idAmo = event.target.value;
            if (!idAmo) return;

            fetch(`/amos/${idAmo}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('nombreAmo').value = data.nombre;
                    document.getElementById('apellidoAmo').value = data.apellido;
                    document.getElementById('direccion').value = data.direccion;
                    document.getElementById('telefono').value = data.telefono;
                    document.getElementById('fechaAltaAmo').value = data.fechaAlta?.split(' ')[0] ?? '';
                })
                .catch(err => console.error('Error: ', err));
        });

        // Rellena los dem´s campos una vez seleccionado una Mascota
        document.getElementById('selectMascota').addEventListener('change', (event) => {
            const idMascota = event.target.value;
            if (!idMascota) return;

            fetch(`/mascotas/${idMascota}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('nombreMascota').value = data.nombre;
                    document.getElementById('especie').value = data.especie;
                    document.getElementById('raza').value = data.raza;
                    document.getElementById('edad').value = data.edad;
                    document.getElementById('fechaAltaMascota').value = data.fechaAlta?.split(' ')[0] ?? '';
                })

            fetch(`/mascotas/porAmo/${idAmo}`)
                .then(response => response.json())
                .then(mascotas => {
                    const selectMascota = document.getElementById('selectMascota');
                    selectMascota.innerHTML = '<option value="">-- Selecciona una Mascota --</option>';

                    mascotas.forEach(mascota => {
                        const option = document.createElement('option');
                        option.value = mascota.nroRegistro;
                        option.textContent = mascota.nombre;
                        selectMascota.appendChild(option);
                    });

                    // Limpiar campos de mascota
                    document.getElementById('nombreMascota').value = '';
                    document.getElementById('especie').value = '';
                    document.getElementById('raza').value = '';
                    document.getElementById('edad').value = '';
                    document.getElementById('fechaAltaMascota').value = '';
                });

        });
    </script>
</body>

</html>
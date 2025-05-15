<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/baja.css">
    <title>Mi Veterinaria</title>
</head>

<body>
    <h1>View Baja Mascota</h1>

    <main>

        <section>
            <?php

            use App\Models\MascotaModel;

            $mascotaModel = new MascotaModel();
            $mascotas = $mascotaModel->findAll();
            ?>

            <form method="post" action="/baja/mascota">
                <div class="card">
                    <h5>Datos de la Mascota</h5>

                    <div>
                        <select id="selectMascota" name="idMascota" required>
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
                    <div>
                        <label for="fechaDefuncion">Fecha de Defuncion:</label>
                        <input type="date" name="fechaDefuncion" id="fechaDefuncion">
                    </div>
                    <div>
                        <button type="submit" class="btn">Registrar Baja</button>

                    </div>
                </div>
            </form>
        </section>
    </main>

    <script>
        // Rellena los demás campos una vez seleccionada una Mascota
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
                    document.getElementById('fechaDefuncion').value = data.fechaDefuncion?.split(' ')[0] ?? '';
                })
                .catch(err => console.error('Error al traer mascota:', err));
        });
    </script>
</body>

</html>
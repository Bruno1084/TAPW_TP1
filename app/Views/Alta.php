<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/alta.css">
    <title>Mi Veterinaria</title>
</head>

<body>
    <h1>View Alta</h1>

    <main>
        <h3>Opciones de Registros</h3>

        <section style="display: flex; gap: 1rem; margin-bottom: 2rem;">
            <a href="/alta/mascota" class="card">Alta mascota</a>
            <a href="/alta/amo" class="card">Alta amo</a>
            <a href="/alta/veterinario" class="card">Alta veterinario</a>
        </section>

        <section>
            <h4>Registrar adopción (Amo - Mascota)</h4>

            <form method="post" action="/alta/adopcion">
                <!-- Datos del Amo -->
                <div class="card">
                    <h5>Datos del Amo</h5>
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

                <button type="submit" class="btn">Registrar Adopción</button>
            </form>
        </section>
    </main>
</body>

</html>
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
    <h1>View Alta Veterinario</h1>

    <main>
        <h3>Registrar Veterinario</h3>

        <form method="post" action="/alta/veterinario">
            <div class="card">
                <h5>Datos del Veterinario</h5>
                <div>
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre">
                </div>
                <div>
                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido" id="apellido">
                </div>
                <div>
                    <label for="especialidad">Especialidad:</label>
                    <input type="text" name="especialidad" id="especialidad">
                </div>
                <div>
                    <label for="telefono">Teléfono:</label>
                    <input type="text" name="telefono" id="telefono">
                </div>
                <div>
                    <label for="fechaAlta">Fecha de Alta:</label>
                    <input type="date" name="fechaAlta" id="fechaAlta">
                </div>
            </div>

            <button type="submit" class="btn">Registrar Veterinario</button>
        </form>
    </main>
</body>

</html>
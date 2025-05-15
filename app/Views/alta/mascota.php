<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/alta.css">
    <title>Mi Veterinaria</title>
</head>

<body>
    <h1>View Alta Mascota</h1>

    <main>
        <h3>Registrar Mascota</h3>

        <form method="post" action="/alta/mascota">
            <div class="card">
                <h5>Datos de la Mascota</h5>

                <div>
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre">
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
                    <label for="fechaAlta">Fecha de Alta:</label>
                    <input type="date" name="fechaAlta" id="fechaAlta">
                </div>
            </div>

            <button type="submit" class="btn">Registrar Mascota</button>
        </form>
    </main>
</body>

</html>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/mascotaEdit.css">
    <title>Mi Veterinaria</title>
</head>

<body>
    <?= view('Layouts/header.php'); ?>

    <main>
        <?= view('Layouts/sideBar.php') ?>

        <section>
            <h1>Añadir Amo</h1>

            <div class="amoForm--container">
                <?php if (session()->has('error')): ?>
                    <div class="alert alert-danger"><?= session('error') ?></div>
                <?php endif; ?>

                <form action="/amos/crear" method="post">
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>

                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" id="apellido" name="apellido" required>
                    </div>

                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" id="direccion" name="direccion" required>
                    </div>

                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" id="telefono" name="telefono" required>
                    </div>

                    <div class="form-group">
                        <label for="fechaAlta">Fecha de Alta</label>
                        <input type="date" name="fechaAlta" id="fechaAlta">
                    </div>

                    <div class="form-actions">
                        <button type="submit">Crear</button>
                        <a href="/amos" class="cancel-button">Cancelar</a>
                    </div>
                </form>
            </div>

        </section>
    </main>
</body>

</html>
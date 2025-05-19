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
            <h1>Editar Mascota</h1>

            <div class="amoForm--container">
                <?php if (session()->has('error')): ?>
                    <div class="alert alert-danger"><?= session('error') ?></div>
                <?php endif; ?>

                <form action="/mascotas/editar/<?= esc($mascota['nroRegistro']) ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" value="<?= esc($mascota['nombre']) ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="especie">Especie</label>
                        <input type="text" id="especie" name="especie" value="<?= esc($mascota['especie']) ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="raza">Raza</label>
                        <input type="text" id="raza" name="raza" value="<?= esc($mascota['raza']) ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="edad">Edad</label>
                        <input type="text" id="edad" name="edad" value="<?= esc($mascota['edad']) ?>" required>
                    </div>

                    <div class="form-actions">
                        <button type="submit">Guardar Cambios</button>
                        <a href="/amos/<?= esc($mascota['nroRegistro']) ?>" class="cancel-button">Cancelar</a>
                    </div>
                </form>
            </div>

        </section>
    </main>
</body>

</html>
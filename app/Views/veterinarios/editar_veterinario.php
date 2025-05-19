<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/veterinarioEdit.css">
    <title>Mi Veterinaria</title>
</head>

<body>
    <?= view('Layouts/header.php'); ?>

    <main>
        <?= view('Layouts/sideBar.php') ?>

        <section>
            <h1>Editar Veterinario</h1>

            <div class="amoForm--container">
                <?php if (session()->has('error')): ?>
                    <div class="alert alert-danger"><?= session('error') ?></div>
                <?php endif; ?>

                <form action="/veterinarios/editar/<?= esc($veterinario['id']) ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" value="<?= esc($veterinario['nombre']) ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" id="apellido" name="apellido" value="<?= esc($veterinario['apellido']) ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="especialidad">Especialidad</label>
                        <input type="text" id="especialidad" name="especialidad" value="<?= esc($veterinario['especialidad']) ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" id="telefono" name="telefono" value="<?= esc($veterinario['telefono']) ?>" required>
                    </div>

                    <div class="form-actions">
                        <button type="submit">Guardar Cambios</button>
                        <a href="/veterinarios/<?= esc($veterinario['id']) ?>" class="cancel-button">Cancelar</a>
                    </div>
                </form>
            </div>

        </section>
    </main>
</body>

</html>
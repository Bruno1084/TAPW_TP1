<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/amoEdit.css">
    <title>Mi Veterinaria</title>
</head>

<body>
    <?= view('Layouts/header.php'); ?>

    <main>
        <?= view('Layouts/sideBar.php') ?>

        <section>
            <h1>Editar Adopción</h1>

            <div class="amoForm--container">
                <?php if (session()->has('error')): ?>
                    <div class="alert alert-danger"><?= session('error') ?></div>
                <?php endif; ?>

                <form action="/amos/adoptar/editar/<?= $adoptar['id'] ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="idAdoptar" id="idAdoptar" value="<?= esc($adoptar['id']) ?>">
                    <input type="hidden" name="idAmo" id="idAmo" value="<?= esc($adoptar['idAmo']) ?>">
                    <input type="hidden" name="idMascota" id="idMascota" value="<?= esc($adoptar['idMascota']) ?>">

                    <div class="form-group">
                        <label for="motivoFin">Motivo de finalización</label>
                        <input type="text" name="motivoFin" value="<?= esc($adoptar['motivoFin']) ?>">
                    </div>

                    <div class="form-group">
                        <label for="fechaInicio">Fecha de inicio</label>
                        <input type="date" id="fechaInicio" name="fechaInicio" value="<?= esc($adoptar['fechaInicio']) ?>">
                    </div>
                    <div class="form-group">
                        <label for="fechaFinal">Fecha de finalización</label>
                        <input type="date" id="fechaFinal" name="fechaFinal" value="<?= esc($adoptar['fechaFinal']) ?>">
                    </div>

                    <div class="form-actions">
                        <button type="submit">Guardar Cambios</button>
                        <a href="/amos/<?= esc($adoptar['idAmo']) ?>" class="cancel-button">Cancelar</a>
                    </div>
                </form>
            </div>

        </section>
    </main>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/adoptar_mascota.css">
    <title>Mi Veterinaria</title>
</head>

<body>
    <?= view('Layouts/header.php'); ?>

    <main>
        <?= view('Layouts/sideBar.php') ?>

        <section>
            <h1>Editar Atención Médica</h1>

            <div class="adoptarForm--container">
                <?php if (session()->getFlashdata('error')): ?>
                    <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
                <?php endif; ?>

                <form action="/veterinarios/atender/editar/<?= $atender['id'] ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="idAtender" id="idAtender" value="<?= esc($atender['id']) ?>">
                    <input type="hidden" name="idVeterinario" id="idVeterinario" value="<?= esc($atender['idVeterinario']) ?>">
                    <input type="hidden" name="idMascota" id="idMascota" value="<?= esc($atender['idMascota']) ?>">

                    <div class="form-group">
                        <label for="motivoAtencion">Motivo de la atención</label>
                        <input type="text" name="motivoAtencion" value="<?= esc($atender['motivoAtencion']) ?>">
                    </div>

                    <div class="form-group">
                        <label for="fechaAtencion">Fecha de atención</label>
                        <input type="date" id="fechaAtencion" name="fechaAtencion" value="<?= esc($atender['fechaAtencion']) ?>">
                    </div>

                    <div class="form-actions">
                        <button type="submit">Registrar Adopción</button>
                    </div>
                </form>
            </div>
    </main>
    </section>

</body>

</html>
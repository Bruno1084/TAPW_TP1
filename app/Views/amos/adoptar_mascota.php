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
            <h1>Registrar Adopción</h1>

            <div class="adoptarForm--container">
                <?php if (session()->getFlashdata('error')): ?>
                    <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
                <?php endif; ?>

                <form action="/amos/adoptar" method="post">
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label for="idAmo">Seleccionar Amo:</label>
                        <select name="idAmo" id="idAmo" required>
                            <option value="">-- Elegir Amo --</option>
                            <?php foreach ($amos as $amo): ?>
                                <option value="<?= esc($amo['id']) ?>">
                                    <?= esc($amo['nombre']) . ' ' . esc($amo['apellido']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nroRegistro">Seleccionar Mascota:</label>
                        <select name="nroRegistro" id="nroRegistro" required>
                            <option value="">-- Elegir Mascota --</option>
                            <?php foreach ($mascotas as $mascota): ?>
                                <option value="<?= esc($mascota['nroRegistro']) ?>">
                                    <?= esc($mascota['nombre']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="fechaInicio">Fecha de inicio:</label>
                        <input type="date" name="fechaInicio" id="fechaInicio" required>
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
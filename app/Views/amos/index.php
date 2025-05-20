<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/amoCard.css">
    <link rel="stylesheet" href="/css/filter.css">
    <title>Mi Veterinaria</title>
</head>

<body>
    <?= view('Layouts/header.php'); ?>

    <main>
        <?= view('Layouts/sideBar.php') ?>

        <section>
            <h1>Amos</h1>

            <div class="options--container">
                <div>
                    <a href="/amos/crear">Añadir</a>
                </div>
                <div>
                    <a href="/amos/adoptar">Adoptar</a>
                </div>
            </div>

            <?= view('Layouts/amos_filter.php') ?>

            <div class="table--container">
                <?php if (!isset($amos) || !is_array($amos) || count($amos) === 0): ?>
                    <div class="empty-message">
                        <p>No hay amos registrados.</p>
                    </div>
                <?php else: ?>
                    <!-- Cabecera -->
                    <div class="table--header">
                        <div>ID</div>
                        <div>Nombre</div>
                        <div>Apellido</div>
                        <div>Dirección</div>
                        <div>Teléfono</div>
                        <div>Fecha de Alta</div>
                        <div>Opciones</div>
                    </div>

                    <!-- Filas -->
                    <?php foreach ($amos as $amo): ?>
                        <div class="table--row" onclick="window.location='/amos/<?= $amo['id'] ?>'">
                            <div><?= htmlspecialchars($amo['id']) ?></div>
                            <div><?= htmlspecialchars($amo['nombre']) ?></div>
                            <div><?= htmlspecialchars($amo['apellido']) ?></div>
                            <div><?= htmlspecialchars($amo['direccion']) ?></div>
                            <div><?= htmlspecialchars($amo['telefono']) ?></div>
                            <div><?= htmlspecialchars($amo['fechaAlta']) ?></div>
                            <div class="row--actions" onclick="event.stopPropagation()">
                                <a href="/amos/editar/<?= $amo['id'] ?>">✏️</a>
                                <a href="/amos/eliminar/<?= $amo['id'] ?>">❌</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>
    </main>
</body>

</html>
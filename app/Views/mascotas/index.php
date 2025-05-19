<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/mascotaCard.css">
    <title>Mi Veterinaria</title>
</head>

<body>
    <?= view('Layouts/header.php'); ?>

    <main>
        <?= view('Layouts/sideBar.php') ?>

        <section>
            <h1>Mascotas</h1>

            <div class="options--container">
                <div>
                    <a href="/mascotas/crear">Añadir</a>
                </div>
                <div>
                    <a href="/amos/adoptar">Adoptar</a>
                </div>
                <div>
                    <a href="/veterinarios/atender">Atender</a>
                </div>
            </div>

            <div class="filter--container">
                <div>
                    <p>filter</p>
                </div>
            </div>

            <section class="table--container">
                <?php if (!isset($mascotas) || !is_array($mascotas) || count($mascotas) === 0): ?>
                    <div class="empty-message">
                        <p>No hay mascotas registradas.</p>
                    </div>
                <?php else: ?>
                    <!-- Cabecera -->
                    <div class="table--header">
                        <div>Nro Registro</div>
                        <div>Nombre</div>
                        <div>Especie</div>
                        <div>Raza</div>
                        <div>Edad</div>
                        <div>Fecha Alta</div>
                        <div>Fecha Defunción</div>
                        <div>Opciones</div>
                    </div>

                    <!-- Filas -->
                    <?php foreach ($mascotas as $mascota): ?>
                        <div class="table--row" onclick="window.location='/mascotas/<?= $mascota['nroRegistro'] ?>'">
                            <div><?= htmlspecialchars($mascota['nroRegistro']) ?></div>
                            <div><?= htmlspecialchars($mascota['nombre']) ?></div>
                            <div><?= htmlspecialchars($mascota['especie']) ?></div>
                            <div><?= htmlspecialchars($mascota['raza']) ?></div>
                            <div><?= htmlspecialchars($mascota['edad']) ?></div>
                            <div><?= htmlspecialchars($mascota['fechaAlta']) ?></div>
                            <div><?= htmlspecialchars($mascota['fechaDefuncion']) ?></div>
                            <div class="row--actions" onclick="event.stopPropagation()">
                                <a href="/mascotas/editar/<?= $mascota['nroRegistro'] ?>">✏️</a>
                                <a href="/mascotas/eliminar/<?= $mascota['nroRegistro'] ?>">❌</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </section>

        </section>
    </main>
</body>

</html>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/veterinarioCard.css">
    <title>Mi Veterinaria</title>
</head>


<body>
    <?php
    $mascotasActuales = array_filter($mascotas, fn($m) => is_null($m['fechaDefuncion']));
    $mascotasAnteriores = array_filter($mascotas, fn($m) => !is_null($m['fechaDefuncion']));
    ?>
    <?= view('Layouts/header.php'); ?>

    <main>
        <?= view('Layouts/sideBar.php'); ?>

        <section>
            <h1>Detalles de Veterinario</h1>

            <div class="options--container">
                <div>
                    <a href="/veterinarios/atender">Atender Mascota</a>
                </div>
                <div>
                    <a href="/veterinarios/editar/<?= $veterinario['id'] ?>">Editar</a>
                </div>
                <div>
                    <a href="/veterinarios/eliminar/<?= $veterinario['id'] ?>">Eliminar</a>
                </div>
            </div>

            <!-- Datos de la mascota actual -->
            <div class="mascotaActualCard--container">
                <h2>Mascotas atendidas</h2>
                <?php if (empty($mascotas)): ?>
                    <p>No hay mascotas atendidas.</p>
                <?php else: ?>
                    <div class="table--container">
                        <!-- Cabecera -->
                        <div class="table--header">
                            <div>ID Atención</div>
                            <div>Nombre</div>
                            <div>Especie</div>
                            <div>Raza</div>
                            <div>Edad</div>
                            <div>Motivo</div>
                            <div>Fecha</div>
                            <div>Opciones</div>
                        </div>

                        <!-- Filas -->
                        <?php foreach ($mascotas as $mascota): ?>
                            <div class="table--row">
                                <div><?= htmlspecialchars($mascota['id']) ?></div>
                                <div><?= htmlspecialchars($mascota['nombre']) ?></div>
                                <div><?= htmlspecialchars($mascota['especie']) ?></div>
                                <div><?= htmlspecialchars($mascota['raza']) ?></div>
                                <div><?= htmlspecialchars($mascota['edad']) ?></div>
                                <div><?= htmlspecialchars($mascota['motivoAtencion']) ?></div>
                                <div><?= htmlspecialchars($mascota['fechaAtencion']) ?></div>
                                <div class="row--actions" onclick="event.stopPropagation()">
                                    <a href="/veterinarios/atender/editar/<?= $mascota['id'] ?>">✏️</a>
                                    <a href="/veterinarios/atender/eliminar/<?= $mascota['id'] ?>">❌</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>
</body>

</html>
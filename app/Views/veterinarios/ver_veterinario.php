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
                    <a href="#">Añadir Mascota</a>
                </div>
                <div>
                    <a href="#">Editar</a>
                </div>
                <div>
                    <a href="#">Eliminar</a>
                </div>
            </div>

            <!-- Datos de la mascota actual -->
            <div class="mascotaActualCard--container">
                <h2>Mascotas actuales</h2>
                <?php if (empty($mascotasActuales)): ?>
                    <p>No hay mascotas actuales.</p>
                <?php else: ?>
                    <div class="table--container">
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
                        <?php foreach ($mascotasActuales as $mascota): ?>
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
                    </div>
                <?php endif; ?>
            </div>
            </div>

            <!-- Datos del amo anterior -->
            <div class="mascotaHistorial--container">
                <h2>Historial de mascotas</h2>
                <?php if (empty($mascotasAnteriores)): ?>
                    <p>No hay mascotas anteriores.</p>
                <?php else: ?>
                    <div class="table--container">
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
                    <?php foreach ($mascotasAnteriores as $mascota): ?>
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
                    </div>
                <?php endif; ?>
            </div>
            </div>
        </section>
    </main>
</body>

</html>
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
    <?php
    $mascotasActuales = array_filter(
        $mascotas,
        fn($m) =>
        is_null($m['fechaDefuncion']) && empty($m['motivoFin'])
    );

    $mascotasAnteriores = array_filter(
        $mascotas,
        fn($m) =>
        !is_null($m['fechaDefuncion']) || !empty($m['motivoFin'])
    );
    ?>
    <?= view('Layouts/header.php'); ?>

    <main>
        <?= view('Layouts/sideBar.php'); ?>

        <section>
            <h1>Detalles de Amo</h1>

            <div class="options--container">
                <div>
                    <a href="/amos/adoptar">Adoptar Mascota</a>
                </div>
                <div>
                    <a href="/amos/editar/<?= $amo['id'] ?>">Editar</a>
                </div>
                <div>
                    <a href="/amos/eliminar/<?= $amo['id'] ?>">Eliminar</a>
                </div>
            </div>

            <div class="mascotaActualCard--container">
                <div class="table--container">
                    <!-- Cabecera -->
                    <div class="table--header">
                        <div>ID</div>
                        <div>Nombre</div>
                        <div>Apellido</div>
                        <div>Dirección</div>
                        <div>Teléfono</div>
                        <div>Fecha Alta</div>
                    </div>

                    <!-- Filas -->
                    <div class="table--row">
                        <div><?= htmlspecialchars($amo['id']) ?></div>
                        <div><?= htmlspecialchars($amo['nombre']) ?></div>
                        <div><?= htmlspecialchars($amo['apellido']) ?></div>
                        <div><?= htmlspecialchars($amo['direccion']) ?></div>
                        <div><?= htmlspecialchars($amo['telefono']) ?></div>
                        <div><?= htmlspecialchars($amo['fechaAlta']) ?></div>
                    </div>
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
                            <div>Fecha de Incio</div>
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
                                <div><?= htmlspecialchars($mascota['fechaInicio']) ?></div>
                                <div><?= htmlspecialchars($mascota['fechaDefuncion']) ?></div>
                                <div class="row--actions" onclick="event.stopPropagation()">
                                    <a href="/amos/adoptar/editar/<?= $mascota['id'] ?>">✏️</a>
                                    <a href="/amos/adoptar/eliminar/<?= $mascota['id'] ?>">❌</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
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
                            <div>Motivo de Finalización</div>
                            <div>Fecha de Finalización</div>
                            <div>Fecha Defunción</div>
                        </div>

                        <!-- Filas -->
                        <?php foreach ($mascotasAnteriores as $mascota): ?>
                            <div class="table--row" onclick="window.location='/mascotas/<?= $mascota['nroRegistro'] ?>'">
                                <div><?= htmlspecialchars($mascota['nroRegistro']) ?></div>
                                <div><?= htmlspecialchars($mascota['nombre']) ?></div>
                                <div><?= htmlspecialchars($mascota['especie']) ?></div>
                                <div><?= htmlspecialchars($mascota['raza']) ?></div>
                                <div><?= htmlspecialchars($mascota['edad']) ?></div>
                                <div><?= htmlspecialchars($mascota['motivoFin']) ?></div>
                                 <div><?= htmlspecialchars($mascota['fechaFinal']) ?></div>
                                <div><?= htmlspecialchars($mascota['fechaDefuncion']) ?></div>
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
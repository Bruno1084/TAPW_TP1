<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/amoCard.css">
    <title>Mi Veterinaria</title>
</head>


<body>
    <?php
    $amoActuales = array_filter($amos, fn($a) => is_null($a['fechaFinal']));
    $amosAnteriores = array_filter($amos, fn($a) => !is_null($a['fechaFinal']));
    ?>
    <?= view('Layouts/header.php'); ?>

    <main>
        <?= view('Layouts/sideBar.php'); ?>

        <section>
            <h1>Detalles de Mascota</h1>

            <div class="options--container">
                <div>
                    <a href="/amos/adoptar">Añadir Amo</a>
                </div>
                <div>
                    <a href="/mascotas/editar/<?= $mascota['nroRegistro'] ?>">Editar</a>
                </div>
                <div>
                    <a href="/mascotas/eliminar/<?= $mascota['nroRegistro'] ?>">Eliminar</a>
                </div>
            </div>

            <div class="mascotaActualCard--container">
                <div class="table--container">
                    <!-- Cabecera -->
                    <div class="table--header">
                        <div>NroRegistro</div>
                        <div>Nombre</div>
                        <div>Especie</div>
                        <div>Raza</div>
                        <div>Edad</div>
                        <div>Fecha Alta</div>
                        <div>Fecha Defunción</div>
                    </div>

                    <!-- Filas -->
                    <div class="table--row">
                        <div><?= htmlspecialchars($mascota['nroRegistro']) ?></div>
                        <div><?= htmlspecialchars($mascota['nombre']) ?></div>
                        <div><?= htmlspecialchars($mascota['especie']) ?></div>
                        <div><?= htmlspecialchars($mascota['raza']) ?></div>
                        <div><?= htmlspecialchars($mascota['edad']) ?></div>
                        <div><?= htmlspecialchars($mascota['fechaAlta']) ?></div>
                        <div><?= htmlspecialchars($mascota['fechaDefuncion']) ?></div>
                    </div>
                </div>
            </div>

            <!-- Datos del amo actual -->
            <div class="amoActualCard--container">
                <h2>Amo actual</h2>
                <?php if (empty($amoActuales)): ?>
                    <p>No hay amo actual.</p>
                <?php else: ?>
                    <div class="table--container">
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
                        <?php foreach ($amoActuales as $amo): ?>
                            <div class="table--row" onclick="window.location='/amos/<?= $amo['id'] ?>'">
                                <div><?= htmlspecialchars($amo['id']) ?></div>
                                <div><?= htmlspecialchars($amo['nombre']) ?></div>
                                <div><?= htmlspecialchars($amo['apellido']) ?></div>
                                <div><?= htmlspecialchars($amo['direccion']) ?></div>
                                <div><?= htmlspecialchars($amo['telefono']) ?></div>
                                <div><?= htmlspecialchars($amo['fechaAlta']) ?></div>
                                <div class="row--actions" onclick="event.stopPropagation()">
                                    <a href="/mascotas/adoptar/editar/<?= $amo['id'] ?>">✏️</a>
                                    <a href="/mascotas/adoptar/eliminar/<?= $amo['id'] ?>">❌</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            </div>

            <!-- Datos del amo anterior -->
            <div class="amoHistorial--container">
                <h2>Historial de amos</h2>
                <?php if (empty($amosAnteriores)): ?>
                    <p>No hay amos anteriores.</p>
                <?php else: ?>
                    <div class="table--container">
                        <!-- Cabecera -->
                        <div class="table--header">
                            <div>ID</div>
                            <div>Nombre</div>
                            <div>Apellido</div>
                            <div>Dirección</div>
                            <div>Teléfono</div>
                            <div>Fecha de Alta</div>
                        </div>

                        <!-- Filas -->
                        <?php foreach ($amosAnteriores as $amo): ?>
                            <div class="table--row" onclick="window.location='/amos/<?= $amo['id'] ?>'">
                                <div><?= htmlspecialchars($amo['id']) ?></div>
                                <div><?= htmlspecialchars($amo['nombre']) ?></div>
                                <div><?= htmlspecialchars($amo['apellido']) ?></div>
                                <div><?= htmlspecialchars($amo['direccion']) ?></div>
                                <div><?= htmlspecialchars($amo['telefono']) ?></div>
                                <div><?= htmlspecialchars($amo['fechaAlta']) ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>
</body>

</html>
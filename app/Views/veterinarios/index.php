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
    <?= view('Layouts/header.php'); ?>

    <main>
        <?= view('Layouts/sideBar.php') ?>

        <section>
            <h1>Veterinarios</h1>

            <div class="options--container">
                <div>
                    <a href="#">Añadir</a>
                </div>
                <div>
                    <a href="#">Atender mascota</a>
                </div>
            </div>

            <div class="filter--container">
                <div>
                    <p>filter</p>
                </div>
            </div>

            <div class="table--container">
                <?php if (!isset($veterinarios) || !is_array($veterinarios) || count($veterinarios) === 0): ?>
                    <div class="empty-message">
                        <p>No hay veterinarios registrados.</p>
                    </div>
                <?php else: ?>
                    <!-- Cabecera -->
                    <div class="table--header">
                        <div>ID</div>
                        <div>Nombre</div>
                        <div>Apellido</div>
                        <div>Especialidad</div>
                        <div>Teléfono</div>
                        <div>Fecha de Ingreso</div>
                        <div>Fecha de Egreso</div>
                        <div>Opciones</div>
                    </div>

                    <!-- Filas -->
                    <?php foreach ($veterinarios as $veterinario): ?>
                        <div class="table--row" onclick="window.location='/veterinarios/<?= $veterinario['id'] ?>'">
                            <div><?= htmlspecialchars($veterinario['id']) ?></div>
                            <div><?= htmlspecialchars($veterinario['nombre']) ?></div>
                            <div><?= htmlspecialchars($veterinario['apellido']) ?></div>
                            <div><?= htmlspecialchars($veterinario['especialidad']) ?></div>
                            <div><?= htmlspecialchars($veterinario['telefono']) ?></div>
                            <div><?= htmlspecialchars($veterinario['fechaIngreso']) ?></div>
                            <div><?= htmlspecialchars($veterinario['fechaEgreso']) ?></div>
                            <div class="row--actions" onclick="event.stopPropagation()">
                                <a href="/veterinario/editar/<?= $veterinario['id'] ?>">✏️</a>
                                <a href="/veterinario/eliminar/<?= $veterinario['id'] ?>">❌</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>
    </main>
</body>

</html>
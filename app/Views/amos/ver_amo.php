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
    <h1>Lista de mascotas por amo</h1>

    <?php if (!isset($mascotas) || !is_array($mascotas) || count($mascotas) === 0): ?>
        <div>
            <p>No hay mascotas registradas.</p>
        </div>
    <?php else: ?>

        <?php
        $mascotasActuales = array_filter($mascotas, fn($m) => is_null($m['fechaDefuncion']));
        $mascotasAnteriores = array_filter($mascotas, fn($m) => !is_null($m['fechaDefuncion']));
        ?>

        <!-- Mascotas actuales -->
        <section>
            <h2>Mascotas actuales</h2>
            <?php if (empty($mascotasActuales)): ?>
                <p>No hay mascotas actuales.</p>
            <?php else: ?>
                <?php foreach ($mascotasActuales as $mascota): ?>
                    <div class="card">
                        <p><strong>Nombre:</strong> <?= htmlspecialchars($mascota['nombre']) ?></p>
                        <p><strong>Especie:</strong> <?= htmlspecialchars($mascota['especie']) ?></p>
                        <p><strong>Raza:</strong> <?= htmlspecialchars($mascota['raza']) ?></p>
                        <p><strong>Edad:</strong> <?= htmlspecialchars($mascota['edad']) ?></p>
                        <p><strong>Fecha de alta:</strong> <?= htmlspecialchars($mascota['fechaAlta']) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </section>

        <!-- Mascotas anteriores -->
        <section>
            <h2>Mascotas anteriores</h2>
            <?php if (empty($mascotasAnteriores)): ?>
                <p>No hay mascotas anteriores.</p>
            <?php else: ?>
                <?php foreach ($mascotasAnteriores as $mascota): ?>
                    <div class="card">
                        <p><strong>Nombre:</strong> <?= htmlspecialchars($mascota['nombre']) ?></p>
                        <p><strong>Especie:</strong> <?= htmlspecialchars($mascota['especie']) ?></p>
                        <p><strong>Raza:</strong> <?= htmlspecialchars($mascota['raza']) ?></p>
                        <p><strong>Edad:</strong> <?= htmlspecialchars($mascota['edad']) ?></p>
                        <p><strong>Fecha de alta:</strong> <?= htmlspecialchars($mascota['fechaAlta']) ?></p>
                        <p><strong>Fecha de finalización:</strong> <?= htmlspecialchars($mascota['fechaFinal']) ?></p>
                        <p><strong>Motivo fin:</strong> <?= htmlspecialchars($mascota['motivoFin']) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </section>

    <?php endif; ?>
</body>

</html>
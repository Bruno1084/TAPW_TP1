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
    <h1>Lista de mascotas por veterinario</h1>

    <?php if (!isset($mascotas) || !is_array($mascotas) || count($mascotas) === 0): ?>
        <div>
            <p>No hay mascotas registradas.</p>
        </div>
    <?php else: ?>

        <!-- Mascotas actuales -->
        <section>
            <h2>Mascotas atendidas</h2>
            <?php foreach ($mascotas as $mascota): ?>
                <div class="card">
                    <p><strong>Nombre:</strong> <?= htmlspecialchars($mascota['nombre']) ?></p>
                    <p><strong>Especie:</strong> <?= htmlspecialchars($mascota['especie']) ?></p>
                    <p><strong>Raza:</strong> <?= htmlspecialchars($mascota['raza']) ?></p>
                    <p><strong>Edad:</strong> <?= htmlspecialchars($mascota['edad']) ?></p>
                    <p><strong>Fecha de atención:</strong> <?= htmlspecialchars($mascota['fechaAtencion']) ?></p>
                    <p><strong>Motivo atención:</strong> <?= htmlspecialchars($mascota['motivoAtencion']) ?></p>
                </div>
            <?php endforeach; ?>
        </section>

    <?php endif; ?>
</body>

</html>
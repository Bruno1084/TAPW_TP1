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
    <h1>Vista index Veterinarios</h1>

    <?php if (!isset($veterinarios) || !is_array($veterinarios) || count($veterinarios) === 0): ?>
        <div>
            <p>No hay veterinarios registrados.</p>
        </div>
    <?php else: ?>
        <!-- Imprimir lista de veterinarios -->
        <?php foreach ($veterinarios as $veterinario): ?>
            <a href="/veterinarios/mascotas/<?= $veterinario['id'] ?>" class="card">
                <p><strong>Nombre:</strong> <?= htmlspecialchars($veterinario['nombre']) . " " . htmlspecialchars($veterinario['apellido']) ?></p>
                <p><strong>Especialidad:</strong> <?= htmlspecialchars($veterinario['especialidad']) ?></p>
                <p><strong>Teléfono:</strong> <?= htmlspecialchars($veterinario['telefono']) ?></p>
                <p><strong>Fecha de ingreso:</strong> <?= htmlspecialchars($veterinario['fechaIngreso']) ?></p>
                <p><strong>Fecha de egreso:</strong> <?= htmlspecialchars($veterinario['fechaEgreso']) ?></p>
            </a>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>
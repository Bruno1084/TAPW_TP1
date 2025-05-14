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
    <h1>Vista index Amos</h1>

    <?php if (!isset($amos) || !is_array($amos) || count($amos) === 0): ?>
        <div>
            <p>No hay amos registrados.</p>
        </div>
    <?php else: ?>
        <!-- Imprimir lista de amos -->
        <?php foreach ($amos as $amo): ?>
            <a href="/amos/<?= $amo['id'] ?>" class="card">
                <p><strong>Nombre:</strong> <?= htmlspecialchars($amo['nombre']) . " " . htmlspecialchars($amo['apellido']) ?></p>
                <p><strong>Dirección:</strong> <?= htmlspecialchars($amo['direccion']) ?></p>
                <p><strong>Teléfono:</strong> <?= htmlspecialchars($amo['telefono']) ?></p>
                <p><strong>Fecha de alta:</strong> <?= htmlspecialchars($amo['fechaAlta']) ?></p>
            </a>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>
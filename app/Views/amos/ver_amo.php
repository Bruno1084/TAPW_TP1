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
            <p>No hay mascota registradas.</p>
        </div>
    <?php else: ?>
        <!-- Imprimir lista de mascotas -->
        <?php foreach ($mascotas as $mascota): ?>
            <div class="card">
                <p><strong>NroRegistro:</strong> <?= htmlspecialchars($mascota['nroRegistro']) ?></p>
                <p><strong>Nombre:</strong> <?= htmlspecialchars($mascota['nombre']) ?></p>
                <p><strong>Especie:</strong> <?= htmlspecialchars($mascota['especie']) ?></p>
                <p><strong>Raza:</strong> <?= htmlspecialchars($mascota['raza']) ?></p>
                <p><strong>Edad:</strong> <?= htmlspecialchars($mascota['edad']) ?></p>
                <p><strong>Fecha de alta:</strong> <?= htmlspecialchars($mascota['fechaAlta']) ?></p>
                <p><strong>Fecha de defunción:</strong> <?= htmlspecialchars($mascota['fechaDefuncion']) ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>
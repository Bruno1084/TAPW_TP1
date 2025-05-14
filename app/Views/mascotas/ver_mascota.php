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
    <h1>Lista de amos por mascota</h1>

    <?php if (!isset($amos) || !is_array($amos) || count($amos) === 0): ?>
        <div>
            <p>No hay amos registrados.</p>
        </div>
    <?php else: ?>

        <?php
        $amoActuales = array_filter($amos, fn($a) => is_null($a['fechaFinal']));
        $amosAnteriores = array_filter($amos, fn($a) => !is_null($a['fechaFinal']));
        ?>

        <!-- Amos actuales -->
        <section>
            <h2>Amo actual</h2>
            <?php if (empty($amoActuales)): ?>
                <p>No hay amo actual.</p>
            <?php else: ?>
                <?php foreach ($amoActuales as $amo): ?>
                    <div class="card">
                        <p><strong>Nombre:</strong> <?= esc($amo['nombre']) . " " . esc($amo['apellido']) ?></p>
                        <p><strong>Dirección:</strong> <?= esc($amo['direccion']) ?></p>
                        <p><strong>Teléfono:</strong> <?= esc($amo['telefono']) ?></p>
                        <p><strong>Fecha de alta:</strong> <?= esc($amo['fechaAlta']) ?></p>
                        <p><strong>Fecha de inicio relación:</strong> <?= esc($amo['fechaInicio']) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </section>

        <!-- Amos anteriores -->
        <section>
            <h2>Amos anteriores</h2>
            <?php if (empty($amosAnteriores)): ?>
                <p>No hay amos anteriores.</p>
            <?php else: ?>
                <?php foreach ($amosAnteriores as $amo): ?>
                    <div class="card">
                        <p><strong>Nombre:</strong> <?= esc($amo['nombre']) . " " . esc($amo['apellido']) ?></p>
                        <p><strong>Dirección:</strong> <?= esc($amo['direccion']) ?></p>
                        <p><strong>Teléfono:</strong> <?= esc($amo['telefono']) ?></p>
                        <p><strong>Fecha de alta:</strong> <?= esc($amo['fechaAlta']) ?></p>
                        <p><strong>Fecha inicio relación:</strong> <?= esc($amo['fechaInicio']) ?></p>
                        <p><strong>Fecha fin relación:</strong> <?= esc($amo['fechaFinal']) ?></p>
                        <p><strong>Motivo fin:</strong> <?= esc($amo['motivoFin']) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </section>

    <?php endif; ?>

</body>

</html>
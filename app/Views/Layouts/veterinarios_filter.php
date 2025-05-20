<div class="amoFilter--container">
    <form action="/veterinarios" method="get">
        <div>
            <input type="text" name="nombre" placeholder="Nombre" value="<?= esc($_GET['nombre'] ?? '') ?>">
        </div>
        <div>
            <input type="text" name="apellido" placeholder="Apellido" value="<?= esc($_GET['apellido'] ?? '') ?>">
        </div>
        <div>
            <input type="text" name="especialidad" placeholder="Especialidad" value="<?= esc($_GET['especialidad'] ?? '') ?>">
        </div>
        <div>
            <input type="number" name="telefono" placeholder="Teléfono" value="<?= esc($_GET['telefono'] ?? '') ?>">
        </div>
        
        <button type="submit">Filtrar</button>
    </form>
</div>

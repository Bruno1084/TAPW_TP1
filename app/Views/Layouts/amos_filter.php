<div class="amoFilter--container">
    <form action="/amos" method="get">
        <div>
            <input type="text" name="nombre" placeholder="Nombre" value="<?= esc($_GET['nombre'] ?? '')?>">
        </div>
        <div>
            <input type="text" name="apellido" placeholder="Apellido" value="<?= esc($_GET['apellido'] ?? '')?>">
        </div>
        <div>
            <input type="text" name="direccion" placeholder="direccion" value="<?= esc($_GET['direccion'] ?? '') ?>">
        </div>
        <div>
            <input type="number" name="telefono" placeholder="telefono" value="<?= esc($_GET['telefono'] ?? '') ?>">
        </div>

        <button type="submit">Filter</button>
    </form>
</div>
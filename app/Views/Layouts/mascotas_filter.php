<div class="amoFilter--container">
    <form action="/mascotas" method="get">
        <input type="text" name="nombre" placeholder="Nombre" value="<?= esc($_GET['nombre'] ?? '') ?>">

        <input type="text" name="especie" placeholder="Especie" value="<?= esc($_GET['especie'] ?? '') ?>">

        <input type="text" name="raza" placeholder="Raza" value="<?= esc($_GET['raza'] ?? '') ?>">

        <input type="number" name="edad" placeholder="Edad" min="0" value="<?= esc($_GET['edad'] ?? '') ?>">

        <button type="submit">Filtrar</button>
    </form>
</div>
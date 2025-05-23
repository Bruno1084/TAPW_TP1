<div class="amoFilter--container">
    <form action="/mascotas" method="get">
        <div>
            <input type="text" name="nombre" placeholder="Nombre" value="<?= esc($_GET['nombre'] ?? '') ?>">  
        </div>
        <div>
            <input type="text" name="especie" placeholder="Especie" value="<?= esc($_GET['especie'] ?? '') ?>">
        </div>
        <div>
            <input type="text" name="raza" placeholder="Raza" value="<?= esc($_GET['raza'] ?? '') ?>">
        </div>
        <div>
            <input type="number" name="edad" placeholder="Edad" min="0" value="<?= esc($_GET['edad'] ?? '') ?>">
        </div>
        
        <button type="submit">Filtrar</button>
    </form>
</div>
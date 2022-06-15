<h2>Editar temporada</h2>
    <form action="{$BASE_URL}actualizarTemp" method="post">
        <input type="hidden" name="id_temporada" value="{$id}">
        <label>Nombre<input type="text" name="nombre_temporada"></label>
        
        <button type="submit">Actualizar</button>
    </form>

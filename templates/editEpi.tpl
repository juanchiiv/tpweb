<h2>Editar episodio</h2>
    <form action= "{$BASE_URL}actualizarEpi" method="post">
        <input type="hidden" name="id_episodios" value="{$id}">
        <label>Nombre <input type="text" name="nombre"></label>
        <label>Descripcion<input type="text" name="descripcion"></label>
        <label>Audiencia<input type="text" name="audiencia"></label>
        <label>Temporada
            <select name="temporada">
                <option selected disabled>-- Seleccione --</option>
                {foreach from=$temporadas item=temporada}
                    <option value= {$temporada.id_temporada}>{$temporada.nombre_temporada}</option>
                
                {/foreach}
                
            </select>
        </label>
        <button type="submit">Actualizar</button>
    </form>
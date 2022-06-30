<h2>Episodios</h2>
<form action="agregarEpisod" method="post">
    <ul>
        <li><label>Nombre <input type="text" name="nombre"></label></li>
        <li><label>Descripcion<textarea type="text" name="descripcion"></textarea></label></li>
        <li><label>Audiencia<input type="text" name="audiencia"></label></li>
        <li> <label>Temporada
                <select name="temporada" required>
                    <option>-- Seleccione --</option>
                    {foreach from=$temporadas item=temporada}
                        <option value={$temporada.id_temporada}>{$temporada.nombre_temporada}</option>

                    {/foreach}

                </select>
            </label></li>
        <li> <button type="submit">Agregar epsisodio</button></li>
    </ul>
</form>
<h2>Episodios</h2>
    <form action="agregarEpisod" method="post">
        <label>Nombre <input type="text" name="nombre"></label>
        <label>Descripcion<input type="text" name="descripcion"></label>
        <label>Audiencia<input type="text" name="audiencia"></label>
        <label>Temporada
            <select name="temporada">
                <option >-- Seleccione --</option>
                {foreach from=$series item=serie}
                    <option value= {$serie.id_temporada_FK}>Murder</option>
                
                {/foreach}
                
            </select>
        </label>
        <button type="submit">Agregar epsisodio</button>
    </form>

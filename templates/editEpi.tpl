<h2>Editar episodio</h2>
    <form action="actualizarEpi" method="post">
        <input type="hidden" name="id_episodios" value="{$id}">
        <label>Nombre <input type="text" name="nombre"></label>
        <label>Descripcion<input type="text" name="descripcion"></label>
        <label>Audiencia<input type="text" name="audiencia"></label>
        <label>Temporada<input type="text" name="id_temporada_FK"></label>
        <button type="submit">Actualizar</button>
    </form>
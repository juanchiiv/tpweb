<h2>Episodios</h2>
    <form action="agregarEpisod" method="post">
        <label>Nombre <input type="text" name="nombre"></label>
        <label>Descripcion<input type="text" name="descripcion"></label>
        <label>Audiencia<input type="text" name="audiencia"></label>
        <label>Temporada
            <select name="temporada">
                <option >-- Seleccione --</option>
                <option value=1>Murder house</option>
                <option value=2>Asylum</option>
                <option value=3>Coven</option>
            </select>
        </label>
        <button type="submit">Agregar epsisodio</button>
    </form>

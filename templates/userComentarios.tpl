<h2>Comentarios</h2>
<form action="agregarComentario" method="post">
    <ul>
        <li><label>Comentario<textarea type="text" name="comentarios"></textarea></label></li>
        <li> <label>Valoracion
                <select required>
                    <option>-- Seleccione --</option>  
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </label></li>
        <li> <button type="submit">Agregar comentario</button></li>
    </ul>
</form>
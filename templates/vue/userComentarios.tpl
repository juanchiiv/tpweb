{literal}
<h3>{{ subtitle }}</h3>
<form id="form-coment" action="#" method="post">
    <ul>
        <input type="hidden" name="id_episodio" value="">
        <input type="hidden" name="id_usuario" value="">
        <li><label>Comentario<textarea type="text" ref="coment"></textarea></label></li>
        <li> <label>Valoracion
                <select required>
                    <option>-- Seleccione --</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </label></li>
        <li> <button type="submit" @click="save">Agregar comentario</button></li>
    </ul>
</form>
{/literal}
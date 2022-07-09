{literal}
<h3>{{ subtitle }}</h3>
<div id="form-coment" class="form">
    <ul>
        <li><label>Comentario<textarea type="text" ref="coment"></textarea></label></li>
        <li> <label>Puntuacion
                <select required name="puntuacion" ref="puntos">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </label></li>
        <li> <button  @click.event="save()">Agregar comentario</button></li>
    </ul>
</div>
{/literal}
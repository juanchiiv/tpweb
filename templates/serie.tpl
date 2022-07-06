{include file="header.tpl"}
<table>
    <tr>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Audiencia</th>
        <th>Temporada</th>
        {if $logueado}
            <th>Modificar</th>
            <th>Borrar</th>
        {/if}
        <th>Comentarios</th>
    </tr>
    {foreach $series item=serie}
        <tr>
            <td>{$serie.nombre}</td>
            <td>{$serie.descripcion}</td>
            <td>{$serie.audiencia}</td>
            {foreach from=$temporadas item=temporada}
                {if $temporada.id_temporada == $serie.id_temporada_FK}
                    <td>{$temporada.nombre_temporada}</td>
                {/if}
            {/foreach}

            {if $logueado}
                <td><a href="modificarEpi/{$serie.id_episodios}">Modificar</a></td>
                <td><a href="borrarEpisod/{$serie.id_episodios}">Borrar</a></td>
            {/if}
            <td><a :data-id="{$serie.id_episodios}" href="#" class="btn-comentarios">Comentarios</a></td>
        </tr>
    {/foreach}
    {if $logueado}
        {include file= "userEpisod.tpl"}
    {/if}

    {literal}
        <div id="coments">
            <section id="template-vue-coments">
                <h3> Comentarios </h3>
                <table>
                    <tr>
                        <th>Usuario</th>
                        <th>Comentario</th>
                        <th>Puntuacion</th>
                    </tr>
                    <tr>
                        <td v-for="comentario in comentarios"></td>
                        <strike>{{ comentario.id_usuario }} - {{ comentario.comentario }} - {{ comentario.puntuacion }}
                        </strike>
                        <span v-if="rol== admin"></span>
                        <a :data-id="comentario.id" class="btn-eliminar" v-on="click" href="#">Eliminar</a>
                    </tr>
                </table>
            </section>
        </div>
        <span v-if="logueado== true"><strike>
                <form id="form-coment" action="#" method="post">
                    <ul>
                        <li><input type="hidden" name="id_episodio" value=""></li>
                        <li><input type="hidden" name="id_usuario" value=""></li>
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
            </strike></span>

    {/literal}

    <script src="js/coments.js"></script>
{include file="footer.tpl"}
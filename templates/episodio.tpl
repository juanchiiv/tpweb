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
    </tr>

    <tr>
        <td>{$episodio->nombre}</td>
        <td>{$episodio->descripcion}</td>
        <td>{$episodio->audiencia}</td>
        {foreach from=$temporadas item=temporada}
            {if $temporada.id_temporada == $episodio->id_temporada_FK}
                <td>{$temporada.nombre_temporada}</td>
            {/if}
        {/foreach}

        {if $logueado}
            <td><a href="modificarEpi/{$episodio->id_episodios}">Modificar</a></td>
            <td><a href="borrarEpisod/{$episodio->id_episodios}">Borrar</a></td>
        {/if}

    </tr>
        <input type="hidden" id="id_episodio" value="{$episodio->id_episodios}"></input>
    {include file="vue/comentarios.tpl" }
    {if ($logueado)}
        {include file="vue/userComentarios.tpl"}
    {/if}
 <script src="js/coments.js"></script>
{include file="footer.tpl"}
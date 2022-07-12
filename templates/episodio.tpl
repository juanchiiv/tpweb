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
        <td>{$nombre_temporada}</td>

        {if $logueado}
            <td><a href="modificarEpi/{$episodio->id_episodios}">Modificar</a></td>
            <td><a href="borrarEpisod/{$episodio->id_episodios}">Borrar</a></td>
        {/if}

    </tr>
</table>
        <input type="hidden" id="id_episodio" value="{$episodio->id_episodios}">
        <input type="hidden" id="id_user" value="{$user}">
        <input type="hidden" id="rol" value="{$rol}">
    {include file="vue/comentarios.tpl" }
    {if ($logueado)}
        {include file="vue/userComentarios.tpl"}
    {/if}
 <script src="js/coments.js"></script>
{include file="footer.tpl"}
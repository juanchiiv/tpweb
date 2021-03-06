{include file="header.tpl"}
<table>
    <tr>
        <th>Nº Temporada</th>
        <th>Nombre</th>
        <th>Ver</th>
        {if $logueado}
            <th>Modificar</th>
            <th>Borrar</th>
        {/if}
    </tr>
    {foreach $series item=serie}
        <tr>
            <td>{$serie.id_temporada}</td>
            <td>{$serie.nombre_temporada}</td>
            <td><a href="verTemp/{$serie.id_temporada}">Ver</a></td>
            {if $logueado}
                <td><a href="modificarTemp/{$serie.id_temporada}">Modificar</a></td>
                <td><a href="borrarTemp/{$serie.id_temporada}">Borrar</a></td>
            {/if}

        </tr>
    {/foreach}
    {if $logueado}
        {include file= "userTemp.tpl"}
    {/if}
</table>
{include file="footer.tpl"}
{include file="header.tpl"}
<table>
        <tr>
            <th>Nº Temporada</th>
            <th>Nombre</th>
            {if $logueado}   
                <th>Modificar</th>
                <th>Borrar</th>  
            {/if} 
        </tr>
 {foreach $series item=serie}
        <tr>
            <td>{$serie.id_temporada}</td>
            <td>{$serie.nombre_temporada}</td>
            <td><a href="{$BASE_URL}verTemp/{$serie.id_temporada}">Ver</a></td>
            {if $logueado}
                <td><a href="{$BASE_URL}modificarTemp/{$serie.id_temporada}">Modificar</a></td>
                <td><a href="{$BASE_URL}borrarTemp/{$serie.id_temporada}">Borrar</a></td>
            {/if}
            
        </tr>
        {/foreach}
    {if $logueado}
        {include file= "userTemp.tpl"}
    {/if}
{include file="footer.tpl"}
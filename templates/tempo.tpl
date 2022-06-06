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
            {if $logueado}
                <td>href="{$BASE_URL}modificar/{$serie.id_temporada}">Modificar</td>
                <td>href="{$BASE_URL}borrar/{$serie.id_temporada}">Borrar</td>
            {/if}
            
        </tr>
        {/foreach}
    {if $logueado}
        {include file= "userAbm.tpl"}
    {/if}
{include file="footer.tpl"}
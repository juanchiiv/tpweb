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
 {foreach $series item=serie}
        <tr>
            <td>{$serie.nombre}</td>
            <td>{$serie.descripcion}</td>
            <td>{$serie.audiencia}</td>
            <td>{$serie.id_temporada_FK}</td>
            {if $logueado}
                <td>href="{$BASE_URL}modificar/{$serie.id_episodios}">Modificar</td>
                <td>href="{$BASE_URL}borrar/{$serie.id_episodios}">Borrar</td>
            {/if}
        </tr>
        {/foreach}
    {if $logueado}
        {include file= "userEpisod.tpl"}
    {/if}    
{include file="footer.tpl"}
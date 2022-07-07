{include file="header.tpl"}
<table>
    <tr>
        <th>Nombre</th>
        <th>Temporada</th>
        <th>Ver Info</th>
    </tr>
    {foreach $series item=serie}
        <tr>
            <td>{$serie.nombre}</td>
            {foreach from=$temporadas item=temporada}
                {if $temporada.id_temporada == $serie.id_temporada_FK}
                    <td>{$temporada.nombre_temporada}</td>
                {/if}
            {/foreach}
            <td><a href="verEpisodio/{$serie.id_episodios}" >Ver +</a></td>
        </tr>
    {/foreach}
    {if $logueado}
        {include file= "userEpisod.tpl"}
    {/if}

{include file="footer.tpl"}
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

{include file="footer.tpl"}
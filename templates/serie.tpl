{include file="header.tpl"}
<table>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Audiencia</th>
        </tr>
 {foreach $series item=serie}
        <tr>
            <td>{$serie->nombre}</td>
            <td>{$serie->descripcion}</td>
            <td>{$serie->audiencia}</td>
        </tr>
        {/foreach}
{include file="footer.tpl"}
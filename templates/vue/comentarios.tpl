{include file="serie.tpl"}


{{literal}
    <section id="template-vue-coments">
    <h3> {{ subtitle }} </h3>
    <table>
        <tr>
        <th>Usuario</th>
        <th>Comentario</th>
        <th>Puntuacion</th>
        </tr>
        <tr>
            <td v-for= "comentario in comentarios"></td>
        </tr>
    </table>
    </section>
{/literal}}


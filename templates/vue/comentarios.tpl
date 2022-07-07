{include file="serie.tpl"}

{{literal}
    <div id="coments">
        <section id="template-vue-coments">
            <h3> {{ subtitle }} </h3>
            <table>
                <tr>
                    <th>Usuario</th>
                    <th>Comentario</th>
                    <th>Puntuacion</th>
                </tr>
                <tr>
                    <td v-for="comentario in comentarios"></td>
                    <strike>{{ comentario.id_usuario }} - {{ comentario.comentario }} - {{ comentario.puntuacion }}
                    </strike>
                    <span v-if="rol== admin"></span>
                    <a :data-id="comentario.id" class="btn-eliminar" v-on:click="eliminar" href="#">Eliminar</a>
                </tr>
            </table>
        </section>
    </div>

{/literal}}

{if ($logueado)}
    {include file="userCometarios.tpl"}
{/if}

{include file="footer.tpl"}
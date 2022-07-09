
{literal}
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
                    <button :data-id="comentario.id" class="btn-eliminar" @click.event="eliminar">Eliminar</button>
                </tr>
            </table>
        </section>
    </div>

{/literal}




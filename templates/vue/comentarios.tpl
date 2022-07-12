{literal}

    <section id="template-vue-coments">
        <div id="coments">
            <h3> {{ subtitle }} </h3>
            <table>
                <tr>
                    <th>Usuario</th>
                    <th>Comentario</th>
                    <th>Puntuacion</th>
                    <th v-if="rol"></th>
                </tr>
                <tr v-for="comentario in coments">
                    <td>{{ comentario.id_usuario }}</td>
                    <td>{{ comentario.comentario }}</td>
                    <td>{{ comentario.puntuacion }}</td>
                    <td v-if="rol">
                        <button :data-id="comentario.id" class="btn-eliminar" @click.event="eliminar(comentario.id)">Eliminar</button>
                    </td>
                </tr>
            </table>
        </div>
    </section>


{/literal}
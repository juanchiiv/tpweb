{include file="header.tpl"}
<h2>Editar episodio</h2>
<form action="actualizarEpi" method="post">
    <input type="hidden" name="id_episodios" value="{$episodio->id_episodios}">
    <label>Nombre <input type="text" name="nombre" value="{$episodio->nombre}"></label>
    <label>Descripcion<input type="text" name="descripcion" value="{$episodio->descripcion}"></label>
    <label>Audiencia<input type="text" name="audiencia" value="{$episodio->audiencia}"></label>
    <label>Temporada
        <select name="temporada" required>
            <option>-- Seleccione --</option>
            {foreach from=$temporadas item=temporada}
                {if $temporada.id_temporada != $episodio->id_temporada_FK}
                    <option value={$temporada.id_temporada}>{$temporada.nombre_temporada}</option>
                {else}
                    <option selected value={$temporada.id_temporada}>{$temporada.nombre_temporada}</option>
                {/if}

            {/foreach}

        </select>
    </label>
    <button type="submit">Actualizar</button>
</form>

{include file="footer.tpl"}
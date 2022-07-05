{include file="header.tpl"}
<h2>Editar temporada Nº {$temporada->id_temporada}</h2>
<form action="actualizarTemp" method="post">
    <input type="hidden" name="id_temporada" value="{$temporada->id_temporada}">
    <label>Nombre<input type="text" name="nombre_temporada" value="{$temporada->nombre_temporada}"></label>

    <button type="submit">Actualizar</button>
</form>
{include file="footer.tpl"}
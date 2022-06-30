{include file="header.tpl"}
<form action="registrar" method="post">
  <ul>
        <li><label>Nombre usuario<input type="text" name="nombre"></label></li>
        <li><label>Email usuario<input type="email" name="email"></label></li>
        <li><label>Contraseña<input type="password" name="password"></label></li>
        <li><button type="submit">Registrar</button></li>
    </ul>
</form>
{include file="footer.tpl"}
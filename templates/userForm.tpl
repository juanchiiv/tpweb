{include file="header.tpl"}
<form action="newuser" method="post">
    <ul>
        <li><label>Nombre usuario<input type="text" name="usuario" ></label></li>
        <li><label>Email usuario<input type="email" name="usuario" ></label></li>
        <li><label>Contraseña<input type="password" name="password"></label></li>
        <li><button type="submit">Registrar</button></li>
    </ul>
</form>
{include file="footer.tpl"}
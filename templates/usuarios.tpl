{include file="header.tpl"}

<h2>Tabla de usuarios</h2>

<table>
    <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Cambiar rol</th>
        <th>Eliminar</th>
    </tr>
    {foreach from=$usuarios item=usuario}
        <tr>
            <td>{$usuario->nombre}</td>
            <td>{$usuario->email}</td>
            <td>{$usuario->rol}</td>
            <td><a href="cambiarRol/{$usuario->id_usuario}">Cambiar rol</a></td>
            <td><a href="eliminarUsuario/{$usuario->id_usuario}">Eliminar</a></td>
        </tr>
    {/foreach}

</table>

{include file="footer.tpl"}
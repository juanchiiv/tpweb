<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AHS</title>
</head>
<body>
    <h1>AMERICAN HORROR STORY</h1>
    <ul>
        <li><a href="episodios">Episodios</a></li>
        <li><a href="temporadas">Temporadas</a></li>
    {*    {{if  !($_SESSION["logueado"]) }} *}
             <li><a href="login">Login</a></li>
      {*  {else}*}
            <li><a href="logout">Logout</a></li>
      {* {{/if}}
      *} 
    </ul>
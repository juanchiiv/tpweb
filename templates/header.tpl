<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{$BASE_URL}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <link rel="stylesheet" href="css/estilo.css">
    <title>AHS</title>
</head>

<body>
    <div class="portada">

    </div>
    <nav>
        <ul>
            <li><a href="episodios">Episodios</a></li>
            <li><a href="temporadas">Temporadas</a></li>
            {if !$logueado }
                <li><a href="login">Login</a></li>
                <li><a href="registro">Registrarse</a></li>   
            {else}
                <li><a href="logout">Logout</a></li>
                {if $rol == 'admin'}
                    <li><a href="usuarios">Usuarios</a></li>  
                {/if}
            {/if}
    </nav>
    <h1>AMERICAN HORROR STORY</h1>
    <p>American Horror Story (a veces abreviada como AHS) es una serie de televisión estadounidense de antología y horror creada por Ryan Murphy y Brad Falchuk para la cadena de cable FX. Cada temporada se concibe como una miniserie autónoma, siguiendo un conjunto diferente de personajes y escenarios, y un argumento con su propio «principio, medio y fin». Algunos elementos de la trama de cada temporada están vagamente inspirados en hechos reales. Muchos actores aparecen en más de una temporada, pero a menudo interpretan un nuevo personaje</p>
</ul>
"use strict"

let app = new Vue({
    el: "#template-vue-coments",
    data: {
        subtitle: "Comentarios",
        coments: [] 
    }
});

document.querySelector(".btn-comentarios").addEventListener('click', getComents);

async function getComents(id){
    event.preventDefault();

    let body= document.getElementById("coments");
    body.innerHTML = 'Loading..';

    try {
        let res = await fetch('api/comentarios/' + id);
        let json = await res.jason();
        coments = json;
    } catch (error) {
        console.log("error");
    }
}

document.querySelector("#form-coment").addEventListener('submit', agregarComent);

async function agregarComent(id){
    event.preventDefault();

    let data = {
        id_episodio : id,
        id_usuario : id_user,
        comentario : document.querySelector(".comentario").Value,
        pntuacion : document.querySelector("input[name='puntuacion':checked]").value,
  
    }

    try {
        let res = await fetch("api/comentarios", {
            "method": "POST",
            "headers": {"Content-type": "application/json" },
            "body": JSON.stringify(data)
        });
        if (res.status === 201){
            getComents();
        }
    } catch (error) {
        console.log("error");
    }
}

document.querySelector(".btn-eliminar").addEventListener('click', borrarComent);

async function borrarComent(id){
    try {
        let res = await fetch("api/comentarios/" + id, {
            "method": "DELETE"
        });
        if (res.status === 200){
            getComents();
        }
    } catch (error) {
        console.log("error");
    }
}
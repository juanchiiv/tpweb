"use strict"

let app = new Vue({
    el: "#template-vue-coments",
    data: {
        subtitle: "Comentarios",
        coments: []
     
    },
    methods: {

        eliminar: function(id){ 
            borrarComent(id);
        }
    },
});


document.querySelector(".btn-comentarios").addEventListener('click', getComents);

async function getComents(event) {
    event.preventDefault();

    let body = document.getElementById("coments");
    body.innerHTML = 'Loading..';

    try {
        let res = await fetch('api/comentarios/' + id);
        let json = await res.jason();
        coments = json;
    } catch (error) {
        console.log("error");
    }
}


async function borrarComent(id) {
   
    try {
        let res = await fetch("api/comentarios/" + id, {
            "method": "DELETE"
        });
        if (res.status === 200) {
            getComents();
        }
    } catch (error) {
        console.log("error");
    }
}

let addComent = new Vue({
    el: "#form-coment",
    data: {
      form: {
        puntuacion: null,
        comentario: "",
      },
    },
    methods: {

      save() {
        this.form.comentario = this.$refs["coment"].value;
        let coment = this.form.comentario;
        let puntuacion = this.form.puntuacion;
        agregarComent(puntuacion, coment);
      },
    },
  });

  async function agregarComent(puntuacion, coment) {
    

    let data = {
        id_episodio: id,
        id_usuario: id_user,
        comentario: coment,
        puntuacion: puntuacion

    }

    try {
        let res = await fetch("api/comentarios", {
            "method": "POST",
            "headers": { "Content-type": "application/json" },
            "body": JSON.stringify(data)
        });
        if (res.status === 200) {
            getComents();
        }
    } catch (error) {
        console.log("error");
    }
}

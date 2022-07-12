"use strict"

let app = new Vue({
    el: '#template-vue-coments',
    data: {
        subtitle: "Comentarios",
        coments: [],
        rol: true,
        loading: true

    },
    methods: {

        eliminar: (id) => {
            borrarComent(id);
        }
    },
});




async function getComents() {

    let id = document.getElementById("id_episodio").value;
    try {
        let res = await fetch('api/comentarios/' + id);
        let json = await res.json();
        if (json.lenght == 0) {
            app.loading = true;
            app.coments = [];
        }
        else {
            app.coments = json;
            app.loading = false;
        }

    } catch (error) {
        console.log(error);
        app.loading = true;
        app.coments = [];
    }
}

getComents();

async function borrarComent(id) {

    try {
        let res = await fetch("api/comentarios/" + id, {
            "method": "DELETE"
        });
        let json = await res.text();
        console.log(json);
        if (res.status === 200) {
            getComents();
        }
    } catch (error) {
        console.log(error);
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
            this.form.puntuacion = this.$refs["puntos"].value;
            let puntuacion = this.form.puntuacion;
            agregarComent(puntuacion, coment);
        },
    },
});

async function agregarComent(puntuacion, coment) {

    let id = document.querySelector("#id_episodio").value;
    let id_user = document.querySelector("#id_user").value;

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
        let json = await res.text();
        console.log(json);
        if (res.status === 200) {
            getComents();
        }
    } catch (error) {
        console.log(error);
    }
}

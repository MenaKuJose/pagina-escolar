<template>
    <div class="p-6 bg-gray-100 rounded-lg shadow-lg">
        <br>
        <br>
        <br>
        <main id="center">
            <h1>Servicios</h1>
            <table class="pure-table pure-table-horizontal">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th>Nombre</th>
                        <th>Tipo de servicio</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="servicio in servicios" :key="servicio.id">
                        <td>{{ servicio.nombre }}</td>
                        <td>{{ servicio.tipo_de_servicio }}</td>
                        <td>{{ servicio.contenido }}</td>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            servicios: [],
        };
    },
    mounted() {
        this.fetchservicios();
    },
    methods: {
        fetchservicios() {
            axios
                .get('http://localhost:8000/api/list-Sevicio')
                .then(response => {
                    this.servicios = response.data.servicios;
                })
                .catch(error => {
                    console.error("Error al obtener los servicios:", error);
                });
        },
    },
};

</script>

<style scoped>
h1 {
    text-align: center;
    font-size: 2.75em;
    font-family: "Covered By Your Grace", cursive;
    font-weight: 300;
    margin-top: -1em;
    text-shadow: 0 2px 1px white;
}

#box {
    margin: auto;
    width: 50em;
    height: 100%;
    white-space: nowrap;

    @media (max-width: 52em) {
        width: 100%;
    }

    &::after {
        content: "";
        width: 1px;
        height: 100%;
        vertical-align: middle;
        display: inline-block;
        margin-right: -10px;
    }
}

#center {
    display: inline-block;
    vertical-align: middle;
    white-space: normal;
}

table {
    background-color: white;
    padding: 1em;
    border-collapse: collapse;
    border: 1px solid green;

    th {
        text-transform: uppercase;
        font-weight: 300;
        text-align: center;
        color: white;
        background-color: green;
        position: relative;

        &::after {
            content: "";
            display: block;
            height: 5px;
            width: 100%;
            background-color: dark-green;
            position: absolute;
            bottom: 0;
            left: 0;
        }
    }

    td {
        text-align: left;
    }

    td,
    th {
        border: 1px solid green;
        padding: 0.5em;
    }
}

#credits {
    text-align: right;
    color: white;

    a {
        color: dark-green;
        text-decoration: none;

        &:hover {
            text-decoration: underline;
        }
    }
}
</style>
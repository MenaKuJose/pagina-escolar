<template>
    <div>
      <h2>Usuarios Registrados</h2>
      <table class="table-auto w-full">
        <thead>
          <tr>
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Nombre</th>
            <th class="px-4 py-2">Email</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="usuario in usuarios" :key="usuario.id">
            <td class="border px-4 py-2">{{ usuario.id }}</td>
            <td class="border px-4 py-2">{{ usuario.name }}</td>
            <td class="border px-4 py-2">{{ usuario.email }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        usuarios: [],
      };
    },
    mounted() {
      this.fetchUsuarios();
    },
    methods: {
      fetchUsuarios() {
        axios
          .get('http://localhost:8000/api/list-users')
          .then(response => {
            this.usuarios = response.data.usuarios;
          })
          .catch(error => {
            console.error("Error al obtener las usuarios:", error);
          });
      },
    },
  };
  </script>
  
  <style scoped>
  table {
    background-color: #ffffff; /* Fondo blanco para la tabla */
    color: #333; /* Texto en color oscuro */
  }
  
  th, td {
    padding: 8px;
    border: 1px solid #ddd;
    text-align: left;
  }
  
  th {
    background-color: #f4f4f4; /* Fondo gris claro para encabezados */
    color: #333; /* Texto en color oscuro */
  }
  
  h2 {
    color: #333; /* Texto del título en color oscuro */
  }
  
  button {
    color: #3498db; /* Color base del botón */
  }
  
  button:hover {
    color: #2980b9; /* Color del botón al pasar el cursor */
  }
  </style>
  
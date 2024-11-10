<template>
    <div class="container mx-auto p-6 bg-gray-100">
      <h2 class="text-2xl font-semibold text-gray-800 mb-4">Usuarios Registrados</h2>
      <div class="overflow-x-auto">
        <table class="table-auto w-full bg-white shadow-md rounded-lg">
          <thead class="bg-blue-500 text-white">
            <tr>
              <th class="px-6 py-3 text-left text-sm font-medium uppercase">ID</th>
              <th class="px-6 py-3 text-left text-sm font-medium uppercase">Nombre</th>
              <th class="px-6 py-3 text-left text-sm font-medium uppercase">Email</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="usuario in usuarios" :key="usuario.id" class="hover:bg-gray-100 transition-colors">
              <td class="border-t px-6 py-4 text-gray-700">{{ usuario.id }}</td>
              <td class="border-t px-6 py-4 text-gray-700">{{ usuario.name }}</td>
              <td class="border-t px-6 py-4 text-gray-700">{{ usuario.email }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    name: "UserTable",
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
            console.error("Error al obtener los usuarios:", error);
          });
      },
    },
  };
  </script>
  
  <style scoped>
  .container {
    max-width: 800px;
    margin: 0 auto;
  }
  
  table {
    border-collapse: collapse;
    width: 100%;
  }
  
  th {
    font-size: 14px;
    text-transform: uppercase;
  }
  
  td, th {
    padding: 12px 16px;
  }
  
  tr:nth-child(even) {
    background-color: #f9fafb;
  }
  
  h2 {
    color: #1f2937;
    font-weight: 600;
  }
  
  </style>
  
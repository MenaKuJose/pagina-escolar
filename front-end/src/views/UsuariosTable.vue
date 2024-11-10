<template>
  <div class="container my-5 p-4 bg-light rounded">
    <!-- Header Section with Red Background -->
    <header class="header bg-red">
      <h2 class="h4 text-white mb-4">Usuarios Registrados</h2>
    </header>

    <!-- Loading and Table -->
    <div v-if="loading" class="d-flex justify-content-center align-items-center" style="height: 300px;">
      <div class="text-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
          <span class="sr-only"></span>
        </div>
        <div class="mt-2">Cargando...</div>
      </div>
    </div>
    <div v-else class="table-responsive">
      <table class="table table-bordered table-striped shadow-sm">
        <thead class="bg-primary text-white">
          <tr>
            <th scope="col" class="text-uppercase">ID</th>
            <th scope="col" class="text-uppercase">Nombre</th>
            <th scope="col" class="text-uppercase">Email</th>
            <th scope="col" class="text-uppercase">Fecha de Registro</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="usuario in usuarios" :key="usuario.id" class="table-hover">
            <td>{{ usuario.id }}</td>
            <td>{{ usuario.name }}</td>
            <td>{{ usuario.email }}</td>
            <td>{{ usuario.created_at }}</td>
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
      loading: true, // Estado para controlar la carga
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
        })
        .finally(() => {
          this.loading = false; // Termina la carga
        });
    },
  },
};
</script>

<style scoped>
/* Contenedor del header */
.header {
  background-color: #800020; /* Rojo guinda */
  padding: 20px;
  border-radius: 8px;
  margin-bottom: 30px; /* Espacio para separar el header del contenido */
}

/* Título dentro del header */
.header h2 {
  color: white; /* Texto blanco */
  font-weight: 600;
}

/* Estilos generales para la tabla */
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
</style>

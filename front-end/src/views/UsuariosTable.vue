<template>
  <div class="container my-5 p-4 bg-light rounded">
    <!-- Header Section with Red Background -->
    <header class="header" style="background-color: #800020;">
      <h2 class="h4 text-white mb-4">Usuarios Registrados</h2>
    </header>

    <!-- Search Input -->
    <div class="mb-3">
      <input
        type="text"
        class="form-control"
        placeholder="Buscar por nombre, email o ID..."
        v-model="searchTerm"
      />
    </div>

    <!-- Loading and Table -->
    <div v-if="loading">
      <!-- No se necesita spinner porque SweetAlert2 lo gestionará -->
    </div>

    <div v-else>
      <!-- Mensaje en caso de que no haya resultados -->
      <div v-if="filteredUsuarios.length === 0" class="alert alert-danger text-center">
        <strong>No se encontraron resultados para "{{ searchTerm }}"</strong>
      </div>

      <!-- Tabla con resultados -->
      <div v-else class="table-responsive">
        <table class="table table-bordered table-striped shadow-sm">
          <thead style="background-color: #800020;" class="text-white">
            <tr>
              <th scope="col" class="text-uppercase">ID</th>
              <th scope="col" class="text-uppercase">Nombre</th>
              <th scope="col" class="text-uppercase">Email</th>
              <th scope="col" class="text-uppercase">Fecha de Registro</th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="usuario in filteredUsuarios"
              :key="usuario.id"
              class="table-hover"
            >
              <td>{{ usuario.id }}</td>
              <td>{{ usuario.name }}</td>
              <td>{{ usuario.email }}</td>
              <td>{{ usuario.created_at }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";

export default {
  name: "UserTable",
  data() {
    return {
      usuarios: [], // Lista completa de usuarios
      searchTerm: "", // Término de búsqueda
      loading: true, // Estado de carga
    };
  },
  computed: {
    // Computed para filtrar los usuarios
    filteredUsuarios() {
      const term = this.searchTerm.toLowerCase();
      return this.usuarios.filter((usuario) => {
        return (
          usuario.id.toString().includes(term) ||
          usuario.name.toLowerCase().includes(term) ||
          usuario.email.toLowerCase().includes(term)
        );
      });
    },
  },
  mounted() {
    this.fetchUsuarios(); // Llama al método al montar el componente
  },
  methods: {
    async fetchUsuarios() {
      try {
        // Mostrar SweetAlert2 mientras se carga
        Swal.fire({
          title: "Cargando...",
          text: "Por favor espera mientras cargamos los usuarios.",
          showConfirmButton: false,
          allowOutsideClick: false,
          didOpen: () => {
            Swal.showLoading(); // Muestra el indicador de carga
          },
        });

        const response = await axios.get("http://localhost:8000/api/list-users");
        this.usuarios = response.data.usuarios; // Asigna los usuarios obtenidos
      } catch (error) {
        console.error("Error al obtener los usuarios:", error);
        Swal.fire({
          title: "Error",
          text: "Hubo un problema al cargar los usuarios. Intenta de nuevo más tarde.",
          icon: "error",
        });
      } finally {
        this.loading = false; // Finaliza la carga
        Swal.close(); // Cierra SweetAlert2
      }
    },
  },
};
</script>

<style scoped>
/* Contenedor del header */
.header {
  background-color: #800020; /* Rojo vino */
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
  border-radius: 10px;
  overflow: hidden; /* Bordes redondeados */
}

th {
  font-size: 14px;
  text-transform: uppercase;
  background-color: #800020; /* Rojo vino */
  color: white;
  padding: 12px 16px;
  text-align: left;
}

td {
  padding: 12px 16px;
  font-size: 14px;
}

tr:nth-child(even) {
  background-color: #f9fafb;
}

tr:hover {
  background-color: #f4e1e1; /* Color suave al pasar el ratón */
}

table thead {
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

table tbody tr {
  border-bottom: 1px solid #ddd;
}

table tbody tr:last-child {
  border-bottom: none;
}

.alert {
  font-size: 1rem;
  padding: 15px;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
</style>

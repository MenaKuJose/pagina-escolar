<template>
    <div class="container my-5 p-4 bg-light rounded">
      <header class="header bg-red">
        <h2 class="h4 text-white mb-4">Ofertas Educativas</h2>
      </header>
  
      <!-- Tabla con resultados -->
      <div v-if="loading">
        <!-- SweetAlert2 maneja la carga -->
      </div>
      <div v-else class="table-responsive">
        <table class="table table-bordered table-striped shadow-sm">
          <thead class="bg-primary text-white">
            <tr>
              <th scope="col" class="text-uppercase">ID</th>
              <th scope="col" class="text-uppercase">Nombre</th>
              <th scope="col" class="text-uppercase">Etapa Inicial</th>
              <th scope="col" class="text-uppercase">Etapa Continuidad</th>
            </tr>
          </thead>
          <tbody>
  <tr v-if="ofertas.length > 0" class="table-hover">
    <td>{{ ofertas[ofertas.length - 1].id }}</td>
    <td v-if="ofertas[ofertas.length - 1].oferta_educativa">
      {{ ofertas[ofertas.length - 1].oferta_educativa.nombre }}
    </td>
    <td v-else>N/A</td>
    <td>{{ ofertas[ofertas.length - 1].etapa_inicial }}</td>
    <td>{{ ofertas[ofertas.length - 1].etapa_continuidad }}</td>
  </tr>
  <!-- Mostrar mensaje si no hay datos -->
  <tr v-if="ofertas.length === 0">
    <td colspan="4" class="text-center">
      <div class="alert alert-danger" role="alert">
        <strong>No hay ofertas disponibles.</strong>
      </div>
    </td>
  </tr>
</tbody>

        </table>
      </div>
    </div>
  </template>
  
  <script>
  import axios from "axios";
  import Swal from "sweetalert2";
  
  export default {
    data() {
      return {
        ofertas: [], // Lista completa de ofertas
        loading: true, // Estado de carga
        isFirstLoad: true, // Controla si es la primera carga
      };
    },
    mounted() {
      this.fetchOfertas(); // Cargar las ofertas al montar el componente
      this.autoRefresh(); // Llamar a la función de auto-actualización
    },
    beforeDestroy() {
      // Limpiar el intervalo cuando el componente se destruya
      clearInterval(this.refreshInterval);
    },
    methods: {
      // Método para obtener las ofertas desde la API
      fetchOfertas() {
        // Mostrar el spinner solo durante la primera carga
        if (this.isFirstLoad) {
          Swal.fire({
            title: "Cargando...",
            text: "Por favor espera mientras cargamos la oferta.",
            showConfirmButton: false,
            allowOutsideClick: false,
            didOpen: () => {
              Swal.showLoading();
            },
          });
        }
  
        axios
          .get("http://localhost:8000/api/mejor-oferta")
          .then((response) => {
            console.log(response.data.ofertas); // Verifica la estructura aquí
            this.ofertas = response.data.ofertas;
          })
          .catch((error) => {
            console.error("Error al obtener la oferta:", error);
          })
          .finally(() => {
            this.loading = false;
            Swal.close();
  
            // Solo después de la primera carga, ya no mostrar el spinner
            if (this.isFirstLoad) {
              this.isFirstLoad = false; // Marca que ya no es la primera carga
            }
          });
      },
      // Método para auto-actualizar las ofertas cada 10 segundos
      autoRefresh() {
        this.refreshInterval = setInterval(() => {
          this.fetchOfertas(); // Llama al método para cargar las ofertas
        }, 10000); // Actualiza cada 10 segundos
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
    max-width: 1000px;
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
  
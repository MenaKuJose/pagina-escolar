<template>
  <div class="container my-5 p-4 bg-light rounded">
    <!-- Header Section with Red Background -->
    <header class="header bg-red">
      <h2 class="h4 text-white mb-4">Ofertas Educativas</h2>
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
            <th scope="col" class="text-uppercase">Nombre</th>
            <th scope="col" class="text-uppercase">Etapa Inicial</th>
            <th scope="col" class="text-uppercase">Duración Inicial</th>
            <th scope="col" class="text-uppercase">Etapa Continuidad</th>
            <th scope="col" class="text-uppercase">Duración Continuidad</th>
            <th scope="col" class="text-uppercase">Duración Total</th>
            <th scope="col" class="text-uppercase">Horas Totales</th>
            <th scope="col" class="text-uppercase">Créditos Totales</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="oferta in ofertas" :key="oferta.id" class="table-hover">
            <td>{{ oferta.nombre }}</td>
            <td>{{ oferta.etapa_inicial }}</td>
            <td>{{ oferta.duracion_cuatri_in }}</td>
            <td>{{ oferta.etapa_continuidad }}</td>
            <td>{{ oferta.duracion_cuatri_con }}</td>
            <td>{{ oferta.duracion_total_programa }}</td>
            <td>{{ oferta.horas_totales }}</td>
            <td>{{ oferta.creditos_totales }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      ofertas: [],
      loading: true, // Estado para controlar la carga
    };
  },
  mounted() {
    this.fetchOfertas();
  },
  methods: {
    fetchOfertas() {
      axios
        .get("http://localhost:8000/api/list-of")
        .then((response) => {
          this.ofertas = response.data.ofertas;
        })
        .catch((error) => {
          console.error("Error al obtener las ofertas:", error);
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

<template>
  <div class="container my-5 p-4 bg-light rounded">
    <header class="header bg-red">
      <h2 class="h4 text-white mb-4">Ofertas Educativas</h2>
    </header>

    <!-- Campo de búsqueda -->
    <div class="mb-3">
      <input
        type="text"
        v-model="buscar"
        placeholder="Buscar por nombre, horas, créditos o duración total"
        class="form-control"
      />
    </div>

    <!-- Tabla con resultados filtrados -->
    <div v-if="loading">
      <!-- SweetAlert2 maneja la carga -->
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
          <tr
            v-for="oferta in ofertasFiltradas"
            :key="oferta.id"
            class="table-hover"
          >
            <td>{{ oferta.nombre }}</td>
            <td>{{ oferta.etapa_inicial }}</td>
            <td>{{ oferta.duracion_cuatri_in }}</td>
            <td>{{ oferta.etapa_continuidad }}</td>
            <td>{{ oferta.duracion_cuatri_con }}</td>
            <td>{{ oferta.duracion_total_programa }}</td>
            <td>{{ oferta.horas_totales }}</td>
            <td>{{ oferta.creditos_totales }}</td>
          </tr>
          <!-- Mostrar mensaje si no hay coincidencias -->
          <tr v-if="ofertasFiltradas.length === 0">
            <td colspan="8" class="text-center">
              <div class="alert alert-danger" role="alert">
                <strong>No se encontraron resultados para la búsqueda:</strong> "{{ buscar }}"
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
      buscar: "", // Término de búsqueda
      loading: true, // Estado de carga
    };
  },
  computed: {
    // Ofertas filtradas según el término de búsqueda
    ofertasFiltradas() {
      if (!this.buscar) return this.ofertas; // Si no hay término de búsqueda, mostrar todas
      const term = this.buscar.toLowerCase();
      return this.ofertas.filter((oferta) => {
        // Comparar término de búsqueda con múltiples campos
        return (
          oferta.nombre.toLowerCase().includes(term) ||
          oferta.horas_totales.toString().includes(term) ||
          oferta.creditos_totales.toString().includes(term) ||
          oferta.duracion_total_programa.toString().includes(term)
        );
      });
    },
  },
  mounted() {
    this.fetchOfertas(); // Cargar las ofertas al montar el componente
  },
  methods: {
    // Método para obtener las ofertas desde la API
    fetchOfertas() {
      Swal.fire({
        title: "Cargando...",
        text: "Por favor espera mientras cargamos las ofertas.",
        showConfirmButton: false,
        allowOutsideClick: false,
        didOpen: () => {
          Swal.showLoading();
        },
      });

      axios
        .get("http://localhost:8000/api/list-of")
        .then((response) => {
          this.ofertas = response.data.ofertas;
        })
        .catch((error) => {
          console.error("Error al obtener las ofertas:", error);
        })
        .finally(() => {
          this.loading = false;
          Swal.close();
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

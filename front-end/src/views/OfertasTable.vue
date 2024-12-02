<template>
  <div class="container my-2 p-4 bg-light rounded shadow-sm">
    <div class="mb-4">
      <input
        type="text"
        v-model="buscar"
        placeholder="Buscar por nombre"
        class="form-control form-control-lg"
      />
    </div>
    <header class="header mb-4">
      <h2 class="h4 text-white">Ofertas Educativas</h2>
    </header>   
    <div v-if="loading">
      <div class="text-center">
        <div class="spinner-border text-primary" role="status"></div>
        <p>Cargando ofertas...</p>
      </div>
    </div>

    <div v-else>
      <div v-if="ofertasFiltradas.length > 0" class="row">
        <div
          v-for="oferta in ofertasFiltradas"
          :key="oferta.id"
          class="col-md-4 mb-4"
        >
          <div class="card shadow-lg h-100">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title text-primary">{{ oferta.nombre }}</h5>
              <p class="card-text">
                <strong>Etapa Inicial:</strong> {{ oferta.etapa_inicial }}<br />
                <strong>Duración Inicial:</strong> {{ oferta.duracion_cuatri_in }} cuatrimestres<br />
                <strong>Etapa Continuidad:</strong> {{ oferta.etapa_continuidad }}<br />
                <strong>Duración Continuidad:</strong> {{ oferta.duracion_cuatri_con }} cuatrimestres<br />
                <strong>Duración Total:</strong> {{ oferta.duracion_total_programa }}<br />
                <strong>Horas Totales:</strong> {{ oferta.horas_totales }}<br />
                <strong>Créditos Totales:</strong> {{ oferta.creditos_totales }}
              </p>
            </div>
          </div>
        </div>
      </div>
      <div v-if="ofertasFiltradas.length === 0" class="col-12">
        <div class="alert alert-warning text-center" role="alert">
          <strong>No se encontraron resultados para la búsqueda:</strong> "{{ buscar }}"
        </div>
      </div>
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
/* Contenedor general */
.container {
  max-width: 1200px; /* Ajuste de ancho máximo */
  margin: 0 auto;
  padding: 2rem;
  background-color: #f8f9fa;
  border-radius: 15px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}


.header {
  background-color: #800020; 
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.header h2 {
  color: white;
  font-weight: bold;
}

input.form-control-lg {
  padding: 5px;
  font-size: 1rem;
  border-radius: 5px;
  border: 2px solid #ddd;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  width: 50%;
}

.card {
  border-radius: 10px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
  transform: scale(1.05);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.card-body {
  padding: 20px;
}

.card-title {
  font-weight: bold;
  color: #007bff; 
}

.card-text {
  font-size: 0.9rem;
  line-height: 1.5;
}

.card-text strong {
  color: #333;
}

.alert {
  font-size: 1rem;
  padding: 15px;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.spinner-border {
  margin-bottom: 1rem;
}
</style>

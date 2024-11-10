<template>
  <div class="container my-5 p-4 bg-light rounded">
    <h2 class="h4 dashboard-title mb-4">Dashboard</h2>
    <!-- Gráficas -->
    <div v-if="loading" class="d-flex justify-content-center align-items-center" style="height: 300px;">
      <div class="text-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
          <span class="sr-only">Cargando...</span>
        </div>
        <div class="mt-2">Cargando...</div>
      </div>
    </div>

    <div v-else>
      <!-- Gráfica de Ofertas (arriba) -->
      <div class="row mb-4">
        <div class="col-md-12">
          <h4>Ofertas Disponibles</h4>
          <BarChart v-if="ofertasData.labels.length > 0" :data="ofertasData" />
        </div>
      </div>

      <!-- Gráfica de Usuarios (debajo) -->
      <div class="row mb-4">
        <div class="col-md-12">
          <h4>Crecimiento de Usuarios</h4>
          <LineChart v-if="usuariosData.labels.length > 0" :data="usuariosData" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import { Line, Bar } from 'vue-chartjs';
import { Chart as ChartJS, Title, Tooltip, Legend, LineElement, PointElement, LinearScale, CategoryScale, BarElement } from 'chart.js';

// Registrar los componentes de Chart.js
ChartJS.register(Title, Tooltip, Legend, LineElement, PointElement, LinearScale, CategoryScale, BarElement);

export default {
  components: {
    BarChart: Bar,
    LineChart: Line,
  },
  data() {
    return {
      ofertas: [],
      usuarios: [],
      loading: true,
      ofertasData: {
        labels: [],
        datasets: [],
      },
      usuariosData: {
        labels: [],
        datasets: [],
      },
    };
  },
  mounted() {
    this.fetchOfertas();
    this.fetchUsuarios();
  },
  methods: {
    // Fetch ofertas data
    fetchOfertas() {
      axios
        .get('http://localhost:8000/api/list-of')
        .then(response => {
          this.ofertas = response.data.ofertas;
          this.processOfertasData();
        })
        .catch(error => {
          console.error("Error al obtener las ofertas:", error);
        })
        .finally(() => {
          this.loading = false;
        });
    },

    // Fetch usuarios data
    fetchUsuarios() {
      axios
        .get('http://localhost:8000/api/list-users')
        .then(response => {
          this.usuarios = response.data.usuarios;
          this.processUsuariosData();
        })
        .catch(error => {
          console.error("Error al obtener los usuarios:", error);
          alert("Error al obtener los datos de usuarios.");
        })
        .finally(() => {
          this.loading = false;
        });
    },

    // Procesar datos de ofertas para la gráfica
    processOfertasData() {
      const ofertasLabels = this.ofertas.map(oferta => oferta.nombre);
      const horasData = this.ofertas.map(oferta => oferta.horas_totales);

      this.ofertasData = {
        labels: ofertasLabels,
        datasets: [
          {
            label: 'Horas por Oferta',
            data: horasData,
            backgroundColor: '#42A5F5',
            borderColor: '#1E88E5',
            borderWidth: 3,
          },
        ],
      };
    },

    // Procesar datos de usuarios para el gráfico de crecimiento
    processUsuariosData() {
      // Agrupar usuarios por fecha de creación y contar el número de usuarios creados en cada fecha
      const usuariosPorFecha = {};
      this.usuarios.forEach(usuario => {
        const fecha = new Date(usuario.created_at).toLocaleDateString();
        usuariosPorFecha[fecha] = (usuariosPorFecha[fecha] || 0) + 1;
      });

      // Generar los datos acumulados para la gráfica de línea
      const fechas = Object.keys(usuariosPorFecha).sort();
      let acumulado = 0;
      const dataAcumulada = fechas.map(fecha => {
        acumulado += usuariosPorFecha[fecha];
        return acumulado;
      });

      this.usuariosData = {
        labels: fechas,
        datasets: [
          {
            label: 'Total de Usuarios',
            data: dataAcumulada,
            backgroundColor: 'rgba(66, 165, 245, 0.2)',
            borderColor: '#1E88E5',
            borderWidth: 4,
            fill: true,
          },
        ],
      };
    },
  },
};
</script>

<style scoped>
.container {
  max-width: 1000px;
  margin: 0 auto;
}

.row {
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
}

h2 {
  color: #1f2937;
  font-weight: 600;
}

h4 {
  color: #333;
  margin-bottom: 20px;
}

.oferta-nombre {
  word-wrap: break-word;
  max-width: 200px;
  display: block;
  white-space: normal;
}

@media (max-width: 768px) {
  .col-md-12 {
    width: 100%;
  }
}

/* Título en rojo guinda */
.dashboard-title {
  color: #800020; /* Rojo guinda */
}

</style>

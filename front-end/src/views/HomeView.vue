<template>
  <div class="container my-5 p-4 bg-light rounded">
    <h2 class="h4 dashboard-title mb-4">Dashboard</h2>

    <div v-if="loading">
      <!-- Solo SweetAlert2 se encargará de mostrar el spinner de carga -->
    </div>

    <div v-else>
      <!-- Gráfica de Ofertas (arriba) -->
      <div class="row mb-4">
        <div class="col-md-12">
          <h4-tg class="h4 dashboard-title mb-4">Ofertas Disponibles</h4-tg>
          <BarChart v-if="ofertasData.labels.length > 0" :data="ofertasData" />
        </div>
      </div>

      <!-- Gráfica de Usuarios (debajo) -->
      <div class="row mb-4">
        <div class="col-md-12">
          <h4-tg class="h4 dashboard-title mb-4">Crecimiento de Usuarios</h4-tg>
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
import Swal from 'sweetalert2';

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
    this.fetchData();
  },
  methods: {
    // Fetch datos de ofertas y usuarios
    fetchData() {
      // Mostrar el mensaje de carga con SweetAlert2
      Swal.fire({
        title: 'Cargando Datos...',
        text: 'Estamos obteniendo los datos, espere por favor.',
        allowOutsideClick: false,
        didOpen: () => {
          Swal.showLoading(); // Spinner de SweetAlert2
        },
      });

      // Realizamos las solicitudes de datos de forma concurrente usando axios.all
      axios
        .all([
          axios.get('http://localhost:8000/api/list-of'),
          axios.get('http://localhost:8000/api/list-users'),
        ])
        .then(
          axios.spread((ofertasResponse, usuariosResponse) => {
            // Procesar ofertas
            this.ofertas = ofertasResponse.data.ofertas;
            this.processOfertasData();

            // Procesar usuarios
            this.usuarios = usuariosResponse.data.usuarios;
            this.processUsuariosData();
          })
        )
        .catch((error) => {
          console.error('Error al obtener los datos:', error);
          Swal.fire('Error', 'Hubo un problema al obtener los datos.', 'error');
        })
        .finally(() => {
          this.loading = false;
          Swal.close(); // Cerrar el mensaje de carga
        });
    },

    // Procesar datos de ofertas para la gráfica
    processOfertasData() {
      const ofertasLabels = this.ofertas.map((oferta) => oferta.nombre);
      const horasData = this.ofertas.map((oferta) => oferta.horas_totales);

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
      this.usuarios.forEach((usuario) => {
        const fecha = new Date(usuario.created_at).toLocaleDateString();
        usuariosPorFecha[fecha] = (usuariosPorFecha[fecha] || 0) + 1;
      });

      // Generar los datos acumulados para la gráfica de línea
      const fechas = Object.keys(usuariosPorFecha).sort();
      let acumulado = 0;
      const dataAcumulada = fechas.map((fecha) => {
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
            borderWidth: 2,
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
  color: white;
  font-weight: 600;
  padding: 10px 15px;
  background-color: #800020; /* Rojo guinda */
  border-radius: 5px;
  margin-bottom: 20px;
}

h4-tg {
  color: white;
  font-weight: 600;
  padding: 10px 15px;
  background-color: #800020; /* Rojo guinda */
  border-radius: 5px;
  margin-bottom: 20px;
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
</style>

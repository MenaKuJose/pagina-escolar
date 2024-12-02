<template>
  <div class="container-fluid py-3 bg-light">
    <header class="text-center mb-5">
      <h1 class="display-4 fw-bold text-primary">Nuestros Servicios</h1>
      <p class="lead text-muted">
        Descubre nuestros servicios destacados y cómo podemos ayudarte.
      </p>
    </header>

    <!-- Spinner de carga -->
    <div v-if="!servicios.length" class="text-center py-5">
      <div class="spinner-border text-primary" role="status"></div>
      <p class="mt-3">Cargando servicios...</p>
    </div>

    <div v-else class="row g-4">
      <div v-for="(servicio, index) in servicios" :key="servicio.id" class="col-12">
        <div class="card h-100 shadow border-0">
          <div class="row g-0" :class="{
            'flex-row-reverse': index % 2 !== 0,
          }">
            <div class="col-md-4">
              <img v-if="servicio.imagen" :src="`http://localhost:8000/storage/${servicio.imagen}`"
                :alt="servicio.nombre" class="img-fluid rounded-start" style="object-fit: cover; height: 200px;" />
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title text-primary fw-bold">
                  {{ servicio.nombre }}
                </h5>
                <h6 class="card-subtitle mb-3 text-secondary">
                  <strong>Tipo:</strong> {{ servicio.tipo_de_servicio }}
                </h6>
                <p class="card-text">
                  {{ servicio.contenido || "Sin descripción disponible." }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      servicios: [],
    };
  },
  mounted() {
    this.fetchServicios();
  },
  methods: {
    fetchServicios() {
      axios
        .get("http://localhost:8000/api/list-Sevicio")
        .then((response) => {
          this.servicios = response.data.servicios;
        })
        .catch((error) => {
          console.error("Error al obtener los servicios:", error);
        });
    },
  },
};
</script>

<style scoped>
.container-fluid {
  max-width: 1200px;
  margin: 0 auto;
}

h1 {
  font-size: 2.5rem;
}

p.lead {
  font-size: 1.25rem;
}

.card {
  border-radius: 16px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
  transform: translateY(-10px);
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.card-body {
  padding: 20px;
}

.card-img-top {
  border-radius: 16px 16px 0 0;
}

.flex-row-reverse {
  flex-direction: row-reverse;
}

.btn-primary {
  background-color: #6a5acd;
  border-color: #6a5acd;
}

.btn-primary:hover {
  background-color: #8a2be2;
}
</style>

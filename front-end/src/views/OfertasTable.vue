<template>
    <div class="container mx-auto p-6 bg-gray-100">
      <h2 class="text-2xl font-semibold text-gray-800 mb-4">Ofertas Educativas</h2>
      <div class="overflow-x-auto">
        <table class="table-auto w-full bg-white shadow-md rounded-lg">
          <thead class="bg-blue-500 text-white">
            <tr>
              <th class="px-6 py-3 text-left text-sm font-medium uppercase">Nombre</th>
              <th class="px-6 py-3 text-left text-sm font-medium uppercase">Etapa Inicial</th>
              <th class="px-6 py-3 text-left text-sm font-medium uppercase">Duración Inicial</th>
              <th class="px-6 py-3 text-left text-sm font-medium uppercase">Etapa Continuidad</th>
              <th class="px-6 py-3 text-left text-sm font-medium uppercase">Duración Continuidad</th>
              <th class="px-6 py-3 text-left text-sm font-medium uppercase">Duración Total</th>
              <th class="px-6 py-3 text-left text-sm font-medium uppercase">Horas Totales</th>
              <th class="px-6 py-3 text-left text-sm font-medium uppercase">Créditos Totales</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="oferta in ofertas" :key="oferta.id" class="hover:bg-gray-100 transition-colors">
              <td class="border-t px-6 py-4 text-gray-700">{{ oferta.nombre }}</td>
              <td class="border-t px-6 py-4 text-gray-700">{{ oferta.etapa_inicial }}</td>
              <td class="border-t px-6 py-4 text-gray-700">{{ oferta.duracion_cuatri_in }}</td>
              <td class="border-t px-6 py-4 text-gray-700">{{ oferta.etapa_continuidad }}</td>
              <td class="border-t px-6 py-4 text-gray-700">{{ oferta.duracion_cuatri_con }}</td>
              <td class="border-t px-6 py-4 text-gray-700">{{ oferta.duracion_total_programa }}</td>
              <td class="border-t px-6 py-4 text-gray-700">{{ oferta.horas_totales }}</td>
              <td class="border-t px-6 py-4 text-gray-700">{{ oferta.creditos_totales }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        ofertas: [],
      };
    },
    mounted() {
      this.fetchOfertas();
    },
    methods: {
      fetchOfertas() {
        axios
          .get('http://localhost:8000/api/list-of')
          .then(response => {
            this.ofertas = response.data.ofertas;
          })
          .catch(error => {
            console.error("Error al obtener las ofertas:", error);
          });
      },
    },
  };
  </script>
  
  <style scoped>
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
  
  h2 {
    color: #1f2937;
    font-weight: 600;
  }
  
  </style>
  
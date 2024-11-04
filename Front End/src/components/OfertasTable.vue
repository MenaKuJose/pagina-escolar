<template>
    <div>
      <h2>Ofertas Educativas</h2>
      <table class="table-auto w-full">
        <thead>
          <tr>
            <th class="px-4 py-2">Nombre</th>
            <th class="px-4 py-2">Etapa Inicial</th>
            <th class="px-4 py-2">Duración Inicial</th>
            <th class="px-4 py-2">Etapa Continuidad</th>
            <th class="px-4 py-2">Duración Continuidad</th>
            <th class="px-4 py-2">Duración Total</th>
            <th class="px-4 py-2">Horas Totales</th>
            <th class="px-4 py-2">Créditos Totales</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="oferta in ofertas" :key="oferta.id">
            <td class="border px-4 py-2">{{ oferta.nombre }}</td>
            <td class="border px-4 py-2">{{ oferta.etapa_inicial }}</td>
            <td class="border px-4 py-2">{{ oferta.duracion_cuatri_in }}</td>
            <td class="border px-4 py-2">{{ oferta.etapa_continuidad }}</td>
            <td class="border px-4 py-2">{{ oferta.duracion_cuatri_con }}</td>
            <td class="border px-4 py-2">{{ oferta.duracion_total_programa }}</td>
            <td class="border px-4 py-2">{{ oferta.horas_totales }}</td>
            <td class="border px-4 py-2">{{ oferta.creditos_totales }}</td>
          </tr>
        </tbody>
      </table>
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
  table {
    background-color: #ffffff; /* Fondo blanco para la tabla */
    color: #333; /* Texto en color oscuro */
  }
  
  th, td {
    padding: 8px;
    border: 1px solid #ddd;
    text-align: left;
  }
  
  th {
    background-color: #f4f4f4; /* Fondo gris claro para encabezados */
    color: #333; /* Texto en color oscuro */
  }
  
  h2 {
    color: #333; /* Texto del título en color oscuro */
  }
  
  button {
    color: #3498db; /* Color base del botón */
  }
  
  button:hover {
    color: #2980b9; /* Color del botón al pasar el cursor */
  }
  </style>
  
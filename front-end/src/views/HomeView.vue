<template>
  <div>
    <button @click="fetchData">Obtener Datos</button>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  methods: {
    fetchData() {
      axios.get('http://localhost:8000/api/list-Sevicio') 
        .then(response => {
          console.log('Resultados de la API:', response.data);
        })
        .catch(error => {
          console.error('Error al obtener los datos:', error);
        });
    }
  }
};
</script>


<style scoped>
button {
  background-color: #4CAF50;
  color: white;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
  font-size: 16px;
  border-radius: 5px;
  transition: background-color 0.3s;
}

button:hover {
  background-color: #45a049;
}

button:active {
  background-color: #3e8e41;
}
</style>


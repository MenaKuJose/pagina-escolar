<template>
  <nav>
    <router-link to="/">Home</router-link> 
    <router-link to="/about">Conocenos</router-link> 
    <router-link to="/ofertas">Ofertas Educativas</router-link> 
    <router-link to="/servicios">Servicios</router-link>
    <router-link to="/vida-universitaria">Vida Universitaria</router-link>
    <router-link to="/estadias">Estadias</router-link>
    <router-link to="/control-escolar">Control Escolar</router-link>
    <router-link to="/calificacion">Calificación</router-link>
    <router-link to="/contacto">Contacto</router-link>


  </nav>
  <router-view />
</template>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 20px;
  background-color: #f8f9fa;
  border-bottom: 2px solid #dcdcdc;
}

nav a {
  font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
  font-weight: bold;
  color: black;
  text-decoration: none;
  padding: 5px 5px;
  margin: 0 5px;
  border-radius: 5px;
  transition: background-color 0.3s, color 0.3s;
}

nav a:hover {
  background-color:rgb(0, 98, 255);
  color: #ffffff;
}

nav a.router-link-exact-active {
  color: #ffffff;
  background-color: rgb(0, 98, 255);
}
</style>

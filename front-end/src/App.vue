<template>
  <nav>
    <router-link to="/">Home</router-link> |
    <router-link to="/about" >About</router-link> |
    <router-link to="/ofertas">Ofertas Educativas</router-link> |
    <router-link to="/usuarios">Usuarios Registrados</router-link>
  </nav>
  <router-view/>
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
  padding: 30px;
}

nav a {
  font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
  font-weight: bold;
  color: #700000;
}

nav a.router-link-exact-active {
  font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
  color: #000000;
}
</style>

<template>
  <div id="app" class="min-vh-100 bg-light">
    <header class="navbar text-white p-3 shadow-lg">
      <div class="d-flex align-items-center">
        <img src="@/assets/logo-U_T_P.png" alt="Logo" class="logo me-3" />
        <h2 class="h4 mb-0">Universidad Tecnológica del Poniente</h2>
      </div>
      <nav class="d-flex justify-content-center mt-3">
        <ul class="nav">
          <li class="nav-item">
            <router-link to="/" class="nav-link text-white">Home</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/about" class="nav-link text-white">About</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/ofertas" class="nav-link text-white">Ofertas Educativas</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/mejorOferta" class="nav-link text-white">Mejor Oferta Educativa</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/servicios" class="nav-link text-white">Servicios</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/carrusel_de_imagenes" class="nav-link text-white">Imagenes</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/usuarios" class="nav-link text-white">Usuarios Registrados</router-link>
          </li>
        </ul>
      </nav>
    </header>

    <!-- Main Content -->
    <div class="content p-4 bg-white rounded shadow-sm">
      <router-view />
    </div>
  </div>
</template>

<style scoped>
/* Main Layout */
#app {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
  background-color: #f3f4f6;
  font-family: Avenir, Helvetica, Arial, sans-serif;
  color: #2c3e50;
}

/* Navbar Styles */
.navbar {
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color: #800020; /* Rojo guinda */
  color: #ffffff;
  position: sticky;
  top: 0;
  z-index: 1000;
  width: 100%;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.navbar .logo {
  width: 50px;
  height: auto; /* Opcional */
}

.navbar h2 {
  font-size: 1.5rem;
  font-weight: 600;
}

.nav {
  display: flex;
  gap: 10px;
  list-style: none;
  padding: 0;
  margin: 0;
}

.nav-link {
  padding: 10px 15px;
  border-radius: 6px;
  font-weight: bold;
  color: #ffffff;
  transition: background 0.3s, transform 0.2s;
  text-decoration: none;
}

.nav-link:hover {
  background-color: rgba(255, 255, 255, 0.2);
}

.nav-link.router-link-exact-active {
  color: #42b983;
  background-color: #580101;
  font-weight: 600;
  box-shadow: inset 0 -3px 0 #ffffff;
}

/* Content Styles */
.content {
  background-color: #f9fafb;
  padding: 24px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  text-align: left;
  flex-grow: 1;
}
</style>

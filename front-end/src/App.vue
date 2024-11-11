<template>
  <div id="app" class="d-flex min-vh-100 bg-light">
    <!-- Sidebar -->
    <aside class="sidebar text-white p-4 shadow-lg" style="width: 250px;">
            <!-- Logo -->
            <div class="text-center mb-4">
        <img src="@/assets/logo-U_T_P.png" alt="Logo" class="logo" />
      </div>
      <h2 class="h4 text-center mb-4">Menú</h2>
      <ul class="nav flex-column">
        <li class="nav-item mb-2">
          <router-link to="/" class="nav-link text-white">Home</router-link>
        </li>
        <li class="nav-item mb-2">
          <router-link to="/about" class="nav-link text-white">About</router-link>
        </li>
        <li class="nav-item mb-2">
          <router-link to="/ofertas" class="nav-link text-white">Ofertas Educativas</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/usuarios" class="nav-link text-white">Usuarios Registrados</router-link>
        </li>
      </ul>
    </aside>

    <!-- Main Content -->
    <div class="content flex-grow-1 p-4 bg-white rounded shadow-sm">
      <router-view />
    </div>
  </div>
</template>


<style scoped>
/* Main Layout */
#app {
  display: flex;
  min-height: 100vh;
  background-color: #f3f4f6;
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
}

/* Logo Styles */
.logo {
  width: 80px;
  height: auto;
  border-radius: 50%; /* Esto es opcional */
}

/* Sidebar Styles */
.sidebar {
  display: flex;
  flex-direction: column;
  justify-content: start;
  background-color: #800020; /* Rojo guinda */
  color: #ffffff;
}

.sidebar h2 {
  font-size: 1.5rem;
  font-weight: 600;
  text-align: center;
}

.nav-link {
  display: block;
  padding: 12px 16px;
  border-radius: 6px;
  font-weight: bold;
  color: #ffffff;
  transition: background 0.3s, transform 0.2s;
}

.nav-link:hover {
  background-color: rgba(255, 255, 255, 0.2);
  transform: translateX(5px);
}

.nav-link.router-link-exact-active {
  color: #42b983;
  background-color: #580101;
  font-weight: 600;
  box-shadow: inset 3px 0 0 #ffffff;
}

/* Content Styles */
.content {
  background-color: #f9fafb;
  padding: 24px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  text-align: left;
}
</style>

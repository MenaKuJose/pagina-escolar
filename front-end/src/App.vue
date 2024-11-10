<template>
  <div id="app" class="flex">
    <!-- Sidebar -->
    <aside class="sidebar w-64 h-screen bg-gradient-to-b from-blue-900 to-blue-700 text-white p-6 shadow-lg">
      <h2 class="text-2xl font-semibold mb-8 text-center">Menú</h2>
      <ul class="space-y-4">
        <li>
          <router-link to="/" class="nav-link">Home</router-link>
        </li>
        <li>
          <router-link to="/about" class="nav-link">About</router-link>
        </li>
        <li>
          <router-link to="/ofertas" class="nav-link">Ofertas Educativas</router-link>
        </li>
        <li>
          <router-link to="/usuarios" class="nav-link">Usuarios Registrados</router-link>
        </li>
      </ul>
    </aside>

    <!-- Main Content -->
    <div class="content flex-1 p-10 bg-gray-100">
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

/* Sidebar Styles */
.sidebar {
  display: flex;
  flex-direction: column;
  justify-content: start;
  background-color: #1e3a8a;
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
  background-color: #2563eb;
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

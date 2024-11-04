<script setup>
// Código de configuración de Vue aquí si es necesario
</script>

<template>
  <div class="app-container">
    <!-- Sidebar -->
    <aside class="sidebar">
      <h2 style="color: white; font-size: medium; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">Página Administrativa Universidad Tecnológica del Poniente</h2>
      <ul class="sidebar-menu">
        <li style="color: white; font-size: medium; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;"><router-link to="/" active-class="active">Dashboard</router-link></li>
        <li style="color: white; font-size: medium; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;"><router-link to="/usuarios" active-class="active">Usuarios Registrados</router-link></li>
        <li style="color: white; font-size: medium; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;"><router-link to="/ofertas" active-class="active">Ofertas Educativas</router-link></li>
      </ul>
    </aside>

    <!-- Contenido principal -->
    <div class="main-content">
      <header class="header">
        <h1 style="color: black; font-size: medium; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">Universidad Tecnológica del Poniente</h1>
      </header>
      <main class="content">
        <router-view /> <!-- Aquí se renderizan los componentes según la ruta -->
      </main>
    </div>
  </div>
</template>

<style scoped>
/* Reset de CSS para eliminar márgenes y paddings por defecto */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html, body {
  height: 100%;
  width: 100%;
  overflow: hidden; /* Evita desplazamiento vertical y horizontal en el body */
  font-family: 'Inter', sans-serif;
  color: #333;
  background-color: #f8f9fa;
}

/* Contenedor general */
.app-container {
  display: flex;
  height: 100vh;
  width: 100vw;
  padding-left: 240px; /* Espacio para compensar el sidebar */
  overflow: hidden; /* Evita desplazamiento horizontal en el contenedor */
}

/* Sidebar */
.sidebar {
  width: 240px;
  background-color: #1e293b;
  color: #e2e8f0;
  padding: 1rem;
  display: flex;
  flex-direction: column;
  overflow-y: auto;
  position: fixed;
  left: 0;
  top: 0;
  bottom: 0;
}

.sidebar h2 {
  font-size: 1.25rem;
  margin-bottom: 1.5rem;
  color: #94a3b8;
}

.sidebar-menu {
  list-style: none;
  padding: 0;
}

.sidebar-menu li {
  margin-bottom: 0.75rem;
}

.sidebar-menu a {
  color: #cbd5e1;
  text-decoration: none;
  padding: 0.75rem 1rem;
  display: block;
  transition: background-color 0.2s ease;
  border-radius: 6px;
  font-size: 1rem;
}

.sidebar-menu a:hover,
.sidebar-menu a.active {
  background-color: #334155;
  color: #ffffff;
}

/* Contenido principal */
.main-content {
  flex-grow: 1;
  padding: 1rem;
  background-color: #f8f9fa;
  overflow-y: auto;
  display: flex;
  flex-direction: column;
}

.header {
  background-color: #ffffff;
  padding: 1rem;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
  margin-bottom: 1rem;
  border-radius: 8px;
  color: #1e293b;
  text-align: center;
}

.header h1 {
  font-size: 1.5rem;
  font-weight: 600;
}

/* Contenido Responsivo */
.content {
  background-color: #ffffff;
  padding: 1.5rem;
  border-radius: 10px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
  flex-grow: 1;
  overflow-y: auto;
}

/* Estilos de tabla */
table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 1.5rem;
}

table th,
table td {
  padding: 0.75rem;
  border: 1px solid #e2e8f0;
  text-align: left;
  font-size: 0.875rem;
}

table th {
  background-color: #64748b;
  color: #f1f5f9;
  font-weight: 600;
}

table tr:nth-child(even) {
  background-color: #f1f5f9;
}

table tr:hover {
  background-color: #e2e8f0;
}

/* Botones */
button {
  padding: 0.5rem 1rem;
  font-size: 0.875rem;
  color: #ffffff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.2s ease;
}

button.edit {
  background-color: #3b82f6;
}

button.delete {
  background-color: #ef4444;
}

button:hover {
  opacity: 0.9;
}

/* Responsividad */
@media (max-width: 768px) {
  .app-container {
    padding-left: 0; /* Quita el padding-left en pantallas pequeñas */
  }

  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }

  .main-content {
    width: 100%;
    padding: 0.5rem;
  }

  .header h1 {
    font-size: 1.25rem;
  }

  .content {
    padding: 1rem;
  }

  table th,
  table td {
    padding: 0.5rem;
    font-size: 0.75rem;
  }
}

@media (max-width: 480px) {
  .header h1 {
    font-size: 1rem;
  }

  .sidebar h2,
  .sidebar-menu a {
    font-size: 0.875rem;
  }
}

</style>

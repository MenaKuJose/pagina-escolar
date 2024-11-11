<template>
  <div class="about container my-5 p-4 bg-light rounded">
    <section class="intro text-center mb-5">
      <h1 class="display-4 text-primary">Sobre Nosotros</h1>
      <p class="lead text-muted">Conoce nuestra historia, misión y valores</p>
      <hr class="my-4">
    </section>

    <!-- Nuestra Historia -->
    <section class="history mb-5">
      <h2 class="h4 text-secondary">Nuestra Historia</h2>
      <p>
        Fundada en [Año de Fundación], nuestra empresa ha crecido con el compromiso de ofrecer productos y servicios de alta calidad. A lo largo de los años, nos hemos esforzado en innovar y mejorar para satisfacer las necesidades de nuestros clientes, manteniendo siempre nuestros valores fundamentales.
      </p>
    </section>

    <!-- Misión y Visión -->
    <section class="mission-vision mb-5">
      <h2 class="h4 text-secondary">Misión y Visión</h2>
      <div class="row">
        <div class="col-md-6">
          <h3 class="h5 text-primary">Nuestra Misión</h3>
          <p>
            [Descripción de la misión de la empresa: En [Nombre de la Empresa], trabajamos cada día para lograr que nuestros productos y servicios generen un impacto positivo en la vida de nuestros clientes y en la sociedad].
          </p>
        </div>
        <div class="col-md-6">
          <h3 class="h5 text-primary">Nuestra Visión</h3>
          <p>
            [Descripción de la visión de la empresa: Ser líderes en nuestro sector, reconocidos por nuestra innovación, calidad y compromiso con el medio ambiente y la comunidad].
          </p>
        </div>
      </div>
    </section>

    <!-- Nuestros Valores -->
    <section class="values mb-5">
      <h2 class="h4 text-secondary">Nuestros Valores</h2>
      <ul class="list-unstyled">
        <li class="mb-2"><strong>Integridad:</strong> Actuamos con honestidad y transparencia en todas nuestras actividades.</li>
        <li class="mb-2"><strong>Innovación:</strong> Buscamos constantemente nuevas ideas y soluciones para mejorar nuestros productos y servicios.</li>
        <li class="mb-2"><strong>Compromiso:</strong> Nos esforzamos en satisfacer las necesidades de nuestros clientes y superar sus expectativas.</li>
        <li class="mb-2"><strong>Sostenibilidad:</strong> Nos comprometemos a operar de manera responsable, minimizando nuestro impacto ambiental.</li>
      </ul>
    </section>

    <!-- Nuestro Equipo -->
    <section class="team mb-5">
      <h2 class="h4 text-secondary">Nuestro Equipo</h2>
      <p>
        Nuestro equipo está formado por profesionales apasionados y dedicados, comprometidos con brindar la mejor experiencia a nuestros clientes. Creemos en el trabajo en equipo y en el desarrollo profesional de cada uno de nuestros colaboradores.
      </p>
    </section>

    <!-- CTA: Contacto -->
    <section class="cta text-center mt-5">
      <h3 class="h5 text-primary">¿Te gustaría saber más sobre nosotros?</h3>
      <p>No dudes en <a href="/contacto" class="text-primary">contactarnos</a>. ¡Estaremos encantados de atenderte!</p>
    </section>
  </div>
</template>

<style scoped>
.container {
  max-width: 800px;
  margin: 0 auto;
  color: #4a4a4a; /* Gris oscuro */
}

h1, h2, h3, h4 {
  font-weight: 600;
}

.lead {
  font-size: 1.25rem;
}

.intro h1 {
  color: #800020 !important; /* Rojo guinda */
}

h2, h3, h4 {
  color: #B02A2A !important; /* Rojo guinda más claro para subtítulos */
}

h3 {
  font-size: 1.2rem;
  margin-bottom: 0.5rem;
}

p, li {
  font-size: 1rem;
  line-height: 1.6;
}

ul {
  list-style-type: none;
  padding: 0;
}

ul li::before {
  content: "• ";
  color: #800020 !important; /* Rojo guinda */
  font-weight: bold;
}

.cta a {
  text-decoration: underline;
  color: #800020 !important; /* Rojo guinda */
}
</style>

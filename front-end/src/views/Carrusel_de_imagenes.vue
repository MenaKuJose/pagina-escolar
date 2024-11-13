<script setup>
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Navigation } from 'vue3-carousel';
import axios from 'axios';
import { ref, onMounted } from 'vue';
import Swal from 'sweetalert2';

const config = {
    itemsToShow: 2.5,
    wrapAround: true,
    transition: 1000,
    autoplay: false,
};

const loading = ref(true);
const images = ref([]); 

const loadImages = async () => {
    try {
        const response = await axios.get('http://localhost:8000/api/imagenes');
        console.log('Respuesta de la API:', response.data); 

        
        images.value = response.data.imagenes;
    } catch (error) {
        console.error('Error al cargar las imágenes:', error);
    } finally {
        loading.value = false; 
        Swal.close(); 
    }
};


onMounted(() => {
    
    Swal.fire({
        title: 'Cargando...',
        text: 'Por favor espera mientras cargamos las imágenes.',
        showConfirmButton: false,
        allowOutsideClick: false, 
        didOpen: () => {
            Swal.showLoading(); 
        },
    });

    loadImages();
});
</script>

<template>
    <br><br><br><br>
    <div class="carousel-container">
        <h1>Carrusel de imágenes</h1>

        
        <div v-if="!loading">
            <Carousel v-bind="config">
                
                <Slide v-for="(image, index) in images" :key="index">
                    <img :src="`http://localhost:8000/storage/${image.path}`" :alt="image.title" class="carousel__item" />
                    
                    <div class="carousel__caption">
                        <h3>{{ image.title }}</h3>
                        <p>{{ image.description }}</p>
                    </div>
                </Slide>

                <template #addons>
                    <Navigation />
                </template>
            </Carousel>
        </div>

        
        <div v-else>
            <p>Por favor espera mientras cargamos las imágenes...</p>
        </div>
    </div>
</template>

<style>
.carousel-container {
    width: 80%;
    margin: 0 auto;
    height: 300px;
    max-width: 1200px; 
}
.carousel__slide {
    padding: 5px;
}

.carousel__viewport {
    perspective: 300px;
    
}

.carousel__track {
    transform-style: preserve-3d;
}

.carousel__slide--sliding {
    transition: 0.5s;
}

.carousel__slide {
    opacity: 0.9;
    transform: rotateY(-20deg) scale(0.9);
}

.carousel__slide--active~.carousel__slide {
    transform: rotateY(20deg) scale(0.9);
}

.carousel__slide--prev {
    opacity: 1;
    transform: rotateY(-10deg) scale(0.95);
}

.carousel__slide.carousel__slide--next {
    opacity: 1;
    transform: rotateY(10deg) scale(0.95);
}

.carousel__slide--active {
    opacity: 1;
    transform: rotateY(0) scale(1);
}

:root {
    font-family: Inter, system-ui, Avenir, Helvetica, Arial, sans-serif;
    color-scheme: light dark;
    background-color: #242424;
    font-synthesis: none;
    text-rendering: optimizeLegibility;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;

    --brand-color: #535bf2;
}

.carousel__item {
    min-height: 200px;
    width: 100%;
    background-color: var(--brand-color);
    color: #fff;
    font-size: 20px;
    border-radius: 8px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.carousel__caption {
    position: absolute;
    bottom: 20px;
    left: 20px;
    color: #fff;
    background-color: rgba(0, 0, 0, 0.5);
    padding: 10px;
    border-radius: 5px;
}

.carousel__caption h3 {
    margin: 0;
    font-size: 18px;
}

.carousel__caption p {
    margin: 5px 0 0;
    font-size: 14px;
}
</style>

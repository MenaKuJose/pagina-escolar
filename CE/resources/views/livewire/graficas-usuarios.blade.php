<div>
    <div class="p-4 rounded-lg shadow-md bg-white w-full max-w-xs mx-auto">
        <canvas id="usuariosChart" width="350" height="175"></canvas>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('usuariosChart').getContext('2d');
            const usuariosChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Total de Usuarios'], // Etiquetas del gráfico
                    datasets: [{
                        label: 'Usuarios',
                        data: [{{ $totalUsuarios }}], // Datos del gráfico
                        backgroundColor: 'rgba(75, 192, 192, 0.6)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</div>

module.exports = {
    devServer: {
      proxy: {
        '/api': {
          target: 'http://localhost:8000', // Cambia esto a la URL de tu API Laravel
          changeOrigin: true,
          pathRewrite: { '^/api': '' }, // Elimina '/api' del inicio de la URL si no es necesario en el backend
        },
      },
    },
  };
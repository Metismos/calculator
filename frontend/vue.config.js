module.exports = {
  outputDir: '../api/public',
  devServer: {
    proxy: {
      '/api': {
        target: 'https://localhost:8003',
        secure: false,
        changeOrigin: true,
      },
    },
  },
}
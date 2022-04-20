module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
  ],
  theme: {
    extend: {
      colors: {
        'azul-principal': '#83C9F4',
        'azul-normal': '#A3D5FF',
        'azul-claro': '#D9F0FF',
        'fondo': '#edf6fa',
        'azul-google': '#4285F4',
      },
    },
  },
  plugins: [],
}

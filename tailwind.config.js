/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')
module.exports = {
  // ubah media menjadi class ketika menggunakan linux
  darkMode: 'media',
  content: [
     "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      screens: {
        "mn" : "30px",
      },
      colors: {
        "Green-old": "#206A5D",
        "very-Green-old": "#133d35",
        "Yellow": "#FFCC29",
        "Brown": "#F58634",
        "Brown-old": "#ED5107",
      
      },
    },
  },
  plugins: [
      require('flowbite/plugin')
  ],
}

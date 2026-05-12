import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */

const { addDynamicIconSelectors } = require("@iconify/tailwind")

export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './node_modules/flyonui/dist/js/*.js',
    "./src/*.html",
  ],
  plugins: [
    require('flyonui'),
    require('flyonui/plugin'),
    addDynamicIconSelectors()
  ],
  theme: {
    extend: {
      fontFamily: {
        oswald: ["Oswald"],
        body: ["Roboto"],
        card: ["Public Sans"],
        'animation-title':["Cardo"],
        'animation-content':["Josefin Sans"],
      },
    },
  },

  flyonui: {
    themes: [
      {
        mytheme: {
          primary: "#00008B",
          secondary: "#00008B",
          accent: "#A9A9A9",
          //   neutral: "#3d4451",
          //   "base-100": "#ffffff",
        },  
      },
    ],
  },
};


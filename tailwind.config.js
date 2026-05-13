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
        // New design system fonts
        display: ['Fraunces', 'Georgia', 'serif'],
        sans: ['Inter', ...defaultTheme.fontFamily.sans],
        // Legacy aliases — point everything to the new system for a clean swap
        body: ['Inter', ...defaultTheme.fontFamily.sans],
        card: ['Fraunces', 'Georgia', 'serif'],
        oswald: ['Fraunces', 'Georgia', 'serif'],
        'animation-title': ['Fraunces', 'Georgia', 'serif'],
        'animation-content': ['Inter', ...defaultTheme.fontFamily.sans],
      },
      colors: {
        // Stone & Forest palette
        canvas: '#FAF8F4',          // page background
        surface: '#FFFFFF',          // cards / modals
        ink: {
          DEFAULT: '#1C1C1A',        // body text
          muted: '#5C5A55',          // secondary text
        },
        forest: {
          DEFAULT: '#1F3D2E',        // brand primary
          hover: '#163024',
          50: '#F2F5F3',
          100: '#DCE5DF',
          900: '#0F2018',
        },
        terracotta: {
          DEFAULT: '#C9684A',        // accent / CTAs
          hover: '#B0573E',
          50: '#FBEEE8',
          100: '#F5D6C9',
        },
        hairline: '#E8E3DA',         // borders
      },
      letterSpacing: {
        'tightish': '-0.01em',
        'tighter-display': '-0.02em',
      },
    },
  },

  flyonui: {
    themes: [
      {
        mytheme: {
          primary: "#1F3D2E",        // forest — was "#00008B" navy
          secondary: "#1F3D2E",
          accent: "#C9684A",         // terracotta — was "#A9A9A9" grey
          warning: "#C9684A",        // map legacy "warning" calls to accent
          success: "#1F3D2E",        // map legacy "success" calls to brand
          neutral: "#1C1C1A",
          "base-100": "#FAF8F4",     // page background
        },
      },
    ],
  },
};

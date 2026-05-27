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
    require('@tailwindcss/typography'),
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
        // Brand accent — SST-style warm amber/gold. The Tailwind key is
        // still `terracotta` so hundreds of `bg-terracotta` / `text-terracotta`
        // class references keep working; only the hex values changed.
        terracotta: {
          DEFAULT: '#D4A036',        // amber gold — accent / CTAs
          hover: '#B8862A',          // deeper gold on hover
          50: '#FDF7E5',             // washed amber
          100: '#F7E5B0',            // pale amber
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
          accent: "#D4A036",         // amber gold — was terracotta
          warning: "#D4A036",        // map legacy "warning" calls to accent
          success: "#1F3D2E",        // map legacy "success" calls to brand
          neutral: "#1C1C1A",
          "base-100": "#FAF8F4",     // page background
        },
      },
    ],
  },
};

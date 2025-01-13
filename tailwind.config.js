import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './node_modules/flowbite/**/*.js'
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                
            },
            screens: {
                '3xl': '1750px',
                '2xl': '1400px',
                'xl': '1200px'
            },
            textIndent: {
                4: '1rem',
                8: '2rem',
              },
        },
    },
    plugins: [
        require('flowbite/plugin'),
      ],
};

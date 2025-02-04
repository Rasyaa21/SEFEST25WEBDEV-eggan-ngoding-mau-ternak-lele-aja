import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['SF Pro', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#39A7FF',
                secondary: '#87C4FF',
                lightBlue: '#E0F4FF',
                cream: '#FFEED9'
            },
        },
    },
    plugins: [require('tailwind-motion'), require('tailwindcss-intersect')],
};

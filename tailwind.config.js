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
                primaryColor: '#39A7FF',
                secondaryColor: '#87C4FF',
                lightBlueColor: '#E0F4FF',
                creamColor: '#FFEED9'
            },
        },
    },
    plugins: [],
};

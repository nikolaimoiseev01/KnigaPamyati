import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter Tight', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                gray: {
                    600: '#141414'
                },
                coral: {
                    500: '#CE624F'
                }
            }
        },
    },

    plugins: [forms],
};

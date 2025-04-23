import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './vendor/awcodes/filament-tiptap-editor/resources/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter Tight', ...defaultTheme.fontFamily.sans],
                mono: ['Space Mono', ...defaultTheme.fontFamily.mono],
            },
            colors: {
                bright: {
                  85: '#FFFFFFD9',
                  100: '#FFFFFF'
                },
                dark: {
                    200: '#DCDCDC',
                    300: '#898989',
                    400: '#343434',
                    500: '#202020',
                    600: '#141414'
                },
                coral: {
                    300: '#F5E0B8',
                    500: '#CE624F'
                }
            },
            maxWidth: {
                '8xl': '84.75rem', // 1536px (примерное значение, можно изменить)
            },
            screens: {
                '2xl': {'max': '1535px'}, // => @media (max-width: 1535px) { ... }
                'xl': {'max': '1279px'}, // => @media (max-width: 1279px) { ... }
                'lg': {'max': '1023px'}, // => @media (max-width: 1023px) { ... }
                'md': {'max': '767px'}, // => @media (max-width: 767px) { ... }
                'sm': {'max': '639px'}, // => @media (max-width: 639px) { ... }
            }
        },
    },

    plugins: [forms],
};

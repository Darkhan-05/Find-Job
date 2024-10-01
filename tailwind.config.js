import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'blueColor': 'rgb(59 130 246)',
                'greyIsh': '#f1f4f8',
                'cardShadow': '#f7f8f9',
                'textColor': '#252b36'
            }
        },
    },

    plugins: [
        forms,
        typography,
        require('flowbite/plugin')

    ]
};

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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                serif: ['Lora', ...defaultTheme.fontFamily.serif],
            },
            colors: {
                'brand-orange': '#C3512F',
            },
            maxWidth: {
                'screen-3xl': '1920px',
            },
            minHeight: {
                '96': '24rem',
                '100': '25rem',
            },
            width: {
                ...generateWidths(97, 200),
            },
            boxShadow: {
                'white-large': '0 0 20px 40px rgba(255, 255, 255, 1)', // Custom large white shadow
            },
        },
    },

    plugins: [forms],
};

/**
 * Function to generate custom width utilities
 * @param {number} start - starting value for custom widths
 * @param {number} end - ending value for custom widths
 * @returns {object} - object containing width classes
 */
function generateWidths(start, end) {
    let widths = {};
    for (let i = start; i <= end; i++) {
        widths[i] = `${i / 4}rem`;
    }
    return widths;
}

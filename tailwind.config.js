const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                truegray: colors.trueGray,
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            fontWeight: ['hover', 'focus'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};

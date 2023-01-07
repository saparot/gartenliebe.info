/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/**/*.vue',
    ],
    theme: {
        debugScreens: {
            position: ['top', 'left'],
        },
        extend: {},
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('tailwindcss-debug-screens'),
    ],
};

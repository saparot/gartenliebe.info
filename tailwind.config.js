/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',
    content: [
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/**/*.vue',
    ],
    theme: {
        debugScreens: {
            position: ['bottom', 'right'],
        },
        extend: {},
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('tailwindcss-debug-screens'),
    ],
};

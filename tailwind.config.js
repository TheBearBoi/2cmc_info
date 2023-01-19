/** @type {import('tailwindcss').Config} */
module.exports = {
    mode: 'jit',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./config/enums.php",
    ],
    theme: {
        extend: {},
        data: {
            active: 'active-page="1"',
            inactive: 'active-page=""'
        },
    },
    plugins: [],
}

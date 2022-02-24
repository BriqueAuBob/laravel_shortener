const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                'sans': ['Graphik', ...defaultTheme.fontFamily.sans],
            },
            zIndex: {
                '-1': '-1',
            }
        },
    },
    plugins: [],
}

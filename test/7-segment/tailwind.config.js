/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./*.{html,php,js}"],
    theme: {
        extend: {},
    },
    daisyui: {
        themes: ["cupcake", "synthwave"],
    },
    plugins: [require("daisyui")],
};

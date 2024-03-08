/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./*.{html,php,js}"],
    theme: {
        extend: {},
    },
    daisyui: {
        themes: ["light", "dracula"],
    },
    plugins: [require("daisyui")],
};

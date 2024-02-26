/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./*.{html,js}"],
    darkMode: "selector",
    theme: {
        extend: {
            keyframes: {
                typing: {
                    "0%": {
                        width: "0%",
                        visibility: "hidden",
                    },
                    "100%": {
                        width: "100%",
                    },
                },
                blink: {
                    "50%": {
                        borderColor: "transparent",
                    },
                    "100%": {
                        borderColor: "white",
                    },
                },
            },
            animation: {
                typing: "typing 4s steps(28) infinite alternate, blink .7s infinite",
            },
        },
    },
    plugins: [],
};

import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
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
                typing: "typing 3s steps(24) infinite alternate, blink .7s infinite",
            },
        },
    },

    daisyui: {
        themes: [
            {
                light: {
                    ...require("daisyui/src/theming/themes")["light"],
                    primary: "#ed8600",
                    secondary: "#3b82f6",
                    // accent: "#37cdbe",
                    // neutral: "#3d4451",
                    "base-100": "#eeeeee",
                },
                dracula: {
                    ...require("daisyui/src/theming/themes")["dracula"],
                    primary: "#ed8600",
                    secondary: "#3b82f6",
                    // accent: "#37cdbe",
                    // neutral: "#3d4451",
                    // "base-100": "#eeeeee",
                },
            },
        ],
    },

    /** plugins: [forms], [require('daisyui')], */
    plugins: [require("daisyui"), require("@tailwindcss/forms")],
};

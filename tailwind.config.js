/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    important: true,
    darkMode: ["class", '[data-mode="dark"]'],
    theme: {
        fontFamily: {
            poppins: ["Poppins", "sans-serif"],
            rubik: ["Rubik", "sans-serif"],
        },

        screens: {
            sm: "576px",
            md: "768px",
            lg: "992px",
            xl: "1200px",
            "2xl": "1400px",
        },

        container: {
            center: true,
            padding: {
                DEFAULT: "1rem",
                sm: "2rem",
                lg: "4rem",
                xl: "5rem",
                "2xl": "9rem",
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        {
            strategy: "class",
        },
    ],
};

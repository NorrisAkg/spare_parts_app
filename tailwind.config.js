/** @type {import('tailwindcss').Config} */
export default {
    // purge: ["./index.html", "./src/**/*.{vue,js,ts,jsx,tsx}"],
    // content: ["./resources/js/assets/css/**/*.css"],
    content: ["./resources/views/welcome.blade.php", "./resources/js/**/*.{vue,js,ts,jsx,tsx}"],
    theme: {
        extend: {},
    },
    plugins: [require("rippleui")],
};

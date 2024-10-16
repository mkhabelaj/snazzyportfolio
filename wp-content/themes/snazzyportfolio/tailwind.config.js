/** @type {import('tailwindcss').Config} */
module.exports = {
  prefix: "sp-",
  content: [
    "./src/**/*.{html,js,php}",
    "./inc/**/*.php",
    "./template-parts/**/*.php",
  ],
  theme: {
    extend: {
      fontFamily: {
        interLight: ["Inter", "serif"],
      },
    },
  },
  plugins: [],
};

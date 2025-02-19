/** @type {import('tailwindcss').Config} */
module.exports = {
  prefix: "sp-",
  content: [
    "./blocks/src/**/*.{html,js,php,json}",
    "./template-parts/**/*.php",
    "./inc/**/*.php",
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

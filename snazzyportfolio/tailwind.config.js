/** @type {import('tailwindcss').Config} */
module.exports = {
  prefix: "sp-",
  content: [
    "./blocks/src/**/*.{html,js,php,json,jsx}",
    "./template-parts/**/*.php",
    "./inc/**/*.php",
    "./lib/script/margin/margin.js",
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

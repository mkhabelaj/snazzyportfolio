/** @type {import('tailwindcss').Config} */
module.exports = {
  prefix: "sp-",
  content: ["./src/**/*.{html,js,php}", "./inc/**/*.php"],
  theme: {
    extend: {
      fontFamily: {
        interLight: ["Inter", "serif"],
      },
    },
  },
  plugins: [],
};

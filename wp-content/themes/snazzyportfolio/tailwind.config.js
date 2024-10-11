/** @type {import('tailwindcss').Config} */
module.exports = {
  prefix: "sp-",
  content: ["./src/**/*.{html,js,php}"],
  theme: {
    extend: {
      fontFamily: {
        interLight: ["Inter", "serif"],
      },
    },
  },
  // safelist: ["sp-text-7xl", "sp-md:sp-text-2xl"],
  plugins: [],
};

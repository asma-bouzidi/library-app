/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        cream: "#F8F4EC",
        espresso: "#2B1F1A",
        gold: "#C6A15B",
        sage: "#7C8C72",
        mocha: "#4B3621"
      },
      fontFamily: {
        serif: ["Playfair Display", "serif"],
        sans: ["Inter", "sans-serif"]
      }
    }
  },
  plugins: [],
}

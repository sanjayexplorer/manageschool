/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    screens: {
      'xs': '320px',   // Small devices (portrait phones)
      'sm': '480px',   // Small devices (landscape phones)
      'md': '768px',   // Medium devices (tablets)
      'lg':  '993px',  // Large devices (desktops)
      'xl': '1280px',  // Extra large devices (large desktops)
      '2xl': '1550px', // Very large devices (4K screens)
    },
    extend: {
   
    },
   
  },
  plugins: [],
}


/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}"],
  theme: {
    extend: {
      spacing: {
        backdrop: "95%",
      },
      dropShadow: {
        "3xl": "0 5px 3px rgba(0, 0, 2, 0.25)",
        "4xl": ["0 5px 5px rgba(0, 0, 1, 0.5)"],
      },
    },
    colors: {
      nav: "#F2F0E2",
      blues: "#00113D",
      blues2: "#4BBCC7",
      yellow: "#FFD700",
      grey: "#EBEBEB",
      black: "#000000",
      white: "#FFFFFF",
      red: "#FF0000",
      green: "#00B01C",
    },
  },
  daisyui: {
    themes: [
      {
        mytheme: {
          primary: "#00113D",
        },
      },
    ],
  },
  plugins: [require("daisyui")],
};

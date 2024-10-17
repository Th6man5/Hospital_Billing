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
      nav: "#91D8E4",
      click: "#374151",
      sidenav: "#024CAA",
      blues: "#387F39",
      blues2: "#024CAA",
      yellow: "#FFD700",
      grey: "#FAFFAF",
      black: "#DBD3D3",
      white: "#243642",
      red: "#FF0000",
      green: "#00B01C",
      cards: "#091057",
      icon: "#007bff",
      background: "#B7E0FF",
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

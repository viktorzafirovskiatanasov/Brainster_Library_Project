/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./*.html' , './scripts/**/*.js'],
  theme: {
    extend: {
      backgroundImage:{
        'login': 'url(./images/login.png)',
        'signup' : 'url(./images/signup.png)'
      }
    },
  },
  plugins: [],
}


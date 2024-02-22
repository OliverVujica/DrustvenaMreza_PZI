/** @type {import('tailwindcss').Config} */
export default {
  content: [
      './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',    
      './storage/framework/views/*.php',
      './resources/views/**/*.blade.php',
      './resources/views/layout/*.blade.php',
      "./resources/**/*.js",
      "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        fontFamily: {
            'sans': ['Nunito', 'sans-serif'],
            'serif': ['Merriweather', 'serif'],
        },

        colors: {
            'sumplava' : '#00437a',
            'sumcrvena' : '#ed1c24',     
        }, 
    },
  },
  plugins: [],
}


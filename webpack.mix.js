let mix = require('laravel-mix');
var tailwindcss = require('tailwindcss');


// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');

// mix.js('resources/assets/js/app.js', 'public/js')
// mix.postCss('resources/assets/css/app.css', 'public/css')
//    .options({
//     postCss: [
//         require('tailwindcss')
//     ]
//    }).version();



mix.postCss('resources/assets/css/app.css', 'public/css', [
  tailwindcss('./tailwind.js'),
]).options({
    postCss: [
        require('tailwindcss')
    ]
   }).version();;

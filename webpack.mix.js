let mix = require('laravel-mix');
require('laravel-mix-purgecss');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
/*mix.options({
   purifyCss: true,
});*/
mix.js(
   'resources/js/app.js',
   'public/js'
)
   .sass(
      'resources/sass/app.scss', 
      //'public/sass/app.scss', 
      'public/css',
   )
   //.purgeCss({
   //   content: ['resources/js/components/galleries/*'],
   //});
   mix.js(
      'resources/js/admin.js',
      'public/js'
   )   
   .sass(
      'resources/sass/admin.scss', 
      //'public/sass/app.scss', 
      'public/css',
   );
/*
   mix
      .sass(
         'resources/sass/specific.scss', 
         'public/css',
      ).purgeCss({
         content: ['resources/js/components/contacts/*'],
      }); */
/*mix.sass(
      'resources/sass/menu.scss', 
      'public/css',
   ).purgeCss({
      content: [
         'resources/views/includes/header.blade.php',
         'resources/views/includes/nav-menu.blade.php',
         'resources/views/includes/social-media.blade.php',
      ],
   })*/
/*mix.js(
   'resources/js/app.js', 
   'public/js'
)
   .sass(
      'resources/sass/app.scss', 
      'public/css',
   );*/

/*mix.sass('resources/sass/app.scss', 'public/css/my-ass.css')  
   .purgeCss({
      content: ['resources/views/contact/*.php'],
   });*/

/*mix.styles([
   //'public/css/style.css',
   //'public/css/vertical-menu.css',
   //'public/css/magnific-popup.css',
   //'public/css/style-light.css',
   //'public/css/responsive.css',
   //'public/css/contact.css'
], 'public/css/all.css');*/


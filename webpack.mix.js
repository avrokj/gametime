let mix = require("laravel-mix");

mix.postCss("resources/css/app.css", "public/css");

mix.js("resources/js/app.home.js", "public/js");

mix.js("resources/js/segment/app.js", "public/js");
mix.js("resources/js/segment/draganddrop.js", "public/js");
mix.js("resources/js/segment/hometeam.js", "public/js");
mix.js("resources/js/segment/guestteam.js", "public/js");
mix.js("resources/js/segment/spaghetti.js", "public/js");

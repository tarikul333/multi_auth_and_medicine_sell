<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="style.css">
    <title>{{ $title }}</title>
  </head>
  <body class="bg-gray-50 min-h-screen p-6">  
    <div class="container mx-auto p-4"> 
        {{ $slot }}
    </div>
  </body>
</html>
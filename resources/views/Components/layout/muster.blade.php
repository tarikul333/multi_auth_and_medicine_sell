<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <title>{{ $title }}</title>
  </head>
  <body class="bg-gray-100">  
    <div class="container mx-auto p-4"> 
        {{ $slot }}
    </div>
  </body>
</html>
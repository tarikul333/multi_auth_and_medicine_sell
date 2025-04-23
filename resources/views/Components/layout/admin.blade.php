<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>{{ $title }}</title>
  </head>
  <body class="bg-gray-100">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <x-ui.admin-nav/>

        <!-- Main Content -->
        <div class="flex-1 p-6 overflow-auto">
            {{ $slot }}
        </div>
    </div>

  </body>
</html>

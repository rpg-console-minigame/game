<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vite + React</title>
    @vite(['resources/js/react/main.jsx'])
  </head>
  <body  style= "background-color: #647994">
    <div id="root"></div>
  </body>
  <script>
     let apiUrl = "{{ env('APP_URL') }}"

    // let apiUrl = "https://game-production-0fc8.up.railway.app/api"
  </script>
</html>

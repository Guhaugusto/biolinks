
<!DOCTYPE html>
<html lang="{{ config('app.locate') }}" class="h-full">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name') }}</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
 
</head>
<body class="bg-blue-300 text-black-900 h-full">

    {{ $slot }}

</body>
</html>
 
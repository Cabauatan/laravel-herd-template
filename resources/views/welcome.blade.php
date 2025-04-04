<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/images.jpeg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="text-red-900">Template | Dashboard</title>
    <!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/js/app.js'])
    <link href="https://fonts.cdnfonts.com/css/lato" rel="stylesheet" />
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />

</head>

<body>
    <div id="app"></div>
</body>

</html>
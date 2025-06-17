<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>@yield('title', 'WellNest')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: 'Rubik', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen">

    <main class="container mx-auto mt-8 px-4">
        @yield('content')
    </main>

</body>

</html>

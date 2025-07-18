<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/30b351febc.js" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>@yield("title") | {{ config("app.name") }}</title>
</head>
<body>
    {{-- Header goes here --}}
    @include("components.header")

    {{-- Content goes here --}}
    <section class="w-full max-w-[95%] mx-auto">
        @yield("content")
    </section>

    {{-- Footer goes here --}}
    @include("components.footer")
</body>
</html>

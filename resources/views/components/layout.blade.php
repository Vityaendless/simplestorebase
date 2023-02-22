<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/styles.css">
        <title>{{ $title }}</title>

    </head>
    <body>
        <div class="wrapper">
            <x-header.menu />
            <main>
                {{ $slot }}
            </main>
            <x-footer.contact />
        </div>
    </body>
</html>
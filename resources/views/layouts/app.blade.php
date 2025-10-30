<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Manga Blog')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('mangas.index') }}">📚 Manga Blog</a>
            <a class="btn btn-outline-light" href="{{ route('mangas.create') }}">➕ Aggiungi Manga</a>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

</body>
</html>

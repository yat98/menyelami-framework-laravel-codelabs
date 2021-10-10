<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studios</title>
</head>

<body>
    @foreach (App\Models\Studio::with('movies')->get() as $studio)
        <h1>{{ $studio->name }}</h1>
        <ul>
            @forelse($studio->movies as $movie)
                <li>{{ $movie->name }}</li>
            @empty
                Tidak film untuk studio ini
            @endforelse
        </ul>
    @endforeach
</body>

</html>

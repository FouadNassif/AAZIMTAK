<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Images</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1>Wedding Images</h1>
    @foreach($images as $image)
        <img src="{{ asset('storage/' . $image->path) }}" alt="Wedding Image" style="width: 200px; height: auto; margin: 10px;">
    @endforeach
</body>
</html>

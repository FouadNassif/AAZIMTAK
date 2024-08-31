<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Images</title>
    @vite('resources/css/app.css')
</head>
<body>
    <form action="{{ route('weddings.storeImages', $weddingId) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="images[]" multiple>
        <button type="submit">Upload Images</button>
    </form>
</body>
</html>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter un podcast</title>
</head>

<body>
<form action="{{ route('podcasts.store') }}" method="POST" novalidate enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Titre du Podcast</label>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" class="form-control" id="name" name="name"/>
    </div>
{{--    --}}
{{--    <div class="form-group">--}}
{{--        <label for="podcast_img">Image</label>--}}
{{--        @error('podcast_img')--}}
{{--        <div class="alert alert-danger">{{ $message }}</div>--}}
{{--        @enderror--}}
{{--        <input type="image" class="form-control" id="podcast_img" name="podcast_img"/>--}}
{{--    </div>--}}
{{--    --}}
    <div class="form-group">
        <label for="description">Description</label>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <label for="podcast_file">Insérer votre fichier Podcast</label>
        @error('podcast_file')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="file" id="file" class="form-control" name="podcast_file" />
    </div>

    <button type="submit" class="btn btn-primary">Publier</button>
    </form>
</body>
</html>

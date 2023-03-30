<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Podcast</title>
</head>
<body>
<h1>Nom du Podcast: {{ $podcast->name }} </h1>
<img src="{{$podcast->img_podcast}}" alt="">
<audio src="{{$podcast->url_podcast}}"></audio>
<p>Description: {{ $podcast->description }}</p>
<a href="{{ route('podcasts.create') }}"> Ajouter un Podcast</a>

<form action="{{ route('podcasts.destroy', $podcast) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit"
            class="inline-block px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-500 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:shadow-outline-blue active:bg-red-800">{{ __('Supprimer') }}</button>
</form>
</body>
</html>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier votre Podcast</title>
</head>

<body>
<x-app-layout>
    <x-slot name="header">
        <div>
            <h2>
                {{ __('Modifier mon Podcast') }}
            </h2>
        </div>
    </x-slot>

    <div>
        <form action="{{ route('podcasts.update', $podcast) }}" method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label for="name">Titre</label>
                <input type="text" name="name" id="name" value="{{ $podcast->name }}">
            </div>
            <div>
                <label for="description">Description</label>
                <input type="text" name="description" id="description"
                    value="{{ $podcast->description }}">
            </div>
            <div>
                <label for="image">Couverture</label>
                <input
                    type="file" name="image" id="image" value="{{ $podcast->img_podcast }}"
                    accept="image/*">
            </div>
            <div>
                <label for="url_podcast">Podcast</label>
                <input type="file" name="url_podcast" id="url_podcast" value="{{ $podcast->podcast }}"
                    accept="audio/*">
            </div>
            <div>
                <button type="submit">Modifier</button>
            </div>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</x-app-layout>
</body>
</html>

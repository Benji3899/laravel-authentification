<!DOCTYPE html>
<html lang="fr ">

<body>
<x-app-layout>
    <x-slot name="header">
        <div>
            <h2>
                {{ __('Mes podcasts') }}
            </h2>
            <a href="{{ route('podcasts.create') }}">{{ __('Ajouter mon podcast') }}</a>
        </div>
    </x-slot>
    <div>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @if ($podcasts->isEmpty())
            <p>{{ __('Vous n\'avez pas encore publier de podcast') }}</p>
        @endif
        <ul>
            @foreach ($podcasts as $podcast)
                <li>
                    @if ($podcast->url_image)
                        <img
                            src="{{ Storage::url($podcast->url_image) }}" alt="{{ $podcast->title }}">
                    @endif

                    <a href="{{ route('podcasts.show', $podcast) }}">{{ $podcast->title }}</a>

                    @if ($podcast->podcast)
                        <audio controls>
                            <source src="{{ Storage::url($podcast->podcast) }}"
                                    type="{{ Storage::mimeType($podcast->podcast) }}">
                        </audio>
                    @endif

                    <a href="{{ route('podcasts.edit', $podcast) }}">{{ __('Modifier') }}</a>

                    <a href="{{ route('podcasts.show', $podcast) }}">{{ __('Informations') }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
</body>

</html>

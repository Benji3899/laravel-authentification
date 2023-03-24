<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Liste des utilisateurs:</h1>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div>
    <p><a href="{{ route('users.create') }}">Ajouter un utilisateur</a></p>
</div>

<div>
<ul>
    @foreach($users as $user)
        <li><a href="{{ route('users.show', $user) }}">{{$user->name}}</a></li>
    @endforeach
</ul>
</div>


</body>
</html>

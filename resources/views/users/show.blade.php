<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$user->name}}</title>
</head>
<body>
<h1>{{$user->name}}</h1>
<p>Email: {{$user->email}}</p>
<p>Crée le: {{$user->created_at}}</p>
<p>Anniversaire: {{$user->birthdate->format('d F')}} {{now()->diffInYears($user->birthdate)}} ans</p>
<p><a href="{{ route('users.edit', $user)}}" class="btn btn-primary">Edit le profil</a></p>
<form action="{{ route('users.destroy', $user) }}" method="POST">
    @csrf
    @method('DELETE');
    <button type="submit">Supprimer</button>
</form>

</body>
</html>

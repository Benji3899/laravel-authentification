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
{{--@if ($errors->any())--}}
{{--    <div class="alert alert-danger">--}}
{{--        <ul>--}}
{{--            @foreach ($errors->all() as $error)--}}
{{--                <li>{{ $error }}</li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--    <br />--}}
{{--@endif--}}
<form action="{{ route('users.store') }}" method="POST" novalidate>
    @csrf
    <div class="form-group">
        <label for="name">Nom d'utilisateur: *</label>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" name="name" class="@error('name') is-invalid @enderror form-control"/>
    </div>

    <div class="form-group">
        <label for="email">Email: *</label>
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" name="email" class="@error('email') is-invalid @enderror form-control"/>
    </div>

    <div class="form-group">
        <label for="password">Mot de passe: *</label>
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="password" name="password" class="@error('password') is-invalid @enderror form-control" />

    </div>

    <div class="form-group">
        <label for="password">Mot de passe: *</label>
        <input id="password" type="password" class="form-control" name="password_confirmation">
    </div>

    <div class="form-group">
        <label for="birthdate">Date de naissance: *</label>
        @error('birthdate')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="date" name="birthdate" class="@error('birthdate') is-invalid @enderror form-control" />
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>
</body>
</html>

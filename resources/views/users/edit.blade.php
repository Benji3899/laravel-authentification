<div>
    <h1>Edition du profil</h1>

{{--    @if ($errors->any())--}}
{{--        <div class="alert alert-danger">--}}
{{--            <ul>--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--        <br />--}}
{{--    @endif--}}
    <form action="{{ route('users.update', $user) }}" method="POST" novalidate>
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom d'utilisateur: *</label>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" class="form-control" name="name" value="{{ $user->name }}" class="@error('name') is-invalid @enderror" />
        </div>

        <div class="form-group">
            <label for="email">Email: *</label>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" class="form-control" name="email" value="{{ $user->email }}" class="@error('email') is-invalid @enderror"/>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe: *</label>
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="password" class="form-control" name="password" value="{{$user->password}}" class="@error('password') is-invalid @enderror"/>
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
            <input type="date" class="form-control" name="birthdate" value="{{ $user->birthdate->format('Y-m-d') }}" class="@error('birthdate') is-invalid @enderror"/>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>

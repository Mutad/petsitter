<x-layout :header=false>
    <div class="d-flex align-items-center vh-100">
        <form action="/login" method="post" class="text-center form-signin">
            <h3>Log in</h3>
            @csrf
            <div class="form-floating">
                <input required class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                    type="email" name="email" id="emailField" placeholder="name@example.com">
                <label for="emailField" class="form-label">E-mailadres</label>
            </div>
            <div class="form-floating">
                <input required type="password" name="password"
                    class="form-control @error('password') is-invalid @enderror" id="floatingPassword"
                    placeholder="Password">
                <label for="floatingPassword">Wachtwoord</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
            <div>
                <a class="btn btn-link" href="/register">Nog geen account? Maak er nu een aan!</a>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif
        </form>
    </div>
</x-layout>

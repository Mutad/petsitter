<x-layout>
    <div class="d-flex align-items-center vh-100">
        <form action="/register" method="post" class="text-center form-signup">
            <h1>Create your account</h1>
            @csrf
            <div class="form-floating">
                <input required class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                    type="text" name="name" id="nameField" placeholder="John Doe">
                <label for="nameField">Full Name</label>
            </div>
            <div class="form-floating">
                <input required class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                    type="email" name="email" id="emailField" placeholder="name@example.com">
                <label for="emailField">Email address</label>
            </div>
            <div class="form-floating">
                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password"
                    id="passwordField" placeholder="Password">
                <label for="passworField">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
            <a href="/login" class="btn btn-link">Already have an account? Find it here.</a>
            @if ($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif
        </form>
    </div>
</x-layout>

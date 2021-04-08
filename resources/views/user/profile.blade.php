<x-layout>
    <div class="card m-5">
        <div class="card-header d-flex justify-content-between">
            <h3>Profiel</h3>
            <a class="btn btn-link" href="{{ route('user.edit', $user->id) }}">Bewerk</a>
        </div>
        <div class="card-body">
            <h4>Voor-en achternaam: {{ $user->name }}</h4>
            <p>E-mail: {{ $user->email }}</p>
            @if ($user->country & $user->city)
                <p>Location: {{ $user->country }}, {{ $user->city }}</p>
            @endif
        </div>
        <div class="card-footer">
            <a href="/logout" class="btn btn-danger">Uitloggen</a>
        </div>
    </div>
    <div class="card m-5">
        <div class="card-header">
            <h4>Je huisdieren</h4>
        </div>
        <div class="list-group list-group-flush">
            @forelse ($user->pets as $pet)
                <a href="{{ route('pets.show', $pet) }}" class="list-group-item">{{ $pet->name }}</a>
            @empty
                <a href="{{ route('pets.create') }}" class="list-group-item list-group-item-action">Je hebt geen huisdieren.
                    Klik hier om uw huisdier toe te voegen.</a>
            @endforelse
        </div>
    </div>
</x-layout>

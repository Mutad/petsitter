<x-layout>
    <div class="card m-5">
        <div class="card-header">
            <h3>Profile</h3>
        </div>
        <div class="card-body">
            <h4>{{ $user->name }}</h4>
            <p>{{ $user->email }}</p>
        </div>

    </div>
    <div class="card m-5">
        <div class="card-header">
            <h4>Your Pets</h4>
        </div>
        <div class="list-group list-group-flush">
            @forelse ($user->pets as $pet)
                <a href="/pets/{{$pet->id}}" class="list-group-item">{{ $pet->name }}</a>
            @empty
                <a href="/pets/add" class="list-group-item list-group-item-action">You have no pets. Click here to add your pet.</a>
            @endforelse
        </div>
    </div>
</x-layout>

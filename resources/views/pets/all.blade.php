<x-layout>
    <div class="card m-5">
        <div class="card-header">
            <h3>Pets</h3>
        </div>
        <div class="list-group list-group-flush">
            @forelse ($pets as $pet)
                <a href="/pets/{{$pet->id}}" class="list-group-item">{{ $pet->name }}</a>
            @empty
                No pets found
            @endforelse
        </div>
        <div class="card-footer d-flex justify-content-center">
            {{$pets->links()}}
        </div>
    </div>
</x-layout>
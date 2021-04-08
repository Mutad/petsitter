<x-layout>
    <div class="card col-sm-10 mt-5 mx-auto">

        <div class="card-header d-flex justify-content-between">
            <h3>Huisdieren</h3>
            <a href="{{ route('pets.create') }}" class="btn btn-primary">Voeg je huisdier toe</a>
        </div>
        <form class="body p-3" method="{{route('pets.index')}}">
            <label for="typeField">Filter</label>
            <div class="input-group">
                <select name="type" id="typeField" class="form-select">
                    <option value="cat">Kat</option>
                    <option value="dog">Hond</option>
                </select>
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </form>
        <div class="m-1 row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach ($pets as $pet)

                <div class="col">
                    <div class="card shadow-sm">
                        <img src="/storage/pets/{{ $pet->image }}" class="card-img-top" style="object-fit: cover;"
                            alt="{{ $pet->name }} profile picture" height="225">
                        <div class="card-body">
                            <h5>{{ $pet->name }}</h5>
                            <p class="card-text">{{ $pet->description }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('pets.show', $pet) }}"
                                        class="btn btn-sm btn-outline-secondary">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- <div class="list-group list-group-flush">
                @forelse ($pets as $pet)
                    <a href="/pets/{{ $pet->id }}" class="list-group-item">
                        <div class="d-flex justify-content-between">
                            <p class="m-0">{{ $pet->name }}</p>
                            @if ($pet->user->country && $pet->user->city)
                                <p class="m-0">{{ $pet->user->country }}, {{ $pet->user->city }}</p>
                            @endif
                        </div>
                        <small class="d-flex align-items-center">
                            <img height="15" alt="star" class="m-1"
                                src="https://img.icons8.com/ios/100/000000/star--v1.png" />
                            {{ $pet->rating }}
                        </small>
                    </a>
                @empty
                    Geen huisdieren gevonden
                @endforelse
            </div> --}}
        </div>
        @if ($pets->hasPages())
            <div class="card-footer d-flex justify-content-center">
                {{ $pets->links() }}
            </div>
        @endif
</x-layout>

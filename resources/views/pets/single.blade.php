<x-layout>
    <div class="card col-sm-10 mt-5 mx-auto">
        <div class="row g-0">
            <div class="col-sm-2">
                <img src="/storage/pets/{{ $pet->image }}" width="100%" class="img-fluid" />
            </div>
            <div class="col-sm">
                <div class="card-body">
                    <h3 class="card-title">{{ $pet->name }}, the {{ $pet->type }}</h3>
                    <p class="card-text">
                    <h5>Over {{ $pet->name }}</h5>
                    {{ $pet->description }}
                    </p>
                    <p>
                        Gewicht: {{ $pet->weight }}kg
                    </p>
                    <p>
                        Gevraagd uurtarief: €{{ $pet->hourly_rate }}
                    </p>
                    @if (Auth::check() && Auth::user()->admin)
                        <a href="{{route('pets.delete',$pet)}}" class="btn btn-danger">Verwijder Pet</a>
                        <a href="{{route('users.delete',$pet->user)}}" class="btn btn-danger">Verban gebruiker</a>
                    @endif
                    @if (Auth::check() && Auth::user()->sitter && Auth::user()->id != $pet->owner_id)
                        <div class="row">
                            <form class="input-group col-sm p-0 m-1" action="{{ route('pets.sit', $pet) }}">
                                <input type="text" name="hours" class="form-control" placeholder="Dagen">
                                <button type="submit" class="btn btn-primary" id="button-addon1">Ja ik wil passen op dit
                                    huisdier</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @if (Auth::check() && Auth::user()->id == $pet->owner_id)
            <div class="card-body">
                <a href="{{ route('pets.edit', $pet) }}" class="btn btn-secondary">Bewerk</a>
                <a href="{{ route('pets.delete', $pet) }}" class="btn btn-danger">Verwijderen</a>
            </div>
        @endif
    </div>
    {{-- <div class="card col-sm-10 mt-5 mx-auto">
        <div class="card">
            <h3 class="card-header">Beoordelingen</h3>
            <div class="list-group list-group-flush">
                @forelse ($pet->reviews()->paginate(5) as $review)
                    <div class="list-group-item">
                        <div class="d-flex">
                            <img class="img-fluid rounded-circle p-2 bg-light"
                                src="https://img.icons8.com/ios/50/000000/pet-commands-summon.png" />
                            <div class="ms-2 d-flex flex-column justify-content-center">
                                <small class="text-muted">{{ $review->sender->name }}</small>
                                <small class="text-muted">{{ $review->created_at }}</small>
                            </div>
                            <p class="ms-auto">
                                <img height="18px" class="m-1"
                                    src="https://img.icons8.com/ios/100/000000/star--v1.png" />{{ $review->rating }}
                            </p>
                        </div>
                        <p class="pt-2">
                            {{ $review->description }}
                        </p>
                    </div>
                @empty
                Dit huisdier heeft geen beoordelingen
                @endforelse
            </div>
            @if ($pet->reviews()->paginate(5)->hasPages())
                <div class="card-footer d-flex justify-content-center">
                    {{ $pet->reviews()->paginate(5)->links() }}
                </div>
            @endif
            @if (Auth::check() && Auth::user()->id != $pet->owner_id && Auth::user()->sitter)
                <form class="card-footer" action="/reviews/" method="POST">
                    <h4 class="m-2">
                        <label for="descField">
                            Beoordeling achterlaten
                        </label>
                    </h4>
                    @csrf
                    <input type="hidden" name="reviewable_id" value="{{ $pet->id }}">
                    <input type="hidden" name="reviewable_type" value="App\Models\Pet">
                    <input type="hidden" name="sender_id" value="{{ Auth::user()->id }}">
                    <x-starrating />
                    <div class="mb-3">
                        <textarea class="form-control" name="description" id="descField" rows="3"></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Beoordeling achterlaten</button>
                    @if ($errors->any())
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                    @endif
                </form>
            @endif

        </div>
    </div> --}}
</x-layout>

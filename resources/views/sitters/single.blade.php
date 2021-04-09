<x-layout>
    <div class="col-sm-10 mt-5 mx-auto">

        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-sm-2 h-100">
                    <img src="/storage/sitters/{{ $sitter->image }}" class="img-fluid" />
                </div>
                <div class="col-sm">
                    <div class="card-body">
                        <h3 class="card-title">{{ $sitter->user->name }}</h3>
                        @if ($sitter->user->country & $sitter->user->city)
                            <p class="card-text fw-bold">{{ $sitter->user->country }}, {{ $sitter->user->city }}</p>
                        @endif
                        <small class="card-text d-flex align-items-center">
                            <img height="18px" class="m-1" src="https://img.icons8.com/ios/100/000000/star--v1.png" />
                            Beoordeling: {{ $sitter->rating }}
                        </small>
                        <p class="card-text">
                        <h5>Over {{ $sitter->user->name }}</h5>
                        {{ $sitter->description }}
                        </p>
                        @if (Auth::check() && Auth::user()->admin)
                            <a href="{{ route('sitters.delete', $sitter) }}" class="btn btn-danger">Verwijder sitter</a>
                            <a href="{{ route('users.delete', $sitter->user) }}" class="btn btn-danger">Verban gebruiker</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-5">
            <h3 class="card-header">Afbeeldingen van je huis</h3>
            <ul class="list-group list-group-flush list-group-horizontal overflow-auto">
                @if (Auth::check() && $sitter->user->id == Auth::user()->id)
                    <form class="list-group-item col-6 d-flex flex-column justify-content-center" method="POST"
                        action="{{ route('sitters.photo', $sitter) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image" id="" class="form-control mb-3">
                        <button type="submit" class="btn btn-success">Uploaden</button>
                    </form>
                @endif
                @forelse ($sitter->photos as $photo)
                    <img src="/storage/sitterImages/{{ $photo->image }}" class="list-group-item" height="200"
                        alt="image of pet">
                @empty
                    <p class="list-group-item">Geen foto's</p>

                @endforelse
            </ul>
        </div>
        <div class="card">
            <div class="card-header d-flex d-row justify-content-between flex-wrap">
                <h3>Beoordelingen</h3>

            </div>
            <div class="list-group list-group-flush">
                @forelse ($sitter->reviews()->paginate(5) as $review)
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
                    Deze oppas heeft geen recensies
                @endforelse
            </div>
            @if ($sitter->reviews()->paginate(5)->hasPages())
                <div class="card-footer d-flex justify-content-center">
                    {{ $sitter->reviews()->paginate(5)->links() }}
                </div>
            @endif
            @if (Auth::check() && Auth::user()->id != $sitter->account_id)
                <form class="card-footer" action="/reviews/" method="POST">
                    <h4 class="m-2">
                        <label for="descField">
                            Beoordeling achterlaten
                        </label>
                    </h4>
                    @csrf
                    <input type="hidden" name="reviewable_id" value="{{ $sitter->id }}">
                    <input type="hidden" name="reviewable_type" value="App\Models\Sitter">
                    <input type="hidden" name="sender_id" value="{{ Auth::user()->id }}">
                    <x-starrating />
                    <div class="mb-3">
                        <textarea class="form-control" name="description" id="descField" rows="3"></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Beoordeling achterlaten</button>
                </form>
            @endif
        </div>
    </div>
</x-layout>

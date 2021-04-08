<x-layout>
    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Vind de zorg die uw huisdier verdient</h1>
                    <p class="lead text-muted">Boek vertrouwde oppassers die uw huisdieren als familie zullen behandelen.</p>
                    <p>Bent u op zoek naar een baan als dierenoppas? <a href="{{ route('sitters.create') }}">Nu toepassen.</a>
                    </p>
                </div>
            </div>
        </section>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach (App\Models\Sitter::all()->take(6) as $sitter)

                        <div class="col">
                            <div class="card shadow-sm">
                              <img src="/storage/sitters/{{$sitter->image}}" class="card-img-top" style="object-fit: cover;" alt="{{$sitter->user->name}} profile picture" height="225">
                                <div class="card-body">
                                  <h5>{{ $sitter->user->name }}</h5>
                                  <p class="card-text">{{ $sitter->description }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{ route('sitters.show', $sitter) }}"
                                                class="btn btn-sm btn-outline-secondary">View</a>
                                        </div>
                                        <small class="text-muted">Beoordeling: {{ $sitter->rating }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
</x-layout>

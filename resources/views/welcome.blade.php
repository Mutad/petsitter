<x-layout>
    <main>
        <section class="py-5 text-center pets">
            <div class="container">
                <div class="row py-lg-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light">Vindt hier de zorg die uw huisdier verdient</h1>
                        <p class="lead text-muted">Vind hier uw vertouwde oppasser voor uw dieren.</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach (App\Models\Pet::all()->take(6) as $pet)

                        <div class="col">
                            <div class="card shadow-sm">
                              <img src="/storage/pets/{{$pet->image}}" class="card-img-top" style="object-fit: cover;" alt="{{$pet->name}} profile picture" height="225">
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
                </div>
            </div>
        </div>
    </main>
</x-layout>

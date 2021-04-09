<x-layout>
    <div class="col-sm-10 mt-5 mx-auto card">
        <div class="card-header">Alle bestellingen</div>
        <div class="list-group list-group-flush">
            @forelse ($orders as $order)
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-sm">
                            <h5>Afspraak met {{ $order->pet->name }}</h5>
                            <p class="m-1">Dagen: {{ $order->hours }}</p>
                            <p class="m-1">Uurloon: €{{ $order->hourly_cost }}</p>
                        </div>
                        <div class="col-sm list-group list-group-flush text-center">
                            <a href="{{ route('sitters.show', $order->sitter) }}" class="list-group-item-action list-group-item list-group-item-primary">Bekijk te
                                oppasser</a>
                            <a href="{{ route('orders.delete', $order) }}" class="list-group-item-action list-group-item list-group-item-danger">Bestelling
                                verwijderen</a>
                            <a href="{{ route('sitters.delete', $order->sitter) }}" class="list-group-item-action list-group-item list-group-item-danger">Verwijder
                                oppas</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="list-group-item">Geen bestellingen verzonden</div>
            @endforelse
        </div>
    </div>
</x-layout>

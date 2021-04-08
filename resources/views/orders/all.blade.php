<x-layout>
    <div class="col-sm-10 mt-5 mx-auto">
        <div class="card mb-5">
            <div class="card-header d-flex justify-content-between">
                <h3>Ontvangen afspraken</h3>
            </div>
            <div class="list-group list-group-flush">
                @forelse (Auth::user()->orders as $order)
                    <div class="list-group-item">
                        <h5>Afspraak met {{ $order->pet->name }}</h5>
                        <div class="row">
                            <div class="col-sm">
                                <p class="m-1">Dagen: {{ $order->hours }}</p>
                                <p class="m-1">Uurloon: €{{ $order->hourly_cost }}</p>
                            </div>
                            <div class="col-sm text-end">
                                <a href="{{ route('sitters.show', $order->sitter) }}" class="btn btn-primary">Bekijk te oppasser</a>

                                @if ($order->sitter->user->id == Auth::user()->id)
                                    @if (!$order->sitter_confirmed)
                                        <a href="{{ route('orders.confirm', $order) }}"
                                            class="btn btn-primary">Bevestigen</a>
                                    @elseif ($order->pet_confirmed)
                                        <p>Bevestigd</p>
                                    @else
                                        <p>Wachten op de eigenaar van het huisdier om te bevestigen</p>
                                    @endif
                                @elseif ($order->pet->owner_id == Auth::user()->id)
                                    @if (!$order->pet_confirmed)
                                        <a href="{{ route('orders.confirm', $order) }}"
                                            class="btn btn-primary">Bevestigen</a>
                                    @elseif ($order->sitter_confirmed)
                                        <p>Bevestigd</p>
                                    @else
                                        <p>Wacht tot de oppas bevestigt</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="list-group-item">Geen bestellingen verzonden</div>
                @endforelse
            </div>
        </div>
        @if (Auth::user()->sitter)

            <div class="card ">
                <div class="card-header d-flex justify-content-between">
                    <h3>Ontvangen Afspraken</h3>
                </div>
                <div class="list-group list-group-flush">
                    @forelse (Auth::user()->sitter->orders as $order)
                        <div class="list-group-item">
                            <h5>Afspraak met {{ $order->pet->name }}</h5>
                            <div class="row">
                                <div class="col-sm">
                                    <p class="m-1">Dagen: {{ $order->hours }}</p>
                                    <p class="m-1">Uurloon: {{ $order->hourly_cost }}</p>
                                </div>
                                <div class="col-sm text-end">
                                    @if ($order->sitter->user->id == Auth::user()->id)
                                        @if (!$order->sitter_confirmed)
                                            <a href="{{ route('orders.confirm', $order) }}"
                                                class="btn btn-primary">Bevestigen</a>
                                        @elseif ($order->pet_confirmed)
                                            Bevestigd
                                        @else
                                            Wachten op de eigenaar van het huisdier om te bevestigen
                                        @endif
                                    @elseif ($order->pet->owner_id == Auth::user()->id)
                                        @if (!$order->pet_confirmed)
                                            <a href="{{ route('orders.confirm', $order) }}"
                                                class="btn btn-primary">Bevestigen</a>
                                        @elseif ($order->sitter_confirmed)
                                            Bevestigd
                                        @else
                                            Wachten tot de oppas bevestigt
                                        @endif
                                    @endif
                                </div>
                            </div>

                        </div>
                    @empty
                        <div class="list-group-item">No orders recieved</div>
        @endforelse
    </div>
    </div>
    @endif

    </div>
</x-layout>
